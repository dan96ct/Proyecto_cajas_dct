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
        <table class="tabla" border="1">
            <thead>
                <tr>
                <th><img src="Imagenes/Error.gif" width="100px" height="100px"/></th>
                <th style="text-align: left; padding: 1em;"><?php echo $_GET['error']; ?></th>
            </tr>
            </thead>
        </table>
    </body>
</html>
