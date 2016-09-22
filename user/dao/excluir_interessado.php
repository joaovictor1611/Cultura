<?php
require_once '../../db_connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM tb_interessado where idtb_interessado = $id";
$result = mysqli_query($mysqli, $sql);

echo'<meta charset=UTF-8><script>alert("Registro excluido")</script>';

echo "<script>window.location=\"../man_interessado.php\"</script>";
?>