<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];
    $numero = $_POST['numero'];
    $instagram = $_POST['instagram'];

    
    $dir = "./image/";
    $file = $_FILES['perfil'];
    $destino = "$dir" . $file['name'];

    if(move_uploaded_file($file["tmp_name"], $destino)){
        echo "Arquivo enviado com sucesso<br>";
    }
    else{
        echo "Erro com o arquivo<br>";
  
    }
    if($senha1 == $senha2 && $nome != "" && $email != "" && $senha1 != "" && $senha2 != ""){
        $con = new PDO("mysql:host=localhost;  dbname=rede social", "root", "");
        $stmt = $con->prepare("INSERT INTO usuario(nome_usuario, perfil_usuario, email_usuario, senha_usuario, numero_usuario, instagram_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt -> bindParam(1, $nome);
        $stmt -> bindParam(2, $destino);
        $stmt -> bindParam(3, $email);
        $stmt -> bindParam(4, $senha1);
        $stmt -> bindParam(5, $numero);
        $stmt -> bindParam(6, $instagram);
        $stmt -> execute();

        header("location:Tela_Login.php");
    }
    else{
        echo " ERRO!!";
    }
?>