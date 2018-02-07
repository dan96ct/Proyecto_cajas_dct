<?php

include_once '../DAO/Operaciones.php';
session_start();

$_SESSION['cajas'] = Operaciones::listarCajas();
header('Location:../vistas/listarCajas_vista.php');


