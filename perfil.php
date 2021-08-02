<?php

session_start();

include_once ("config.php");
//include_once ("verifica.php");
//include_once ("conect.php");


//echo "bem vindo " .$_SESSION ["IDusuario"];
$usuario_logado = $_SESSION["IDusuario"];

$usuario_logado = intval ($usuario_logado);
//echo ($usuario_logado);
//echo var_dump ($usuario_logado);

$listaTotal = mysqli_query($conexao, "SELECT nome, email, dataNascimento FROM usuario WHERE IDusuario ='$usuario_logado'");
$date = mysqli_query($conexao, "SELECT dataNascimento FROM usuario WHERE IDusuario ='$usuario_logado'");


($row_usuario = mysqli_fetch_assoc($listaTotal));
    echo "Usuário: " . ($row_usuario['nome'] . "<br>");
    echo "E-mail: " . ($row_usuario['email'] . "<br>");
    echo "Data de Nascimento: " . ($row_usuario['dataNascimento'] . "<br>");


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

   
</head>
<body>

<a href= "editar.php"> Editar Perfil </a>
<a href= "deletar.php"> Deletar Perfil </a>

</form> 
       
    </div>
        </body>
</html>