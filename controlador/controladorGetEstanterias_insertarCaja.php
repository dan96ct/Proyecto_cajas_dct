<?php

include_once '../DAO/Operaciones.php';
session_start();

$_SESSION['estanteriasInsertC'] = Operaciones::listarEstanterias();
header('Location:../vistas/insertaCajas_vista.php');