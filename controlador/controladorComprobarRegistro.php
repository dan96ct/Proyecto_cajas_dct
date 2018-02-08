<?php

include_once '../DAO/Operaciones.php';
include_once '../DAO/conexion_bd.php';
if (Operaciones::compruebaUsuarios() == null) {
    header('Location:../vistas/registrarUsuario_vista.php');
} else {
    header('Location:../vistas/inicio_sesion_vista.php');
}
?>
