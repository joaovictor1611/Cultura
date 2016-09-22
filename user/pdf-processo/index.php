<html>
    <head>
        <link href="pdf/mpdf.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <?php
        require '../../db_connect.php';

        $idProcesso = $_GET['id'];


        $sql = "SELECT * FROM tb_processo, tb_usuario, tb_interessado WHERE tb_processo.tb_interessado_idtb_interessado = tb_interessado.idtb_interessado AND tb_processo.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND tb_processo.idtb_processo = $idProcesso";
        $resultado = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($resultado)) {

            $num_pro.=html_entity_decode($row['num_processo']);
            $data_pro.=html_entity_decode($row['data_processo']);
            $nome_int.=html_entity_decode($row['nome_interessado']);
            $orgao_int.=html_entity_decode($row['orgao_interessado']);
            $cpf_int.=html_entity_decode($row['cpf_interessado']);
            $cnpj_int.=html_entity_decode($row['cnpj_interessado']);
            $end_int.=html_entity_decode($row['endereco_interessado']);
            $cidade_int.=html_entity_decode($row['cidade_interessado']);
            $tel_int.=html_entity_decode($row['telefone_interessado']);
            $assunto_pro.=html_entity_decode($row['assunto_processo']);
            $texto_pro.=html_entity_decode($row['texto_processo']);
            $origem_pro.=html_entity_decode($row['nome_usuario']);
        }

//       

        $html.='
 
 
   
 
  
   
  
 <div class="row">       
    
<div style="float:left">
    <table>
    <tr>
    <td>
    <img src="../../fotos/horizonte.jpg" style="width:15%; padding-top:10px;float:left">
    </td>
    <td>
    <h4>PREFEITURA<br> MUNICIPAL DE<br> HORIZONTE</h4> 
    </td>
    </tr>
    </table>
    
</div>

<div>

    <table border="1" style="margin-left: 450px;margin-top: -115px; border-collapse: collapse">
    
   <tr>
    <td  style="width:400px  ; height:10px; vertical-align: top "><b>SISTEMA DE PROTOCOLO</b></td>
    </tr>
    <tr>
    <td>
    PROCESSO Nº: ' . $num_pro . ' <br>
    DATA DE ENTRADA: ' . $data_pro . ' <br>
    ORIGEM: ' . $origem_pro . ' 
    </td>
    </tr>     
    </table>
    
</div>

</div>
    
    
    
  

 
 

 <br>

        <table id="tabela" border="1" style="border-collapse: collapse">
            
            <tr><td style="width:700px">REQUERENTE: ' . $nome_int . '</td> </tr>
            <tr><td >ÓRGÃO/EMPRESA: ' . $orgao_int . '</td></tr>
            
        </table>
        
        <br>
        
        <table border="1" style="border-collapse: collapse">
        <tr><td style="width:350px ; vertical-align: top">ASSUNTO<br>' . $assunto_pro . '</td> <td colspan="8" style="width:350px  ; height:150px; vertical-align: top ">DESCRIÇÃO<br>' . $texto_pro . '</td>  </tr>
            
        </table>
        
        <br>
        
        <table border="1" style="border-collapse: collapse">
        <tr><td colspan="8" style="width:700px; text-align: center"><b>TRAMITAÇÕES</b></td> </tr>
        <tr><td colspan="2" style=" text-align: center">DATA</td> <td colspan="2" style="text-align: center">DESTINO</td> <td colspan="4" style="text-align: center">DESPACHO</td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
         <tr><td colspan="2" style=" text-align: center"></td> <td colspan="2" style="text-align: center"></td> <td colspan="4" style="text-align: center"><br><br><br></td></tr>    
          
        </table>
        <br>
        <table border="1" style="border-collapse: collapse">
        <tr><td colspan="8" style="width:700px; text-align: center"><b>OBSERVAÇÕES</b></td> </tr>
        <tr><td colspan="8" style="height:120px; text-align: center"></td> </tr>
        </table>
';
//        





        include("pdf/mpdf.php");
        $mpdf = new mPDF('c', 'A4', '', '', 17, 10, 27, 25, 16, 13);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        $stylesheet = file_get_contents('mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('mpdf.pdf', 'I');
        exit;
        ?>

    </body>
</html>