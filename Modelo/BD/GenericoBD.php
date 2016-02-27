<?php

abstract class GenericoBD{

    public static function conectar(){

        $host = "localhost";
        $user = "root";
        $pass = "usbw";
        $bd   = "himevico";

        $con = mysqli_connect($host, $user, $pass, $bd);

        return $con;

    }

    public static function desconctar($con){

        mysqli_close($con);

    }

    public static function mapearObjeto(){

    }

    public static function mapearArray(){

    }

    public static function switchClase(){

    }

}