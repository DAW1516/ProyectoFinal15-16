<?php

class Views
{
<<<<<<< HEAD
    private static $url_raiz = "http://192.168.33.10/ProyectoDAW/ProyectoFinal15-16";
=======
    private static $raiz = "http://192.168.33.10/ProyectoFinal15-16";
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1


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