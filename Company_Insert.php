<?php
 include 'includes/Header.php';
 include_once 'Models/Company.php';
 include_once 'Models/Administrator.php';

 if(!isset($_SESSION['root']))
 {
     header("location:index.php");
 }

 $Mostrar_Modal = false;
 $error = array();
 $Campos_Validos = true;

    if(isset($_SESSION['User']))
    {
        $companys = new Company;
        $user = new Administrator;

        $user = isset($_SESSION['User'])? json_decode($_SESSION['User']) : null;

        
        $data = $companys->getCompanys($user->ID);
    
        //CODIGO PARA GUARDAR LOS DATOS DE LA EMPRESA
        if(isset($_POST['btGuardar']))
        {         
            $temp = new Company;

            $temp->ID_Admin = $user->ID;
            $temp->RNC = isset($_POST['RNC'])? $_POST['RNC'] : '';
            $temp->Nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
            $temp->Direccion = isset($_POST['direccion'])? $_POST['direccion'] : '';
            $temp->Telefono = isset($_POST['telefono'])? $_POST['telefono'] : '';
            $temp->Username = isset($_POST['username'])? $_POST['username'] : '';
            $temp->Clave = isset($_POST['clave'])? $_POST['clave'] : ''; 

            if($temp->RNC == '')
            {
                $error['RNC'] = 'El Campo RNC no puede estar vacio!!';
                $Campos_Validos = false;
            }
            if($temp->Nombre == '')
            {
                $error['Nombre'] = 'El Campo Nombre no puede estar vacio!!';
                $Campos_Validos = false;
            }
            if($temp->Username == '')
            {
                $error['Username'] = 'El Campo Username no puede estar vacio!!';
                $Campos_Validos = false;
            }
            if($temp->Clave == '')
            {
                $error['Clave'] = 'El Campo Clave no puede estar vacio!!';
                $Campos_Validos = false;
            }
            
            
            
            if($Campos_Validos)
            {
                $temp->Insert($temp);
                header("location:Companys.php");
            }
            else
            {
                $Mostrar_Modal = true;
            }

        }
    }






?>