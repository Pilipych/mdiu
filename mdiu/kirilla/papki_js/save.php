<?php       
mysql_select_db("pap_system", mysql_connect('localhost', 'root', ''));
mysql_query("SET NAMES 'utf-8'");  
$dok_no=$_REQUEST['pap_no'];
$kas_no=$_REQUEST['kas_no'];
$d=mysql_query("UPDATE `pap_system`.`kassa` SET `pap_no`='$dok_no' WHERE `kas_no`='$kas_no'");
	
?>  