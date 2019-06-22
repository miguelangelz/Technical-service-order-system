<?php 
session_start();
if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html lang="es">

<?php require '../head.php' ?>
    <div id="wrapper">
       <?php require 'headerUser.php' ?>
        
        <script src="../js/buscarOrdenesGarantia.js"></script>
        <div class="row">
                    <div class="col-lg-11">
                        <h1 class="page-header text-center">Buscar Ordenes de Garantia</h1>
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
                    <th>Cliente</th>
                    <th>Lugar de Recepción</th>
                    <th>Fecha de Ingreso</th>
                    <th>Numero de Factura</th>
                    <th>Acción</th> 
                </tr>
                </thead>
                <tbody id="resultado">
                    
                </tbody>
            </table>
            
                <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>