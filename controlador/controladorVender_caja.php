<?php
$codigo = $_REQUEST['introCodigo'];


include_once '../modelo/Caja.php';
include_once '../DAO/Operaciones.php';
include_once '../Errores/Error_caja_venta_excepcion.php';


try{
Operaciones::venderCaja($codigo);
header('Location:../vistas/venderCaja_vista.php');
} catch(Error_caja_venta_excepcion $exc){
    header('Location:../vistas/vista_error.php?error='.$exc);

}

?>

