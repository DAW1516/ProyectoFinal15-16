<?php

require_once __DIR__ . "/../Plantilla/Views.php";
require_once __DIR__."/../../Controlador/Administracion/Controlador.php";

abstract class AdministracionViews extends \Vista\Plantilla\Views{

    public static function insertarTrabajador(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        //<?php echo parent::getUrlRaiz()
        $empresas = \Controlador\Administracion\Controlador::getAllEmpresas();
        $perfiles = \Controlador\Administracion\Controlador::getAllPerfiles();

        ?>
            <form name="insertarTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Insertar Persona</legend>
                    <label></label><input type="text" name="dni" placeholder="Dni"><br/>
                    <label></label><input type="text" name="nombre" placeholder="Nombre"><br/>
                    <label></label><input type="text" name="apellido1" placeholder="Apellido 1"><br/>
                    <label></label><input type="text" name="apellido2" placeholder="Apellido 2"><br/>
                    <label></label><input type="text" name="telefono" placeholder="Telefono"><br/>
                    <label></label><select name="empresa">
                        <?php
                            foreach($empresas as $empresa){

                                ?>
                                <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNombre(); ?></option>
                                <?php
                            }
                        ?>
                    </select><br/>
                    <select name="centro">
                        <?php
                        foreach($empresas as $empresa) {
                            foreach($empresa->getCentros() as $centro){
                                ?>
                                <option value="<?php echo $centro->getId(); ?>"><?php echo $centro->getNombre(); ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select><br/>
                    <select name="perfil">
                        <?php
                            for($x = 0; $x < sizeof($perfiles); $x++) {
                                ?>
                                <option value="<?php echo $perfiles[$x][1] ?>"><?php echo $perfiles[$x][1]  ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="submit" name="addTrabajador" value="añadir trabajador">
                </fieldset>
            </form>
        <?php

        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteTrabajador(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <form>
            <input type="text" name="dni" placeholder="Dni">
            <input type="submit" name="borrar" value="Borrar">
        </form>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

}

