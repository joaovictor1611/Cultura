<?php
include_once 'teu banco';
?>
<?php 

session_start();
if (isset($_SESSION[nomeUser])) {

    unset($_SESSION['id']);
    unset($_SESSION['nivelUser']);
    
  
    session_destroy();

    echo "<script> window.location.href=\"index.php\" </script>";
}
if (isset($_SESSION[nomeUser1])) {

    unset($_SESSION['id1']);
    unset($_SESSION['nivelUser1']);
  
   

    session_destroy();

    echo "<script> window.location.href=\"index.php\" </script>";
}

if (isset($_SESSION[nomeUser2])) {

    unset($_SESSION['id2']);
    unset($_SESSION['nivelUser2']);
    

    session_destroy();

    echo "<script> window.location.href=\"index.php\" </script>";
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login </title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="assets/libs/prettify/github.css" rel="stylesheet" />

        <!-- Extra CSS Libraries Start -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Extra CSS Libraries End -->
        <link href="assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />
    </head>
    <body class="fixed-left ">
        <!-- Modal Start -->
       
            <!-- Modal End -->		
        <!-- Begin page -->
        <div class="container animated fadeInDownBig" id="erro">

            <div class="full-content-center">
                <p class="text-center"></p>

                <?php
                $mensagem = $_GET['incorrect'];
                if ($mensagem == true) {
                    echo '<div class="alert alert-danger" > 
                                <a class="close" data-dismiss="alert" href="#">x
                                </a>
                                <h2 class="element-invisible" style="color:red"> Aviso!</h2>
                                <h3>Senha ou tipo de conta incorreta!</h3>
                                    
                               </div>';
                }
                ?>
                <div class="login-wrap">
                    <div class="login-block">
                        <center><img src="images/logo.png" width="300px" height="130px"></center>
                        <form role="form"  method="POST" action="" >
                            <?php
                            $erro='<div class="alert alert-blok alert-danger"> 
                                <a class="close" data-dismiss="alert" href="#">
                                </a>
                                <h4 class="element-invisible"> Aviso!</h4>
                                <div>Conta desativada ou usuário não encontrado.</div>
                                    
                               </div>';
                            if (isset($_POST[env])) {

                                $usuario = $_POST['nivel'];
                                $senha = $_POST['senha'];
                                

                                $queryvalidar = "SELECT * FROM tadm WHERE  senha='$senha' AND nivel='0'";
                                $result = mysqli_query($mysqli, $queryvalidar);
                                $linha = $result->fetch_array(MYSQLI_ASSOC);
                                if ($result->num_rows > 0) {
                                    $id_user = $linha['idadm'];
                                    
                                    $nivel_usuario = $linha['nivel'];
                                    

                                    session_start();


                                    if ($nivel_usuario == '2') {
                                        
                                          setcookie('usuario', $nivel_usuario, time() + 1200, "/");
                                          setcookie('id', $id_user, time() + 1200, "/");
                                            
                                        
                                        //inicia sessao
                                        $_SESSION['id'] = $id_user;
                                       
                                        $_SESSION['nivelUser'] = $nivel_usuario;
                                        
                                        //defino a sessão que demonstra que o usuário está autorizado
                                        $_SESSION["ultimoAcesso"] = date("Y-n-j H:i:s");

                                        //redireciona para a pagina 
                                        echo "<script> window.location=\"../home.php\"</script>";
                                        } else {
                                           echo "<script> window.location=\"../index.php?incorrect=true&#erro\"</script>";
                                        }

                                    if ($nivel_usuario == '1') {
                                        
                                        setcookie('usuario1', $nivel_usuario, time() + 1200, "/");
                                          setcookie('id1', $id_user, time() + 1200, "/");
                                        
                                        //inicia sessao
                                        $_SESSION['id1'] = $id_user;
                                       
                                        $_SESSION['nivelUser1'] = $nivel_usuario;
                                        
                                        //defino a sessão que demonstra que o usuário está autorizado
                                        $_SESSION["ultimoAcesso1"] = date("Y-n-j H:i:s");

                                        //redireciona para a pagina 
                                        echo "<script> window.location=\"../../usuario_chorozinho/home.php\"</script>";
                                        } else {
                                            echo "<script> window.location=\"../index.php?incorrect=true&#erro\"</script>";
                                        }

                                        
                                     if ($nivel_usuario == '0') {
                                        
                                         setcookie('usuario2', $nivel_usuario, time() + 1200, "/");
                                          setcookie('id2', $id_user, time() + 1200, "/");
                                        //inicia sessao
                                        $_SESSION['id2'] = $id_user;
                                       
                                        $_SESSION['nivelUser2'] = $nivel_usuario;
                                        
                                        //defino a sessão que demonstra que o usuário está autorizado
                                        $_SESSION["ultimoAcesso2"] = date("Y-n-j H:i:s");

                                        //redireciona para a pagina 
                                        echo "<script> window.location=\"../../usuario_pacajus/home.php\"</script>";
                                        } else {
                                            echo "<script> window.location=\"../index.php?incorrect=true&#erro\"</script>";
                                        }   
                                }
                            }
                            ?>

                            <div class="form-group login-input">
                                <select class="form-control " name="nivel" style=" font-family: 'Open Sans'; font-weight: 300;  color: #505458; text-align: center">
                                    <option value="0" style=" font-family: 'Open Sans'; font-weight: 300;  color: #505458; text-align: center">Dra. Cintia Odontologia-Pacajus</option>
                                    <option value="1" style=" font-family: 'Open Sans'; font-weight: 300;  color: #505458; text-align: center">Dra. Cintia Odontologia-Chorozinho</option>
                                    <option value="2" style=" font-family: 'Open Sans'; font-weight: 300;  color: #505458; text-align: center">Administrador</option>
                                </select>
                            </div>
                            <div class="form-group login-input">
                                <i class="fa fa-key overlay"></i>
                                <input type="password" class="form-control text-input" name="senha" >
                                <input type="submit" class="btn btn-success btn-block" placeholder="Entrar">
                                <a href="login_help.php" style=" color: #01a79c" > Esqueci a senha</a>

                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- the overlay modal element -->
        <div class="md-overlay"></div>
        <!-- End of eoverlay modal -->
        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/libs/jquery-detectmobile/detect.js"></script>
        <script src="assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
        <script src="assets/libs/ios7-switch/ios7.switch.js"></script>
        <script src="assets/libs/fastclick/fastclick.js"></script>
        <script src="assets/libs/jquery-blockui/jquery.blockUI.js"></script>
        <script src="assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
        <script src="assets/libs/nifty-modal/js/classie.js"></script>
        <script src="assets/libs/nifty-modal/js/modalEffects.js"></script>
        <script src="assets/libs/sortable/sortable.min.js"></script>
        <script src="assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
        <script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="assets/libs/bootstrap-select2/select2.min.js"></script>
        <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
        <script src="assets/libs/pace/pace.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/libs/jquery-icheck/icheck.min.js"></script>

        <!-- Demo Specific JS Libraries -->
        <script src="assets/libs/prettify/prettify.js"></script>

        <script src="assets/js/init.js"></script>
        <!-- Page Specific JS Libraries -->
        <script src="assets/js/pages/lockscreen.js"></script>
    </body>
</html>