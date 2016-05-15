
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
                        <li class="header">MENU PRINCIPAL</li>
                        <li class=<?php echo $nomina." treeview"; ?> >
                            <a href="pick-trabajador.php">
                                <i class="fa fa-dashboard"></i> <span>Nomina</span>
                            </a>                            
                        </li>

                        <li class="treeview">
                            <a href="pick-mina.php">
                                <i class="fa fa-files-o"></i>
                                <span>Cambiar de mina</span>                                
                            </a>                            
                        </li>
                        <li class="treeview">
                            <a href="cambiarContrasena.php">
                                <i class="fa fa-pencil"></i> <span>Cambiar Contraseña</span>
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
