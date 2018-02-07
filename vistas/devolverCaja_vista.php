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
        <script src="../scriptAJAX.js" type="text/javascript"></script>

        <?php
        include_once '../menu.php';
        include_once '../DAO/Operaciones.php';
        ?>

    </head>
    <body onload="">

        <form action="../controlador/controladorDevolver_caja.php" method="get" class="formulario">
            <table border="1" class="tabla" style="width: 250px;">
                <tbody>
                    <tr><th>Codigo de caja</th></tr>
                    <tr><td>
                            <input id="listaCajasVendidas" list="cajasVendidas" name="introCodigo">
                            <datalist id="cajasVendidas">
                            </datalist></td>
                <script>
                    
                </script>
                </tr>
                <tr><th>Posicion de la caja</th></tr>
                <tr><td>
                        Esanteria:
                        <select style="width: 30%;" id="lista_estanteria" name="lista_estanteria" onchange="">
                        </select><br>
                        Leja:
                        <select style="width: 30%;" id="lista_posicion" name="lista_posicion">

                        </select>
                    </td>
                <tr><td>
                        <button type="submit">Devolver</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>

    </body>
</html>
