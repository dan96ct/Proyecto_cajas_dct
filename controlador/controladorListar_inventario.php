<?php

include_once '../DAO/Operaciones.php';
session_start();

$_SESSION['sesion'] = Operaciones::listarInventario();
header('Location:../vistas/listarInventario_vista.php');


