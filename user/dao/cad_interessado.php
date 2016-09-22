<?php

require_once '../../db_connect.php';



$fild_nome = $_POST['nome'];
$fild_orgao = $_POST['orgao'];
$fild_cpf = $_POST['cpf'];
$fild_cnpj = $_POST['cnpj'];
$fild_bairro = $_POST['bairro'];
$fild_cidade = $_POST['cidade'];
$fild_end = $_POST['end'];
$fild_tel = $_POST['tel'];
$fild_email = $_POST['email'];



$sql = "INSERT INTO tb_interessado(nome_interessado,orgao_interessado,cpf_interessado,cnpj_interessado,bairro_interessado,cidade_interessado,endereco_interessado,telefone_interessado,email_interessado) VALUES ('$fild_nome','$fild_orgao','$fild_cpf','$fild_cnpj','$fild_bairro','$fild_cidade','$fild_end','$fild_tel','$fild_email')";
$result = mysqli_query($mysqli, $sql);


echo"
<script>
window.location=\"../interessado.php\"
</script>
"   
?>


