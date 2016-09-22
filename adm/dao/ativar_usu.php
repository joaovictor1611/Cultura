<?php
include '../../db_connect.php'; 
$idbot = $_GET['id'];

$sq = "UPDATE tb_usuario SET status_usuario='1' WHERE idtb_usuario='$idbot'";
$result = mysqli_query($mysqli, $sq);
echo "<meta charset=utf-8>
<script>alert('Usuário Ativado.');
window.location=\"../man_usu.php\"
</script>
";

?>