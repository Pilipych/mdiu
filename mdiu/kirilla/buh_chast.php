<?  
mysql_select_db("pap_system", mysql_connect('localhost', 'root', ''));
	mysql_query("SET NAMES 'utf-8'");
if ($_GET['save']) {
	zap("INSERT INTO `papki` (`pap_name`,`parent_no`) VALUES ('$_POST[pap_name]','$_POST[parent_no]')");
}
// Родительский массив
$q=mysql_query("SELECT * FROM `papki` ORDER BY `parent_no`");
while ($a=mysql_fetch_assoc($q)) {
	$parents[$a['parent_no']][] = array(
		'pap_no' => $a['pap_no'],
		'pap_name' => $a['pap_name'],
	);
}
$content .= "<div class='row' >
<input style='background-color:#f4a024; width:160px;height:40px;padding-left:8px;' class='btn btn-info create-pap' type='submit' name='pap_save'  value='Создать папку'>
<input style='background-color:#f4a024; width:210px;height:40px;padding-left:8px;' class='btn btn-info' type='submit' name='kas_save'  action='../ved.php' value='Создать кассовую операцию'>
</div>
<div class='row' ><br></div>
";
$content .= "<div class='row'>";
$content .= "<div class='float col-sm-3' >
<div style='position:fixed; overflow-y: scroll;height:320px;width:200px;'>
<ul id='browser' class='filetree'>";
if ($parents) {
	// Сортировка папок по имени
	$_GET['sort'] = 'pap_name';
	$_GET['dir'] = 'down';
	foreach ($parents as $k=>$v)
		usort($parents[$k], 'sortirofka');
	// Присвоение переменным начальных значений
	$content .= "<ul >\n";
	$option_parent .= "<option value='0'></option>";
	$level = 1;
	$parent_no = 0;
	$pap_levels[$level] = $parent_no;
	$papka = current($parents[$parent_no]);
}
// Цикл для формирования списка
while ($level) {
	// Элемент списка (очередная папка)
	if ($papka) {
		$content .= "<li><span class='folder lotok files' id='$papka[pap_no]'><span>$papka[pap_name]</span></span>\n";
		$option_parent .= "<option value='$papka[pap_no]'>$papka[pap_name]</option>\n";
	}
	// Если список папок закончился
	else {
			$content .= "</ul>\n".($level!=1 ? "</li>\n" : '');
		// Уменьшаем уроввень на единицу
		$level--;
		// Условие выхода из цикла
		if ($level==0) break;
		// Возваращаемся к родительской папке данного уровня
		$parent_no = $pap_levels[$level];
		// Очередная папка
		$papka = next($parents[$parent_no]);
		continue;
	}
	// Если у текущей паки есть подпаки
	if ($parents[$papka['pap_no']]) {
		$content .= "<ul >\n";
		// Новый номер родительской папки
		$parent_no = $papka['pap_no'];
		// Устанавливаем новый уровень
		$level++;
		$pap_levels[$level] = $parent_no;
		// Очередная папка
		$papka = current($parents[$parent_no]);
	}
	// Если у текущей папки нет подпапок
	else {
		$content .= "</li>\n";
		// Следующая папка
		$papka = next($parents[$parent_no]);
	}
};
$content .= "</ul></div>
</div>";
$content .= "<div class='col-sm-9' style = 'float: left;margin-left:50px;width:250px;' id='info' onmousedown='return false' onselectstart='return false'> Прив</div>";
// Сортировка массива по значениям
// usort($stroki, 'sortirofka'); 
function sortirofka($a,$b) {
	$sort=$_GET['sort'];
	$sort2=$_GET['sort2'];
	$sort3=$_GET['sort3'];
	if ($_GET['dir']=='down') {	// от меньшего к большему
		$x=$b;
		$y=$a;
	} else {					// от большего к меньшему
		$x=$a;
		$y=$b;
	}
	if ($x[$sort]==$y[$sort]) {
		if ($x[$sort2]==$y[$sort2]) {
			if ($x[$sort3]==$y[$sort3]) 
				return 0;
			return ($x[$sort3]>$y[$sort3]) ? -1 : 1;
		}
		return ($x[$sort2]>$y[$sort2]) ? -1 : 1;
    }
    return ($x[$sort]>$y[$sort]) ? -1 : 1;
}
$content .= "</div>";
require_once('shablon/element.php');
?>
