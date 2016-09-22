<?php
define('SERVER', 'localhost');
define('DBNAME', 'db_blog');
define('USER', 'root');
define('PASSWORD', 'qwe123');

//-----------------------------

$fild_id = $_POST['id'];



$sql = "INSERT INTO tb_interessado(nome_interessado,orgao_interessado,cpf_interessado,cnpj_interessado,bairro_interessado,cidade_interessado,endereco_interessado,telefone_interessado,email_interessado) VALUES ('$fild_nome','$fild_orgao','$fild_cpf','$fild_cnpj','$fild_bairro','$fild_cidade','$fild_end','$fild_tel','$fild_email')";
$result = mysqli_query($mysqli, $sql);


echo"
<script>
window.location=\"../interessado.php\"
</script>
"   
?>