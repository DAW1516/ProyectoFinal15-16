<?php
require_once __DIR__ .'/Modelo/BD/EstadoBD.php';

$respuesta=estadoBD::select_estado_by_id("1");
var_dump($respuesta);

?>