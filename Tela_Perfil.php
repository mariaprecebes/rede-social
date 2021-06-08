<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script>
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                }
        </script>
    </head>
    <body>
        <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
            <button  onclick="w3_close()" class="w3-bar-item w3-large"><img src="./icons/back.svg"></button>
            <a href="./Principal_Page(usu).php" class="w3-bar-item w3-button">Home</a>
                <a href="./Tela_Perfil.php" class="w3-bar-item w3-button">Perfil</a>
                <a style="position: back;" href="./Tela_Login.php" class="w3-bar-item w3-button">Sair</a>
            </div>
        <div class="w3-teal">
            <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
            <div class="w3-container">
        </div>
            </div>

            <div>
                <?php
                    session_start();
                    $con = new PDO("mysql:host=localhost;  dbname=rede social", "root", "");
                    $stmt = $con->prepare("SELECT nome_usuario, perfil_usuario, email_usuario, numero_usuario, instagram_usuario, id_usuario FROM usuario WHERE usuario.nome_usuario LIKE ? ");
                    $stmt -> bindParam(1, $_SESSION['nome']);
                    $stmt->execute();
                    $resultado = $stmt->fetchAll();


                    foreach($resultado as $row){
                        echo "<p>Foto de perfil:</p><div><img style='width: 300px;' src = '{$row['perfil_usuario']}'></div>
                        <p>ID, Nome e sobrenome: {$row['id_usuario']}-{$row['nome_usuario']}</p>
                        <p>Email: {$row['email_usuario']}</p>
                        <p>Link do whatsapp: <a target='_blank' href='https://api.whatsapp.com/send?phone=55{$row['numero_usuario']}'> <img style='width: 35px;' src='./icons/whatsapp.svg'> </a></p>
                        <p>Link do instagram: <a target='_blank' href=https://www.instagram.com/{$row['instagram_usuario']}> <img style='width: 35px;' src='./icons/Instagram.svg'> </a></p>";
                    }   
                ?>
                <?php
                $con = new PDO("mysql:host=localhost;  dbname=rede social", "root", "");
                $stmt = $con->prepare("SELECT imagem_postagem, fk_id_usuario FROM postagens WHERE postagens.fk_id_usuario LIKE ? ");
                $stmt -> bindParam(1, $_SESSION['id_usuario']);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                
                echo "<h3>Suas postagens vão aparecer logo abaixo</h3>";
                foreach($resultado as $item){
                    //echo "<div><img src='{$item['imagem_postagem']}'></div>";
                    echo "<div class='w3-container'>
                                  <div class='w3-card-4' style='width:25%;'>
                                    <img src='{$item['imagem_postagem']}' alt='Alps' style='width: 90%; margin-left: 15px; margin-top: 15px;'>
                                    <div class='w3-container w3-center'>
                                    <p>----------</p>
                                  </div>
                                  </div>
                                  </div><br><br>";
                }
                ?>
            </div>
    </body>
</html>