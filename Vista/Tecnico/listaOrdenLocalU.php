<?php 
session_start();
//require_once "../Modelo/ServicioTecnico.php";
if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html lang="es">

<?php require '../head.php' ?>



    <div id="wrapper">

        <!-- Navigation -->
       <?php require 'headerUser.php' ?>

        
          
           <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header text-center">Lista de ordenes locales</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-9">
                 <?php
 require_once "../../Modelo/servicioTecnico.php";                
require_once "../../Modelo/Database.php";

$db = new Database;
$id = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);
$ordenes = $db->prepare("SELECT * FROM orden_local WHERE usu_id = $id ORDER BY orl_fecha DESC");
$ordenes->execute();
$ord = $ordenes->fetchAll(PDO::FETCH_OBJ);
?>
        <?php
        if(!empty($ord))
        {
            ?>
            <table class="table table-striped">
                <tr>
                    <th>Estado</th>
                    <th>Fecha de recepción</th>
                    <th>Fecha de entrega</th>
                    <th>Accion</th> 
                </tr>

            <?php foreach($ord as $orden)
                {
                    if($orden->orl_estado == "POR ENTREGAR"){
                    ?>
                <tr style="background-color: #fda8a8">
                        
                        <td><?php echo $orden->orl_estado ?></td>
                        <td><?php echo $orden->orl_fecha ?></td>
                        <td><?php echo $orden->orl_fecha_entrega ?></td>
                        <td>
                            <button class="btn btn-danger view_data" name="view" id="<?php echo $orden->orl_id ?>" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit fa-fw"></i> Actualizar</button>
                            <button class="btn btn-danger view_datos" name="view" id="<?php echo $orden->orl_id ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye fa-fw"></i> Ver Detalles</button>
                        </td>
                        <?php }else if($orden->orl_estado == "PENDIENTE"){ ?>
                <tr style="background-color: #f3da61">
                        <td><?php echo $orden->orl_estado ?></td>
                        <td><?php echo $orden->orl_fecha ?></td>
                        <td><?php echo $orden->orl_fecha_entrega ?></td>
                        <td>
                            <button class="btn btn-warning view_data" name="view" id="<?php echo $orden->orl_id ?>" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit fa-fw"></i> Actualizar</button>
                            <button class="btn btn-warning view_datos" name="view" id="<?php echo $orden->orl_id ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye fa-fw"></i> Ver Detalles</button>
                        </td>
                        <?php }else{ ?>   
                        <tr style="background-color: #c9efc9">
                        <td><?php echo $orden->orl_estado ?></td>
                        <td><?php echo $orden->orl_fecha ?></td>
                        <td><?php echo $orden->orl_fecha_entrega ?></td>
                        <td>
                            <button class="btn btn-success view_datos" name="view" id="<?php echo $orden->orl_id ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye fa-fw"></i> Ver Detalles</button>
                        </td>
                        <?php } ?> 
                        
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php }else{ ?>
            <div class="alert alert-danger" style="margin-top: 100px">Ninguna orden a sido registrado</div>
            <?php } ?>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">ACTUALIZAR ESTADO</h4>
                                        </div>
                                        <div class="modal-body" id="employee_detail">
                                         <!-- formulario servicio tecnico -->
                                        
                                        <!--fin  formulario cliente -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
        </div>
<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var orden_id = $(this).attr("id");  
           $.ajax({  
                url:"modalOrdenLocalUpdate.php",  
                method:"post",  
                data:{orden_id:orden_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#myModal').modal("show");  
                }  
           });  
      }); 
      $('.view_datos').click(function(){  
           var orden_id = $(this).attr("id");  
           $.ajax({  
                url:"detalleOrdenLocal.php",  
                method:"post",  
                data:{orden_id:orden_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#myModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
                                       

                <?php require '../footer.php' ?>
            
                    </body>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>
