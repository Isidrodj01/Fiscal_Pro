<?php 

    require_once 'Models/Provider.php';
    include_once "Includes/header.php";

    $temp = new Provider(); 

    
    $id = isset($_GET['Id'])? $_GET['Id']: '';
    settype($id,'int');

    $query = "SELECT * FROM Proveedores Where ID = '$id'  and Activo = 1";
    $result = mysqli_query($cn,$query);

    if($result)
    {
        $datos = mysqli_fetch_assoc($result);

        $temp->ID = $id;
        $temp->Rnc = $datos['RNC'];
        $temp->Nombre = $datos['Nombre'];
        $temp->Nombre_Comercial = $datos['Nombre_Comercial'];
        $temp->Telefono = $datos['Telefono'];
        $temp->Direccion = $datos['Direccion'];
        $temp->Tipo_De_Bien = $datos['Tipo_De_Bien'];
        $temp->Fecha_De_Creacion = $datos['Fecha_De_Creacion'];
        $temp->Activo = $datos['Activo'];

    }

?>


<?php

    if(!isset($_SESSION['company']))
    {
        header("location:index.php");
    }

    if(isset($_POST['btModificar']))
    {
        $error = array();
        $aux = new Provider();
        $Campos_Validos = true;

        $aux->ID = isset($_POST['ID'])? $_POST['ID'] : 0;
        settype($temp->ID, "INT");
        $aux->Rnc = isset($_POST["RNC"])? $_POST["RNC"] : '';
        $aux->Nombre = isset($_POST["Nombre"])?$_POST["Nombre"] :'';
        $aux->Nombre_Comercial = isset($_POST["Nombre_Comercial"])?$_POST["Nombre_Comercial"] :'';
        $aux->Telefono = isset($_POST["Telefono"])?$_POST["Telefono"] :'';
        $aux->Direccion = isset($_POST["Direccion"])?$_POST["Direccion"] :'';
        $aux->Tipo_De_Bien = isset($_POST["Tipo_De_Bien"])?$_POST["Tipo_De_Bien"] :'';

        if(!is_numeric($aux->Rnc))
        {
            $error['RNC'] = "El valor ingresado al RNC no es valido";
            $Campos_Validos = false;
        }

         if($aux->Rnc == '')
        {
             $error['RNC'] = "El campo RNC no puede estar vacio!";
             $Campos_Validos = false;
        } 

        if($aux->Nombre == '')
        {
             $error['Nombre'] = "El campo nombre no puede estar vacio!";
             $$Campos_Validos = false;
        }

        if($aux->Tipo_De_Bien == '')
        {
             $error['Tipo_De_Bien'] = "El campo Tipo de bien no puede estar vacio!";
             $Campos_Validos = false;
        }

        if($Campos_Validos)
        {
            $aux->Update($aux);
            header("location:Providers.php");
        
        }

    }
        

?>


<div class="container mt-4">


    <form class="myForm" action="" method = "POST">

        <h2 class="text-center"><i class="fa fa-user"></i> Datos del Proveedor</h2>

        <input type="hidden" name = "ID" value = <?php echo $id; ?> >
                        
        <div class="form-row my-2">
            <label for="RNC" class ="col-2 col-form-label">RNC</label>
            <input type="number" required ="true" class="form-control col-10 <?php echo isset($error['RNC'])?'is-invalid':''; ?>" name = 'RNC' value = '<?php echo $temp->Rnc; ?>' >
            <div class="invalid-feedback">
                <?php echo isset($error['RNC'])? $error['RNC'] : ''?>
            </div>
        </div>

        <div class="form-row">
            <label for="Nombre" class ="col-2 col-form-label">Nombre</label>
            <input type="text" required ="true" class="form-control col-10 <?php echo isset($error['Nombre'])?'is-invalid':''; ?>" name = 'Nombre' value = '<?php echo $temp->Nombre; ?>' >
            <div class="invalid-feedback">
                <?php echo isset($error['Nombre'])? $error['Nombre'] : ''?>
            </div>
        </div> 
                            
        <div class="form-row my-2" >
            <label for="Nombre_Comercial" class ="col-2 col-form-label">Nombre Cormecial</label>
            <input type="text" class="form-control col-10" name = 'Nombre_Comercial' value = '<?php echo $temp->Nombre_Comercial; ?>' > 
        </div>

        <div class="form-row">
            <label for="Telefono" class ="col-2 col-form-label">Teléfono</label>
            <input type="text" class="form-control col-10" name = 'Telefono' value = '<?php echo $temp->Telefono; ?>' >
        </div>

        <div class="form-row my-2">
            <label for="Direccion" class ="col-2 col-form-label">Dirección</label>
            <input type="text" class="form-control col-10" name = 'Direccion' value = '<?php echo $temp->Direccion; ?>'>
        </div>

        <div class="form-row my-2">
            <label for="Tipo_De_Bien" class="col-2">Tipo De Bien</label>

                <select class ="form-control col-10 <?php echo isset($error['Tipo_De_Bien'])? 'is-invalid': ''; ?>" name="Tipo_De_Bien">
                   
                    <option selected value ="<?php echo $temp->Tipo_De_Bien; ?>"> <?php echo $temp->Tipo_De_Bien; ?></option>
                   
                    <option value="01-GASTOS DE PERSONAL">01-GASTOS DE PERSONAL </option>
                    <option value="02-GASTOS POR TRABAJOS, SUMINISTROS Y SERVICIOS">02-GASTOS POR TRABAJOS, SUMINISTROS Y SERVICIOS </option>
                    <option value="03-ARRENDAMIENTOS ">03-ARRENDAMIENTOS </option>
                    <option value="04-GASTOS DE ACTIVOS FIJO">04-GASTOS DE ACTIVOS FIJO </option>
                    <option value="05 -GASTOS DE REPRESENTACIÓN">05 -GASTOS DE REPRESENTACIÓN </option>
                    <option value="06 -OTRAS DEDUCCIONES ADMITIDAS">06 -OTRAS DEDUCCIONES ADMITIDAS </option>
                    <option value="07 -GASTOS FINANCIEROS">07 -GASTOS FINANCIEROS </option>
                    <option value="08 -GASTOS EXTRAORDINARIOS">08 -GASTOS EXTRAORDINARIOS </option>
                    <option value="09 -COMPRAS Y GASTOS QUE FORMARAN PARTE DEL COSTO DE VENTA">09 -COMPRAS Y GASTOS QUE FORMARAN PARTE DEL COSTO DE VENTA </option>
                    <option value="10 -ADQUISICIONES DE ACTIVOS">10 -ADQUISICIONES DE ACTIVOS </option>
                    <option value="11- GASTOS DE SEGUROS">11- GASTOS DE SEGUROS </option>

                </select>

                <div class="invalid-feedback">
                    <?php echo isset($error['Tipo_De_Bien'])? $error['Tipo_De_Bien']: ''; ?>
                </div>
        </div>

        <div class="text-center my-2">
            <h6> <i class="fa fa-table"></i> Fecha de Creación: <?php echo $temp->Fecha_De_Creacion; ?></h6>
        </div>

        <div class="form-row mt-2 justify-content-end">
            <a href="Providers.php" class = "btn btn-lg btn-secondary mx-2">Cancelar </a>
            <button id = "Modificar" name = "btModificar" class = "btn btn-lg btn-primary"><i class ="fa fa-save"></i> Modificar </button>
        </div>
                            

        </form>




    </div>
</div>


<script>
 
    $('#Modificar').click(function(e){
        if(!confirm("Esta seguro que desea modificar los datos del proveedor?"))
        {
            e.preventDefault();
        }
    }) 
</script>


