<?php include 'db_connect.php'; ?>
<?php
session_start();
if (isset($_SESSION[nomeUser])) {

    unset($_SESSION['id']);
    unset($_SESSION['emailUser']);
    unset($_SESSION['nomeUser']);
    unset($_SESSION['imgUser']);

    session_destroy();

    echo "<script> window.location.href=\"index.php\" </script>";
}
if (isset($_SESSION[nomeUser1])) {

    unset($_SESSION['id1']);
    unset($_SESSION['emailUser1']);
    unset($_SESSION['nomeUser1']);
    unset($_SESSION['imgUser1']);

    session_destroy();

    echo "<script> window.location.href=\"index.php\" </script>";
}
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
        <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

        <script type="text/javascript" src="assets/js/core/app.js"></script>
        <script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
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
                            <?php
                            if (isset($_POST[env])) {

                                $usuario = $_POST['email'];
                                $senha = $_POST['senha'];
                                $lembrar = $_POST['lembrar'];

                                $queryvalidar = "select * from tb_usuario where email_usuario='$usuario' and senha_usuario='$senha' and status_usuario='1'";
                                $result = mysqli_query($mysqli, $queryvalidar);
                                $linha = $result->fetch_array(MYSQLI_ASSOC);
                                if ($result->num_rows > 0) {
                                    $id_user = $linha['idtb_usuario'];
                                    $email_usuario = $linha['email_usuario'];
                                    $nome_usuario = $linha['nome_usuario'];
                                    $tipo_usuario = $linha['tipo_usuario'];
                                    $img_usuario = $linha['img_usuario'];
                                    $orgao_usuario = $linha['orgao_usuario'];

                                    session_start();


                                    if ($tipo_usuario == 'ADM') {
                                        if ($lembrar == 's') {
                                            setcookie('usuario', $email_usuario, time() + 1200, "/");
                                            setcookie('id', $id_user, time() + 1200, "/");
                                            setcookie('nome', $nome_usuario, time() + 1200, "/");
                                            setcookie('img', $img_usuario, time() + 1200, "/");
                                        }
                                        //inicia sessao
                                        $_SESSION['id'] = $id_user;
                                        $_SESSION['emailUser'] = $email_usuario;
                                        $_SESSION['nomeUser'] = $nome_usuario;
                                        $_SESSION['imgUser'] = $img_usuario;
                                        //defino a sessão que demonstra que o usuário está autorizado
                                        $_SESSION["ultimoAcesso"] = date("Y-n-j H:i:s");

                                        //redireciona para a pagina 
                                        echo "<script>window.location = \"adm/index.php\"</script>";
                                    }
                                    if ($tipo_usuario == 'USER') {
                                        if ($lembrar == 's') {
                                            setcookie('usuario1', $email_usuario, time() + 1200, "/");
                                            setcookie('id1', $id_user, time() + 1200, "/");
                                            setcookie('nome1', $nome_usuario, time() + 1200, "/");
                                            setcookie('img1', $img_usuario, time() + 1200, "/");
                                        }
                                        //inicia sessao
                                        $_SESSION['id1'] = $id_user;
                                        $_SESSION['emailUser1'] = $email_usuario;
                                        $_SESSION['nomeUser1'] = $nome_usuario;
                                        $_SESSION['imgUser1'] = $img_usuario;
                                        //defino a sessão que demonstra que o usuário está autorizado
                                        $_SESSION["ultimoAcesso1"] = date("Y-n-j H:i:s");
                                        //redireciona para a pagina 
                                        echo "<script>window.location = \"user/index.php\"</script>";
                                    }
                                }
                            }
                            ?>

                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class=""><i class=""></i>
                                        <img src="fotos/horizonte.jpg"/>
                                    </div>
                                    <h5 class="content-group">Login<small class="display-block">PROCULT</small></h5>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" name="email" placeholder="Usuário">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left ">
                                    
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox-signup" type="checkbox" name="lembrar" value="s">
                                            <label for="checkbox-signup">
                                                Mantenha-me conectado
                                            </label>
                                        </div>

                                    
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" name="env" class="style btn btn-primary btn-block">Entrar<i class="icon-circle-right2 position-right"></i></button>
                                </div>

                                <div class="text-center">
                                    <a href="#">Esqueceu a senha?</a>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content-wrapper">







                <!-- Footer -->
                <div  class="footer text-muted">
                    
                </div>
                <!-- /footer -->



            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
