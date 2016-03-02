<?php
namespace Vista\Plantilla;


class Views
{
<<<<<<< HEAD
<<<<<<< HEAD
    private static $url_raiz = "http://192.168.33.10/ProyectoDAW/ProyectoFinal15-16";
=======
    private static $raiz = "http://192.168.33.10/ProyectoFinal15-16";
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
    private static $url_raiz = "http://192.168.33.10/proyecto2GDAW/ProyectoFinal15-16/";
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c


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

}

?>