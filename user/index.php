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

        <script type="text/javascript" src="../assets/js/core/app.js"></script>
        <script type="text/javascript" src="../assets/js/pages/dashboard.js"></script>
        <!-- /theme JS files -->

    </head>

    <body>

        <?php include './include/menu.php'; ?>

        <!-- /main sidebar -->
        <div class="content">
            <div class="row">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <legend class="text-bold" class="panel-title" style="color: #696969">Processos Recebidos</legend> 
                    </div>
                    <div class="col-lg-12">

                        <div class="heading-elements"> 
                            <form name="frmbusca" method="post" action="index.php">
                                <div class="form-group contact-search m-b-30">
                                    <div class="input-group">
                                        <input type="text" name="palavra" class="form-control" placeholder="Pesquisar Interessado">
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

                        <div class="table-responsive">
                            <table class="table table-bordered table-framed">

                                <thead>
                                    <tr>
                                        <th>N° do Processo</th>
                                        <th>Data da Entrada</th>
                                        <th>Interessado</th>
                                        <th>Origem</th>
                                        <th>Assunto</th>
                                        <th>Situaçao</th>
                                        <th>Gerar Capa</th>
                                        <th>Encerrar Processo</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $maximo = 10;
                                    $pagina = $_GET['pagina'];
                                    if ($pagina == "") {
                                        $pagina = "1";
                                    }

                                    $inicio = $pagina - 1;
                                    $inicio = $maximo * $inicio;
                                    
                                    $query = "SELECT * FROM tb_processo,tb_usuario,tb_interessado WHERE tb_processo.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND tb_processo.tb_interessado_idtb_interessado = tb_interessado.idtb_interessado AND tb_processo.user_envio = $_SESSION[id1] AND encerrar_processo=2 ORDER BY tb_processo.dat_reg DESC";
                                    $result = mysqli_query($mysqli, $query);
                                    $total = mysqli_num_rows($result);
                                    $q2 = "SELECT * FROM tb_processo,tb_usuario,tb_interessado WHERE tb_processo.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND tb_processo.tb_interessado_idtb_interessado = tb_interessado.idtb_interessado AND tb_processo.user_envio = $_SESSION[id1] AND nome_interessado like '%$pesquisa%' AND encerrar_processo=2 ORDER BY tb_processo.dat_reg DESC LIMIT $inicio, $maximo";
                                    $r = mysqli_query($mysqli, $q2);
                                    $totl = mysqli_num_rows($r);

                                    if ($r) {
                                        while ($ro = mysqli_fetch_assoc($r)) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <a href="#"  data-toggle="modal" data-target="#modal_default<?php echo $ro['idtb_processo']; ?>"><?php echo $ro['num_processo']; ?></a>
                                                    <?php 
                                                    //colocar o update e depois coloca uma função que será chamada com o onClick aí encima//
                                                    ?>
                                                    <div id="modal_default<?php echo $ro['idtb_processo']; ?>" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <form class="form-horizontal" action="">





                                                                    <div class="panel panel-flat">
                                                                        <div class="panel-heading">
                                                                            <h5 class="panel-title">Dados do Processo</h5>

                                                                        </div>

                                                                        <div class="table-responsive">
                                                                            <table class="table">


                                                                                <tr>
                                                                                    <th>N° do Processo</th>
                                                                                    <td><?php
                                                                                        date_default_timezone_set('America/Sao_Paulo');
                                                                                        $date = date('m');
                                                                                        $date2 = date('Y');
                                                                                        echo $date . $date2 . $ro['idtb_usuario']
                                                                                        . $ro['idtb_processo'];
                                                                                        ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Data da entrada</th>

                                                                                    <td><?php echo "<p></p>", $ro['data_processo']; ?></td>

                                                                                </tr>


                                                                                <tr>
                                                                                    <th>Interessado</th>
                                                                                    <td><?php echo "<p></p>", $ro['nome_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Origem</th>
                                                                                    <td><?php echo "<p></p>", $ro['orgao_usuario']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Assunto</th>
                                                                                    <td><?php echo "<p></p>", $ro['assunto_processo']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Situação</th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            $status = $ro['status_processo'];
                                                                                            if ($status == 1) {
                                                                                                echo  "<a class='btn btn-danger'>Não Lido</a>";
                                                                                            }
                                                                                            if ($status == 2) {
                                                                                                echo "<a class='btn btn-primary'> Lido</a>";
                                                                                            }
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>


                                                                            </table> 

                                                                            <center>

                                                                                <label style="margin: 0 10px;" class="col-lg-9 control-label"></label>
                                                                                <div class="col-lg-12">
                                                                                    <textarea readonly="true"  rows="5" name="texto" cols="5" class="form-control" placeholder=""><?php echo $ro['despacho_processo']; ?></textarea>
                                                                                </div>

                                                                            </center>

                                                                            <center>
                                                                                <a  href="encaminhar_processo.php?idc2=<?php echo $ro['idtb_processo']; ?>"> <button style="margin: 10px 0"type="button" class="btn btn-primary">Encaminhar<i class="icon-arrow-right14 position-right"></i></button> </a>
                                                                            </center>



                                                                        </div>
                                                                    </div>            

                                                                </form>


                                                            </div>
                                                        </div> 		

                                                    </div>
                                                </td>
                                                <td><?php echo "<p></p>", $ro['data_processo']; ?> </td>
                                                <td><?php echo "<p></p>", $ro['nome_interessado']; ?></td>
                                                <td><?php echo "<p></p>", $ro['orgao_usuario']; ?></td>
                                                <td><?php echo "<p></p>", $ro['assunto_processo']; ?></td>
                                                <td>
                                                <?php 
                                                    $status = $ro['status_processo'];
                                                    if ($status == 1) {
                                                        echo  "<a href='dao/altlida.php?id= $ro[idtb_processo] ' 
                                                       class='btn btn-danger'>Não Lido</a>";
                                                    }
                                                    if ($status == 2) {
                                                        echo "<a class='btn btn-primary'> Lido</a>";
                                                    }
                                                ?>
                                                
                                                </td>

                                                <td>
                                                    <a href="pdf-processo/index.php?id=<?php echo $ro['idtb_processo']; ?>" target="_BLANK"> <button type="button" class="btn btn-primary"><span><i class="icon-arrow-right14 position-right"></i></span>PDF</button> </a>
                                                </td>
                                                <td>                                  
                                                    <a  href="dao/sencerrar_processo.php?idprocesso=<?php echo $ro['idtb_processo']; ?>
                                                        &numprocesso=<?php echo $ro['num_processo']; ?>"> 
                                                        <button style=""type="button" class="btn btn-danger"><i class="icon-arrow-right14 position-right">

                                                            </i></button> </a>
                                                </td>






                                                <!--aqui -->






                                                <?php
                                            }
                                        }
                                        ?>

                                </tbody>

                            </table>
                           <center>
                            <div>                            
                                <ul class="pagination pagination-split"> 
                                    <?php
                                    $menos = $pagina - 1;
                                    $mais = $pagina + 1;
                                    $pgs = ceil($total / $maximo);
                                    if ($pgs > 1) {
                                        echo "<br />";
                                        if ($menos > 0) {
                                            echo "<li class='arrow'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$menos><i class='icon-arrow-left15'></i></a></li> ";
                                        }
                                        for ($i = 1; $i <= $pgs; $i++) {
                                            if ($i != $pagina) {
                                                echo "<li><a href=" . $_SERVER['PHP_SELF'] . "?pagina=" . ($i) . "> $i </a></li>";
                                            } else {
                                                echo "<li class='active'><a>" . $i . "</a></li> ";
                                            }
                                        }
                                        if ($mais <= $pgs) {
                                            echo "<li class='arrow'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$mais><i class='icon-arrow-right15'></i></a></li>";
                                        }
                                    }
                                    ?>  
                                </ul>
                            </div>
                        </center>
                        </div>
                         
                    </div>











                    <!-- Footer -->
                    <div class="footer text-muted">

                    </div>
                    <!-- /footer -->

                </div>
            </div>
        </div>


    </body>
</html>
