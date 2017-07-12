<?
require_once("function.php");
if($_POST['save']){
  $rashod=$_POST['rashod'];
  $prihod=$_POST['prihod'];
  $koment=$_POST['koment'];
  $pap_no=$_POST['pap_no'];
  $vreme=mktime($_POST['chas'],$_POST['min'],0,$_POST['mes'],$_POST['den'],$_POST['god']);
  $x_mes=18;
  if($_POST['koment'])
  $d=mysql_query("UPDATE `kassa` SET `vreme`='$vreme', `prihod`='$_POST[prihod]',`rashod`='$_POST[rashod]',`pap_no`='$_POST[pap_no]',`x_mes`='18',`koment`='$_POST[koment]'  where `kas_no`=$_GET[kas_no]");
}

if($_POST['save1']){
  $rashod=$_POST['rashod'];
  $prihod=$_POST['prihod'];
  $koment=$_POST['koment'];
  $pap_no=$_POST['pap_no'];
  $vreme=mktime($_POST['chas'],$_POST['min'],0,$_POST['mes'],$_POST['den'],$_POST['god']);
  $x_mes=18;
  if($_POST['koment'])
  $d=mysql_query("INSERT INTO `pap_system`.`kassa`(`vreme`,`prihod`,`rashod`,`pap_no`,`x_mes`,`koment`) VALUES ('$vreme','$prihod',' $rashod','$pap_no','$x_mes','$koment')");
}
?>