<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class FestivoBD extends GenericoBD
{

    public static function getAll(){

        $conexion = parent::conectar();

        $query = "SELECT * FROM festivo";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $festivos = parent::mapearArray($rs, "Festivo");

        parent::desconectar($conexion);

        return $festivos;

    }

}