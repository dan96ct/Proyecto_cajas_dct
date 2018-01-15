
<?php
session_start();
include_once '../DAO/conexion_bd.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        //OBTENEMOS LA VARIABLE Origen
        $Origen = $_REQUEST['lista_estanteria'];

//array_dif

        global $conexion;
        $ordenSQL = "SELECT * FROM `estanteria` WHERE `codigo`='" . $Origen . "';";

        $consulta = $conexion->query($ordenSQL);
        $fila = $consulta->fetch_array();
        $totalLejas = $fila['nLejas'];
        $ordenSQL2 = "SELECT * FROM `ocupacion` WHERE `idEstanteria`='" . $fila['id'] . "';";
        $consulta2 = $conexion->query($ordenSQL2);



        if ($consulta) {
            $filaOcupacion = $consulta2->fetch_array();
            $arrayLejasOcupadas = array();
            while ($filaOcupacion) {
                array_push($arrayLejasOcupadas, $filaOcupacion['lejaOcupada']);
                $filaOcupacion = $consulta2->fetch_array();
            }


            $arraLejasTotal = array();
            for ($i = 1; $i < $totalLejas + 1; $i++) {
                array_push($arraLejasTotal, $i);
            }
            
            $arrayFinal = array();
            for ($i = 0; $i < count($arraLejasTotal); $i++) {
                $validar = true;
                for ($j = 0; $j < count($arrayLejasOcupadas); $j++) {
                    if($arraLejasTotal[$i] == $arrayLejasOcupadas[$j]){
                        $validar = false;
                        break;
                    }
                }
                if($validar == true){
                    array_push($arrayFinal, $arraLejasTotal[$i]);
                }
            }

            for ($i = 0; $i < count($arrayFinal); $i++) {
                ?><option><?php echo $arrayFinal[$i]; ?></option><?php
            }
        } else {
            debug_to_console("Ha ido algo mal");
        }
        $conexion->close();
        session_destroy();
        ?>
</body>
</html>