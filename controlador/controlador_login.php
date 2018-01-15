<?php

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['pwd'];
include_once '../DAO/Operaciones.php';

if(Operaciones::compruebaLogin($usuario,$password) == true){
header('Location:http://localhost:8888/Proyecto_cajas_dct/inicio.php');
}else{
header('Location:http://localhost:8888/Proyecto_cajas_dct/vistas/inicio_sesion_vista.php');
}

?>

