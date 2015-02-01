<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch cat/topics

$ftch = "SELECT id,name FROM cat WHERE active = 1";
$result_cat = mysql_query($ftch);
$num_rows = mysql_num_rows($result_cat);
echo "<ul>";
if ($num_rows != 0) {
	while(list($id,$catname)= mysql_fetch_row($result_cat))
	{
	$ftchNumber = "SELECT * FROM exhibits WHERE active = 1 AND cat_id = $id";
	$result_cat_num = mysql_query($ftchNumber);
	$result_cat_num_rows = mysql_num_rows($result_cat_num);
	echo "<li><div class='hmany'>$result_cat_num_rows</div> <a href='/topics?id=$id&name=$catname' class='lnkTopic'>$catname</a></li>";
	}
	mysql_free_result($result_cat_num);
	mysql_free_result($result_cat);
} //else {echo "<option value='0'>No Active States</option>"; }
$ftchAllNumber = "SELECT * FROM exhibits WHERE active = 1";
$result_all_num = mysql_query($ftchAllNumber);
$result_all_num_rows = mysql_num_rows($result_all_num);
echo "<li><div class='hmany'>$result_all_num_rows</div> <a href='/topics?id=0' class='lnkTopic'>See All</a></li>";
echo "</ul>";
mysql_free_result($result_all_num);

//legend topic page only
$location = $_SERVER['PHP_SELF'];
//echo $location;
if ($location == "/topics/index.php") { 
echo "<div id='legend'><h3>Legend</h3>";
echo "<div class='isSpace'> <span>= Exhibits about Space</span></div>"; 
echo "</div>";
}

//include ('bin/db/closedb.php');
?>