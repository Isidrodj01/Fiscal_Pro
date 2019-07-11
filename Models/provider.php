<?php 
include_once 'db.php';



    class Provider{
        

        public $ID;
        public $Id_Company;
        public $Rnc;
        public $Nombre;
        public $Nombre_Comercial;
        public $Telefono;
        public $Direccion;
        public $Tipo_De_Bien;
        public $Fecha_De_Creacion;
        public $Activo;

      
        function Insert(Provider $temp)
        {
            
            $cn = connect();
           
            $query = "INSERT INTO Proveedores(ID_Empresa, RNC, Nombre, Nombre_Comercial, Telefono, Direccion, Tipo_De_Bien) VALUES('$temp->Id_Company', '$temp->Rnc','$temp->Nombre','$temp->Nombre_Comercial','$temp->Telefono','$temp->Direccion','$temp->Tipo_De_Bien')";
            
            
            $result = mysqli_query($cn,$query);
         
            if(!$result)
                die("Error: " . mysqli_error($cn));
            
        }

        function Update(Provider $temp)
        {
            $query = "UPDATE Proveedores SET RNC = '$temp->Rnc', Nombre = '$temp->Nombre', Nombre_Comercial = '$temp->Nombre_Comercial', Telefono = '$temp->Telefono', Direccion = '$temp->Direccion'
            , Tipo_De_Bien = '$temp->Tipo_De_Bien' WHERE ID = '$temp->ID' ";

            $cn = connect();
           
            $result = mysqli_query($cn,$query);

            if(!$result)
                die("Error: ". mysqli_error($cn));
        } 


    }
 

?>