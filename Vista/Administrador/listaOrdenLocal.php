<?php 
session_start();
//require_once "../Modelo/ServicioTecnico.php";
if(isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html lang="es">

<?php require '../head.php' ?>



    <div id="wrapper">

        <!-- Navigation -->
       <?php require 'headerAdmin.php' ?>

        
          
           <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header text-center">Lista de ordenes locales</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                 <?php
require_once "../../Modelo/Database.php";

$db = new Database;

$ordenes = $db->prepare("SELECT * FROM orden_local ORDER BY orl_fecha DESC");
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
                    <th>Fecha de entrega</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                    <th>Accion</th> 
                </tr>

            <?php foreach($ord as $orden)
                {
                    if($orden->orl_estado == "POR ENTREGAR"){
                    ?>
                <tr style="background-color: #fda8a8">
                        
                        <td><?php echo $orden->orl_estado ?></td>
                        <td><?php echo $orden->orl_observacion ?></td>
                        <td><?php echo $orden->orl_subtotal ?></td>
                        <td><?php echo $orden->orl_total ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo ServicioTecnico::baseurl() ?>Vista/Administrador/editarOrdenLocal.php?orden=<?php echo $orden->orl_id  ?>"><i class="fa fa-edit fa-fw"></i> Actualizar</a> 
                        </td>
                        <?php }else if($orden->orl_estado == "PENDIENTE"){ ?>
                <tr style="background-color: #f3da61">
                        <td><?php echo $orden->orl_estado ?></td>
                        <td><?php echo $orden->orl_observacion ?></td>
                        <td><?php echo $orden->orl_subtotal ?></td>
                        <td><?php echo $orden->orl_total ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo ServicioTecnico::baseurl() ?>Vista/Administrador/editarOrdenLocal.php?orden=<?php echo $orden->orl_id  ?>"><i class="fa fa-edit fa-fw"></i> Actualizar</a> 
                        </td>
                        <?php }else{ ?>   
                        <tr style="background-color: #c9efc9">
                        <td><?php echo $orden->orl_estado ?></td>
                        <td><?php echo $orden->orl_observacion ?></td>
                        <td><?php echo $orden->orl_subtotal ?></td>
                        <td><?php echo $orden->orl_total ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo ServicioTecnico::baseurl() ?>Vista/Administrador/editarOrdenLocal.php?orden=<?php echo $orden->orl_id  ?>"><i class="fa fa-edit fa-fw"></i> Actualizar</a> 
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
                <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>