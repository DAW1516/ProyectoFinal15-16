<?php
namespace Vista\Hoario;

require_once __DIR__.'/../Plantilla/Views.php';

abstract class HorarioViews extends \Vista\Plantilla\Views
{

    public static function getHorarioSemanal(){
        parent::setOn(true);
        require_once __DIR__ . "/../Plantilla/cabecera.php";
        parent::setHorario(true);
        require_once __DIR__.'/../Plantilla/pie.php';
    }
}