<?php
namespace Vista\Plantilla;


class Views
{
    private static $url_raiz = "http://localhost:8080/HIMEVICO";


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