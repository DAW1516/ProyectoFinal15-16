<?php
namespace Vista\Plantilla;


class Views
{
    private static $url_raiz = "http://192.168.33.10/proyecto2GDAW/ProyectoFinal15-16/";


    /**
     * @return string
     */

    public static function getUrlRaiz()
    {
        return self::$raiz;
    }

    /**
     * @param string $url_raiz
     */
    public static function setUrlRaiz($url_raiz)
    {
        self::$raiz = $url_raiz;
    }

}

?>