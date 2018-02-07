<?php

$color = $_REQUEST['introColor'];
$altura = $_REQUEST['introAltura'];
$anchura = $_REQUEST['introAnchura'];
$profundidad = $_REQUEST['introProfundidad'];
$material = $_REQUEST['introMaterial'];
$contenido = $_REQUEST['introContenido'];
$codigo = $_REQUEST['introCodigo'];

$estanteria = $_REQUEST['lista_estanteria'];
$lejaOcupada = $_REQUEST['lista_posicion'];



include_once '../modelo/Caja.php';
include_once '../DAO/Operaciones.php';
include_once '../Errores/Error_caja_excepcion.php';

$objCaja = new Caja($color, $altura, $anchura, $profundidad, $material, $contenido, $codigo);
$objCaja->setLejaOcupada($lejaOcupada);
$objCaja->setEstanteria($estanteria);
try {
    Operaciones::addCaja($objCaja);
    header('Location:controladorGetEstanterias_insertarCaja.php');
} catch (Error_caja_excepcion $exc) {
    header('Location:../vistas/vista_error.php?error=' . $exc);
}
?>

