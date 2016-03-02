<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:05
 */
<<<<<<< HEAD

require_once __DIR__."/GenericoBD.php";

=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
abstract class TareaBD extends GenericoBD
{
    private static $table = "tareas";





    public static function getTareaByProduccionTarea($tareaParte){

        $tarea = null;

        $conexion = parent::conectar();

        $query ="Select * from ".self::$table."where id=(Select id_tarea from partesproducciontareas where id = ".$tareaParte->getId().") )";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));


        $tarea= parent::mapear($rs, "Tarea");

        return $tarea;

    }

    public static function getTareaByTipo($tipo){

        $tareas = null;

        $conexion = parent::conectar();

        $query = "Select * from ".self::$table." where idTipoTarea = '".$tipo->getId()."';";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));


        $tareas = parent::mapear($rs, "Tarea");


        return $tareas;


    }
}