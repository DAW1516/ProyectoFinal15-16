<?php


require_once __DIR__.'/Vista/Administracion/AdministracionViews.php';
require_once __DIR__ .'/Vista/Plantilla/Views.php';

\Vista\Plantilla\Views::setOn(true);
\Vista\Plantilla\Views::setRoot(True);

Vista\Administracion\AdministracionViews::elegir();

?>

