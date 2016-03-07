<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->

<head>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title>Himevico</title>

    <meta charset="UTF-8"/>
    <meta name="keywords" content="tus palabras clave, aqui"/>
    <meta name="description" content="breve descripcion del sitio"/>
    <meta name="author" content="JonLG"/>

    <meta http-equiv="PRAGMA" content="NO-CACHE">
    <meta http-equiv="EXPIRES" content="-1">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo parent::getUrlRaiz() ?>/Vista/Plantilla/CSS/Bootstrap/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo parent::getUrlRaiz() ?>/Vista/Plantilla/CSS/Bootstrap/customize.css">
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo parent::getUrlRaiz();?>/Vista/Plantilla/JS/validetta-v1.0.1-dist/validetta.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo parent::getUrlRaiz(); ?>/Vista/plantilla/CSS/style.css" media="screen" />



</head>
<body>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header"><!--Para añadir el icono de menú-->
            <?php
            if(parent::isOn()){?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                <span class="sr-only">Desplegar / Ocultar Menú</span>
                <span class="icon-bar"></span><!--Cada span es una rayita en el icon de menú-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                <?php
            }
            ?>
            <a href="<?php  if(parent::isOn()){ echo parent::getUrlRaiz()?>/Vista/Calendario/Calendario.php<?php } ?>" class="navbar-brand"><img id="logo" src="<?php echo parent::getUrlRaiz();?>/Vista/Plantilla/IMG/himevico.png" alt="Himevico logo" class="img-responsive"></a>

        </div>
        <?php
        if(!parent::isOn()){?>
        <div class="collapse navbar-collapse visible-md">
            <h3 style="color: #adadad">Himevico S.L.</h3>
        </div><?php
        }

        if(parent::isOn()){?>
        <div class="collapse navbar-collapse navbar-right" id="navbar-1"><!--Añadimos el menú-->
            <ul class="nav navbar-nav">
                <li><a href="<?php echo parent::getUrlRaiz()?>/Vista/Calendario/Calendario.php">Calendario Partes</a></li>
                <li><a href="<?php echo parent::getUrlRaiz()?>/Vista/Calendario/Calendario.php">Calendario Laboral</a></li>

               <!-- <li><a href="<?php echo parent::getUrlRaiz()?>/Vista/Login/Login.php">Desconectar</a></li>-->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <span class="glyphicon  glyphicon-cog " style="font-size: 1.5em"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo parent::getUrlRaiz()?>/Vista/Login/CambiarPassword.php">Cambiar contraseña</a></li>
                        <?php if(parent::isRoot()){?>
                        <li><a href="<?php echo parent::getUrlRaiz()?>/Vista/Administracion/Administracion.php">Gestionar Listas</a></li>
                        <?php
                        }
                        ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo parent::getUrlRaiz()?>/Vista/Login/Login.php">Desconectar</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>

<!-- Include all compiled plugins (belor include individual files as needed -->
<script src="<?php echo parent::getUrlRaiz() ?>/Vista/Plantilla/JS/bootstrap.min.js"></script>

<script src="js/jquery.js"></script>
</body>

<div id="contenido" class="container">