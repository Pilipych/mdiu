<?
require_once("funcion.php");
require_once("/bd/kassa.php");
require_once("/bd/papki.php");
if($_POST['save']){
  $rashod=$_POST['rashod'];
  $prihod=$_POST['prihod'];
  $koment=$_POST['koment'];
  $pap_no=$_POST['pap_no'];
  $vreme=mktime($_POST['chas'],$_POST['min'],0,$_POST['mes'],$_POST['den'],$_POST['god']);

  $x_mes=18;
  if($_POST['koment'])
  $d=zap("UPDATE `kassa` SET `vreme`='$vreme', `prihod`='$_POST[prihod]',`rashod`='$_POST[rashod]',`pap_no`='$_POST[pap_no]',`x_mes`='18',`koment`='$_POST[koment]'  where `kas_no`=$_GET[kas_no]");
}

$content .="<div class='row'>
<div class='col-sm-7'>";

$papk=Papki::select(null);
if($_GET['kas_no']){
  
$files=Kassa_file::select("`kas_no`=$_GET[kas_no]");

foreach ($files as $k => $v){

$timestam1= $v['vreme'];
$d=date('d',$timestam1);
$m=date('m',$timestam1);
$y=date('y',$timestam1);
$H=date('H',$timestam1);
$i=date('i',$timestam1);
$content .="
<form method='post'>
<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon1'>Дата/время</span>
  <table border='0' width='auto'><tr><td>&nbsp;  __ 
  <input class='inpatik' type='text' size='1' maxlength='2'   name='den' value='$d'>.
  <input class='inpatik' type='text' size='1' maxlength='2'  name='mes' value='$m'>.
  <input class='inpatik' type='text' size='3' maxlength='4' name='god'  value='$y'> __ 
  <input class='inpatik' type='text' size='1' maxlength='2'  name='chas' value='$H'>:
  <input class='inpatik' type='text' size='1' maxlength='2'  name='min' value='$i'>
  __</td></tr></table>
</div><br>

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
<span style='height:25px;  font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon2'> Выбор папки : </span>
  <select name='pap_no'  class='selectpicker form-control'  style='width:auto; height:40px;font-size:15px;'>
  <optgroup label='Выбор  папки:'>";
    foreach ($papk as $ki => $vi)
    {
      $content .="<option value='$ki' ".($v[pap_no]== $ki ? "selected" : "")." >$vi</option>";
    }

//============== Для ввода.
$content .="
</optgroup></select></div>
<div><br></div>
<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span  style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon ' id='sizing -addon1'>Приход</span>
  <input style='font-size:15px;' type='text' name='prihod' value='$v[prihod]' class='form-control' placeholder='Введите приход' aria-describedby='sizing-addon1'>
</div><br> 

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon ' id='sizing-addon1'>Расход</span>
  <input style='font-size:15px;' type='text' name='rashod' value='$v[rashod]' class='form-control' placeholder='Введите расход' aria-describedby='sizing-addon1'>
</div><br> 

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span  style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon ' id='sizing-addon1'>Комментарий</span>
  <input style='font-size:15px;' type='text' name='koment' value='$v[koment]' class='form-control' placeholder='Введите комментарий' aria-describedby='sizing-addon1'>
</div><br> 

<input style='background-color:#f4a024; width:160px;height:40px;' class='btn btn-info' type='submit' name='save'  value='Сохранить изминения' />
</form>";
}


}
$content .="</div></div>";





if(!$_GET['kas_no']){
$content .="<div class='row'><div class='col-sm-12'>";
if($_POST['save']){
  $rashod=$_POST['rashod'];
  $prihod=$_POST['prihod'];
  $koment=$_POST['koment'];
  $pap_no=$_POST['pap_no'];
  $vreme=mktime($_POST['chas'],$_POST['min'],0,$_POST['mes'],$_POST['den'],$_POST['god']);

  $x_mes=18;
  if($_POST['koment'])
  $d=zap("INSERT INTO `pap_system`.`kassa`(`vreme`,`prihod`,`rashod`,`pap_no`,`x_mes`,`koment`) VALUES ('$vreme','$prihod',' $rashod','$pap_no','$x_mes','$koment')");
}


//============== Формирование текущего времени и даты.
$timestam=time();
$d=date('d',$timestam);
$m=date('m',$timestam);
$y=date('y',$timestam);
$H=date('H',$timestam);
$i=date('i',$timestam);




$content .="
<form method='post'>

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon1'>Дата/время</span>
  <table border='0' width='auto'><tr><td>&nbsp;  __ 
  <input class='inpatik' type='text' size='1' maxlength='2'   name='den' value='$d'>.
  <input class='inpatik' type='text' size='1' maxlength='2'  name='mes' value='$m'>.
  <input class='inpatik' type='text' size='3' maxlength='4' name='god'  value='$y'> __ 
  <input class='inpatik' type='text' size='1' maxlength='2'  name='chas' value='$H'>:
  <input class='inpatik' type='text' size='1' maxlength='2'  name='min' value='$i'>
  __</td></tr></table>
</div><br>

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
<span style='height:25px;  font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon2'> Выбор папки : </span>
  <select name='pap_no'  class='selectpicker form-control'  style='width:auto; height:40px;font-size:15px;'>
  <optgroup label='Выбор  папки:'>";
    foreach ($papk as $k => $v)
    {
      $content .="<option value='$k'>$v</option>";
    }

//============== Для ввода.
$content .="
</optgroup></select></div>
<div><br></div>
<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon1'>Приход</span>
  <input style='font-size:15px;' type='text' name='prihod' class='form-control' placeholder='Введите приход' aria-describedby='sizing-addon1'>
</div><br> 

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon1'>Расход</span>
  <input style='font-size:15px;' type='text' name='rashod' class='form-control' placeholder='Введите расход' aria-describedby='sizing-addon1'>
</div><br> 

<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon1'>Комментарий</span>
  <input style='font-size:15px;' type='text' name='koment' class='form-control' placeholder='Введите комментарий' aria-describedby='sizing-addon1'>
</div><br> 

<input style='background-color:#f4a024; width:150px;height:40px;' type='submit' name='save' class='btn btn-info' value='Создать запись' />
</form>";
$content .="</div></div>";
}



$content .="<div class='row'><div class='col-sm-12'>";
$w=mysql_query("SELECT * FROM `pap_system`.`kassa` ");
  while ($l = mysql_fetch_assoc($w)) {
    $papki[$l['kas_no']] = $l['koment'];
  }
  foreach ($papki as $key => $value) {
   $content .= "<p id='$key' class=''><a href='fikeform.php?kas_no=$key' >$value</a></p>";
  }
$content .="</div></div>";
















require_once('element.php');

?>