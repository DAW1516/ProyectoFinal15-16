<?php
namespace Vista\Plantilla;

session_start();

class Views
{
    private static $url_raiz = "http://192.168.33.10/proyecto2GDAW/ProyectoFinal15-16";
    private static $on = false;



    /**
     * @return string
     */

    public static function getUrlRaiz()
    {
        return self::$url_raiz;
    }

    /**
     * @param string $url_raiz
     */
    public static function setUrlRaiz($url_raiz)
    {
        self::$url_raiz = $url_raiz;
    }

    /**
     * @return boolean
     */
    public static function isOn()
    {
        return self::$on;
    }

    /**
     * @param boolean $on
     */
    public static function setOn($on)
    {
        self::$on = $on;
    }


}

?>