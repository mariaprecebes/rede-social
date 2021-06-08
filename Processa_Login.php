<?php
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(isset($email) && isset($senha) && $senha != "" && $email != ""){
        $con = new PDO("mysql:host=localhost;  dbname=rede social", "root", "");
        $stmt = $con->prepare("SELECT * FROM usuario WHERE email_usuario LIKE ? AND senha_usuario LIKE ?");
        $stmt -> bindParam(1, $email);
        $stmt -> bindParam(2, $senha);
        $stmt -> execute();
        $resultado = $stmt->fetchAll();

        $logado = false;
        foreach($resultado as $item){
            $logado = true;
            session_start();
            $_SESSION['perfil'] = $item['perfil_usuario'];
            $_SESSION['nome'] = $item['nome_usuario'];
            $_SESSION['email'] = $item['email_usuario'];
            $_SESSION['senha'] = $item['senha_usuario'];
            $_SESSION['id_usuario'] = $item['id_usuario'];
        }
        if($logado){
            header("location:Tela_Perfil.php");
        }
        else{
            echo "Erro no acesso, tente novamente<br><br> <a href='Tela_Login.php'>Fazer Login</a>";
        }
    }
    else{
        echo "Algum campo vazio, tente novamente<br><br> <a href='Tela_login.php'>Fazer Login</a>";
    }
?>