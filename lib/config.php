



<?php
$host = "127.0.0.1";
$dbuser = "root";
$dbpwd = "";
$db = "yacarta";


$connect = new mysqli($host, $dbuser, $dbpwd,$db);
	if(!$connect){
		echo ("<p>"."No se ha conectado a la base de datos"."</p>");}
	else{
		$select = mysqli_select_db ($connect,$db);
		
	}
?>
