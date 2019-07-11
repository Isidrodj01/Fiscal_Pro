<?php
    include_once 'Models/Provider.php';
    include_once 'Models/db.php';
    include_once 'Models/Company.php';

    if(!isset($_SESSION['company']))
    {
        header("location:index.php");
    }

    $company = new Company;

    if(isset($_SESSION['company']))
    {  
        $company = json_decode($_SESSION['User']);
    }

    $Mostrar_Modal = false;
    $error = array();
    $Campos_Validos = true;


    if(isset($_POST['provider-insert']))
    {
        $temp = new Provider();

        $temp->Id_Company = $company->ID;
        $temp->Rnc = isset($_POST["RNC"])? $_POST["RNC"] : '';
        $temp->Nombre = isset($_POST["Nombre"])?$_POST["Nombre"] :'';
        $temp->Nombre_Comercial = isset($_POST["Nombre_Comercial"])?$_POST["Nombre_Comercial"] :'';
        $temp->Telefono = isset($_POST["Telefono"])?$_POST["Telefono"] :'';
        $temp->Direccion = isset($_POST["Direccion"])?$_POST["Direccion"] :'';
        $temp->Tipo_De_Bien = isset($_POST["Tipo_De_Bien"])?$_POST["Tipo_De_Bien"] :'';



        if(!is_numeric($temp->Rnc))
        {
            $error['RNC'] = "El valor ingresado al RNC no es valido";
            $Campos_Validos = false;
        }

         if($temp->Rnc == '')
        {
             $error['RNC'] = "El campo RNC no puede estar vacio!";
             $Campos_Validos = false;
        } 

        if($temp->Nombre == '')
        {
             $error['Nombre'] = "El campo nombre no puede estar vacio!";
             $$Campos_Validos = false;
        }

        if($temp->Tipo_De_Bien == '')
        {
             $error['Tipo_De_Bien'] = "El campo Tipo de bien no puede estar vacio!";
             $Campos_Validos = false;
        }


        if(count($error) > 0)
        {
            $Mostrar_Modal = true;
        }

        if($Campos_Validos)
        {        
            $temp->Insert($temp);
            header("location:Providers.php");
        }
    }


?>