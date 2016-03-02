<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
<?php
require_once __DIR__ .'/Modelo/BD/EstadoBD.php';


/*
	Es la clase que hara la funcion de router de Vistas principal.
	Comprobara la variable de sesion y si esta vacia nos direccionara al Login, si ya tiene un usuario guardado nos llevara a la vista principal de ese usuario.
*/

require_once __DIR__.'/Vista/Calendario/CalendarioViews.php';

<<<<<<< HEAD
CalendarioViews::generarcalendario();
=======
CalendarioViews::login();
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1


?>