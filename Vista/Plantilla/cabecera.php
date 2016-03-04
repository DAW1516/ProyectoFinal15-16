<!DOCTYPE html>
<html lang="es">
<head>

    <title>Himevico</title>

    <meta charset="UTF-8"/>
    <meta name="keywords" content="tus palabras clave, aqui"/>
    <meta name="description" content="breve descripcion del sitio"/>
    <meta name="author" content="JonLG"/>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo parent::getUrlRaiz() ?>/Vista/Plantilla/CSS/Bootstrap/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo parent::getUrlRaiz() ?>/Vista/Plantilla/CSS/Bootstrap/customize.css">
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo parent::getUrlRaiz();?>/Vista/Plantilla/JS/validetta-v1.0.1-dist/validetta.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo parent::getUrlRaiz(); ?>/Vista/plantilla/CSS/style.css" media="screen" />


</head>
<body class="container">
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header"><!--Para añadir el icono de menú-->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                <span class="sr-only">Desplegar / Ocultar Menú</span>
                <span class="icon-bar"></span><!--Cada span es una rayita en el icon de menú-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#" class="navbar-brand"></a><!--Para añadir logo, header...-->
        </div>

        <div class="collapse navbar-collapse" id="navbar-1"><!--Añadimos el menú, incluyendo un dropdown en la tercera opción-->
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Calendario Laboral</a></li>
                <li><a href="#">Calendario Partes</a></li>

            </ul>

        </div>
    </div>
</nav>

<!-- Include all compiled plugins (belor include individual files as needed -->
<script src="<?php echo parent::getUrlRaiz() ?>/Vista/Plantilla/JS/bootstrap.min.js"></script>

<script src="js/jquery.js"></script>


</html>