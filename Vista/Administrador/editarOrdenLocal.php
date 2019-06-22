<?php 
session_start();
if(isset($_SESSION['admin'])){
?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php'; ?>
    <div id="wrapper">
        <?php require './headerAdmin.php'; ?>
        
           
            <div class="row">
                <div class="col-lg-8">
                
                  <!-- formulario servicio tecnico -->
                  <?php
require_once "../../Modelo/ServicioTecnico.php";
$id = filter_input(INPUT_GET, 'orden', FILTER_VALIDATE_INT);
if( ! $id )
{
    header("Location:" . ServicioTecnico::baseurl() . "Vista/Administrador/listaOrdenLocal.php");
}
$db = new Database;
$nuevaOrden = new ServicioTecnico($db);
$nuevaOrden->setId($id);
$orden= $nuevaOrden->get();
$nuevaOrden->checkUser($orden);
?>
                                                                                
        <form action="<?php echo ServicioTecnico::baseurl() ?>Controlador/Ordenes/updateOrdenLocal.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                        <h2 class="text-center text-primary">Editar Orden de servicio tecnico # : <?php echo $orden->orl_numero ?></h2>

                                            <label>Estado del equipo</label>
                                            <select class="form-control" name="estado">
                                                <?php 
                                                if($orden->orl_estado == "POR ENTREGAR"){
                                                ?>
                                                <option value="<?php echo $orden->orl_estado ?>"><?php echo $orden->orl_estado ?></option>
                                                <option value="PENDIENTE">PENDIENTE</option>
                                                <option value="SIN REPARO">SIN REPARO</option>
                                                <option value="ENTREGADO">ENTREGADO</option>
                                                <?php }else if($orden->orl_estado == "ENTREGADO"){?>
                                                <option value="<?php echo $orden->orl_estado ?>"><?php echo $orden->orl_estado ?></option>
                                                <option value="SIN REPARO">SIN REPARO</option>
                                                <option value="ENTREGADO">ENTREGADO</option>
                                                <?php } ?>
                                            </select>
                                </div>
            <div class="form-group">
                <label for="fecha">Fecha de Entrega</label>
                <input type="date" name="fecha" value="<?php echo $orden->orl_fecha_entrega ?>" class="form-control" id="fecha">
            </div>
            <div class="form-group">
                <label for="observacion">Observacion</label>
                <input type="text" name="observacion" value="<?php echo $orden->orl_observacion ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="text" name="subtotal" value="<?php echo $orden->orl_subtotal ?>" class="form-control" id="subtotal"onKeyPress="return filterFloat(event,this);" onkeyup="calculo();">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" value="<?php echo $orden->orl_total?>" class="form-control" id="total">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $orden->orl_id ?>" />
            <input type="submit" name="submit" class="btn btn-default" value="Actualizar Técnico" />
        </form>
              <!--fin  formulario cliente -->
              <?php require '../footer.php'; ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>