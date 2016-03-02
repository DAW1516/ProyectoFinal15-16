<?php

require_once __DIR__ . "/../Plantilla/Views.php";
require_once __DIR__."/../../Controlador/ControladorLog.php";

abstract class LogisticaViews extends \Vista\Plantilla\Views{

    public static function insertarTrabajador(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        //<?php echo parent::getUrlRaiz()
        $empresas = ControladorLog::getAllEmpresas();
        $perfiles = ControladorLog::getAllPerfiles();
        ?>
            <form name="insertarTrabajador" method="post" action=""><br/>
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
                    <select name="centros">
                        <?php
                        foreach($empresas as $empresa) {
                            foreach($empresa->getCentros() as $centro){
                                ?>
                                <option value="<?php $centro->getId(); ?>"><?php echo $centro->getNombre(); ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select><br/>
                    <select name="perfil">
                        <?php
                            for($x = 0; $x < sizeof($perfiles); $x++) {
                                ?>
                                <option value="<?php echo $perfiles[$x][0] ?>"><?php echo $perfiles[$x][1]  ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </fieldset>
            </form>
        <?php
        foreach($perfiles as $perfil) {
            var_dump($perfiles);
            echo "<br/>";
            var_dump($perfil);
        }
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

}

/*
<?php
                                                      foreach($empresas as $empresa) {
                                foreach ($empresa->getCentros() as $centro) {
                                    ?>
                                    <option value="<?php echo 1 ?>"><?php echo $centro->getNombre() ?></option>
                                    <?php
                                }
                            }
                        ?>

foreach($empresas as $empresa) {
                            foreach($empresa->getCentros() as $centro){
                                echo $centro->getNombre(    );
                            }

                        }

foreach($empresas as $empresa){
                                echo $empresa->getCentros()->getNombre();
                            }
 */