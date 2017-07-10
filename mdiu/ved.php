<?
    require_once("funcion.php");


/*
$content .="<form method='post' id='multiple_select_form'>
    <div class='input-group' style='width:490px'>
    <span class='input-group-addon' id='basic-addon1'>Наименование</span>
    <input type='text' class='form-control' placeholder='Введите наименование' aria-describedby='basic-addon1'>
    </div><br>
    <input type='submit' name='submit' class='btn btn-info' value='Submit' />
    </form>";*/


mysql_select_db("pap_system", mysql_connect('localhost', 'root', ''));
mysql_query("SET NAMES 'utf-8'");

//==============  Запрос на сохранение.
$q = mysql_query("SELECT * FROM `pap_system`.`papki`");
$papk[0]='';
while ($a = mysql_fetch_assoc($q)) {
	$papk[$a['pap_no']] = $a['name'];
	}
  
//==============  Сохранение
if($_POST['save'])
{http://tavis1/assets/tavis_logo2.png
  
  $parent_no=$_POST['parent_no'];
  $name=$_POST['nam'];
  if($_POST['nam'])
  $d=zapr("INSERT INTO `pap_system`.`papki`(`parent_no`,`name`) VALUES ('$parent_no','$name')");
 
}



$content .="<div class='row'>
<div class='col-sm-6'> dada d</div>
<div class='col-sm-6'>";
//============== Для выбора.
$content .="
<form method='post'>
<div class='input-group input-group-lg' style='width:auto; height:auto;'>
<span style='height:25px;  font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon2'> Выбор папки : </span>
  <select name='parent_no'  class='selectpicker form-control'  style='width:auto; height:40px;font-size:15px;'>
  <optgroup label='Выбор корневой папки:'>";
  	foreach ($papk as $k => $v)
  	{
  		$content .="<option value='$k'>$v</option>";
  	}

//============== Для ввода.
$content .="
</optgroup></select></div>
<div><br></div>
<div class='input-group input-group-lg' style='width:auto; height:auto;'>
  <span style='font-size:13px;background-color:#294a70;color:white;' class='input-group-addon' id='sizing-addon1'>Наименование</span>
  <input style='font-size:15px;' type='text' name='nam' class='form-control' placeholder='Наименование папки' aria-describedby='sizing-addon1'>
</div><br> 
<input style='background-color:#f4a024; width:150px;height:40px;' type='submit' name='save' class='btn btn-info' value='Создать папку' />
</form>";
$content .="</div></div>";

require_once('element.php');

?>