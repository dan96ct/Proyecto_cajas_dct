<?php

include_once '../DAO/Operaciones.php';
session_start();

$_SESSION['sesion'] = Operaciones::listarEstanterias();
header('Location:../vistas/listarEstanterias_vista.php');


