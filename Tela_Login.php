<?php
session_start();
session_destroy();
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <style>         
.p1{font-family: 'Noto Sans TC', sans-serif;}
          
.div1{
          float:right;
          padding:10%;
      }

.div2{
          padding-top: 30px;
          padding-left: 120px; 
                }

.div3{
          padding-left: 4px;
}
            #button{
    background-color: white;
    border: none;
    color: black;
    padding: 11px 30px;
    text-align: center;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border: 2px solid #800B0B;
    border-radius: 25px;
}

#button:hover {
    background-color:  #800B0B;
    color: white;
    transition-duration: 0,5s;
}
            input[type=email] {
  width: 80%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  padding: 12px 20px;
}
            input[type=password] {
  width: 80%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;

  padding: 12px 20px;
} 
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: right;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #800B0B;
  color: white;
}
    </style>
        <link rel="stylesheet" href="css/Tela_Login.css"> 
        <script>
            function PageRedirect(){
                window.location.href="./Tela_Cadastro.html"
            }
        </script>
    </head>
    <body>
        <ul>
  <li><a href="#news">Contato</a></li>
  <li><a href="#contact">Sobre</a></li>
  <li><a href="http://localhost/rede%20social/rede%20social/">Home</a></li>
    </ul>
        <div class="div1">
        <div>
                <h3 class="p1">Faça o login logo abaixo:</h3>
            </div>
            <div>
                <form action="./Processa_Login.php" method="post">
                    <div></div>
                    <input type="email" name="email" placeholder="Digite seu email aqui"><br><br>
                    <div></div>
                    <input type="password" name="senha" placeholder="Digite sua senha aqui"><br><br>
                    <input type="submit" id="button" value="Entrar">
                    <input type="button" id="button" value="Não tenho uma conta" onclick="PageRedirect();"><br><br>

            <div class="checkbox">
      <label><input type="checkbox" name="remember">Lembre-se de mim</label>
    </div>        
                </form>  
            </div>
        </div>
        <div class="div2">
              <img src="imagens/montagem.png" width="550" height="500">
          </div>
    </body>
</html>