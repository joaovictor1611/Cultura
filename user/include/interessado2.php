 

<div class="panel panel-flat">


    <div class="panel-body">

        <legend class="text-bold" style="color: #696969">Dados do Interessado</legend>
        <form name="form" method="post" action="" >
            
            <input type='hidden' name='interessado2' value="<?php echo $row['idtb_interessado']; ?>">                                      

            <?php
            
                $q2 = 'SELECT * FROM tb_interessado WHERE idtb_interessado = $_POST[interessado2]';
                $r = mysqli_query($mysqli, $q2);
                $total = mysqli_num_rows($r);
                $ro = mysqli_fetch_assoc($r);
                // aqui é onde vai imprimir o restante dos dados do cliente
                echo 
                "<div class='form-group'>
                      
<label class='col-lg-1 control-label'>Nome:</label>
                                                    <div class='col-lg-5'>
                                                        <input type='text' style='margin: 6px' readonly='true' name='nome_interessado' class='form-control' placeholder='' value='  $row[nome_interessado]  '>
                                                    </div>
                                                    
                                                    <label class='col-lg-1 control-label'>Org/Empresa:</label>
                                                    <div class='col-lg-5'>
                                                        <input type='text' style='margin: 6px' readonly='true' name='orgao_interessado' class='form-control' placeholder='' value='  $row[orgao_interessado]  '>
                                                    </div>

                                            </div>

                                            <div class='form-group'>
                                                <label class='col-lg-1 control-label'>CPF:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text' style='margin: 6px' readonly='true' class='form-control' name='cpf_interessado' placeholder='' value='  $row[cpf_interessado]  '>
                                                </div>

                                                <label class='col-lg-1 control-label'>CNPJ:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text' style='margin: 6px' readonly='true' class='form-control' name='cnpj_interessado' placeholder='' value='  $row[cnpj_interessado]  '>
                                                </div>

                                            </div>
                                            
                                        <div class='form-group'>
                                                <label class='col-lg-1 control-label'>Endereço:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text' style='margin: 6px' readonly='true' class='form-control' name='endereco_interessado' placeholder='' value='  $row[endereco_interessado]  '>
                                                </div>

                                            <div class='form-group'>
                                                <label class='col-lg-1 control-label'>Bairro:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text' style='margin: 6px' readonly='true' class='form-control' name='bairro_interessado' placeholder='' value='  $row[bairro_interessado]  '>
                                                </div>

                                                <label class='col-lg-1 control-label'>Cidade:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text'  style='margin: 6px' readonly='true' class='form-control' name='cidade_interessado' placeholder='' value=' $row[cidade_interessado]  '>
                                                </div>
                                            </div>

                                          

                                                <label class='col-lg-1 control-label'>Telefone:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text' style='margin: 6px' readonly='true' class='form-control' name='telefone_interessado' placeholder='' value='  $row[telefone_interessado]  '>
                                                </div>
                                            </div>

                                            <div class='form-group'>
                                                <label class='col-lg-1 control-label'>Email:</label>
                                                <div class='col-lg-5'>
                                                    <input type='text' style='margin: 6px' readonly='true' class='form-control' name='email_interessado' placeholder='' value='  $row[email_interessado]  '>
                                                </div>

                                            </div>"
                        ."<div class='text-right col-lg-12'> 
                            <input type='submit' name='Buscar' class='btn btn-primary' class='' value='Confirmar'>
                            </form></div>";
            
            ?>
    </div>
</div>