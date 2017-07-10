<?php   
    echo "Вы сохранили: <b>".$_REQUEST['draggableId']."</b>!<br>"; 
     mysql_select_db("tavis_manager", mysql_connect('localhost', 'root', ''));
	mysql_query("SET NAMES 'utf-8'");
	$dok_no=$_REQUEST['dok_no'];
	$koment=$_REQUEST['koment'];  
	$kas_no=$_REQUEST['kas_no'];
		
	$d=mysql_query("UPDATE `tavis_manager`.`kassa` SET `dok_no`='$dok_no' WHERE `kas_no`='$kas_no'");



?>  