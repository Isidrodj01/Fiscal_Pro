<?php 
    require_once "Company_Insert.php";
    
    if(!isset($_SESSION['root']))
    {
        header("location:index.php");
    }
?>

<div class="mt-5">

            <div class="container">

                <button data-target ="#modal1" data-toggle="modal" class="btn btn-success mb-3"> <i class="fa fa-plus-circle"> </i> Crear Nuevo </button>

                <h3>Listado de Empresas</h3>

                <table class="table table-hover"> 
                        <thead class="thead-dark">
                            <tr>
                                <th>RNC</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>

                            </tr>


                        </thead>
                        <tbody>
                            <?php foreach($data as $item){ ?>
                            <tr>
                                <th> <?php echo $item['RNC'] ?> </th>
                                <td> <?php echo $item['Nombre']; ?> </td>
                                <td> <?php echo $item['Direccion']; ?> </td>
                                <td> <?php echo $item['Telefono']; ?> </td>                                

                                <td>
                                    <a href="Company_Modify.php?id=<?php echo $item['ID']; ?> " class="btn btn-sm btn-secondary"><i class="fa fa-edit" title = "Modificar"></i></a>
                                    <a  href="Company_Delete.php?id=<?php echo $item['ID']; ?>" class="btEliminar btn btn-sm btn-danger" ><i class="fa fa-trash" title = "Eliminar"></i> </a>
                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>

                </table>
                
            </div>
</div>



<!-- MODAL PARA LOS DATOS DE LA EMPRESA -->

<div class="modal modal-fade" id = "modal1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-tittle"><i class="fa fa-user-plus"></i> &nbsp;DATOS DE LA EMPRESA</h5>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form action="" method = "POST">

                        <h2 class="text-center mb-3">Datos de la Empresa</h2>

                        <div class="form-row mx-1">
                            <label for="RNC" class="col-2 col-form-label">RNC</label>
                            <input  required type="number" class = "form-control col-10 <?php echo isset($error['RNC'])? 'is-invalid': '' ?>" name="RNC" placeholder ="RNC">

                            <div class="invalid-feedback text-center">
                                <?php echo isset($error['RNC'])? $error['RNC']: '' ?>
                            </div>
                        </div>


                        <div class="form-row mx-1 my-2">
                            <label for="nombre" class ="col-form-label col-2">Nombre</label>
                            <input required type="text" name="nombre" placeholder="Nombre" class="form-control col-10 <?php echo isset($error['Nombre'])? 'is-invalid': '' ?>">
                           
                            <div class="invalid-feedback text-center">
                                <?php echo isset($error['Nombre'])? $error['Nombre']: '' ?>
                            </div>
                        </div>

                        <div class="form-row mx-1">
                            <label for="Direccion" class="col-form-label col-2">Dirección</label>
                            <input type="text" name = "direccion" class= "form-control col-10" placeholder ="Dirección">
                        </div>

                        <div class="form-row mx-1 my-2">
                            <label for="Telefono" class="col-form-label col-2">Teléfono</label>
                            <input type="text" name="telefono" class="form-control col-10" placeholder ="Teléfono">
                        </div>

                        <div class="form-row mx-1">
                            <label for="username" class ="col-form-label col-2">Username</label>
                            <input required type="text" name="username" class ="form-control col-10 <?php echo isset($error['Username'])? 'is-invalid': ''; ?>" placeholder="Username">
                            
                            <div class="invalid-feedback text-center">
                                <?php echo isset($error['Username'])? $error['Username']: '' ?>
                            </div>
                        </div>
                        
                        <div class="form-row mx-1 my-2">
                            <label for="clave" class="col-form-label col-2">Clave</label>
                            <input required type="text" name="clave" placeholder="Contraseña"  class="form-control col-10 <?php echo isset($error['Clave'])? 'is-invalid': ''; ?> ">
                       
                            <div class="invalid-feedback text-center">
                                <?php echo isset($error['Clave'])? $error['Clave']: '' ;?> 
                            </div>
                        </div>



                        <div class="form-row justify-content-end mx-1">
                            <button class="btn btn-lg btn-secondary mx-2" data-dismiss ="modal" aria-label="close">Cancelar</button>
                            <button name = "btGuardar" id = "btGuardar" class="btn btn-lg  btn-primary"> Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- FIN DEL MODAL -->


<?php if($Mostrar_Modal){ ?>
    <script>
        $('#modal1').modal('show');    
    </script>
            
<?php } ?>




<script>
    $('.btEliminar').click(function(e){
        if(!confirm('Seguro que desea eliminar la empresa?'))
            e.preventDefault();
    });
</script>



