<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Panel usuario -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/Rosem.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION["nombre"];?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENÚ PRINCIPAL</li>
                        <li class="active treeview">
                            <a href=<?php echo "verNomina.php?id=".$_GET['id_emp']."&nombre=".$_GET['nombre']; ?>>
                                <i class="fa fa-dashboard"></i> <span>Volver a las labores</span>
                            </a>                            
                        </li>
                        <li class="treeview">
                            <a href="pick-trabajador.php">
                                <i class="fa fa-dashboard"></i> <span>Registrar nómina</span>
                            </a>                            
                        </li>
                        <li class="treeview">
                            <a href="#About us">
                                <i class="fa fa-files-o"></i>
                                <span>Administrar mina</span>                                
                            </a>                            
                        </li>
                        <li class="treeview">
                            <a href="#About us">
                                <i class="fa fa-files-o"></i>
                                <span>Solicitar Abrir sistema</span>                                
                            </a>                            
                        </li>
                        <li class="treeview">
                            <a href="pick-mina.php">
                                <i class="fa fa-files-o"></i>
                                <span>Cambiar de mina</span>                                
                            </a>                            
                        </li>
                        <li class="treeview">
                            <a href="cerrarS.php">
                                <i class="fa fa-times"></i> <span>Cerrar Sesion</span>
                            </a>                            
                        </li>                      
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
