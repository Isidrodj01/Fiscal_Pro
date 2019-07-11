<?php 

    require_once 'Models/db.php';
    include_once 'Models/Company.php';


    $id_company = '';
    session_start();

    if(!isset($_SESSION['company']))
    {
        header("location:index.php");
    }
    
    if(isset($_SESSION['company']))
    {
        $company = new Company;
        $company = json_decode($_SESSION['User']);
        $id_company = $company->ID;
    }

    $search = isset($_POST['search']) ? $_POST['search'] : '';
     
    
    $query = "Select * from Proveedores where Id_Empresa = '$id_company' and  activo = 1 Limit 15";
    
    $salida = '';
    

    if($search != '')
    {
        
        $q = $cn->real_escape_string($search);
        $query = "SELECT * FROM Proveedores WHERE Nombre LIKE '$q%' AND Id_Empresa = '$id_company' AND  activo = 1 OR RNC LIKE '$q%' AND Id_Empresa = '$id_company' AND activo = 1 LIMIT 15 ";
    }


    $result = mysqli_query($cn,$query);

    if($result)
    {
        if($result->num_rows > 0)
        {
            $salida = '  
            <table class="table  table-hover mt-3">
            <thead class= "thead-dark">
                 <tr>
                     <th>ID</th>
                     <th scope="col">RNC </th>
                     <th scope = "col">Nombre </th>
                     <th> Teléfono </th>
                     <th>Dirección</th>
                     <th>Acciones</th>
                 </tr>
             </thead>
             <tbody>               ';

            while($fila = $result->fetch_assoc())
            {
            
            $salida .=  " 
            <tr>        
                    <th>". $fila['ID'] ."</th>
                    <td>". $fila['RNC'] ."</td>
                    <td>". $fila['Nombre'] ."</td>
                    <td>". $fila['Telefono'] ."</td>
                    <td>". $fila["Direccion"] ."</td>
                
                    <td>
                        <a  href='Provider_Modify.php?Id=".$fila['ID']."'  class='btn btn-sm btn-secondary modify' title ='Modificar'> <i class='fa fa-edit'> </i></a>
                        <a  href='Provider_Delete.php?Id=".$fila['ID']." ' class='btn btn-sm btn-danger delete' title ='Eliminar'> <i class='fa fa-trash'></i> </a>
                    </td> 
                    
                </tr>";
            }
        }
        else
            $salida.= '<h3 class ="mt-3"> NO HAY DATOS :( </h3>';  
    }

    $salida.='    </tbody>
    </table>
    
    <script>
        $(".delete").click(function(e){
            if(!confirm("Seguro que desea eliminar al proveedor?"))
            {
                e.preventDefault();
            }
        }); 

    </script>
    
    ';


    
    echo $salida;


?>