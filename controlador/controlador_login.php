<?php

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['pwd'];
include_once '../DAO/Operaciones.php';

if(Operaciones::compruebaLogin($usuario,$password) == true){
header('Location:../inicio.php');
}else{
header('Location:../vistas/inicio_sesion_vista.php');
}

?>

