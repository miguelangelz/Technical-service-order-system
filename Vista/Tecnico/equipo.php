<?php 
session_start();
if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">

<?php require '../head.php' ?>

    <div id="wrapper">

       <?php require './headerUser.php' ?>
           <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header text-center">Agregar Equipo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="../../Controlador/Ordenes/save_equipo.php" method="POST" name="submit">
                                            <fieldset>    
                                                <div class="form-group">
                                                    <label>Ingrese nuevo equipo</label>
                                                    <input class="form-control" name="equipo" type="text" style='text-transform:uppercase' required>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
                                                </div>
                                            </fieldset>
                                        </form>
    
                </div>
               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
   <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>