<?php

include_once '../DAO/Operaciones.php';

$codigoCajas = Array();
$codigoCajas = Operaciones::getCodigoCajasVendidas();
echo json_encode($codigoCajas);