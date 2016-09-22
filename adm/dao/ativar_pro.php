<?php
include '../../db_connect.php'; 
 $id = $_GET['id'];

$sql = "UPDATE tb_processo SET encerrar_processo= 2 WHERE idtb_processo='$id'";
$result = mysqli_query($mysqli, $sql);
echo "<meta charset=utf-8>
<script>alert('Processo Ativado.');
window.location=\"../processos_encerrados.php\"
</script>
";

?>
