<?php 
session_start();
if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
        <?php require '../head.php';

        ?>
        <?php
        require_once "../../Modelo/servicioTecnico.php";
        require_once "../../Modelo/Database.php";
        $db = new Database;
            ?>
        <div id="wrapper">

            <?php require 'headerUser.php' ?>
            <script>
       
                $(function () {
                    $("#titulo").autocomplete({
                        source: '../../Modelo/buscador.php'
                    });
                });
            </script>
            
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ingresar datos de la Orden a Domicilio</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <form class="form-inline" method="POST" action="" >

                            <div class="form-group mb-2">
                                <label>Cliente: </label>  
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" name="titulo" id="titulo" placeholder="Buscar Cliente"  class="form-control" >
                            </div>
                                <input type="submit"  name="BuscaTitulo" value="Agregar" onclick="mostrar();" class="btn btn-primary">
                            </div><div class="form-group mb-2"  style="float:right">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                + INGRESAR NUEVO CLIENTE
                            </a>
                        </div>
                        </form> 
                        
                        <br><br>
                        <!-- formulario servicio tecnico -->
                        <form action="<?php echo ServicioTecnico::baseurl() ?>Controlador/Ordenes/save_orden_Domicilio.php" method="POST" name="submit">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Numero</label>
                                    <?php   $query = $db->prepare("SELECT ord_id FROM orden_domicilio ORDER BY ord_id DESC LIMIT 1;");
                                            $query->execute();
                                            $reg = $query->fetchAll(PDO::FETCH_OBJ);
                                            if(!empty($reg)){ 
                                            foreach ($reg as $registro) {
                                               
                                    ?>
                                    <input class="form-control"name="numero" value="000<?php echo $registro->ord_id +1 ?>" type="text" readonly="">

                                            <?php }}else{ ?>
                                    <input class="form-control"name="numero" value="0001" type="text" readonly="">
                                            <?php }?>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $registro->ord_id +1  ?>">
                                <?php
                                $BuscaTitulo = filter_input(INPUT_POST, 'BuscaTitulo', FILTER_SANITIZE_STRING);
                                if ($BuscaTitulo) {

                                    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
                                    $apelli = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);

                                    //SQL para selecionar los registros
                                    $resultado_titulo = "SELECT * FROM clientes WHERE cli_nombre LIKE '%" . $titulo . "%' OR cli_apellido LIKE '%" . $apelli . "%' ORDER BY cli_nombre ASC LIMIT 7";
                                    $resultado_contenido = $db->prepare($resultado_titulo);
                                    $resultado_contenido->execute();

                                    while ($registros = $resultado_contenido->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                       
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="cliente" value="<?php echo $registros['cli_nombre']; ?> <?php echo $registros['cli_apellido']; ?>"class="form-control" readonly>
                                                    <input type="hidden" name="idCliente" value="<?php echo $registros['cli_id']; ?>">
                                </div>         
                            </div>                      
                            <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Dirección</label>               
                                                        <input type="text" name="direccion" value="<?php echo $registros['cli_direccion']; ?>"class="form-control" readonly>                
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Teléfono</label>

                                                        <input type="text" name="telefono" value="<?php echo $registros['cli_telefono']; ?>"class="form-control" readonly>

                                                    </div> 
                                                </div>
                            <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Cédula</label>

                                                        <input type="text" name="cedula" value="<?php echo $registros['cli_cedula']; ?>"class="form-control" readonly>
                                                        <input type="hidden" name="correo" value="<?php echo $registros['cli_correo']; ?>">
                                                    </div> 

                                                <?php }
                                            }
                                            ?>  
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <?php
                                                date_default_timezone_set('America/Lima');
                                                $hoy = date('d/m/Y'); ?>
                                                <input type="text" name="date" value="<?php echo $hoy; ?>"class="form-control" readonly>
                                                
                                            </div> 
                                        </div>
                                            <input type="hidden" name="idTecnico" value="<?php echo $_SESSION['id']; ?>"class="form-control" >
                                            
                                        <div class="form-group">
                                            <label for="tecnico">TÉCNICO ENCARGADO</label>
                                            <select class="form-control" name="tecnico">
                                                <?php
                                                $usr = $db->prepare("SELECT usu_nombre FROM users WHERE usu_tipo = 'TECNICO'");
                                                $usr->execute();
                                                $usuario = $usr->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($usuario as $registro) { ?>
                                                <option value="<?php echo $registro->usu_nombre ?>"><?php echo $registro->usu_nombre ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>DAÑO REPORTADO</label>
                                            <textarea class="form-control" name="defecto" placeholder="DEFECTO DEL EQUIPO" type="text" required></textarea>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="SUBTOTAL"  onKeyPress="return filterFloat(event,this);" onkeyup="calculo();">
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control"  name="iva" placeholder="IVA :12 %" readonly>
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" name="total" placeholder="TOTAL" readonly>
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                        <input type="submit" name="submit" class="btn btn-success" value="Ingresar">
                                        </form>
                                        <br><br>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">INGRESAR NUEVO CLIENTE</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                
                  <!-- formulario servicio tecnico -->
                  <form action="../Controlador/save_clientes.php" method="POST" name="submit">
                            <fieldset>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CÉDULA</label>
                                    <input class="form-control" name="cedula" type="text" maxlength="10" placeholder="ejemplo : 0106528547" onKeyPress="return filterFloat(event,this);" autofocus required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>NOMBRE</label>
                                    <input class="form-control" name="nombre" type="text" style='text-transform:uppercase' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>APELLIDO</label>
                                    <input class="form-control" name="apellido" type="text" style='text-transform:uppercase' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>DIRECCIÓN</label>
                                    <input class="form-control" name="direccion" type="text" style='text-transform:uppercase' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>TELÉFONO</label>
                                    <input class="form-control" name="telefono" maxlength="7" placeholder="ejemplo : 2485652" type="text" maxlength="10" onKeyPress="return filterFloat(event,this);" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>EMPRESA</label>
                                    <input class="form-control" name="empresa" value="Sin Empresa" type="text" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>CELULAR</label>
                                    <input class="form-control" name="celular" maxlength="10" value="Sin Celular" placeholder="ejemplo : 0979854521" type="text" onKeyPress="return filterFloat(event,this);">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>CORREO</label>
                                    <input class="form-control" name="correo" type="email" value="Sin Correo" placeholder="ejemplo : example@hotmail.com">
                                </div>
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Ingresar Cliente">
                        </fieldset>
                        </form>
                     <!--fin  formulario cliente -->

                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                                 <?php require '../footer.php' ?>

</html>
<?php 
}else{
    header('Location:../login.php');
}
?>