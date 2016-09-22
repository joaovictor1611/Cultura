<?php

require_once '../../db_connect.php';


$idd = $_POST['idd'];
$fild_quem_enviou = $_POST['quem_enviou'];
$fild_destino = $_POST['destino'];
$fild_interessado = $_POST['interessado'];
$fild_assunto = $_POST['assunto'];
$fild_texto = $_POST['texto'];
$fild_data = $_POST['data'];
$fild_doc = $_POST['doc'];
$fild_numdoc = $_POST['num_doc'];
$fild_num_processo = $_POST['num_processo'];
$fild_despacho = $_POST['despacho'];


$sql = "INSERT INTO tb_processo(user_envio,tb_usuario_idtb_usuario,tb_interessado_idtb_interessado,assunto_processo,texto_processo,data_processo,status_processo,doc_processo,numdoc_processo,num_processo,despacho_processo,encerrar_processo) VALUES ('$fild_destino','$fild_quem_enviou','$fild_interessado','$fild_assunto','$fild_texto','$fild_data',1,'$fild_doc','$fild_numdoc','$fild_num_processo','$fild_despacho',2)";
$result = mysqli_query($mysqli, $sql);

$ql = "UPDATE tb_processo SET encerrar_processo = 3 WHERE  idtb_processo='$idd'";
$resul = mysqli_query($mysqli, $ql);


echo"
<script>
window.location=\"../index.php\"
</script>
"   
?>

