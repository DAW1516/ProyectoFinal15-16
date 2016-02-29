<?php

require_once __DIR__ .'/../Base/EstadoClass.php';

require_once __DIR__ .'/../Base/ParteLogisticaClass.php';

abstract  class  genericoBD{

    protected static function conectar()
    {
        $conexion = mysqli_connect("localhost", "root", "root", "himevico");
        mysqli_set_charset($conexion, "utf-8");
        return $conexion;
    }

    protected static function desconectar($conexion)
    {
        mysqli_close($conexion);
    }

    protected static function mapear_objeto($rs,$objeto){

       $respuesta=null;

        switch ($objeto){
            case"estado":
                $fila=mysqli_fetch_array($rs);
                $respuesta= new Estado($fila["id"],$fila["tipo"]);
                break;
            case"partelogistica":
                $fila=mysqli_fetch_array($rs);
                $respuesta=new ParteLogistica($fila["id"],null,null,$fila["nota"]);
                break;
        }

        return $respuesta;

    }
    protected static function mapear_array($rs,$objeto){

        $respuesta=array();

        switch ($objeto){
            case"estado":
                while($fila=mysqli_fetch_array($rs)){
                    $respuesta[]= new Estado($fila["id"],$fila["tipo"]);
                }

                break;
            case"partelogistica":
                while($fila=mysqli_fetch_array($rs)) {
                    $respuesta[] = new ParteLogistica($fila["id"], null, null, $fila["nota"]);
                }
                break;
        }

        return $respuesta;

    }

}


?>