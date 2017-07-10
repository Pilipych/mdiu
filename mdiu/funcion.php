<?
mysql_select_db("pap_system", mysql_connect('localhost', 'root', ''));
mysql_query("SET NAMES 'utf-8'");
function zap($z) {
  $a=mysql_query($z);
  $x=mysql_affected_rows();
  if ($x<0)
    echo "$x >>> <font color='red'>$z</font><br>";
  return($a);
}

// Запрос и проверка ошибок
function zapr($z) {
  $a=mysql_query($z);
  $x=mysql_affected_rows();
  if ($x<0)
    echo "$x >>> <font color='red'>$z</font><br>";
  else
    echo "$x >>> $z<br>";
  return($a);
}
?>