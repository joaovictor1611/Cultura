<?php require_once '../db_connect.php'; ?>
<?php
session_start();
if (isset($_COOKIE['usuario'])) {

    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['emailUser'] = $_COOKIE['usuario'];
    $_SESSION['nomeUser'] = $_COOKIE['nome'];
} else {
    if (!isset($_SESSION[nomeUser])) {
        echo "<script> window.location.href=\"../index.php\" </script>";
    }
    if (!isset($_SESSION[emailUser])) {
        echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
    } else {
        //senão, calculamos o tempo transcorrido
        $dataSalva = $_SESSION["ultimoAcesso"];
        $agora = date("Y-n-j H:i:s");
        $tempo_transcorrido = (strtotime($agora) - strtotime($dataSalva));

        if ($tempo_transcorrido >= 1200) {
            //se passaram 10 minutos ou mais
            echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, digite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
            //senão, atualizo a data da sessão
        } else {
            $_SESSION["ultimoAcesso"] = $agora;
        }
    }
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
        <script type="text/javascript" src="../assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>
        <script type="text/javascript" src="../assets/js/core/libraries/jquery_ui/effects.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/notifications/jgrowl.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/anytime.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/pickadate/picker.time.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/pickadate/legacy.js"></script>


        <script type="text/javascript" src="../assets/js/core/app.js"></script>
        <script type="text/javascript" src="../assets/js/pages/dashboard.js"></script>
        <script type="text/javascript" src="../assets/js/pages/picker_date.js"></script>
        <script type="text/javascript" src="../assets/js/pages/wizard_form.js"></script>

        <script type="text/javascript" src="../assets/js/core/libraries/jquery_ui/core.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/wizards/form_wizard/form.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/wizards/form_wizard/form_wizard.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="../assets/js/core/libraries/jasny_bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/validation/validate.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/notifications/sweet_alert.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

        <script type="text/javascript" src="../assets/js/core/app.js"></script>
        <script type="text/javascript" src="../assets/js/pages/wizard_form.js"></script>
        <script type="text/javascript" src="../assets/js/pages/components_page_header.js"></script>


        <!-- /theme JS files -->
        <script>
            .switch {
            position: absolute;
            margin - left: - 9999px;
            visibility: hidden;
            }
            .switch1 {
            position: absolute;
            margin - left: - 9999px;
            visibility: hidden;
            }

            .switch + label {
            display: block;
            position: relative;
            cursor: pointer;
            outline: none;
            user - select: none;
            }

        </script>
    </head>

    <body>

<?php include 'include/menu_adm3.php'; ?>


        <div class="page-container">	

            <div class="page-content">

                <div class="content-wrapper">

                    <div class="content">
                        <div class="row">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <legend class="text-bold" style="color: #696969">Processos encerrados</legend> 

                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="panel-body">
                                            <h1 class="content-group" style="color: #696969"></h1>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-framed">

                                                    <thead>
                                                        <tr>
                                                            <th>N° do Processo</th>
                                                            <th>Data da Entrada</th>
                                                            <th>Interessado</th>
                                                            <th>Origem</th>
                                                            <th>Assunto</th>
                                                            <th>Reativar processo</th>





                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
$q2 = "SELECT * FROM tb_processo,tb_usuario,tb_interessado WHERE tb_processo.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND tb_processo.tb_interessado_idtb_interessado = tb_interessado.idtb_interessado  AND nome_interessado like '%$pesquisa%' AND encerrar_processo=1  ORDER BY tb_processo.dat_reg DESC";
$r = mysqli_query($mysqli, $q2);
$total = mysqli_num_rows($r);

if ($r) {
    while ($ro = mysqli_fetch_assoc($r)) {
        $status = $ro['status_processo'];
        ?>
                                                                <tr>

                                                                    <td>
                                                                        <a href="#"  data-toggle="modal" data-target="#modal_default<?php echo $ro['idtb_processo']; ?>"><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('m');
                                                        $date2 = date('Y');
                                                        echo $date . $date2 . $ro['idtb_usuario'] . $ro['idtb_processo'];
        ?></a>
                                                                    </td>
                                                                    <td><?php echo "<p></p>", $ro['data_processo']; ?>
                                                                    <td><?php echo "<p></p>", $ro['nome_interessado']; ?></td>
                                                                    <td><?php echo "<p></p>", $ro['orgao_usuario']; ?></td>
                                                                    <td><?php echo "<p></p>", $ro['assunto_processo']; ?></td>
                                                                    
                                                                    <td>
                                                                        <div class="switch__container">
                                                                            <form class="heading-form" action="#">
                                                                                <div class="form-group">
                                                                                        <?php
                                                                                        if ($ro['status_processo'] == '1') {
                                                                                            ?>
                                                                                        <a href='dao/ativar_pro.php?id=<?php echo $ro['idtb_processo']; ?>'>
                                                                                            <button type="button" class="btn btn-primary"><span><i class="icon-arrow-right14 position-right"></i></span>Ativar</button>
                                                                                        </a>
                                                                                        <?php
                                                                                    } else {
                                                                                        if ($ro['status_processo'] == '2') {
                                                                                            ?>
                                                                                            <a href='./desativar_pro.php?id=<?php echo $ro['idtb_processo']; ?>'>
                                                                                                <input id="switch-shadow" class="switch switch--shadow" checked="true" type="checkbox"><label for="switch-shadow"></label></a>
                                                                                        </div>
                                                                                    </form>
                                                                                </div> <?php }
                                                                    } ?>
                                                                    </td>







                                                                    <!--aqui -->






                                                                </tr>



        <?php
    }
}
?>

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                            <!-- Footer -->
                            <div class="footer text-muted">

                            </div>
                            <!-- /footer -->
                        </div>
                    </div> 

                </div>                      

            </div>                          

            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
