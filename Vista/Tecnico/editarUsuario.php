<?php 
session_start();
if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php' ?>

    <div id="wrapper">
        <?php require 'headerUser.php' ?>
        
                 <?php
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
if( ! $id )
{
    header("Location:" . Personas::baseurl() . "Vista/Tecnico/editaUsuario.php");
}
$db = new Database;
$newUser = new Personas($db);
$newUser->setId($id);
$user = $newUser->mostrarUsuario();
$newUser->checkUser($user);
?>

        <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Editar Técnico : <?php echo $user->usu_nombre ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-lg-8">
        <form action="<?php echo Personas::baseurl() ?>Controlador/Persona/update.php" method="POST">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" value="<?php echo $user->usu_usuario ?>" class="form-control" id="username" placeholder="Actualize el usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" value="<?php echo $user->usu_password ?>" class="form-control" id="password" placeholder="Actualize la Contraseña">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $user->usu_id ?>" />
            <input type="submit" name="submit" class="btn btn-default" value="Actualizar Técnico" />
        </form>
   
                    <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>