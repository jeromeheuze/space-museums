<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch cat/topics

if ($topicid != 0) {
	$ftchTopic = "SELECT id,title,cat_id,museums_id,isSpace FROM exhibits WHERE active = 1 AND cat_id = $topicid ORDER BY title ASC";
	$ftchCat = "SELECT id,name FROM cat WHERE active = 1 AND id = $topicid LIMIT 1";
	$result_cat = mysql_query($ftchCat);
	$ftch_cat = mysql_fetch_row($result_cat);
	$catid = $ftch_cat[0];
	$catname = $ftch_cat[1];
	mysql_free_result($result_cat);
} else {
	$ftchTopic = "SELECT id,title,cat_id,museums_id,isSpace FROM exhibits WHERE active = 1 ORDER BY title ASC";	
}
$result_topic = mysql_query($ftchTopic);
$num_rows = mysql_num_rows($result_topic);
if ($num_rows != 0) {
	while(list($id,$title,$cat_id,$museums_id,$isSpace)= mysql_fetch_row($result_topic))
	{
	//if ($topicid == 0) {
	$ftchCat = "SELECT id,name FROM cat WHERE active = 1 AND id = $cat_id LIMIT 1";
	$ftchMus = "SELECT id,name FROM museums WHERE active = 1 AND id = $museums_id LIMIT 1";
	$result_cat = mysql_query($ftchCat);
	$ftch_cat = mysql_fetch_row($result_cat);
	$catid = $ftch_cat[0];
	$catname = $ftch_cat[1];
	$result_mus = mysql_query($ftchMus);
	$ftch_mus = mysql_fetch_row($result_mus);
	$musid = $ftch_mus[0];
	$musname = $ftch_mus[1];
	//}
	echo "<div class='subrow' style='background:url(/graphics/exhibits/".$id.".jpg) -7px -7px no-repeat #fff;'>";
	if ($isSpace != 0) {echo "<div class='isSpace'></div>";}
	echo "<h2><a href='../exhibits/?id=$id&name=$title' title='".htmlspecialchars($title, ENT_QUOTES)."'>$title</a></h2>";
	echo "<p>Topic name: <a href='?id=$catid&name=$catname'>$catname</a></p>";
	echo "<p>Museum: <a href='../museums/?id=$musid&name=$musname'>$musname</a></p>";
	echo "</div>";
	}
	mysql_free_result($result_cat);
	mysql_free_result($result_mus);
} else {
	echo "<p class='norecords'>No Exhibit with this topic yet.</p>";
}

mysql_free_result($result_topic);
//include ('bin/db/closedb.php');
?>