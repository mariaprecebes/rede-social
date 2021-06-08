<?php
    session_start();
    $descricao = $_POST['descricao'];

    $dir = "./images/";
    $file = $_FILES['imagem'];
    $destino = "$dir" . $file['name'];

    if(move_uploaded_file($file["tmp_name"], $destino)){
        echo "Arquivo enviado com sucesso<br>";
    }
    else{
        header("location:Principal_Page(usu).php");
    }

    if(isset($destino) && $descricao != ""){
        $con = new PDO("mysql:host=localhost;  dbname=rede social", "root", "");
        $stmt = $con->prepare("INSERT INTO postagens(imagem_postagem, descricao_postagem, fk_id_usuario) VALUES (?, ?, ?)");
        $stmt -> bindParam(1, $destino);
        $stmt -> bindParam(2, $descricao);
        $stmt -> bindParam(3, $_SESSION['id_usuario']);
        $stmt->execute();

        header("location:Principal_Page(usu).php");

    }
    else{
        echo "ERRO!!";
    }
?>