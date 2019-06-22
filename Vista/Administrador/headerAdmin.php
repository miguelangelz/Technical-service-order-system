<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="admin.php">Sistema de Servicio Técnico</a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                        
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-cogs fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <?php require '../../Modelo/Personas.php';
                                         require_once "../../Modelo/servicioTecnico.php";                

                                    ?>
                                    <a href="<?php echo Personas::baseurl() ?>Vista/Administrador/listaUsuarios.php">
                                        <div>
                                            <i class="fa fa-user-md fa-fw"></i> Listado de Usuarios
                                            <span class="pull-right text-muted small">(eliminar y editar)</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo Personas::baseurl() ?>Vista/Administrador/listaClientes.php">
                                        <div>
                                            <i class="fa fa-user fa-fw"></i> Listado de Clientes
                                            <span class="pull-right text-muted small">(eliminar y editar)</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo Personas::baseurl() ?>Vista/Administrador/listaOrdenLocal.php">
                                    <div>
                                        <i class="fa fa-cog fa-fw"></i> Listado de Ordenes Locales
                                    <span class="pull-right text-muted small">(Actualizar)</span>
                                    </div>
                                </a>
                            </li>
                               
                            </ul>
                            <!-- /.dropdown-alerts -->
                        </li>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                               <?php echo $_SESSION['admin'] ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                
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
                                    <a href="agregarCliente.php"><i class="fa fa-user-plus fa-fw"></i> Ingresar Cliente</a>
                                </li>
                                <li>
                                    <a href="agregarUsuario.php"><i class="fa fa-user-plus fa-fw"></i> Ingresar Usuarios</a>
                                    
                                </li>

                              
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
<div id="page-wrapper" style="margin-top: 0px">