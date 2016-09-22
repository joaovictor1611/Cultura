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
        <script type="text/javascript" src="../assets/js/plugins/notifications/bootbox.min.js"></script>
        <script type="text/javascript" src="../assets/js/plugins/notifications/sweet_alert.min.js"></script>
        <script type="text/javascript" src="../assets/js/core/app.js"></script>
        <script type="text/javascript" src="../assets/js/pages/components_modals.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <!-- /theme JS files -->




    </head>

    <body>
        <?php include_once './include/menu5.php'; ?>
      
        <!-- Main navbar -->
        <div class="content">
            <div class="row">

                <!-- /main sidebar -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <legend class="text-bold" class="panel-title" style="color: #696969">Manutenção Interessado</legend> 
                    </div>
                    <div class="col-lg-12">

                        <div class="heading-elements"> 
                            <form name="frmbusca" method="post" action="man_interessado.php">
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
                                        <th>Nome</th>
                                        <th>Alterar</th>
                                        <th>Excluir</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q2 = "SELECT * FROM tb_interessado WHERE idtb_interessado = idtb_interessado AND nome_interessado like '%$pesquisa%' ORDER BY nome_interessado ASC";
                                    $r = mysqli_query($mysqli, $q2);
                                    $total = mysqli_num_rows($r);

                                    if ($r) {
                                        while ($row = mysqli_fetch_assoc($r)) {
                                            ?> 
                                            <tr>

                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#modal_default<?php echo $row['idtb_interessado']; ?>"><?php echo "<p></p>", $row['nome_interessado']; ?></a>



                                                    <div id="modal_default<?php echo $row['idtb_interessado']; ?>" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <form class="form-horizontal" action="">





                                                                    <div class="panel panel-flat">
                                                                        <div class="panel-heading">
                                                                            <h5 class="panel-title">Dados do Interessado</h5>

                                                                        </div>

                                                                        <div class="table-responsive">
                                                                            <table class="table">


                                                                                <tr>
                                                                                    <th>Nome</th>
                                                                                    <td><?php echo "<p></p>", $row['nome_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Org/Empresa</th>

                                                                                    <td><?php echo "<p></p>", $row['orgao_interessado']; ?></td>

                                                                                </tr>


                                                                                <tr>
                                                                                    <th>CPF</th>
                                                                                    <td><?php echo "<p></p>", $row['cpf_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>CNPJ</th>
                                                                                    <td><?php echo "<p></p>", $row['cnpj_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Endereço</th>
                                                                                    <td><?php echo "<p></p>", $row['endereco_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Bairro</th>
                                                                                    <td><?php echo "<p></p>", $row['bairro_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Cidade</th>
                                                                                    <td><?php echo "<p></p>", $row['cidade_interessado']; ?></td>

                                                                                </tr>
                                                                                 <tr>
                                                                                    <th>Telefone</th>
                                                                                    <td><?php echo "<p></p>", $row['telefone_interessado']; ?></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Email</th>
                                                                                    <td><?php echo "<p></p>", $row['email_interessado']; ?></td>

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
                                                    <a href="alterar_interessado.php?id=<?php echo $row['idtb_interessado']; ?>&id=<?php echo $row['idtb_interessado']; ?>"><button type="button" class="btn btn-default"><i class="icon-pencil"></i></button></a>
                                                </td>

                                                <td> 
                                                    <a href="dao/excluir_interessado.php?id=<?php echo $row['idtb_interessado']; ?>&id=<?php echo $row['idtb_interessado']; ?>" onclick="return confirm(' Deseja mesmo excluir o registro? ')"><button type="button" class="btn btn-default"><i class="icon-trash"></i></button></a>
                                                </td>



                                            </tr>



                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>





                            <!-- Footer -->
                            <div class="footer text-muted">

                            </div>
                            <!-- /footer -->


                        </div>
                    </div>
                </div>
            </div>
      
        


    </body>
</html>