<?php

include_once '../DAO/Operaciones.php';
session_start();
$codigoCajas = Array();
$codigoCajas = Operaciones::getCodigoCajasVendidas();
echo json_encode($codigoCajas);