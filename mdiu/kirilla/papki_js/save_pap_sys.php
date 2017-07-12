<?
	mysql_select_db("pap_system", mysql_connect('localhost', 'root', ''));
	mysql_query("SET NAMES 'utf-8'");
	if($_GET[save]==1)
		$c=mysql_query("INSERT INTO `papki` (`pap_name`,`parent_no`) VALUES ('$_POST[pap_name]','$_POST[parent_no]')");
	
	if($_GET[save]==2)
		$c=mysql_query("INSERT INTO `kassa` (`pap_no`,`koment`,`vreme`,`rashod`,`prihod`,`x_mes`) VALUES 
		('$_POST[pap_no]','$_POST[koment]','$_POST[vreme]',`$_POST[rashod]`,$_POST[prihod],$_POST[x_mes])");
	function var_show($var){
	echo "<pre>".print_r($var,true)."</pre>";
	}
header('Location: /');
exit;


?>