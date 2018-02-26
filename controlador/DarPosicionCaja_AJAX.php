<?php
include_once '../DAO/Operaciones.php';

$Origen = $_REQUEST['estanteria'];
$arrayCodigoCajas = Array();
$arrayCodigoCajas = Operaciones::darPosicionCaja_AJAX($Origen);
echo json_encode($arrayCodigoCajas);
?>

