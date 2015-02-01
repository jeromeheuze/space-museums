<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch museum
if ($musid != 0) {
$ftchMus = "SELECT id,title FROM exhibits WHERE active = 1 AND  museums_id = $musid ORDER BY title ASC";
$result_mus = mysql_query($ftchMus);
$num_rows = mysql_num_rows($result_mus);
echo "<h2>Exhibits Available</h2>";
echo "<ul>";
if ($num_rows != 0) {
	while(list($id,$title)= mysql_fetch_row($result_mus))
	{
	echo "<div class='emuse'><a href='../exhibits/?id=$id&name=$title' title='$title' class='lnkExo'><div class='emuselogo' style='background-image:url(/graphics/exhibits/$id.jpg);background-size:80px 80px;'></div></a></div>";
	}
} //else {echo "<option value='0'>No Active States</option>"; }
$ftchAllNumber = "SELECT * FROM exhibits WHERE active = 1 AND museums_id = $musid";
$result_all_num = mysql_query($ftchAllNumber);
$result_all_num_rows = mysql_num_rows($result_all_num);
echo "<li class='last'><div class='hmany'>$result_all_num_rows</div> <span>Total Exhibits from Museum</span></li>";
echo "</ul>";
mysql_free_result($result_all_num);
mysql_free_result($result_mus);
}
else {
	echo "<h2>View Exhibits from:</h2>";
	$ftchMuse = "SELECT id,name,fav FROM museums WHERE active = 1 ORDER BY fav ASC LIMIT 10";
	$result_muse = mysql_query($ftchMuse);
	$num_rows = mysql_num_rows($result_muse);
	//echo "<ul>";
	if ($num_rows != 0) {
		while(list($id,$name)= mysql_fetch_row($result_muse))
		{
		$ftchAllNumber = "SELECT * FROM exhibits WHERE active = 1 AND museums_id = $id";
		$result_all_num = mysql_query($ftchAllNumber);
		$result_all_num_rows = mysql_num_rows($result_all_num);
		echo "<div class='smuse'><a href='?id=$id&name=$name' class='lnkExo'><div class='smuselogo' style='background-image:url(/graphics/museums/$id.jpg);background-size:80px 85px;'></div>$name</a><p>It has $result_all_num_rows exhibits available</p></div>";
		}
	}
	//echo "</ul>";
	mysql_free_result($result_all_num);
	mysql_free_result($result_muse);
}

//include ('bin/db/closedb.php');
?>