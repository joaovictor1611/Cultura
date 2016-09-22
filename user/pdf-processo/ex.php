<?php

require_once '../conectdb.php';
$lista_ativ = $_POST['ativ_esport'];
//$lista_ativ=  explode(' ' ,$lista_ativ);
$lista_ativ = implode(" ,",$lista_ativ)
        ;echo $lista_ativ;
        $lista_ativ  = explode(',', $lista_ativ);
print_r($lista_ativ);

//echo $lista_ativ[0],[1];




foreach ($lista_ativ as $value){
//    
////    
//   echo "<p></p>",$value;
//   
//   
//   
//   
//}
        

//        

$resultado = mysql_query("select * from t_questao where idt_questao = $value",$dbconn);
                                            if ($resultado){
                                            while($row = mysql_fetch_array($resultado)){ 
                                                echo html_entity_decode($row['enunciado']); 
                                                   echo html_entity_decode($row['item_a']); 
                                                      echo html_entity_decode($row['item_b']); 
                                                         echo html_entity_decode($row['item_d']); 
                                                            echo html_entity_decode($row['item_e']); 
                                                             
                                                
                                            }
}}


//echo " <script> window.location=\"../fpdp181/ex.php\"
//    </script> 
//    "
?><input type="button" value="Imprimir" onClick="self.print();" />