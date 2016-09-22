<?php include '../db_connect.php'; ?>
<?php
session_start();
if (isset($_COOKIE['usuario1'])) {

    $_SESSION['id1'] = $_COOKIE['id1'];
    $_SESSION['emailUser1'] = $_COOKIE['usuario1'];
    $_SESSION['nomeUser1'] = $_COOKIE['nome1'];
} else {
    if (!isset($_SESSION[nomeUser1])) {
        echo "<script> window.location.href=\"../index.php\" </script>";
    }
    if (!isset($_SESSION[emailUser1])) {
        echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
    } else {
        //senão, calculamos o tempo transcorrido
        $dataSalva = $_SESSION["ultimoAcesso1"];
        $agora = date("Y-n-j H:i:s");
        $tempo_transcorrido = (strtotime($agora) - strtotime($dataSalva));

        if ($tempo_transcorrido >= 1200) {
            //se passaram 10 minutos ou mais
            echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, digite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
            //senão, atualizo a data da sessão
        } else {
            $_SESSION["ultimoAcesso1"] = $agora;
        }
    }
}
?>
<?php $pesquisa = $_POST['palavra']; ?>
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

        <script type="text/javascript" src="../assets/js/core/app.js"></script>
        <script type="text/javascript" src="../assets/js/pages/wizard_form.js"></script>

        <!-- /theme JS files -->

    </head>

    <body>

        <?php include './include/menu5.php'; ?>

                            <div class="content">
                                <div class="row">
                                    <div class="panel panel-flat">


                                        <div class="panel-body">
                                            <div class="col-md-12">


                                                <form class="form-horizontal form-validate-jquery" method="post" action="dao/salt_interessado.php">


                                                    <fieldset class="content-group">

                                                        <legend class="text-bold">Alterar Interessado</legend>

                                                        <div class="form-group">

                                                            <?php
                                                            $idAlt = $_GET['id'];
                                                            $q2 = "SELECT * FROM tb_interessado WHERE idtb_interessado = $idAlt AND nome_interessado like '%$pesquisa%' ORDER BY nome_interessado ASC";
                                                            $r = mysqli_query($mysqli, $q2);
                                                            $total = mysqli_num_rows($r);

                                                            if ($r) {
                                                                while ($row = mysqli_fetch_assoc($r)) {
                                                                    ?> 
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Nome:</label>
                                                                    <div class="col-lg-9">
                                                                        <input  value="<?php echo $row['nome_interessado']; ?>" type="text" name="nome" class="form-control"  placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Org/Empresa:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['orgao_interessado']; ?>" type="text" name="orgao" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">CPF:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['cpf_interessado']; ?>" type="text" name="cpf" class="form-control"  placeholder="" data-mask="999.999.999-99">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">CNPJ:</label>
                                                                    <div class="col-lg-9">
                                                                        <input  value="<?php echo $row['cnpj_interessado']; ?>" type="text" name="cnpj" class="form-control" placeholder="" data-mask="99.999.999/9999-99">
                                                                    </div>
                                                                </div>
                                                        
                                                        
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Endereço:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['endereco_interessado']; ?> "type="text" name="end" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Bairro:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['bairro_interessado']; ?> "type="text" name="bairro" class="form-control"  placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Cidade:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['cidade_interessado']; ?>" type="text" name="cidade" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Telefone:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['telefone_interessado']; ?>"type="text" name="tel" class="form-control" placeholder="" data-mask="(99)99999-9999">
                                                                    </div>

                                                                </div>




                                                                <!-- Email field -->
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-1">Email:</label>
                                                                    <div class="col-lg-9">
                                                                        <input value="<?php echo $row['email_interessado']; ?> "type="email" name="email" class="form-control" id="email" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <!-- /email field -->
                                                            </fieldset>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <a href="man_interessado.php"><button style="float: right" type="button" class="btn btn-primary">Cancelar<i class="icon-arrow-right14 position-right"></i></button></a>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" class="btn btn-primary" style="float: right; margin: 0 10px" >Alterar<i class="icon-arrow-right14 position-right"></i></button>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </form>

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
                    <!-- /page content -->

                </div>
            </div>
        </div>

        <!-- /page container -->

    </body>
</html>