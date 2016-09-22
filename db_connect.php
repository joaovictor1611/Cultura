<?php
 
 $hostname_db = "localhost";
 $database_db = "estagio";
 $username_db = "root";
 $password_db = "qwe123";


 error_reporting(0);
 
 $mysqli = mysqli_connect("$hostname_db", "$username_db", "$password_db", "$database_db") or die ("Ocorreu um na conexao com o banco de dados! ");

mysqli_query("SET NAMES 'utf8'");
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_results=utf8');


 ?>
