
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php">Sistema de Servicio Técnico</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-search fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                         
                            <li>
                                <a href="buscarOrdenes.php">
                                    <div>
                                        <i class="fa fa-file-o fa-fw"></i> Buscar ordenes locales
                                    <span class="pull-right text-muted small">(Imprimir)</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="buscarOrdenesGarantia.php">
                                    <div>
                                        <i class="fa fa-file-o fa-fw"></i> Buscar ordenes de garantia
                                    <span class="pull-right text-muted small">(Imprimir)</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="buscarOrdenesDomicilio.php">
                                    <div>
                                        <i class="fa fa-file-o fa-fw"></i> Buscar ordenes a domicilio
                                    <span class="pull-right text-muted small">(Imprimir)</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="listaClientesU.php">
                                    <div>
                                        <i class="fa fa-user fa-fw"></i> Listado de clientes
                                    <span class="pull-right text-muted small">(eliminar y editar)</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="listaOrdenLocalU.php?orden=<?php echo $_SESSION['id'] ?>">
                                    <div>
                                        <i class="fa fa-cog fa-fw"></i> Listado de Ordenes Locales
                                    <span class="pull-right text-muted small">(Actualizar)</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="listaOrdenDomicilio.php?orden=<?php echo $_SESSION['id'] ?>">
                                    <div>
                                        <i class="fa fa-cog fa-fw"></i> Listado de Ordenes a Domicilio
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
                       <?php echo $_SESSION['usuario'] ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                     <ul class="dropdown-menu dropdown-user">
                                <?php
                                require '../../Modelo/Personas.php';
                                
                                ?>

                         <li><a href="<?php echo Personas::baseurl() ?>Vista/Tecnico/editarUsuario.php?user=<?php echo $_SESSION['id'] ?>"><i class="fa fa-gear fa-fw"></i> Editar Perfil</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../../Controlador/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>

                                </li>
                            </ul>
                    <!-- /.dropdown-orden -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                                <a href="clientes.php"><i class="fa fa-user-plus fa-fw"></i> Ingresar Cliente</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>Ingresar Orden<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="servicio-local.php"><i class="fa fa-map-marker fa-fw"></i> Local</a>
                                    </li>
                                    <li>
                                        <a href="servicio-domicilio.php"><i class="fa fa-home fa-fw"></i> A Domicilio</a>
                                    </li>
                                    <li>
                                        <a href="servicio-garantia.php"><i class="fa fa-check-square-o fa-fw"></i> De Garantia</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="equipo.php"><i class="fa fa-desktop fa-fw"></i> Ingresar Equipo</a>
                            </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div> 
            <!-- /.navbar-static-side -->
        </nav>
<div id="page-wrapper" style="margin-top: 20px">