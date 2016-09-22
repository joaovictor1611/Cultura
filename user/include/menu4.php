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
                    <span><?php echo $_SESSION['nomeUser1']; ?></span>
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
                            <li class=""><a href="index.php"><i class="icon-mailbox"></i> <span>Processos recebidos</span></a></li>
                            <li class=""><a href="enviar_processo.php"><i class="icon-envelop2"></i> <span>Entrada de processo</span></a></li>
                            <li class=""><a href="meus_processos.php"><i class="icon-drawer"></i> <span>Meus processos</span></a></li>
                            <legend class="text-bold"></legend>
                            <li class=""><a class="has-ul" href="#"><i class=" icon-user"></i> <span>Interessado</span></a>
                                <ul class="hidden-ul">
                                    <li class="active"><a href="interessado.php">Cadastro</span></a></li>
                                    <li class=""><a href="man_interessado.php">Manutenção</span></a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->