<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="width: 350px; margin-top: 150px; -webkit-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
         -moz-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
         box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75); padding:2em;">
        <h2>Iniciar sesion</h2>
        <form action="../controlador/controlador_login.php">
            <div class="form-group">
                <label for="email">Usuario</label>
                <input type="text" class="form-control" id="email" placeholder="Introduce usuario" name="usuario" requiered>
            </div>
            <div class="form-group">
                <label for="pwd">Cointraseña:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Introduce contraseña" name="pwd" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>
    </div>
</body>
</html>
