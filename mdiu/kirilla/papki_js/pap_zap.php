<?	

mysql_select_db("pap_system", mysql_connect('localhost', 'root', ''));
    mysql_query("SET NAMES 'utf-8'");
 $pap_no = $_POST['pap_no'];
 var_show($_POST);
   		 $b = mysql_query($bbc = "SELECT * FROM `pap_system`.`kassa` WHERE `pap_no` = '$pap_no' ");
   	echo "$bbc";
    	 while ($k = mysql_fetch_assoc($b)) {
    	  	$kas_no[$k['kas_no']] = $k;
   		 }
      if($kas_no){
   		 foreach ($kas_no as $key => $l) {

   		 // $files[$key] =("<font color='red'>Дата: </font>").date('d.m.Y', $l['vreme']).("<font color='red'> Cумма: </font>").($l['prihod']+$l['rashod']).("<font color='red'> Содержание: </font>").$l['koment'];
        $files[$key] = $l['koment'];
   		 }
    foreach ($files as $key => $value) {
      $pref = "files_".$key;
        echo "<p class='new_el ' id = '$pref' style=' background:#FFFACD;  heigth:100px;margin-top:10px;font-size:1.3em; border-style:dashed; border-color:#87CEEB;width:670px; padding: 5px; color:black;'> $value  </p>";
    }
     }
    	function var_show($var){
	echo "<pre>".print_r($var,true)."</pre>";
	}


   

    ?>