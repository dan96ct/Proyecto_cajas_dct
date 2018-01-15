<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
NOTAS:
borrar caja
borrar ocupacion
actualizar estanteria
hacer backup
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="container">
            <ul id="menu">
                <li><a href="http://localhost:8888/Proyecto_cajas_dct/inicio.php">Home</a>
                </li>
                <li><a href="#">Caja</a>
                    <ul>
                        <li><a href="http://localhost:8888/Proyecto_cajas_dct/vistas/insertaCajas_vista.php">Insertar caja</a></li>
                        <li><a href="http://localhost:8888/Proyecto_cajas_dct/vistas/venderCaja_vista.php">Vender caja</a></li>
                        <li><a href="http://localhost:8888/Proyecto_cajas_dct/vistas/devolverCaja_vista.php">Devolucion caja</a></li>


                        <li><a href="http://localhost:8888/Proyecto_cajas_dct/controlador/controladorListar_cajas.php">Listar cajas</a></li>
                    </ul>
                </li>
                <li><a href="#">Estanterias</a>
                    <ul>
                        <li><a href="http://localhost:8888/Proyecto_cajas_dct/vistas/insertaEstanterias_vista.php">Insertar estanteria</a></li>
                        <li><a href="http://localhost:8888/Proyecto_cajas_dct/controlador/controladorListar_estanterias.php">Listar estanterias</a></li>
                    </ul>
                </li>
                <li><a href="http://localhost:8888/Proyecto_cajas_dct/controlador/controladorListar_inventario.php">Inventario</a>
                </li>
            </ul>
        </div>
        <div id="particle-canvas"></div>

        <?php
        // put your code here
        ?>
    </body>
</html>
