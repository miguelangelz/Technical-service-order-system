<?php 
session_start();
if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php' ?>

    <div id="wrapper">
        <?php require 'headerUser.php' ?>
        
            <script src="../js/buscarU.js"></script>
        <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Lista de Clientes</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-lg-11">
        <div class="form-group">
           <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" name="search_text" id="search_text" placeholder="Buscar por cualquier campo" class="form-control" />
           </div>
         </div>
            <table class="table table-striped" id="main">
                <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="result"></tbody>
                    
                   
            </table>
         
           
   
         <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>