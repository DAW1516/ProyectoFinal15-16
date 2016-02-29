<?php

namespace Modelo\BD;

require_once __DIR__.'/../Base/ViajeClass.php';
require_once __DIR__ .'/../Base/EstadoClass.php';

use Modelo\Base;

class GenericoBD
{
    protected static function conectar()
    {
        $conexion = mysqli_connect("localhost","root","root","himevico");
        mysqli_set_charset ($conexion,"utf8");

        return $conexion;
    }

    protected static function desconectar($conexion)
    {
        mysqli_close($conexion);
    }


    protected static function mapearArray($rs,$clase)
    {
        $result=array();

        while ($fila = mysqli_fetch_assoc($rs))
        {
            $result[]=self::switchClase($fila,$clase);
        }
        return $result;
    }

    protected static function mapear($rs,$clase)
    {

        $result=null;
        if ($fila = mysqli_fetch_assoc($rs))
        {
            $result=self::switchClase($fila,$clase);
        }
        return $result;
    }


    protected static function switchClase($fila,$clase)
    {
        switch ($clase)
        {
            case "Viaje":
                return new Base\Viaje($fila['id'],$fila['horaInicio'],$fila['horaFin'],$fila['albaran'],null,null);
                break;
            case "Vehiculo":
                return new Base\Vehiculo($fila['id'],$fila['matricula'],$fila['marca'],null,null);
                break;
            case "Estado":
                return new Base\Estado($fila["id"],$fila["tipo"]);
                break;
            case "Partelogistica":
                return new Base\ParteLogistica($fila["id"], null, null, $fila["nota"],null);
                break;
            case "Centro":
                return new Base\Centro($fila["id"], $fila["nombre"], $fila["localizacion"],null,null,null,null);
                break;
            case "Empresa":
                return new Base\Empresa($fila["id"], $fila["nombre"],null);
                break;
            case "Trabajador":
                //ultimo
                break;
        }
    }

}
?>