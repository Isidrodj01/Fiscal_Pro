<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="Styles/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/css/all.min.css">
    <link rel="stylesheet" href="Styles/style.css">

    <script src="Js/JQuery.js"></script>
    <script src="Js/bootstrap.min.js"></script>  

    <title>Fiscal_Pro</title>
    
</head>
<body>

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand " href="index.php">Fiscal_Pro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fa fa-home mx-1"> </i> Inicio <span class="sr-only">(current)</span></a>
                    </li>
                   
                    <?php if(isset($_SESSION['company'])){ ?>

                    <li class="nav-item">
                        <a class="nav-link" href="Providers.php"><i class="fa fa-user-circle"> </i> Proveedores</a>
                    </li>
                    

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle= "dropdown"><i class="fa fa-shopping-cart"> </i> Compras</a>
                        
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Registrar Compra</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Lista de Compras</a>
                        </div>
                    </li>

                    <?php } ?>

                    <?php if(isset($_SESSION['root'])){ ?>

                        <li class="nav-item dropdown">
                            <a href="#" class ="nav-link dropdown-toggle"  role="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Administración</a>

                            <div class="dropdown-menu">
                                <a href="Companys.php" class="dropdown-item"> Empresas</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"> Reporte de Compras</a>
                            </div>
                        </li>

                    <?php } ?>
                    

                    <?php if((!isset($_SESSION['root'])) && (!isset($_SESSION['company']))){ ?>
                    <li class="nav-item">
                        <a href="Login.php" class="nav-link"><i class="fa fa-unlock"></i> Iniciar Sesión</a>
                    </li>  
                    <?php  } ?>

                    <?php if((isset($_SESSION['root'])) || (isset($_SESSION['company']))){ ?>
                    <li class="nav-item">
                        <a href="Cerrar_Sesion.php" class="nav-link"><i class="fa fa-lock"></i> Cerrar Sesión</a>
                    </li>    
                    <?php  } ?>    
                    
                </ul>
        </div>         
 

    </nav>


 