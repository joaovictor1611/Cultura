<?php

require_once '../../connect.php';

//recebe os dados
$erro='<div class="alert alert-blok alert-danger"> 
                                <a class="close" data-dismiss="alert" href="#">
                                </a>
                                <h4 class="element-invisible"> Aviso!</h4>
                                <div>Conta desativada ou usuário não encontrado.</div>
                                    
                               </div>';
       
$senha = $_POST['senha'];
$tipo = $_POST['nivel'];

if ($tipo == "0") {

    //Passar a instrução para a consulta para tabela professor
    $querysql = "SELECT * FROM tadm WHERE  senha='$senha' AND nivel='0'";
    $result = mysqli_query($mysqli, $querysql);
    $linha = $result->fetch_array(MYSQLI_ASSOC);


//linha afetadas pela consulta
    if ($result->num_rows > 0) {
        $id_centro = $linha['idadm'];
       
        $tipo = $linha['nivel'];
     

        session_start();

        //inicia sessao
        $_SESSION ['idadm'] = $id_centro;
       
        $_SESSION ['nivel'] = $tipo;

        echo "<script> window.location=\"../../usuario_pacajus/home.php\"</script>";
    } else {
        echo "<script> window.location=\"../index.php?incorrect=true&#erro\"</script>";
    }
//Verifia se retornou algo
}

if ($tipo == "1") {

    //Passar a instrução para a consulta para tabela aluno
    $querysql2 = "SELECT * FROM tadm WHERE senha='$senha' AND nivel='1'";
    $result2 = mysqli_query($mysqli, $querysql2);
    $linha2 = $result2->fetch_array(MYSQLI_ASSOC);

    //linha afetadas pela consulta
    if ($result2->num_rows > 0) {

        $id_choro = $linha['idadm'];
    
        $tipo = $linha['nivel'];
     

        session_start();

        //inicia sessao
     $_SESSION ['idadm'] = $id_choro;
   
        $_SESSION ['nivel'] = $tipo;
        //Redireciona a página
     echo "<script> window.location=\"../../usuario_chorozinho/home.php\"</script>";
    } else {
        echo "<script> window.location=\"../index.php?incorrect=true&#erro\"</script>";
    }
}

if ($tipo == "2") {

    //Passar a instrução para a consulta para tabela aluno
    $querysql3 = "SELECT * FROM tadm WHERE  senha='$senha' AND nivel='2'";
    $result3 = mysqli_query($mysqli, $querysql3);
    $linha3 = $result3->fetch_array(MYSQLI_ASSOC);

    //linha afetadas pela consulta
    if ($result3->num_rows > 0) {

        $id_adm = $linha['idadm'];

        $tipo = $linha['nivel'];
     

        session_start();

        //inicia sessao
     $_SESSION ['idadm'] = $id_adm;
  
        $_SESSION ['nivel'] = $tipo;
        //Redireciona a página
     echo "<script> window.location=\"../home.php\"</script>";
    } else {
       echo "<script> window.location=\"../index.php?incorrect=true&#erro\"</script>";
    }
}

?>
<?php
session_start();
if (isset($_COOKIE['usuario'])) {

    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['nivelUser'] = $_COOKIE['usuario'];
 
} else {
    if (!isset($_SESSION[nomeUser])) {
        echo "<script> window.location.href=\"../index.php\" </script>";
    }
    if (!isset($_SESSION[nivelUser])) {
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