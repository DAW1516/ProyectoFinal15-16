<?php
namespace Controlador\Produccion;
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 2/3/16
 * Time: 12:03
 */

use Modelo\BD;
use Modelo\Base;

require_once __DIR__.'/../../Modelo/BD/RequiresBD.php';



/**
 *
 *
 */
class Controlador
{
    /**
     *Este metodo recibe un Array de objetos Tareas, para crear el Select de ParteProduccicon
     */
    public static function getAllTipoTarea(){
        return Base\TipoTareaBD::getAll();
    }
    /**
     *En este metodo generamos un nuevo parte y lo ponemos con el estado en abierto
     *
     */
    public static function abrirParte($datos){

        $parte = new Base\ParteProduccion(null,"abierto",$datos['fecha'],null,null,null,null,new Base\Produccion($datos['dni']));

    }
    /**
     *Este metodo puede ser utilizado para actualizar cualquier informacion del parte
     *
     */
    public static function actualizarParte(){

    }
    /**
     *Este metodo terimina de completar el parte y cambia el estado del parte a cerrado
     *una vez cerrado el productor no lo puede reabrir
     */
    public static function cerrarParte(){


    }
    /**
     *Este metodo añade una tarea al parte creando un objeto parteproduccionTarea
     *
     */
    public static function añadirTarea($parte){

    }


}

?>