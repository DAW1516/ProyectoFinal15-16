<?php

require_once __DIR__.'/../Plantilla/Views.php';


class CalendarioViews extends Views
{

    public static function login()
    {
        ?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Login</title>
            <meta charset="utf-8">
        </head>
        <body>
        <form name="form">
            <label>Usuario: </label><input type="text" name="usuario" id="usuario"/>
            <br/>
            <label>Contraseña: </label><input type="password" name="contrasena" id="contrasena"/>
            <br>
            <input type="button" name="entrar" id="entrar" value="Entrar"/>
        </form>
        <div id="datos"></div>

        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/jquery-2.2.1.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Calendario/CalendarioJS.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/jshash-2.2/md5-min.js"></script>
        </body>
        </html>

        <?php
    }
}
