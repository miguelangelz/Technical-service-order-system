<?php
session_start();
if (isset($_SESSION['usuario'])) {
    ?>

    <!DOCTYPE html>
    <html lang="es">
        <?php require '../head.php' ?>
        
        <div id="wrapper">

            <?php require 'headerUser.php' ?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ingresar datos del Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">

                    <!-- inicio formulario clientes -->
                    <form action="<?php echo Personas::baseurl() ?>Controlador/Persona/save_clientes.php" method="POST" name="submit">
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
                                    <input class="form-control" name="correo" type="email" value="Sinem@il" placeholder="ejemplo : example@hotmail.com">
                                </div>
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Ingresar Cliente">
                        </fieldset>
                    </form>
                    <!--fin  formulario cliente -->
                    <?php require '../footer.php' ?>
                    </html>
                    <?php
                } else {
                    header('Location:../login.php');
                }
                ?>