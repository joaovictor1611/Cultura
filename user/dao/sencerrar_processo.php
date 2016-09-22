<?php

require_once '../../db_connect.php';
$id = $_GET['idprocesso'];
$num = $_GET['numprocesso'];


$sql = "UPDATE tb_processo SET encerrar_processo = 1 WHERE num_processo='$num' AND idtb_processo='$id'";
$result = mysqli_query($mysqli,$sql);
echo"
<script>
window.location=\"../index.php\"
</script>
"   
?>

