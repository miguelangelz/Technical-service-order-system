<?php 
session_start();
if(isset($_SESSION['admin'])){
?>

<!DOCTYPE html>
<html lang="es">

<?php require '../head.php' ?>

    <div id="wrapper">
        <?php require 'headerAdmin.php' ?>
        
          
            <div class="row">
                <div class="col-lg-9">
                
                 <?php
$db = new Database;
$user = new Personas($db);
$users = $user->mostrarUsuario();
?>

        <h2 class="text-center text-primary">Lista de Usuarios</h2>
        
        <?php
        if( ! empty( $users ) )
        {
            ?>
            <table class="table table-striped">
                <tr>
                    <th>Nombre y Apellido</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Dirección</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach( $users as $user )
                {
                    ?>
                    <tr>
                        <td><?php echo $user->usu_nombre ?></td>
                        <td><?php echo $user->usu_usuario ?></td>
                        <td><?php echo $user->usu_password ?></td>
                        <td><?php echo $user->usu_direccion ?></td>
                        <td><?php echo $user->usu_tipo ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo Personas::baseurl() ?>Vista/Administrador/editarAdmin.php?user=<?php echo $user->usu_id ?>"><i class="fa fa-edit fa-fw"></i> Editar</a> 
                            <a class="btn btn-danger" href="<?php echo Personas::baseurl() ?>Controlador/Persona/delete.php?user=<?php echo $user->usu_id ?>"><i class="fa fa-trash-o fa-fw"></i> Borrar</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger" style="margin-top: 100px">Ningun Usuario a sido registrado</div>
            <?php
        }
        ?>
   
            <?php require '../footer.php' ?>

</html>
<?php 
}else{
    header('Location:../login.php');
}
?>