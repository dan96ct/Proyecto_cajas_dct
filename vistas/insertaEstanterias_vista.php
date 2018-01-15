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
        ?>
        <form action="../controlador/controladorAlta_estanterias.php">
            <table border="1" class="tabla">
                <thead>
                    <tr><td colspan="6"><h2>Nueva estanteria</h2></td></tr>
                    <tr>
                        <th>Codigo</th>
                        <th>Material</th>
                        <th>N Lejas</th>
                        <th>Pasillo</th>
                        <th>Numero</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                        
                        <td><input type="text" name="introCodigo" value="" required/></td>
                        <td><input type="text" name="introMaterial" value="" required/></td>
                        <td><input type="number" name="introNLejas" value="" required/></td>
                        <td><input type="text" name="introPasillo" value="" required/></td>
                        <td><input type="number" name="introNumero" value="" required/></td>
                    </tr>
                    <tr><td colspan="6"><button type="submit" name="buton">Aceptar</button></td></tr>
                </tbody>
            </table>

        </form>


    </body>
</html>
