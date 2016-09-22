
<div class="panel panel-flat">


    <div class="panel-body">

        <legend class="text-bold" style="color: #696969">Dados do Interessado</legend>
        <form  method="post" action="" >
            <div class="col-md-12">
            <br>
            
                <div class="row">
                    <label class="col-lg-2 control-label">Buscar interessado</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" id="busca" placeholder="Informe o nome do interessado">
                    </div>
                </div>
                
            
            <br>
            <?php
            if (!isset($_POST['idtb_interessado'])) {
                echo '<input type="hidden" id="idtb_interessado" name="idtb_interessado">
            
            <div class="form-group">
                <label class="col-lg-1 control-label">Nome:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" id="nome_interessado" name="nome_interessado" class="form-control" placeholder="" value="">
                </div>

                <label class="col-lg-1 control-label">Org/Empresa:</label>
                <div class="col-lg-5">
                    <input type="text"style="margin: 6px" id="orgao_interessado" name="orgao_interessado" class="form-control" placeholder="" value="">
                </div>

            </div>

            <div class="form-group">
                <label class="col-lg-1 control-label">CPF:</label>
                <div class="col-lg-5">
                    <input type="text"style="margin: 6px" id="cpf_interessado"  class="form-control" name="cpf_interessado" placeholder="" value="">
                </div>

                <label class="col-lg-1 control-label">CNPJ:</label>
                <div class="col-lg-5">
                    <input type="text"style="margin: 6px" class="form-control" id="cnpj_interessado" name="cnpj_interessado" placeholder="" value="">
                </div>

            </div>
            
        <div class="form-group">
                <label class="col-lg-1 control-label">Endereço:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="endereco_interessado" name="endereco_interessado" placeholder="" value="">
                </div>

            <div class="form-group">
                <label class="col-lg-1 control-label">Bairro:</label>
                <div class="col-lg-5">
                    <input type="text"style="margin: 6px" class="form-control" id="bairro_interessado" name="bairro_interessado" placeholder="" value="">
                </div>

                <label class="col-lg-1 control-label">Cidade:</label>
                <div class="col-lg-5">
                    <input type="text"style="margin: 6px" class="form-control" id="cidade_interessado" name="cidade_interessado" placeholder="" value="">
                </div>
            </div>

           
                
                <label class="col-lg-1 control-label">Telefone:</label>
                <div class="col-lg-5">
                    <input type="text"style="margin: 6px" class="form-control" id="telefone_interessado" name="telefone_interessado" placeholder="" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-1 control-label">Email:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="email_interessado" name="email_interessado" placeholder="" value="">
                </div>

            </div>
               <div class="text-right col-lg-12">
               <button type="submit" style="margin: 6px"type="button" class="btn btn-primary">Confirmar<i class="icon-arrow-right14 position-right"></i></button>
      </div>';

            } else {
                $q2 = "SELECT * FROM tb_interessado WHERE idtb_interessado = $_POST[idtb_interessado]";
                $r = mysqli_query($mysqli, $q2);
                $total = mysqli_num_rows($r);
                $ro = mysqli_fetch_assoc($r);
                echo '<input type="hidden" id="idtb_interessado" name="idtb_interessado">
            
            <div class="form-group">
                <label class="col-lg-1 control-label">Nome:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" id="nome_interessado" name="nome_interessado" class="form-control" placeholder="" value="' . $ro['nome_interessado'] . '">
                </div>
                <label class="col-lg-1 control-label">Órgão:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" id="orgao_interessado" name="orgao_interessado" class="form-control" placeholder="" value="' . $ro['orgao_interessado'] . '">
                </div>
                </div>

            <div class="form-group">
                <label class="col-lg-1 control-label">CPF:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" id="cpf_interessado"  class="form-control" name="cpf_interessado" placeholder="" value="' . $ro['cpf_interessado'] . '">
                </div>
                </div>
                <div class="form-group">
                <label class="col-lg-1 control-label">CNPJ:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="cnpj_interessado" name="cnpj_interessado" placeholder="" value="' . $ro['cnpj_interessado'] . '">
                </div>
                 </div>
            <div class="form-group">
                <label class="col-lg-1 control-label">Bairro:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="bairro_interessado" name="bairro_interessado" placeholder="" value="' . $ro['bairro_interessado'] . '">
                </div>
                <div class="form-group">
                <label class="col-lg-1 control-label">Cidade:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="cidade_interessado" name="cidade_interessado" placeholder="" value="' . $ro['cidade_interessado'] . '">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-1 control-label">Endereço:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="endereco_interessado" name="endereco_interessado" placeholder="" value="' . $ro['endereco_interessado'] . '">
                </div>
            <br>
                <label class="col-lg-1 control-label">Telefone:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="telefone_interessado" name="telefone_interessado" placeholder="" value="' . $ro['telefone_interessado'] . '">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-1 control-label">Email:</label>
                <div class="col-lg-5">
                    <input type="text" style="margin: 6px" class="form-control" id="email_interessado" name="email_interessado" placeholder="" value="' . $ro['email_interessado'] . '">
                </div>

            </div>
            </div>
               <div class="text-right col-lg-12">
               <button type="submit" type="button" class="btn btn-primary">Confirmar<i class="icon-arrow-right16 position-right"></i></button>
      </div>';   
            }
            ?>  
      
        </form>         
    </div>
</div>
</div>
   
