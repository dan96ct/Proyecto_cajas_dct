<?php

include_once '../DAO/Operaciones.php';

    $arrayCodigoCajas = Array();
    $arrayCodigoCajas = Operaciones::getCodigoCajas();
    echo json_encode($arrayCodigoCajas);
?>
