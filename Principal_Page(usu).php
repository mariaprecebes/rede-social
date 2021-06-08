<html>
    <head>
        <meta charset="UTF-8" />
        <!--
            Código para adicionar o Favicon!
            <link rel="shortcut icon" href="" type="image/icon">
        -->
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
        <div><br>
            <div class='w3-container'>
            <div class='w3-card-4' style="width:25%;">
                <br><form class='w3-container w3-center' style="width:25%;" action="./Processa_Upload.php" method="post" enctype="multipart/form-data">
                <textarea name="descricao" cols="20px" rows="3px" style="resize:none; margin-left: 47px;" placeholder="Faça uma descrição para sua postagem"></textarea>
                <label for="upload-photo"  style="cursor: pointer; margin-left: 70px;"><img src="./icons/Icon_Upload.png" style="width:150px;">
                <input type="file" name="imagem" id="upload-photo" style="visibility: hidden;"></label>
                <input type="submit" style="margin-left: 105px;" value="Postar" class="w3-btn w3-round-xxlarge">
                </form>
            </div>
            </div>
                <div>
                    <?php
                        $con = new PDO("mysql:host=localhost; dbname=rede social", "root", "");
                        $stmt = $con->prepare("SELECT nome_usuario, imagem_postagem, descricao_postagem FROM postagens, usuario WHERE usuario.id_usuario=postagens.fk_id_usuario");
                        $stmt->execute();
                        $resultado = $stmt->fetchAll();
                        foreach($resultado as $posts){
                            echo "<div class='w3-container'>
                            <div class='w3-card-4' style='width:25%;'>
                            <p style='margin-left: 70px; '>Postagem de {$posts['nome_usuario']}</p>
                              <img src='{$posts['imagem_postagem']}' alt='Alps' style='width: 90%; margin-left: 15px;'>
                            <div class='w3-container w3-center'>
                              <p style='word-wrap: break-word;'>{$posts['descricao_postagem']}</p>
                            </div>
                            </div>
                            </div>";
                        }
                    ?>
                </div>
            </div>
    </body>
</html>