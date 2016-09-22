<?php

require_once '../../db_connect.php';



$fild_nome = $_POST['nome'];
$fild_pass = $_POST['pass'];
$fild_orgao = $_POST['orgao'];
$fild_email = $_POST['email'];


$sql = "INSERT INTO tb_usuario(nome_usuario,senha_usuario,email_usuario,orgao_usuario,tipo_usuario,status_usuario) VALUES ('$fild_nome','$fild_pass','$fild_email','$fild_orgao','USER','1')";
$result = mysqli_query($mysqli, $sql);


echo"
<script>
window.location=\"../index.php\"
</script>
"   
?>


