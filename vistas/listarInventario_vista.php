<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>       
        <link href="../vistas/css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include_once '../menu.php';
        include_once '../modelo/Inventario.php';
        include_once '../modelo/Caja.php';
        session_start();
        $arrayInventario = $_SESSION['sesion'];
        global $arrayEstanterias;
        session_destroy();
        ?>
        <table border="1" class="tabla">
            <?php
            for ($i = 0; $i < count($arrayInventario); $i++) {
                ?>
                <tbody>
                    <tr><td colspan="8"><h2>Estanteria <?php echo $arrayInventario[$i]->getCodigo(); ?></h2></td></tr>
                    <tr>
                        <th>Codigo</th>
                        <th>Material</th>
                        <th>N Lejas</th>
                        <th>Pasillo</th>
                        <th>Numero</th>
                        <th colspan="3">Lejas ocupadas </th>
                    </tr>
                    <tr style="background-color: #ccffff">
                        <td><?php echo $arrayInventario[$i]->getCodigo(); ?></td>
                        <td><?php echo $arrayInventario[$i]->getMaterial(); ?></td>
                        <td><?php echo $arrayInventario[$i]->getNLejas(); ?></td>
                        <td><?php echo $arrayInventario[$i]->getPasillo(); ?></td>
                        <td><?php echo $arrayInventario[$i]->getNumero(); ?></td>
                        <td colspan="3"><?php echo $arrayInventario[$i]->getLejasOcupadas(); ?></td></tr>
                    <?php if ($arrayInventario[$i]->getLejasOcupadas() > 0) { ?>
                        <tr><th colspan="8">Cajas de estanteria</th></tr>
                        <tr><th>Color</th><th>Altura</th><th>Anchura</th><th>Profundidad</th><th>Material</th><th>Contenido</th>
                            <th>Codigo</th><th>Leja ocupada</th></tr>
                    <?php
                    $arrayCajas = $arrayInventario[$i]->getCajas();
                    for ($j = 0; $j < count($arrayCajas); $j++) {
                    ?>
                            <tr style="background-color: #cccccc;">
                                <td><div style="width: 50px; height: 20px; background: <?php echo $arrayCajas[$j]->getColor(); ?>;"></div></td>
                                <td><?php echo $arrayCajas[$j]->getAltura(); ?></td>
                                <td><?php echo $arrayCajas[$j]->getAnchura(); ?></td>
                                <td><?php echo $arrayCajas[$j]->getProfundidad(); ?></td>
                                <td><?php echo $arrayCajas[$j]->getMaterial(); ?></td>
                                <td><?php echo $arrayCajas[$j]->getContenido(); ?></td>
                                <td><?php echo $arrayCajas[$j]->getCodigo(); ?></td>
                                <td><?php echo $arrayCajas[$j]->getLejaOcupada(); ?></td>
                            </tr>

                <?php }
                } ?>
                    <tr><td colspan="7" style="width: 20px; height: 20px; border: 0px;"></td></tr>
                </tbody>
                <?php } ?>
        </table>




    </body>
</html>
