<?php
namespace Modelo\BD;



require_once __DIR__."/GenericoBD.php";

abstract class EmpresaBD extends GenericoBD{

    private static $tabla = "empresas";

    public static function getAll(){
        $conn = parent::conectar();
        $query = "select * from " . self::getTabla();
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $respuesta = parent::mapearArray($rs, "Empresa");
        parent::desconectar($conn);
        return $respuesta;
    }

    public static function getEmpresaByID($id){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= '".$id."'";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Estado");
        parent::desconectar($conexion);
        return $respuesta;
    }
}