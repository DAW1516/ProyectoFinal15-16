<?php
namespace Modelo\BD;

require_once __DIR__."/RequiresBD.php";

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
        if (is_null($clase))
        {
            $clase = $fila['tipo'];
        }
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
                return new Base\Empresa($fila["id"],$fila["nombre"],$fila["nif"],null);
                break;
            case "ParteProduccion":
                return new Base\ParteProduccion($fila["id"],null,$fila["fecha"],$fila["incidencia"],$fila["autopista"],$fila["dieta"],$fila["otroGasto"],null);
                break;
            case "Tarea":
                return new Base\Tarea($fila["id"],$fila["descripcion"],null);
                break;
            case "TipoTarea":
                return new Base\TipoTarea($fila["id"],$fila["descripcion"]);
                break;
            case "ParteProduccionTarea":
                return new Base\ParteProducionTarea($fila['id'],$fila['numeroHoras'],$fila['paqueteEntrada'],$fila['paqueteSalida'],null,null);
                break;
            case "HorarioParte":
                return new Base\HorarioParte($fila['id'],$fila['horaEntrada'],$fila['horaSalida'],null);
            case "Administracion":
                return new Base\Administracion($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono']);
                break;
            case "Gerencia":
                return new Base\Gerencia($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono']);
                break;
            case "Logistica":
                return new Base\Logistica($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono']);
                break;
            case "Produccion":
                return new Base\Produccion($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono']);
                break;
            case "Ausencias":
                return new Base\TrabajadorAusencia($fila['id'], $fila['fecha'], $fila['horaInicio'], $fila['horaFin']);
                break;
            case "ConvenioAusencias":
                return new Base\ConvenioAusencia($fila['id'], $fila['fecha']);
                break;
            case "HorasConvenio":
                return new Base\HoraConvenio($fila['id'], $fila['horasAnual'], $fila['denominacion']);
                break;
            case "Festivo":
                return new Base\Festivo($fila['id'], $fila['fecha'], $fila['motivo']);
                break;
            case "TiposFranja":
                return new Base\TiposFranjas($fila['id'],$fila['tipo'],$fila['precio']);
                break;
            case  "HorariosFranja":
                return new Base\HorariosFranja($fila['id'],$fila['horario'],$fila['franja']);
                break;
            case "Login":
                return new Base\Login($fila['id'], $fila['password'], null);
                break;
        }
    }
}