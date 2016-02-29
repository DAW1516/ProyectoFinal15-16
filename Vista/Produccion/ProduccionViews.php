<?php

/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 29/2/16
 * Time: 12:23
 */


namespace Vista\Produccion;

require_once __DIR__."/../Plantilla/Views.php";


class ProduccionViews extends Views
{
    public static function añadirParte(){
        require_once __DIR__."CabeceraProduccion.php";



        require_once __DIR__."PieProduccion.php";

    }



}

?>