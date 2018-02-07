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
        <script src="javascript/JavaScript.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php
        include_once '../menu.php';
        ?>
    </head>
    <body>

        <form action="../controlador/controladorVender_caja.php" method="get" class="formulario">
            <table border="1" class="tabla">
                <tbody>
                    <tr><th>Venta de caja</th></tr>
                    <tr><td>
                            <input id="cajasLista" list="cajas" name="introCodigo" required="true">
                            <datalist id="cajas">
                                <script>getCodigoCajas();</script>
                            </datalist>
                            <button id="botonVenderCaja" type="submit">Vender</button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
