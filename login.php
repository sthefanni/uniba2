<?php
session_start();
    include_once('config.php');

 if(!empty($_POST['email']) || !empty($_POST['senha'])){
 

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$login = "SELECT  email, senha FROM usuario WHERE email ='$email' AND senha = '$senha'";



$result = mysqli_query($conexao, $login);
$passagem = mysqli_query($conexao, "SELECT IDusuario FROM usuario WHERE email ='$email' AND senha = '$senha'");
$bd = mysqli_fetch_assoc($passagem);

$row = mysqli_num_rows($result);
if($row==1){
   $_SESSION ['IDusuario']=$bd['IDusuario'];
   header('Location: perfil.php');
}//else{
 //  header('Location: index.php');
//}

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="CSS/login.css" rel="stylesheet">
    <title>UniBA - Universidades Baianas</title>

    <style>

body {
    background-color: #202020;
    font-family: "Montserrat", sans-serif;
    color:#fff;
    font-family:'Source Sans Pro', sans-serif;
  }

  IMG.banner {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }

</style>

<body>


<!-- NavBar -->
    <div>
        <div class="header-blk">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php">UniBA</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="cursos.php">Cursos</a></li>
                           
                            
                        </ul>
                        <form class="form-inline mr-auto" target="_self">

                        </form>
                        <span class="navbar-text"> <a class="nav-link active" href="favoritos.php" ><img class="fav" src="IMG/coracao.png" title="Meus Favoritos" width="25" height="23"/></a></span>
                </div>
            </nav>

    </div>
    </div>
</br>
    <img class="banner" src="IMG/banner.png" width="500" height="100"/>

    <div id="centro"> 
      <form method="POST" action="login.php">
        <label>E-mail: </label><br><input class="campo" type="email" name="email" id="email" required></br><br>
        <label>Senha: </label><br><input class="campo" type="password" name="senha" id="senha" required><br><br>
        <input type="submit" value="Entrar" id="entrar" name="submit"> </form>
        <a id="lembrete" href="cadastro.php"> Ainda não possui conta? Faça o cadastro. </a>
    </div>

        </body>
</html>
