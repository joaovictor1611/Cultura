<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><p>PROCULT</p></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>


        </ul>



        <ul class="nav navbar-nav navbar-right">





            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/placeholder.jpg" alt="">
                    <span><?php echo $_SESSION['nomeUser']; ?></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
             
                    <li><a href="bloqueio-tela.php"><i class="icon-user-lock"></i>Bloqueio de Tela</a></li>
                    <li><a href="dao/logout.php"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">




                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->

                            <li class=""><a class="has-ul" href="#"><i class=" icon-user"></i> <span>Cadastros</span></a>
                                <ul class="hidden-ul">
                                    <li class=""><a href="index.php">Usuário</a></li>

                                </ul>
                            </li>
                            <li class=""><a class="has-ul" href="#"><i class="icon-wrench"></i> <span>Manutenção</span></a>
                                <ul class="hidden-ul">
                                    <li class="active"><a href="man_usu.php">Usuário</a></li>

                                </ul>
                            </li>
                            <li class="">
                                <a class="" href="processos_encerrados.php"><i class="icon-wrench"></i> <span>Processos encerrados</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->