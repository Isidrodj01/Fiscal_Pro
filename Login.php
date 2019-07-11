<?php 
    require_once 'Includes/Header.php'; 
    include_once 'Models/db.php';
    include_once 'Models/Company.php';    
?>

<?php 

    if(isset($_POST['btLogin']))
    {
        $error = array();
        $campos_Validos = true;
        
     
        $user = isset($_POST['user']) ? $_POST['user']:'';
        $password = isset($_POST['password']) ? $_POST['password']: '';

        if($user == '')
        {
            $error['user'] = 'El usuario ingresado no es válido!';
            $campos_Validos = false;
        }

        if($password == '')
        {
            $error['password'] = 'La contraseña ingresada no es válida!';
            $campos_Validos = false;
        }

        if($campos_Validos)
        {
            //TODO EL CODIGO PARA LOGEAR AL USUARIO
            $user = $cn->real_escape_string($user);
            $query = "SELECT * from Empresas Where Username = '$user' and Activo = 1 ";

            $result = mysqli_query($cn,$query);

            if($result)
            {
                if($result->num_rows > 0)
                {
                    $company = new Company;
                    $data = $result->fetch_assoc();

                    $company->ID = $data['ID'];
                    $company->ID_Admin = $data['ID_Admin'];
                    $company->RNC = $data['RNC'];
                    $company->Nombre = $data['Nombre'];
                    $company->Direccion = $data['Direccion'];
                    $company->Telefono = $data['Telefono'];
                    $company->Username = $data['Username'];
                    $company->Clave = $data['Clave'];
                    $company->Fecha_De_Creacion = $data['Fecha_De_Creacion'];

                    if($company->Clave == $password)
                    {
                        session_start();
                        $_SESSION['company'] = true;
                        $_SESSION['User'] = json_encode($company);
                        header("Location:index.php");
                    }
                    else
                    {
                        $error['password'] = "La clave ingresada no es válida!!";
                    }
                }
                else
                {
                    $error['user'] ='Usuario no Existe!!';
                }
                
            }

        }

    }
    
?>


<div class="row">
    <div class="col-4"></div>

    <div class="col-4">

        <form action="" method ="POST" class ="myForm-login mt-5">
            <h3 class = 'text-center mb-3'>Iniciar Sesión</h3>

            <div class="form-group text-center">
                <input type="text" required name = "user" placeholder ="Usuario" autocomplete ="off" class="form-control <?php echo isset($error['user'])? 'is-invalid': ''; ?> ">

                <div class="invalid-feedback">
                    <?php echo isset($error['user'])? $error['user']:''?>
                </div>               
                
                <label for="user" class="col-form-label">Usuario</label>                     
            </div>

            <div class="form-group text-center">               
                <input type="password" required  name = "password" placeholder ="Contraseña" class="form-control <?php echo isset($error['password']) ? 'is-invalid' : ''; ?>">
                <div class="invalid-feedback">
                    <?php echo isset($error['password'])? $error['password']: ''; ?>
                </div>

                <label for="password" class ="col-form-label">Contraseña</label>
            </div>

            <div class="form-group text-center">
                <button name="btLogin" class="btn btn-lg btn-dark btn-Login"> Login </button>
            </div>
        </form>

    </div>
    
    <div class="col-4">
        <div class="text-right mx-2">
                    <a href="Login_Admin.php">Soy Administrador</a>
                </div>
        </div>
</div>


