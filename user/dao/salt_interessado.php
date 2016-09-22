<?php require_once '../../db_connect.php';



$id =$_POST['id'];
$nome =$_POST['nome'];
$orgao =$_POST['orgao'];
$cpf =$_POST['cpf'];
$cnpj =$_POST['cnpj'];
$bairro =$_POST['bairro'];
$cidade =$_POST['cidade'];
$endereco =$_POST['end'];
$telefone =$_POST['tel'];
$email =$_POST['email'];


//query de atualização(UPDATE)
$sql = " UPDATE tb_interessado SET nome_interessado= '$nome', orgao_interessado='$orgao', cpf_interessado='$cpf', cnpj_interessado='$cnpj', bairro_interessado='$bairro', cidade_interessado='$cidade', endereco_interessado='$endereco', telefone_interessado='$telefone', email_interessado='$email' where idtb_interessado='$id'";
$result = mysqli_query($mysqli,$sql);

                                                                   
echo " <script> window.location=\"../man_interessado.php\"
    </script> 
    "; 
?>