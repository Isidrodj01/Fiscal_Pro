<?php 

include_once 'db.php';

class Company{
    public $ID;
    public $ID_Admin;
    public $RNC;
    public $Nombre;
    public $Direccion;
    public $Telefono;
    public $Username;
    public $Clave;
    public $Fecha_De_Creacion;
    public $Activo;


    function getCompanys($Id)
    {
        $lista = array();
        $cn = connect();


        settype($Id,"Int");
        $query = "SELECT * FROM EMPRESAS WHERE ID_Admin = '$Id' AND activo = 1";

        $result = mysqli_query($cn,$query);

        if($result)
        {
            while($aux = $result->fetch_assoc())
            {
                array_push($lista,$aux);
            }
        }
        else
        {
            die("Error" . mysqli_error($cn));
        }

        return $lista;

    }

    function getCompany($Id)
    {
        settype($Id,'INT');

        $cn = connect();
        $query = "SELECT * from Empresas Where ID = '$Id' ";

        $result = mysqli_query($cn,$query);
        if($result)
        {
            return $result->fetch_assoc();
        }
        else
        {
            die("Error: ". mysqli_query($cn));
        }

    }

    function Insert(Company $temp)
    {
        $cn = connect();
        $query = "INSERT INTO EMPRESAS(ID_Admin, RNC,Nombre, Direccion, Telefono, Username, Clave) 
        VALUES('$temp->ID_Admin', '$temp->RNC', '$temp->Nombre', '$temp->Direccion', '$temp->Telefono', '$temp->Username', '$temp->Clave')";
   
        $result = mysqli_query($cn,$query);

        if(!$result)
            die("Error: " . mysqli_error($cn));
    }

    function Update(Company $temp)
    {
        $cn = connect();
        $query = "UPDATE EMPRESAS SET RNC = '$temp->RNC', Nombre = '$temp->Nombre', Direccion = '$temp->Direccion', Telefono = '$temp->Telefono', Username = '$temp->Username', Clave = '$temp->Clave' WHERE ID = '$temp->ID' ";
        $result = mysqli_query($cn, $query);

        if(!$result)
            die("Error: " . mysqli_error($cn));

    }
}

?>