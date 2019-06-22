<?php 
if(!isset($_SESSION)){
    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php' ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="cliente.php">Sistema de Servicio Técnico</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="../../Controlador/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                                <a href="cliente.php"><i class="fa fa-map-marker fa-fw"></i> Locales</a>
                            </li>
                            <li>
                                <a href="clienteDomicilio.php"><i class="fa fa-home fa-fw"></i> A domicilio</a>
                            </li>

                    </ ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div> 
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
        
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">
                  Ordenes de servicio técnico de <?php echo $_SESSION['cliente']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
            
               
<div class="container">
    <div class="col-lg-12">
            
            <table class="table table-striped">
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Fecha de Ingreso</th>
                    <th>Técnico</th>
                    <th>Acciones</th>
                </tr>
                <?php    require ('../../Modelo/Database.php');
                $id = $_SESSION['id'];
                $link = new Database; 
                $query = $link->query("SELECT * FROM orden_domicilio OD INNER JOIN users U ON OD.usu_id = U.usu_id WHERE cli_id = $id");
                    foreach ($query as $row){ 
                        
            ?>
        
                    <tr>
                        <td><?php echo $row['ord_numero'] ?></td>
                        <td><?php echo $row['ord_cliente'] ?></td>
                        <td><?php echo $row['ord_fecha'] ?></td>
                        <td><?php echo $row['usu_nombre'] ?></td>
                        <td>
                            <input type="button" class="btn btn-primary view_data" name="view" id="<?php echo $row['ord_id']; ?>" data-toggle="modal" data-target="#myModal" value="VER DETALLES">
                            <a href="../Reportes/pdfOrdenDomicilio.php?orden=<?php echo $row['ord_id'] ?>" class="btn btn-success" target="blank"><i class="fa fa-file-pdf-o"></i> Descargar PDF</a>
                        </td>
                            
                    </tr>
            <?php } ?>
            </table>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $row['ord_cliente'] ?></h4>
                                        </div>
                                        <div class="modal-body" id="employee_detail">
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
        </div>
        <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var orden_id = $(this).attr("id");  
           $.ajax({  
                url:"modalDomicilio.php",  
                method:"post",  
                data:{orden_id:orden_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#myModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
 <?php require '../footer.php' ?>
</html>
<?php 
} else{
    header("location:login_cliente.php");
}

