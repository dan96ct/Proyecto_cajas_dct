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
        <link href="vistas/css/css_index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include_once './DAO/Operaciones.php';
        include_once './DAO/conexion_bd.php';
        if (Operaciones::compruebaUsuarios() == null) {
            header('Location:http://localhost:8888/Proyecto_cajas_dct/vistas/registrarUsuario_vista.php');
        } else {
            header('Location:http://localhost:8888/Proyecto_cajas_dct/vistas/inicio_sesion_vista.php');
        }
        ?>

        <form>

        </form>

    </body>
</html>
