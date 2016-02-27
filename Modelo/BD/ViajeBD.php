<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 27/2/16
 * Time: 16:34
 */
use Modelo\BD;
use Modelo\Base;


abstract class ViajeBD extends GenericoBD
{
    private static $tabla = "viajes";

    public static function getTabla()
    {
        return self::$tabla;
    }

    public static function add(Base\ViajeClass $objeto)
    {
        $conn = parent::conectar();
        $query = "insert into " . self::getTabla() . " values('','" . $objeto->getHoraInicio() . "','" . $objeto->getHoraFin() . "','" . $objeto->getVeiculo()->getId() . "','" . $objeto->getParteLogistica()->getId() . "','" . $objeto->getAlbaran() . "')";
        try {
            $res = mysqli_query($conn, $query);
            if (!$res) {
                $errno = mysqli_errno($conn);    // línea de error
                $error = mysqli_error($conn);    // descripción de error
                switch ($errno) {
                    case MYSQL_DUPLICATE_KEY_ENTRY:
                        throw new MySQLDuplicateKeyException("El Viaje ya existe");
                        break;
                    default:
                        throw new MYSQLException($error, $errno);
                        break;
                }
            }
            parent::desconectar($conn);
            return "Viaje insertado en base de datos";
        } catch (MySQLDuplicateKeyException $e) {
            parent::desconectar($conn);
            return $e->getMessage();
        } catch (MySQLException $e) {
            parent::desconectar($conn);
            return $e->getMessage() . " " . $e->getCode();
        }

    }

    public static function getAll($objeto = null)
    {
        $conn = parent::conectar();

        $query = "select * from " . self::getTabla();

        if (!is_null($objeto) && is_a($objeto, "Modelo\Base\ParteLogisticaClass")) {
            $query = $query . " where idParte='" . $objeto->getId() . "'";
        }

        if (!is_null($objeto) && is_a($objeto, "Modelo\Base\VehiculoClass")) {
            $query = $query . " where idVehiculo='" . $objeto->getId() . "'";
        }

        /*if (!is_null($objeto) && is_a($objeto,'Integer'))
        {
            $query = $query." where id=".$objeto."";
        }
        */

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $viajes = parent::mapear($rs, "Viajes");

        parent:: desconectar($conn);

        return $viajes;
    }

    public static function getAllById($id)
    {
        $conn = parent::conectar();

        $query = "select * from " . self::getTabla() . " where id=" . $id;

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $viajes = parent::mapear($rs, "Viajes");

        parent:: desconectar($conn);

        return $viajes;
    }
}
    //POSIBLE GETER BY FECHA QUE ESTA SIN CODIFICAR, VEREMOS MAS ADELANTE SI ES NECESARIO