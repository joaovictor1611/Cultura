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
<?php $idPP = $_GET['idc'];?>
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
        <script type="text/javascript" src="autocomplete/jquery.js"></script>
        <script type="text/javascript" src="autocomplete/jquery-ui.min.js"></script>
        <script type="text/javascript" src="autocomplete/custom.js"></script>
        <link rel="stylesheet" type="text/css" href="autocomplete-destino/jquery-ui.min.css">
        <script type="text/javascript" src="autocomplete-destino/jquery.js"></script>
        <script type="text/javascript" src="autocomplete-destino/jquery-ui.min.js"></script>
        <script type="text/javascript" src="autocomplete-destino/custom.js"></script>
        <!-- /theme JS files -->

    </head>

    <body>

<?php include './include/menu3.php'; ?>



        <div class="page-container">	

            <div class="page-content">

                <div class="content-wrapper">

                    <div class="content">
                        <div class="row">

                            <div class="col-md-12">
                                <?php
                                
                                $q2 = "SELECT * FROM tb_processo,tb_usuario,tb_interessado WHERE tb_processo.tb_interessado_idtb_interessado = tb_interessado.idtb_interessado AND tb_processo.tb_usuario_idtb_usuario = $_SESSION[id1] AND tb_usuario.idtb_usuario = tb_processo.user_envio AND tb_processo.idtb_processo = $idPP ORDER BY tb_processo.dat_reg DESC";
                                $r = mysqli_query($mysqli, $q2);
                                $total = mysqli_num_rows($r);

                                if ($r) {
                                    while ($row = mysqli_fetch_assoc($r)) {
                                        ?>
                                
                                <?php include_once 'include/interessado2.php'; ?>

                                <form method="post" action="dao/cad_encaminhar2.php" class="form-horizontal">
                                    <div class="panel panel-flat">


                                        <div class="panel-body">

                                            <input type="hidden"   name="num_processo" value="<?php echo $row['num_processo']; ?>" >



                                            <input type="hidden"   name="data" value="<?php
                                            date_default_timezone_set('America/Sao_Paulo');
                                            $date = date('d-m-Y');
                                            echo $date;
                                            ?>" > 



                                            <legend class="text-bold" style="color: #696969">Dados do Processo</legend> 


                                            <br>
                                            <input type="hidden" name='quem_enviou' value="<?php echo $_SESSION[id1] ?>">

                                            <input type="hidden" name='interessado' value="<?php echo $_POST['interessado2']; ?> ">

                                            <div class="form-group">
                                                <label class="col-lg-1 control-label">Assunto:</label>
                                                <div class="col-lg-5">
                                                    <input type="text" readonly="true" name="assunto" class="form-control" placeholder="" value="<?php echo $row['assunto_processo']; ?> ">
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label class="col-lg-1 control-label"></label>
                                                    <div class="col-lg-6">
                                                        <textarea rows="5" readonly="true" name="texto" cols="5" class="form-control" placeholder="Escreva aqui..." ><?php echo $row['texto_processo']; ?> </textarea>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="col-lg-1 control-label">Documento:</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" readonly="true" name="doc" class="form-control" placeholder="" value="<?php echo $row['doc_processo']; ?> ">
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">Nº do documento:</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" readonly="true" name="num_doc" class="form-control" placeholder="" value="<?php echo $row['numdoc_processo']; ?> ">
                                                    </div>
                                                
                                                </div>
                                                <div class="form-group">
                                                    <!--   <div class="">
                                                           <label style="margin: 0 10px;" class="col-lg-9 control-label"></label>
                                                           <div class="col-lg-11">
                                                               <textarea style="margin: 0 25px;" rows="5" name="texto" cols="5" class="form-control" placeholder="Digite seu texto..."></textarea>
                                                           </div>
                                                       </div> -->
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="col-lg-11">
                                                    <br>
                                                        <div class="row">
                                                            <label class="col-lg-2 control-label">Destino</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" class="form-control" id="buscad" placeholder="Informe o nome do destino">
                                                            </div>
                                                        </div>


                                                        <br>
                                                        <input type="hidden" id="idtb_usuario" name="destino">
                                                </div>

                                            </div>

                                            <br>
                                            <legend class="text-bold" style="color: #696969">Despacho</legend> 


                                            <div class="form-group">


                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label class="col-lg-1 control-label"></label>
                                                    <div class="col-lg-6">
                                                        <textarea rows="5" name="despacho" cols="5" class="form-control" placeholder="Escreva aqui..."></textarea>
                                                    </div>
                                                </div>


                                                <br><br><br>

                                                <div class="form-group">

                                                </div>
                                            </div>

                                            <div class="form-group">



                                            </div>


                                            <div class="row">

                                                <div class="text-right col-lg-12">
                                                    <button type="submit" style="float: right" class="btn btn-primary">Enviar <i class="icon-arrow-right14 position-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
<?php 
                                    }
                                }
?>

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
        <!-- /page container -->

    </body>
</html>

