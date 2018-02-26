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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="javascript/JavaScript.js" type="text/javascript"></script>

    </head>
    <body>
        <?php
        include_once '../menu.php';
        include_once '../DAO/Operaciones.php';
        ?>
        <form action="../controlador/controladorAlta_caja.php">
            <table border="1" class="tabla">
                <thead>
                    <tr><td colspan="7"><h2>Nueva caja</h2></td></tr>
                    <tr>
                        <th>Color</th>
                        <th>Altura</th>
                        <th>Anchura</th>
                        <th>Profundidad</th>
                        <th>Material</th>
                        <th>Contenido</th>
                        <th>Codigo</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="color" name="introColor" value="" /></td>
                        <td><input type="number" step="0.01" name="introAltura" value="" required min="0"/></td>
                        <td><input type="number" step="0.01" name="introAnchura" value="" required min="0"/></td>
                        <td><input type="number" step="0.01" name="introProfundidad" value="" required min="0"/></td>
                        <td><input type="text" name="introMaterial" value="" required/></td>
                        <td><input type="text" name="introContenido" value="" required/></td>
                        <td><input type="text" name="introCodigo" value="" required/></td>

                    </tr>
                    <tr><td colspan="7">Datos estanteria</td></tr>
                    <tr><td colspan="7">
                            Esanteria:
                            <select style="width: 30%;" id="lista_estanteria" name="lista_estanteria" onchange="comprobarLejas(this.value);">
                                <?php
                                session_start();
                                $estanterias = $_SESSION['estanteriasInsertC'];
                                global $estanterias;
                                for ($i = 0; $i < count($estanterias); $i++) {
                                    if ($estanterias[$i]->getLejasOcupadas() < $estanterias[$i]->getNLejas()) {
                                        ?><option><?php echo $estanterias[$i]->getCodigo(); ?></option><?php
                                    }
                                }
                                ?>
                            </select>
                            Leja:
                            <select style="width: 30%;" id="lista_posicion" name="lista_posicion">
                                <script>comprobarLejas('<?php echo $estanterias[0]->getCodigo(); ?>');</script>
                            </select>
                    </tr>

                    <tr><td colspan="7"><button type="submit" name="buton">Aceptar</button></td></tr>
                </tbody>
            </table>


        </form>


    </body>
</html>
