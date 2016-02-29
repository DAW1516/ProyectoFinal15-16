<?php
namespace Modelo\BD;





require_once __DIR__.'/../Base/ViajeClass.php';
require_once __DIR__ .'/../Base/EstadoClass.php';
require_once __DIR__.'/../Base/ParteProduccionClass.php';


use Modelo\Base;

abstract class GenericoBD {


    protected static function conectar()
    {

        $conn = mysqli_connect("localhost","root","root")or die("problemas en la conexión");
        mysqli_select_db($conn,"himevico")or die("problemas en la selección de base de datos");
        mysqli_set_charset($conn,"utf8");
        return $conn;


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
                return new Base\Centro($fila["id"], $fila["nombre"],null);
                break;
            case "ParteProduccion":
                return new Base\ParteProduccion($fila["id"],new Base\Estado($fila['idEstado']),$fila["fecha"],new Base\Trabajador($fila['dniTrabajador']));
                break;
            case "Tarea":
                return new Base\Tarea($fila["id"],$fila["descripcion"],new Base\TipoTarea($fila['idTipoTarea']));
                break;
            case "TipoTarea":
                return new Base\TipoTarea($fila["id"],$fila["descripcion"]);
                break;
            case "ParteProduccionTarea":
                return new Base\ParteProducionTarea($fila['id'],$fila['numeroHoras'],$fila['paqueteEntrada'],$fila['paqueteSalida'],new Base\Tarea($fila['idTarea']),new Base\ParteProduccion($fila['idParteProduccion']));
                break;
            case "HorarioParte":
                return new Base\HorarioParte($fila['id'],$fila['horaEntrada'],$fila['horaSalida'],new Base\ParteProduccion($fila['idParteProduccion']));
            case "Trabajador":
                //ultimo
                break;
        }
    }



}