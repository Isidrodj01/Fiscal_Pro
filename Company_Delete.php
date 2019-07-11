<?php 
    include_once "Models/db.php";

    if(!isset($_SESSION['root']))
    {
        header("location:index.php");
    }

    $id = isset($_GET['id'])? $_GET['id']: '';

    if($id != '')
    {
        settype($id,"Int");
        $query = "UPDATE EMPRESAS SET activo = 0 where ID = '$id' ";

        $result = mysqli_query($cn,$query);

        if($result)
        {
            header("Location:Companys.php");
        }
        else
            die("Error: " . mysqli_error($cn));
    }

?>