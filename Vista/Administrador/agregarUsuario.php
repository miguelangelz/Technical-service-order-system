<?php 
session_start();
if(isset($_SESSION['admin'])){
?>

<!DOCTYPE html>
<html lang="es">

<?php require '../head.php' ?>

    <div id="wrapper">

       <?php require './headerAdmin.php' ?>
           <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header text-center">Agregar Usuario</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="<?php echo Personas::baseurl() ?>Controlador/Persona/save.php" method="POST" name="submit">
            <div class="form-group">
                <label for="username">Nombre y Apellido</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de usuario" autofocus="" required="" >
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Ingrese el nombre de usuario" autofocus="" required="" >
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese la Contraseña">
            </div>
            <div class="form-group">
                <label for="username">Dirección</label>
                <input type="text" name="direccion" class="form-control" id="username" placeholder="Ingrese el nombre de usuario" autofocus="" required="" >
            </div>
            <div class="form-group">
                                            <label>Tipo de Usuario</label>
                                            <select class="form-control" name="tipo">
                                                <option value="Administrador">Administrador</option>
                                                <option value="Técnico">Técnico</option>
                                            </select>
                                </div>
                
            <input type="submit" name="submit" class="btn btn-default" value="Guardar Usuario">            
<!--            <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-save"></i> Guardar Usuario</button>-->
        </form>
    
                </div>
               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php require '../footer.php' ?>

</html>
<?php 
}else{
    header('Location:../login.php');
}
?>