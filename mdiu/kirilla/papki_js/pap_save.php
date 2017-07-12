<?

$parent_no=$_POST['parent_no'];
  $name=$_POST['nam'];
  if($_POST['nam'])
  $d= mysql_query("INSERT INTO `pap_system`.`papki`(`parent_no`,`pap_name`) VALUES ('$parent_no','$name')");
 
 
?>