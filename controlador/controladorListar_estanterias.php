<?php
include_once '../DAO/Operaciones.php';
session_start();
$_SESSION['estanterias'] = Operaciones::listarEstanterias();
header('Location:../vistas/listarEstanterias_vista.php');


