<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:55
 */
namespace Modelo\BD;

require_once __DIR__ .'/GenericoBD.php';

abstract class EstadoBD extends GenericoBD{

    private static $tabla="estados";

    public static function selectEstadoById($id){
        //funciona
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteLogistica($partelogistica){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idEstado FROM parteslogistica WHERE id=".$partelogistica->getId()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteProduccion($parteProduccion){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idEstado FROM partesproduccion WHERE id=".$parteProduccion->getId()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function add($estado){

        $con = parent::conectar();

<<<<<<< HEAD
        $query = "INSERT INTO ".self::$tabla." VALUES(null,".$estado->getTipo();
=======
        $query = "INSERT INTO ".self::$tabla." VALUES (null,'".$estado->getTipo()."')";
        var_dump($query);
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c

        mysqli_query($con, $query) or die("Error addEstado");

        parent::desconectar($con);

    }

<<<<<<< HEAD

=======
<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:55
 */
namespace Modelo\BD;

require_once __DIR__ .'/GenericoBD.php';

abstract class EstadoBD extends GenericoBD{

    private static $tabla="estados";

    public static function selectEstadoById($id){
        //funciona
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteLogistica($partelogistica){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idEstado FROM parteslogistica WHERE id=".$partelogistica->getId()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteProduccion($parteProduccion){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idEstado FROM partesproduccion WHERE id=".$parteProduccion->getId()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function add($estado){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,".$estado->getTipo();

        mysqli_query($con, $query) or die("Error addEstado");

        parent::desconectar($con);

    }


>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
    public static function delete($id){
        $con = parent::conectar();

        $query = "DELETE FROM " . self::$tabla . " WHERE id=". $id;

        mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);
    }

>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
}