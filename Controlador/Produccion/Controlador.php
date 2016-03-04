<?php
namespace Controlador\Produccion;

use Modelo\Base;
use Modelo\BD;
session_start();

require_once __DIR__."/../../Modelo/BD/TipoTareaBD.php";
require_once __DIR__."/../../Modelo/BD/TareaBD.php";
require_once __DIR__."/../../Modelo/BD/ParteProduccionBD.php";
require_once __DIR__."/../../Modelo/BD/ParteProducionTareaBD.php";
require_once __DIR__."/../../Modelo/Base/ParteProducionTareaClass.php";
require_once __DIR__."/../../Modelo/Base/HorariosClass.php";
require_once __DIR__."/../../Modelo/Base/TareaClass.php";
require_once __DIR__."/../../Modelo/Base/TipoTareaClass.php";
require_once __DIR__."/../../Modelo/Base/ProduccionClass.php";
require_once __DIR__."/../../Modelo/Base/EstadoClass.php";

/**
 * Created by PhpStorm.
 * User: Mikel
 * Date: 2/3/16
 * Time: 19:17
 */
class Controlador
{
    public static function getTareasSelect()
    {

        return BD\TipoTareaBD::getAll();

    }

    public static function reviasarParte($datos)
    {

        require_once __DIR__ . "/../../cargarDatos.php";
        cargarDatos();

        $worker = unserialize($_SESSION['trabajador']);

        if (!is_null($worker->getPartes())) {

            $hayParte = false;
            $key = 0;

            foreach ($worker->getPartes() as $clave => $parte) {
                if ($parte->getFecha() == $datos["fecha"]) {
                    $hayParte = true;
                    $key = $clave;
                }

            }

            $partes = $worker->getPartes();

            $tarea = new Base\Tarea(intval($datos["tarea"]));
            $tarea = $tarea->getTareaById();
            $tarea->getTipo();

            $ppt = new Base\ParteProducionTarea(null, $datos["numeroHoras"], $datos["paquetesEntrada"], $datos["paquetesSalida"],$tarea,null);

         if($hayParte==true){
             $partes[$key]->addParteProduccionTarea($ppt);
             $worker->setPartes($partes);
         }else{
             $parteNew = new Base\ParteProduccion(null,null,$datos["fecha"],null,null,null,null,$worker,$ppt,null);
             $worker->addParte($parteNew);
         }

        }else{
            $tareaNew = new Base\Tarea(intval($datos["tarea"]));
            $tareaNew = $tareaNew->getTareaById();
            $tareaNew->getTipo();

            $pptNew = new Base\ParteProducionTarea(null,$datos["numeroHoras"],$datos["paquetesEntrada"],$datos["paquetesSalida"],$tareaNew,null);

            $parteNew = new Base\ParteProduccion(null,new Base\Estado(1,null),$datos["fecha"],null,null,null,null,null,null,null);
            $parteNew->addParteProduccionTarea($pptNew);

            $worker->addParte($parteNew);

            $parteNew->save();
            $pptNew->save();
        }

        /* $ifwor = \Modelo\BD\ParteProduccionBD::getBooleanByParteFecha($worker,$datos['fecha']);
        $tipo = \Modelo\BD\TipoTareaBD::getTipoByTarea($datos['tarea']);

        //Si esta creado el parte-> true, else-> false
        if($ifwor==true){
        $parte = \Modelo\BD\ParteProduccionBD::getPartebyFechaDia($worker,$datos['fecha']);
        $tarea = new Base\Tarea(null,$datos['tarea'],$tipo);
        $ppt = new Base\ParteProducionTarea(null,$datos['numeroHoras'],$datos['paquetesEntrada'],$datos['paquetesSalida'],$tarea,$parte);
        self::addTareaToParte($ppt);
        }else{
        $parte = new Base\ParteProduccion(null,"abierto",$datos['fecha'],null,null,null,null,$worker);
     $tarea = new Base\Tarea(null,$datos['tarea'],$tipo);
     $ppt = new Base\ParteProducionTarea(null,$datos['numeroHoras'],$datos['paquetesEntrada'],$datos['paquetesSalida'],$tarea,$parte);
     self::createParte($ppt);
 }

}
public static function createParte($parteProduccionTarea){
 $parteProduccionTarea->getParte()->save();
 $parteProduccionTarea->save();

}
public static function addTareaToParte($parteProduccionTarea){
 $parteProduccionTarea->save();
*/
    }
}

?>