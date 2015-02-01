<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch all exhibits from museum
if ($exoid != 0) {
$ftch = "SELECT museums_id FROM exhibits WHERE active = 1 AND  id = $exoid LIMIT 1";
$result_museumsid = mysql_query($ftch);
$ftch_museumsid = mysql_fetch_row($result_museumsid);
$num_rows = mysql_num_rows($result_museumsid);
$museumsid = $ftch_museumsid[0];

$ftchExo = "SELECT id,title FROM exhibits WHERE active = 1 AND  museums_id = $museumsid AND id != $exoid ORDER BY title ASC";
$result_exo = mysql_query($ftchExo);
echo "<h2>More Exhibits</h2>";
echo "<ul>";
if ($num_rows != 0) {
	while(list($id,$title)= mysql_fetch_row($result_exo))
	{
	echo "<li><a href='?id=$id&name=$title' class='lnkExo'>$title</a></li>";
	}
} //else {echo "<option value='0'>No Active States</option>"; }
$ftchAllNumber = "SELECT * FROM exhibits WHERE active = 1 AND museums_id = $museumsid";
$result_all_num = mysql_query($ftchAllNumber);
$result_all_num_rows = mysql_num_rows($result_all_num);
echo "<li class='last'><div class='hmany'>$result_all_num_rows</div> <span>Total Exhibits from Museum</span></li>";
echo "</ul>";
mysql_free_result($result_all_num);
mysql_free_result($result_museumsid);
mysql_free_result($result_exo);
}
else {
	echo "<h2>Select a Museum</h2>";
	$ftchMuse = "SELECT id,name,fav FROM museums WHERE active = 1 ORDER BY name ASC";
	$result_muse = mysql_query($ftchMuse);
	$num_rows = mysql_num_rows($result_muse);
	//echo "<ul>";
	if ($num_rows != 0) {
		while(list($id,$name)= mysql_fetch_row($result_muse))
		{
		$ftchAllNumber = "SELECT * FROM exhibits WHERE active = 1 AND museums_id = $id";
		$result_all_num = mysql_query($ftchAllNumber);
		$result_all_num_rows = mysql_num_rows($result_all_num);
		echo "<div class='smuse'><a href='?mid=$id&name=$name' class='lnkExo'><div class='smuselogo' style='background-image:url(/graphics/museums/$id.jpg);background-size:80px 85px;'></div>$name</a><p>It has $result_all_num_rows exhibits available</p></div>";
		}
		
	}
	//echo "</ul>";
	mysql_free_result($result_all_num);
	mysql_free_result($result_muse);
}

//include ('bin/db/closedb.php');
?>