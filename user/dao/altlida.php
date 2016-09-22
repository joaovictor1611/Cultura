<?php
include_once '../../db_connect.php';
$id = $_GET['id'];

  $resultado2 = mysqli_query($mysqli, "UPDATE tb_processo SET status_processo=2 where idtb_processo='$id'");
      
//redireciona para apágina de manutenção de dados
echo "<script>window.location=\"../index.php\"</script>";
?>