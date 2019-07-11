<?php 

    include_once "Includes/header.php";
    include_once 'Models/Company.php';

    if(!isset($_SESSION['root']))
    {
        header("Location:index.php");
    }

    $id = isset($_GET['id'])? $_GET['id']: '';
    settype($id, 'INT');

    if($id != 0)
    {
         $company = new Company();
         $data = $company->getCompany($id);
    }


    //TODO EL CODIGO PARA LA VALIDACION DE LOS CAMPOS 
    if(isset($_POST['btModificar']))
    {
        $error = array();
        $camposValidos = true;

        $temp = new Company();

        $temp->ID = $id;
        $temp->RNC = isset($_POST['RNC']) ? $_POST['RNC'] : '';
        $temp->Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
        $temp->Direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : '';
        $temp->Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : '';
        $temp->Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $temp->Clave = isset($_POST['Clave']) ? $_POST['Clave'] : '';

        if($temp->RNC =='')
        {
            $error['RNC'] = "El campo RNC no es válido!";
            $camposValidos = false;
        }
        if($temp->Nombre =='')
        {
            $error['Nombre'] = "El campo nombre no es válido!";
            $camposValidos = false;
        }
        if($temp->Username =='')
        {
            $error['Username'] = "El campo Username no es válidoo!";
            $camposValidos = false;
        }
        if($temp->Clave =='')
        {
            $error['Clave'] = "El campo Clave no es válido!";
            $camposValidos = false;
        }

        if($camposValidos)
        {
            $temp->Update($temp);
            header("location:Companys.php");
        }
    }

?>


<?php 
    include_once 'Includes/Header.php';
?>



<div class="container mt-4">
    <form class="myForm" method = "POST">

        <h2 class = "text-center"> <i class="fa fa-building"> </i> Datos de la Empresa</h2>

        <div class="form-row my-2">
            <label for="Rnc" class = "col-form-label col-2">RNC</label>
            <input type="text" name="RNC" value="<?php echo $data['RNC']; ?>" class="form-control col-10 <?php echo isset($error['RNC'])?'is-invalid' : ''; ?>" placeholder="RNC">

            <div class="invalid-feedback text-center">
                <?php echo isset($error['RNC']) ? $error['RNC']:''; ?>
            </div>
        </div>

        <div class="form-row">
            <label for="Nombre" class="col-2 col-form-label">Nombre</label>
            <input type="text" name="Nombre" value ="<?php echo $data['Nombre']; ?>" class="col-10 form-control <?php echo isset($error['Nombre'])?'is-invalid' : ''; ?>" placeholder="Nombre">
       
            <div class="invalid-feedback text-center">
                <?php echo isset($error['Nombre']) ? $error['Nombre']:''; ?>
            </div>
        </div>

        <div class="form-row my-2">
            <label for="Direccion" class="col-2 col-form-label">Dirección</label>
            <input type="text" name = "Direccion" value = "<?php echo $data['Direccion']; ?>" class="col-10 form-control" placeholder = "Dirección">
        </div>

        <div class="form-row">
            <label for="Telefono" class="col-2 col-form-label">Teléfono</label>
            <input type="text" name = "Telefono" value="<?php echo $data['Telefono']; ?>" class="col-10 form-control" placeholder ="Teléfono">
        </div>

        <div class="form-row my-2">
            <label for="Username" class="col-2 col-form-label">Username</label>
            <input type="text" name = "Username" value = "<?php echo $data['Username']; ?>" class="col-10 form-control <?php echo isset($error['Username'])?'is-invalid' : ''; ?>" placeholder = "Username">    
       
            <div class="invalid-feedback text-center">
                <?php echo isset($error['Username']) ? $error['Username']:''; ?>
            </div>

        </div>

        <div class="form-row">
            <label for="Clave" class="col-2 col-form-label">Clave</label>
            <input type="text" name ="Clave" value = "<?php echo $data['Clave']; ?>" class="col-10 form-control <?php echo isset($error['Clave'])?'is-invalid' : ''; ?>" placeholder = "Clave">
       
            <div class="invalid-feedback text-center">
                <?php echo isset($error['Clave']) ? $error['Clave']:''; ?>
            </div>

        </div>

        <div class="form-row justify-content-end mt-2">
            <a href="Companys.php" class="btn btn-lg btn-danger mx-2">Cancelar</a>
            <button name = "btModificar" class = "btn btn-lg btn-primary">Modificar</button>
        </div>
        
    </form>
</div>