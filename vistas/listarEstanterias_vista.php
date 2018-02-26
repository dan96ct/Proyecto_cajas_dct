<html>
    <head>
        <meta charset="UTF-8">
        <title></title>       
        <link href="../vistas/css/css.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>
        <?php
        include_once '../menu.php';
        include_once '../modelo/Estanteria.php';
        @session_start();
        $arrayEstanterias = $_SESSION['estanterias'];
        $arrayEstanterias;
        ?>
        <table border="1" class="tabla">
            <thead>
                <tr><td colspan="6"><h2>Estanterias</h2></td></tr>
                <tr>
                    <th>Codigo</th>
                    <th>Material</th>
                    <th>N Lejas</th>
                    <th>Pasillo</th>
                    <th>Numero</th>
                    <th>Lejas ocupadas </th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($arrayEstanterias); $i++) { ?><tr>
                        <td><?php echo $arrayEstanterias[$i]->getCodigo(); ?></td>
                        <td><?php echo $arrayEstanterias[$i]->getMaterial(); ?></td>
                        <td><?php echo $arrayEstanterias[$i]->getNLejas(); ?></td>
                        <td><?php echo $arrayEstanterias[$i]->getPasillo(); ?></td>
                        <td><?php echo $arrayEstanterias[$i]->getNumero(); ?></td>
                        <td><?php echo $arrayEstanterias[$i]->getLejasOcupadas(); ?></td></tr><?php } ?>
            </tbody>

        </table>




    </body>
</html>
