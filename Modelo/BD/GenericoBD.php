<?php
namespace Modelo\BD;

require_once __DIR__.'/../Base/ViajeClass.php';

use Modelo\Base;

abstract class GenericoBD {

    protected static function conectar()
    {

        $conn = mysqli_connect("localhost","root","root")or die("problemas en la conexión");
        mysqli_select_db($conn,"himevico")or die("problemas en la selección de base de datos");
        mysqli_set_charset($conn,"utf8");
        return $conn;

        return $conexion;
    }

    protected static function desconectar($conexion)
    {
        mysqli_close($conexion);
    }

    protected static function mapear($rs,$clase)
    {

        $objetos=array();

        switch ($clase)
        {
            case 'Viaje':
                while($fila = mysqli_fetch_assoc($rs)){
                    $objetos[] = new Base\ViajeClass($fila['id'],$fila['horaInicio'],$fila['horaFin'],$fila['albaran'],VehiculoBD::getAll($fila['idVehiculo']),ParteLogisticaBD::getAll($fila['idFila']));
                }
                break;

        }

        if (mysqli_num_rows($rs) == 1)
        {
            return $objetos[0];
        }
        else if (mysqli_num_rows($rs) == 0)
        {
            return null;
        }
        else
        {
            return $objetos;
        }

    }

}