<?php

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['pwd'];
include_once '../DAO/Operaciones.php';
include_once '../Errores/Error_registro.php';

try {
    Operaciones::registroUsuario($usuario, $password);
    header('Location:../vistas/inicio_sesion_vista.php');
} catch (Error_registro_excepcion $exc) {
    header('Location:../vistas/vista_error.php?error=' . $exc);
}
?>

