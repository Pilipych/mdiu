<?
/*
include_once ("/bd/papki.php");
$papki= Papki::select($where);
*/
class Papki{

	//функция выборки для select
	static public function select($where){
		$q = mysql_query("SELECT * FROM `pap_system`.`papki`".($where ? " WHERE $where":''));
		$papk[0]='';
		while ($a = mysql_fetch_assoc($q)) {
  		$papk[$a['pap_no']] = $a['name'];
  		}
  		return $papk;
	}


}

?>