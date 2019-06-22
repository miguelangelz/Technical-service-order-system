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
                        <h1 class="page-header text-center">Lista de ordenes a domicilio</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                 <?php
 require_once "../../Modelo/servicioTecnico.php";                
 require_once "../../Modelo/Database.php";
$idTecnico = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);

$db = new Database;

$ordenes = $db->prepare("SELECT * FROM orden_domicilio WHERE usu_id = $idTecnico");
$ordenes->execute();
$ord = $ordenes->fetchAll(PDO::FETCH_OBJ);
?>
        <?php
        if(!empty($ord))
        {
            ?>
            <table class="table table-striped">
                <tr>
                    <th>Cliente</th>
                    <th>Tec.Encargado</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>

            <?php foreach($ord as $orden)
                { ?>
                    
                    <tr>
                         <td><?php echo $orden->ord_cliente?></td>
                        <td><?php echo $orden->ord_tecnico ?></td>
                        <td><?php echo $orden->ord_subtotal ?></td>
                        <td><?php echo $orden->ord_total ?></td>          
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