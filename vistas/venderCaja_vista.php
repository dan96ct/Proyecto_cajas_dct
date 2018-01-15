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
        <?php
        include_once '../menu.php';
        include_once '../DAO/Operaciones.php';
        ?>


    </head>
    <body>

        <form action="http://localhost:8888/Proyecto_cajas_dct/controlador/controladorVender_caja.php" method="get" class="formulario">
            <table border="1" class="tabla">
                <tbody>
                    <tr><th>Venta de caja</th></tr>
                    <tr><td>
                            <input id="cajasLista" list="cajas" name="introCodigo" required="true">
                            <datalist id="cajas">
                            </datalist>
                            <button type="submit">Vender</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
    <script>
        var arrayCodigos = <?php echo json_encode(Operaciones::getCodigoCajas()); ?>;
        if (arrayCodigos.length === 0) {
            document.getElementById("cajasLista").disabled = true;
            var placeHolder = document.createAttribute("placeholder");
            placeHolder.value = "Funcion no disponible";
            document.getElementById("cajasLista").setAttributeNode(placeHolder);

        } else {
            var datalist = document.getElementById("cajas");
            for (var i = 0; i < arrayCodigos.length; i++) {
                var nodo = document.createElement("option");
                nodo.value = arrayCodigos[i];
                datalist.appendChild(nodo);
            }
        }

    </script>
</html>
