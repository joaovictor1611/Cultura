<?php require_once '../db_connect.php'; ?>
<?php
session_start();
error_reporting(0);
if (!isset($_SESSION[nomeUser1])) {
    echo "<script> window.location.href=\"../index.php\" </script>";
}
unset($_SESSION[emailUser1]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PROCULT</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="../assets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/daterangepicker.js"></script>

        <script type="text/javascript" src="../assets/js/core/app.js"></script>
        <script type="text/javascript" src="../assets/js/pages/dashboard.js"></script>
        <!-- /theme JS files -->

    </head>

    <body>

        <!-- /main sidebar -->
        <div class="page-container login-container"> 
            <div class="page-content">


                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Content area -->
                    <div class="content">    


                        <form id="formulario" name="formulario" role="form" method="post">

                            <div class="panel panel-body login-form">
                                <h3><?php echo $_SESSION['nomeUser1']; ?></h3>
                                <p class="text-muted">
                                    Insira a senha para acessar.
                                </p>
                                <?php
                                if (isset($_POST[env])) {

                                    $usuario = $_POST['email'];
                                    $senha = $_POST['senha'];

                                    $queryvalidar = "select * from tb_usuario where idtb_usuario = $_SESSION[id1] and senha_usuario='$senha'";
                                    $result = mysqli_query($mysqli, $queryvalidar);
                                    $linha = $result->fetch_array(MYSQLI_ASSOC);
                                    if ($result->num_rows == 0) {
                                        echo "<meta charset=utf-8>
        <div class='alert alert-danger alert-dismissable'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Senha inválida.
        </div>";
                                    } else {
                                        $id_user = $linha['idtb_usuario'];
                                        $email_usuario = $linha['email_usuario'];
                                        $nome_usuario = $linha['nome_usuario'];
                                        $img_usuario = $linha['img_usuario'];


                                        $_SESSION['id1'] = $id_user;
                                        $_SESSION['emailUser1'] = $email_usuario;
                                        $_SESSION['nomeUser1'] = $nome_usuario;
                                        $_SESSION['imgUser1'] = $img_usuario;
                                        $_SESSION["ultimoAcesso1"] = date("Y-n-j H:i:s");
                                        echo "<script>window.location =\"index.php\"</script>";
                                    }
                                }
                                ?>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" name="senha" placeholder="Senha">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left ">




                                </div>

                                <div class="form-group">
                                    <button type="submit" name="env" class="style btn btn-primary btn-block">Entrar<i class="icon-circle-right2 position-right"></i></button>
                                </div>


                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content-wrapper">







                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                </div>
                <!-- /footer -->



            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
