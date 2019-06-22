<?php 
session_start();
if(isset($_SESSION['admin'])){
?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php' ?>

    <div id="wrapper">
        <?php require 'headerAdmin.php'; ?>
          
            <div class="row">
                <div class="col-lg-8">
                 <?php
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
if( ! $id )
{
    header("Location:" . Personas::baseurl() . "Vista/Administrador/editarAdmin.php");
}
$db = new Database;
$newUser = new Personas($db);
$newUser->setId($id);
$user = $newUser->mostrarUsuario();
$newUser->checkUser($user);
?>

        <h2 class="text-center text-primary">Editar Usuario : <?php echo $user->usu_nombre ?></h2>
        <form action="<?php echo Personas::baseurl() ?>Controlador/Persona/updateAdmin.php" method="POST">
            <div class="form-group">
                <label for="username">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $user->usu_nombre ?>" class="form-control" placeholder="Actualize el usuario">
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" value="<?php echo $user->usu_usuario ?>" class="form-control" placeholder="Actualize el usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" value="<?php echo $user->usu_password ?>" class="form-control" placeholder="Actualize la Contraseña">
            </div>
            <div class="form-group">
                <label for="username">Dirección</label>
                <input type="text" name="direccion" value="<?php echo $user->usu_direccion ?>" class="form-control" placeholder="Actualize el usuario">
            </div>
            <div class="form-group">
                                            <label>Tipo de Usuario</label>
                                            <select class="form-control" name="tipo">
                                                <?php 
                                                if($user->usu_tipo == "Administrador"){
                                                ?>
                                                <option value="<?php echo $user->usu_tipo ?>"><?php echo $user->usu_tipo ?></option>
                                                <option value="Técnico">Técnico</option>
                                                <?php }else if($user->usu_tipo == "Técnico"){?>
                                                <option value="<?php echo $user->usu_tipo ?>"><?php echo $user->usu_tipo ?></option>
                                                <option value="Administrador">Administrador</option>
                                                <?php }?>
                                            </select>
                                </div>
           
            <input type="hidden" name="id" value="<?php echo $user->usu_id ?>" />
            <input type="submit" name="submit" class="btn btn-default" value="Actualizar Usuario" />
        </form>
  
                     <!--fin  formulario cliente -->
                     <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>