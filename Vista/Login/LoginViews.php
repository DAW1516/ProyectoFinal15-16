<?php

require_once __DIR__.'/../Plantilla/Views.php';


class LoginViews extends Views
{

    public static function login()
    {

        require_once __DIR__.'/../Plantilla/cabecera.php';

        ?>

        <div class="container-fluid">
            <fieldset>
                <legend>Login</legend>
                <form name="loginForm" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Usuario:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="text" name="usuario" id="usuario" data-validetta="required,regExp[validarDni]"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Contraseña:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="password" name="password" id="password" data-validetta="required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4">
                            <input class="btn btn-primary" type="submit" name="entrar" id="entrar" value="Entrar"/>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div id="datos" class="alert-danger col-md-4 col-md-offset-4" style="display: none"></div>
        </div>

        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/jquery-2.2.1.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/bootstrap.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Login/Funciones.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/jshash-2.2/md5-min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/validetta-v1.0.1-dist/validetta.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/validetta-v1.0.1-dist/validettaLang-es-ES.js"></script>

        <?php

        require_once __DIR__.'/../Plantilla/pie.php';
    }

    public static function changePassword()
    {

        require_once __DIR__.'/../Plantilla/cabecera.php';

        ?>

        <div class="container-fluid">
            <fieldset>
                <legend>Cambio de contraseña</legend>
                <form name="changePasswordForm" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Contraseña vieja:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="password" name="oldpassword" id="oldpassword" data-validetta="required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Contraseña nueva:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="password" name="newpassword" id="newpassword" data-validetta="required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Confirmar contraseña:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="password" name="repassword" id="repassword" data-validetta="required,equalTo[newpassword]"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4">
                            <input class="btn btn-primary" type="submit" name="cambiar" id="cambiar" value="Cambiar"/>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div class="row">
                <div id="datos" class="alert-danger col-md-4 col-md-offset-4" style="display: none"></div>
            </div>
        </div>

        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/jquery-2.2.1.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/bootstrap.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Login/Funciones.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/jshash-2.2/md5-min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/validetta-v1.0.1-dist/validetta.min.js"></script>
        <script src="<?php echo Views::getUrlRaiz();?>/Vista/Plantilla/JS/validetta-v1.0.1-dist/validettaLang-es-ES.js"></script>

        <?php

        require_once __DIR__.'/../Plantilla/pie.php';
    }
}
