<?php
    require 'Includes/header.php'; 
    require_once("Provider_insert.php");
    
    if(!isset($_SESSION['company']))
    {
        header("location:index.php");
    }
?>

<div class="container-fuid"> 

    <div class="container  mt-3">

            <div class ="row">
                <div class="col-6 ">
                    <input type="text" id= 'search' name = "search" autocomplete = "off"  class = "form-control" placeholder ="Buscar...">
                </div>
                <div class="col-1 px-0">
                    <button class="btn btn-primary" id= 'btBuscar'> Buscar </button>
                </div>
            </div>

        <button data-target ="#modal1" data-toggle="modal" class="btn btn-success mt-4"> <i class="fa fa-plus-circle"> </i> Crear Nuevo </button>


        <div id="resultado_busqueda">

        </div>

        <!-- MODAL PARA CREAR PROVEEDORES -->
    
            <div class="modal fade" id="modal1" role = "dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-tittle"><i class="fa fa-user-plus"></i> &nbsp;DATOS DEL PROVEEDOR</h5>
                        </div>

                        <div class="modal-body">
                            <div class="container">
                                 <form action ="" method="POST"> 
                                        <div class ="form-group row">                              
                                            <label for="RNC" class = "col-2 col-form-label">RNC </label>
                                                                                        
                                            <input type="number" name ="RNC" required ="true" class="form-control col-10 <?php echo (isset($error['RNC']))? 'is-invalid': ''; ?> " placeholder = "RNC"  autocomplete = "off">
                                            
                                            <div class="invalid-feedback text-center">
                                                <?php echo (isset($error['RNC'])) ? $error['RNC']: '';?>
                                            </div>
                                            
                                        </div>

                                        <div class = "form-group row">
                                            <label for="Nombre" class="col-2"> Nombre</label>
                                            <input type="text"  name = "Nombre" required ="true" class="form-control col-10 <?php echo (isset($error['Nombre']))? 'is-invalid' : ''; ?>" placeholder = "Nombre" autocomplete = "off">

                                            <div class="invalid-feedback text-center">
                                                <?php echo (isset($error['Nombre'])) ? $error['Nombre']: ''; ?>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="Nombre_Comercial" class="col-2">Nombre Comercial</label>
                                            <input type="text" name = "Nombre_Comercial" class="form-control col-10" placeholder = "Nombre Comercial" autocomplete = "off">
                                        </div>

                                        <div class="form-group row">
                                            <label for="Telefono" class="col-2">Télefono</label>
                                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control col-10" name = "Telefono" placeholder = "888-888-8888" autocomplete = "off">
                                        </div>

                                        <div class="form-group row">
                                            <label for="Direccion" class="col-2">Dirección</label>
                                            <input type="text" name ="Direccion"  class="form-control col-10" placeholder ="Direccion" autocomplete = "off">
                                        </div>

                                        <div class="form-group row">
                                            <label for="Tipo_De_Bien" class="col-2">Tipo de Bien</label>

                                            <select class ="form-control col-10 " name="Tipo_De_Bien">
                                                <option value="01-GASTOS DE PERSONAL">01-GASTOS DE PERSONAL </option>
                                                <option value="02-GASTOS POR TRABAJOS, SUMINISTROS Y SERVICIOS">02-GASTOS POR TRABAJOS, SUMINISTROS Y SERVICIOS </option>
                                                <option value="03-ARRENDAMIENTOS ">03-ARRENDAMIENTOS </option>
                                                <option value="04-GASTOS DE ACTIVOS FIJO">04-GASTOS DE ACTIVOS FIJO </option>
                                                <option value="05 -GASTOS DE REPRESENTACIÓN">05 -GASTOS DE REPRESENTACIÓN </option>
                                                <option value="06 -OTRAS DEDUCCIONES ADMITIDAS">06 -OTRAS DEDUCCIONES ADMITIDAS </option>
                                                <option value="07 -GASTOS FINANCIEROS">07 -GASTOS FINANCIEROS </option>
                                                <option value="08 -GASTOS EXTRAORDINARIOS">08 -GASTOS EXTRAORDINARIOS </option>
                                                <option selected value="09 -COMPRAS Y GASTOS QUE FORMARAN PARTE DEL COSTO DE VENTA">09 -COMPRAS Y GASTOS QUE FORMARAN PARTE DEL COSTO DE VENTA </option>
                                                <option value="10 -ADQUISICIONES DE ACTIVOS">10 -ADQUISICIONES DE ACTIVOS </option>
                                                <option value="11- GASTOS DE SEGUROS">11- GASTOS DE SEGUROS </option>
                                            </select>

                                        </div>
                                        
                                        <div class="form-group row  justify-content-end">
                                            <button class="btn btn-lg btn-secondary mx-2 col-3 " data-dismiss="modal" aria-label="close"> Cancelar</button>
                                            <button class="btn btn-lg btn-primary  col-3 "  name = "provider-insert"><i class ="fa fa-save"></i> Guardar</button>
                                        </div>
                                 </form> 
                            </div>                        
                        </div>              
                    </div>            
                </div>
            
            </div>

        <!-- FIN DEL MODAL -->
        

    </div>
</div>


<?php 
    if($Mostrar_Modal)
    { 
?>
        <script>
            $('#modal1').modal('show');
        </script>

<?php 
    }
?>



<script>

    $(Buscar_Datos());

    function Buscar_Datos(){
        var search = $('#search').val();
        
        $.ajax({
            url: 'Provider_Search.php',
            method: 'POST',
            datatype: 'html',
            data: {search: search},
        }).done(function(res){
            $('#resultado_busqueda').html(res);
        }).fail(function(){
            console.log("Error");
        })
    }

    $('#btBuscar').on('click',function(e){
        Buscar_Datos();
    })

</script> 




