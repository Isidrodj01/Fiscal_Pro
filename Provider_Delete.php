<?php

require_once 'Models/db.php';

if(!isset($_SESSION['company']))
{
    header("location:index.php");
}

$id = isset($_GET['Id'])? $_GET['Id'] : 0;

settype($id, 'INT');

if($id != 0)
{
    $query = "Update Proveedores set Activo = 0 where ID = $id ";
    $result = mysqli_query($cn,$query);

    if($result)
    {
        header("location:Providers.php");   
    }   
    else
    {
        die("Error: " . mysqli_error($cn));
    }

}

?> 