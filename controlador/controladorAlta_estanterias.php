<?php

$codigo = $_REQUEST['introCodigo'];
$material = $_REQUEST['introMaterial'];
$numero_lejas = $_REQUEST['introNLejas'];
$pasillo = $_REQUEST['introPasillo'];
$numero_pasillo = $_REQUEST['introNumero'];

include_once '../modelo/Estanteria.php';
include_once '../DAO/Operaciones.php';
include_once '../Errores/Error_estanteria_excepcion.php';

$objEstanteria = new Estanteria($material, $numero_lejas, $pasillo, $numero_pasillo, $codigo);
try {
    Operaciones::addEstanteria($objEstanteria);
    header('Location:../controlador/controladorListar_estanterias.php');
} catch (Error_estanteria_excepcion $exc) {
    header('Location:../vistas/vista_error.php?error='.$exc);
}
?>

