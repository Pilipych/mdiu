<?
/*
include_once WAYY.'/bd/kassa.php';
$file = Kassa_file::select($where);
*/

class Kassa_file{
	static public function select($where)
	{
		$d=mysql_query("SELECT * FROM `pap_system`.`kassa`".($where ? " WHERE $where":''));
  		while ($l = mysql_fetch_assoc($d))
  		{
  			$l['rashod']/100;
  			$l['prihod']/100;
    	$file[$l['kas_no']] = $l;
    	}
    	return $file;
	}


}
?>