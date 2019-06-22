<?php
session_start();
if (isset($_SESSION['usuario'])) {
    ?>

    <!DOCTYPE html>
    <html lang="es">
        <?php require '../head.php' ?>
        <?php
        require_once "../../Modelo/servicioTecnico.php";
        require_once "../../Modelo/Database.php";
        $db = new Database;
        $tipoEquipo = new ServicioTecnico($db);
        ?>
        <div id="wrapper">

            <?php require 'headerUser.php' ?>
            <script>
                $(document).ready(function(){
           
           $(".check2").click(function(){
               var text ="";
               $(".check2:checked").each(function(){
                   text+=$(this).val()+',';
               });
               text= text.substring(0,text.length-1);
               $("#texto2").val(text);
               var count = $("[type='checkbox']:checked").length;
           }); 
        });
           
                $(function () {
                    $("#titulo").autocomplete({
                        source: '../../Modelo/buscador.php'
                    });
                });
            </script>
            
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ingresar datos de la Orden Local</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <form class="form-inline" method="POST" action="" >

                            <div class="form-group mb-2">
                                <label>Cliente: </label>  
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="titulo" id="titulo" placeholder="Buscar Cliente"  class="form-control" required="">
                                </div>
                                <input type="submit"  name="BuscaTitulo" value="Agregar" class="btn btn-primary">
                            </div><div class="form-group mb-2"  style="float:right">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    + INGRESAR NUEVO CLIENTE
                                </a>
                            </div>
                        </form> 

                        <br><br>
                        <!-- formulario servicio tecnico -->
                        <form action="<?php echo ServicioTecnico::baseurl() ?>Controlador/Ordenes/save_orden_Servicio.php" method="POST" name="submit">
                            <label>ORDEN DE SERVICIO TÉCNICO N°: </label>
                            <div class="form-group" style="width: 20%">
                                   <?php   $query = $db->prepare("SELECT orl_id FROM orden_local ORDER BY orl_id DESC LIMIT 1;");
                                            $query->execute();
                                            $reg = $query->fetchAll(PDO::FETCH_OBJ);
                                            if(!empty($reg)){ 
                                            foreach ($reg as $registro) {
                                               
                                    ?>
                                    <input class="form-control"name="numero" value="000<?php echo $registro->orl_id +1  ?>" type="text" readonly="">

                                            <?php }}else{ ?>
                                    <input class="form-control"name="numero" value="0001" type="text" readonly="">
                                            <?php }?>
                                </div>
                            <input type="hidden" name="id" value="<?php echo $registro->orl_id +1  ?>">
                            <div class="col-lg-6">
                            <div class="form-group">
                                    <label>Fecha de recepción</label>
                                    <?php
                                    date_default_timezone_set('America/Lima');
                                    $hoy = date('d/m/Y'); ?>
                                    <input type="text" name="date" value="<?php echo $hoy; ?>"class="form-control" readonly>

                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha">Fecha de entrega</label>
                                <input class="form-control" name="fecha" placeholder="fecha de entrega" type="date" required>
                            </div>
                            </div>
                            <div class="col-lg-4">
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
                                        <!-- formulario servicio tecnico -->
                                         <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="cliente" value="<?php echo $registros['cli_nombre']; ?> <?php echo $registros['cli_apellido']; ?>"class="form-control" readonly>
                                            <input type="hidden" name="idCliente" value="<?php echo $registros['cli_id']; ?>">
                                        </div>  
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="text" name="correo" value="<?php echo $registros['cli_correo']; ?>"class="form-control" readonly>
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
                                        </div> 

                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" name="celular" value="<?php echo $registros['cli_celular']; ?>"class="form-control" readonly>

                                      
                                </div> 
                                          <?php
                                    }
                                }
                                ?>  
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" name="idTecnico" value="<?php echo $_SESSION['id']; ?>"class="form-control" >
                            </div>  
                            
                            <label>TIPO DE EQUIPO</label>
                            <div class="form-group input-group">
                                <select class="form-control" name="tipo">
                                    <?php
                                                $Equipo = $tipoEquipo->getEquipo();
                                            foreach ($Equipo as $tipo) { ?>
                                    <option value="<?php echo $tipo->equ_nombre ?>"><?php echo $tipo->equ_nombre ?></option>
                                            <?php } ?>
                                    
                                </select>
                                <span class="input-group-addon" style="padding: 0">
                                    <a class="btn btn-danger"  data-toggle="modal" data-target="#equipo">+</a>
                                </span>
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>MARCA</label>
                                    <input class="form-control" name="marca" style='text-transform:uppercase' type="text" required>
                                </div>
                            </div>    
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>MODELO</label>
                                    <input class="form-control" name="modelo" style='text-transform:uppercase' type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>NUMERO DE SERIE</label>
                                    <input name="numero_serie" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>DAÑO REPORTADO</label>
                                <textarea class="form-control" name="defecto" style='text-transform:uppercase' type="text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>ESTADO FISICO DEL EQUIPO</label>
                                <textarea class="form-control" name="diagnostico" style='text-transform:uppercase' type="text" required></textarea>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label>TRABAJO REALIZADO</label>
                                <input class="form-control" name="trabajado" style='text-transform:uppercase' type="text" readonly="">
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label>REPARADO</label>
                                <input class="form-control" name="reparado" style='text-transform:uppercase' type="text" readonly="">
                            </div>
                            </div>
                            <label>ACCESORIOS</label>
                            <div class="form-group">
                                
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="TAPA">TAPA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="CINTA">CINTA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="BASE">BASE
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="PAPELERA">PAPELERA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="PERILLA">PERILLA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="TRACTOR">TRACTOR
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="CABLES">CABLES
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="check2" value="CARTUCHOS">CARTUCHOS
                                            </label>
                            </div>
                            <input type="hidden" name="accesorio" id="texto2">
                            <label>DESCRIPCIÓN DE LAS PARTES INTERNAS DEL EQUIPO INGRESADO</label>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>MARCA</th>
                                            <th>CAPACIDAD</th>
                                            <th>SERIE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ADAPTADOR</td>
                                            <td><input type="text" name="marcaAda" class="form-control"></td>
                                            <td><input type="text" name="capaAda"  class="form-control"></td>
                                            <td><input type="text" name="serieAda"  class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>BATERIA</td>
                                            <td><input type="text" name="marcaBat"  class="form-control"></td>
                                            <td><input type="text" name="capaBat"  class="form-control"></td>
                                            <td><input type="text" name="serieBat"  class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>DISCO DURO</td>
                                            <td><input type="text" name="marcaDisco"  class="form-control"></td>
                                            <td><input type="text" name="capaDisco" class="form-control"></td>
                                            <td><input type="text" name="serieDisco" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>MEMORIA</td>
                                            <td><input type="text" name="marcaMem" class="form-control"></td>
                                            <td><input type="text" name="capaMem" class="form-control"></td>
                                            <td><input type="text" name="serieMem" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                         
                            <div class="form-group">
                                <label>OTROS</label>
                                <input class="form-control" name="articulo" style='text-transform:uppercase' type="text" required/>
                            </div>
                            <div class="form-group">
                                <label>REPUESTOS UTILIZADOR</label>
                                <input class="form-control" name="repuestos" style='text-transform:uppercase' type="text" readonly=""/>
                            </div>
                           
                            <div class="form-group">
                                <label>SOFTWARE A INSTALAR</label>
                                <input type="text" name="software" value="PACK" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>CUBIERTO POR GARANTIA ?</label>
                                <label class="radio-inline">
                                    <input type="radio" onclick="disable()" name="garantia" value="si" id="optionsRadiosInline1"  >SI
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" onclick="enable()" name="garantia" value="no" id="optionsRadiosInline2" checked="">NO
                                </label>

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
                            <div class="form-group">
                                <label>OBSERVACIONES</label>
                                <input class="form-control" name="observacion" style='text-transform:uppercase' type="text" required>
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
                                        <form action="../Controlador/Persona/ave_clientes.php" method="POST" name="submit">
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
                                    <label>DIRECCI�N</label>
                                    <input class="form-control" name="direccion" type="text" style='text-transform:uppercase' required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>TELEFONO</label>
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
                        <div class="modal fade" id="equipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">INGRESAR TIPO DE EQUIPO</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- formulario nuevo equipo -->
                                        <form action="<?php echo ServicioTecnico::baseurl() ?>Controlador/Ordenes/save_equipo.php" method="POST" onsubmit="return formSubmit()" name="submit">
                                            <fieldset>    
                                                <div class="form-group">
                                                    <label>Ingrese nuevo equipo</label>
                                                    <input class="form-control" name="equipo" type="text" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
                                                </div>
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
                    } else {
                        header('Location:../login.php');
                    }
                    ?>