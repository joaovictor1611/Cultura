<?php include '../db_connect.php'; ?>
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
<html lang="br">
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
        margin-left: -9999px;
        visibility: hidden;
        }
        .switch1 {
        position: absolute;
        margin-left: -9999px;
        visibility: hidden;
        }

        .switch + label {
         display: block;
         position: relative;
         cursor: pointer;
         outline: none;
         user-select: none;
        }

        </script>
    </head>

    <body>

<?php include 'include/menu_adm2.php'; ?>

        <div class="content">
            <div class="row">

                <!-- /main sidebar -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <legend class="text-bold" class="panel-title" style="color: #696969">Dados do Usuário</legend> 
                    </div>
                    <div class="col-lg-12">

                        <div class="heading-elements"> 
                            <form name="frmbusca" method="post" action="man_usu.php">
                                <div class="form-group contact-search m-b-30">
                                    <div class="input-group">
                                        <input type="text" name="palavra" class="form-control" placeholder="Pesquisar Usuario">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn waves-effect btn btn-default in"><i class=" icon-search4"></i></button>
                                        </span>
                                    </div>
                                </div> <!-- form-group -->
                            </form>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <h1 class="content-group" style="color: #696969"></h1>
                        <div class="col-lg-5">
                        <div class="table-responsive">
                            <table class="table table-bordered table-framed">

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q2 = "SELECT * FROM tb_usuario WHERE idtb_usuario = idtb_usuario AND nome_usuario like '%$pesquisa%' ORDER BY nome_usuario ASC";
                                    $r = mysqli_query($mysqli, $q2);
                                    $total = mysqli_num_rows($r);

                                    if ($r) {
                                        while ($row = mysqli_fetch_assoc($r)) {
                                            $status = $row['status'];
                                            if ($status == 0) {
                                                $statu = 'Desativado';
                                            } else {
                                                if ($status == 1) {
                                                    $statu = 'Ativado';
                                                }
                                            }
                                            ?> 
                                            <tr>

                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#modal_default<?php echo $row['idtb_usuario']; ?>"><?php echo "<p></p>", $row['nome_usuario']; ?></a>



                                                    <div id="modal_default<?php echo $row['idtb_usuario']; ?>" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <form class="form-horizontal" action="">





                                                                    <div class="panel panel-flat">
                                                                        <div class="panel-heading">
                                                                            <h5 class="panel-title">Dados do Usuário</h5>

                                                                        </div>

                                                                        <div class="table-responsive">
                                                                            <table class="table">


                                                                                <tr>
                                                                                    <th>Nome</th>
                                                                                    <td><?php echo "<p></p>", $row['nome_usuario']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Senha</th>

                                                                                    <td><?php echo "<p></p>", $row['senha_usuario']; ?></td>

                                                                                </tr>


                                                                                <tr>
                                                                                    <th>Email</th>
                                                                                    <td><?php echo "<p></p>", $row['email_usuario']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Órgão</th>

                                                                                    <td><?php echo "<p></p>", $row['orgao_usuario']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Status</th>
                                                                                    <td><?php echo "<p></p>", $row['status_usuario']; ?></td>


                                                                                </tr>

                                                                            </table> 


                                                                        </div>
                                                                    </div>            

                                                                </form>


                                                            </div>
                                                        </div> 		

                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                   <div class="switch__container">
                                                        <form class="heading-form" action="#">
                                                            <div class="form-group">
                                                            <?php
                                                            if ($row['status_usuario'] == '2') {
                                                                ?>
                                                                <a href='dao/ativar_usu.php?id=<?php echo $row['idtb_usuario']; ?>'>
                                                                    <input id="switch-shadow" class="switch switch--shadow" type="checkbox" ><label for="switch-shadow2" ></label></a>
                                                            <?php
                                                        } else {
                                                            if ($row['status_usuario'] == '1') {
                                                                ?>
                                                                <a href='dao/desativar_usu.php?id=<?php echo $row['idtb_usuario']; ?>'>
                                                                <input id="switch-shadow" class="switch switch--shadow" checked="true" type="checkbox"><label for="switch-shadow"></label></a>
                                                            </div>
                                                            </form>
                                                        </div> <?php }} ?>
                                                    </td>



                                                </tr>

                                                    <?php
                                                }
                                            }
                                            ?>
                                           </tbody>
                                          
                            </table>
                            
                            
                            <!-- Footer -->
                            <div class="footer text-muted">

                            </div>
                            <!-- /footer -->
                        </div>
                        <!-- /page container -->
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </body>
</html>
