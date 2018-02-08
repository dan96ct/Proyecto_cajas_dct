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
        include_once '../modelo/Caja.php';
        ?>

        <table border="1" class="tabla">
            <thead>
                <tr><td colspan="9"><h2>Cajas</h2></td></tr>
                <tr>
                    <th>Color</th>
                    <th>Altura</th>
                    <th>Anchura</th>
                    <th>Profundidad</th>
                    <th>Material</th>
                    <th>Contenido</th>
                    <th>Codigo</th>
                    <th>Estanteria</th>
                    <th>Leja</th>


                </tr>
            </thead>
            <tbody>
<?php
                session_start();
                $arrayCajas = $_SESSION['cajas'];
                global $arrayCajas;
                for ($i = 0; $i < count($arrayCajas); $i++) {
                    ?><tr>
                        <td><div style="width: 50px; height: 20px; background: <?php echo $arrayCajas[$i]->getColor(); ?>;"></div></td>
                        <td><?php echo $arrayCajas[$i]->getAltura(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getAnchura(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getProfundidad(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getMaterial(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getContenido(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getCodigo(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getEstanteria(); ?></td>
                        <td><?php echo $arrayCajas[$i]->getLejaOcupada(); ?></td>

                    </tr><?php } ?>
            </tbody>

        </table>




    </body>
</html>
