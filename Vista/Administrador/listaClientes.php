<?php 
//header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
if(isset($_SESSION['admin'])){
?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php' ?>

    <div id="wrapper">
        <?php require './headerAdmin.php' ?>
        
         <script src="../js/buscar.js"></script>
        <h2 class="text-center text-primary">Lista de Clientes</h2>
        <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
        </div>
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