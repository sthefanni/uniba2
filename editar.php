<?php
 session_start();
 include_once('config.php');

 $teste = $_SESSION["IDusuario"];
 $teste = intval ($teste);

$pesquisa = mysqli_query($conexao, "SELECT nome, email, senha, dataNascimento FROM usuario WHERE IDusuario = $teste");
$row_usuario = mysqli_fetch_assoc($pesquisa);
  


$row = mysqli_num_rows($pesquisa);
 if(isset($_POST['submit'])){

 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $date = $_POST['date'];
 $senha = $_POST['senha'];
 $novasenha = $_POST['novasenha'];


if(!empty($_POST['senha']) || !empty($_POST['novasenha'])){
 
   $x= mysqli_query($conexao, "SELECT senha FROM usuario WHERE senha = '$senha'");


   if ($senha == $x){
   $d = mysqli_query($conexao, "UPDATE usuario 
                  SET senha = '$novasenha'
                  WHERE IDusuario = '$teste'");

}

  // echo ("$teste");

$a = mysqli_query ($conexao, "UPDATE usuario 
                  SET nome = '$nome'
                  WHERE IDusuario = '$teste'");
                
$b = mysqli_query ($conexao, "UPDATE usuario 
                  SET email = '$email'
                  WHERE IDusuario = '$teste'");
$c = mysqli_query($conexao, "UPDATE usuario 
                  SET dataNascimento = '$date'
                  WHERE IDusuario = '$teste'");
echo("Perfil Alterado com Sucesso.");

//}if ($senha != $x){
	 // echo("Senha incorreta. Tente novamente.");
//}
   // $result = mysqli_query($conexao, "INSERT INTO usuario(nome, email, dataNascimento) VALUES ('$usuario', '$email', '$date')");
}}


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
    <link href="CSS/cadastro.css" rel="stylesheet">
    <title>UniBA - Universidades Baianas</title>

    <style>

body {
    background: #272727;
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
                <div class="container"><a class="navbar-brand" href="index.html">UniBA</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="cursos.html">Cursos</a></li>
                           
                            
                        </ul>
                        <form class="form-inline mr-auto" target="_self">

                        </form>
                        <span class="navbar-text"> <a class="nav-link active" href="favoritos.html" ><img class="fav" src="IMG/coracao.png" title="Meus Favoritos" width="25" height="23"/></a></span>
                        <span class="navbar-text"> <a class="nav-link active" href="login.html" class="login">Conecte-se</a></span><a class="btn btn-light action-button" role="button" href="#">Registre-se</a></div>
                </div>
            </nav>

    </div>
    </div>
</br>
    <img class="banner" src="IMG/banner02.png" width="500" height="100"/>

    <div id="centro"> 
      <form method="POST" action="editar.php"> 
          <label> Nome: </label><br>
          <input type="text" name=nome placeholder="Insira seu novo usuário: " value="<?php echo $row_usuario['nome'];?>"><br><br>

          <label> E-mail: </label><br>
          <input type="email" name=email placeholder="Insira seu novo email: " value="<?php echo $row_usuario['email'];?>"><br><br> 

          <label> Data de Nascimento: </label><br>
          <input type="date" name=date value="<?php echo $row_usuario['dataNascimento'];?>"><br><br> 

          <label> Senha Atual: </label><br>
          <input type="password" name=senha placeholder="Insira sua senha atual: "><br><br>

          <label> Nova Senha: </label><br>
          <input type="password" name=novasenha placeholder="Insira sua nova senha: "><br><br> 

          <input type= "submit" name="submit" value="Salvar">
   </form>
    </div>
        </body>
</html>