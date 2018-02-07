<?php

include_once '../DAO/Operaciones.php';
session_start();

$_SESSION['estanteriasDevolCaja'] = Operaciones::listarEstanterias();
header('Location:../vistas/devolverCaja_vista.php');