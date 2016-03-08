<?php
require_once __DIR__.'/AdministracionViews.php';

switch($_GET['cod']) {

    case "1":
        Vista\Administracion\AdministracionViews::elegir();
        break;
    case "2":
        Vista\Administracion\AdministracionViews::allPartesByDni();
        break;

}
?>

