<?php
session_start();
include_once ("config.php");

$usuario_logado = $_SESSION["IDusuario"];
$usuario_logado = intval ($usuario_logado);

$query_usuario = ($conexao, "SELECT IDusuario FROM usuario WHERE IDusuario = $usuario_logado LIMIT 1");

if ($query_usuario) AND ($query_usuario)-> rowCount() !=0){
	$query_delete= ($conexao,"DELETE * FROM usuario WHERE IDusuario = $usuario_logado");
	header ("Location: index.php");

}else{
	echo ("Erro ao apagar o usuário.");
	header ("Location: perfil.php");
}

?>