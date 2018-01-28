<?php

include_once '../DAO/Operaciones.php';
session_start();

$_SESSION['sesion'] = Operaciones::listarCajas();
header('Location:/Proyecto_cajas_dct/vistas/listarCajas_vista.php');


