<?php

$codigo = $_REQUEST['introCodigo'];
$estanteria = $_REQUEST['lista_estanteria'];
$leja = $_REQUEST['lista_posicion'];

include_once '../modelo/Caja.php';
include_once '../DAO/Operaciones.php';
include_once '../Errores/Error_caja_devolucion_excepcion.php';


try {
    Operaciones::devolverCaja($codigo, $estanteria, $leja);
    header('Location:../controlador/controladorGetEstanterias_devolverCaja.php');
} catch (Error_caja_devolucion_excepcion $exc) {
    header('Location:../vistas/vista_error.php?error=' . $exc);
}
?>

