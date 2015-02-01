<?php
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
include ('bin/db/truncateString.php');


//fetch exhibits


$ftchExohpc = "SELECT id,title,museums_id,start_date FROM exhibits WHERE active = 1 AND isOnline = 0 ORDER BY RAND() LIMIT 4";
$result_Exohpc = mysql_query($ftchExohpc);
$num_rowsc = mysql_num_rows($result_Exohpc);
// tab
echo '<div class="tabsHeader">';
echo '<ul>';
echo '<li id="tabCurrent" class="selected"><a class="iSprites iCurrent">Current</a></li>';
echo '<li id="tabOnline"><a class="iSprites iOnline">Online</a></li>';
//echo '<li id="tabFuture"><a class="iSprites iFuture">Future</a></li>';
echo '</ul>';
echo '</div>';
echo '<div class="exoslist" id="iCurrent">';
if ($num_rowsc != 0) {
	while(list($id,$title,$museums_id,$start_date)= mysql_fetch_row($result_Exohpc))
	{
	$ftchMuse = "SELECT name,city,state_id FROM museums WHERE active = 1 AND id = $museums_id";
	$result_muse = mysql_query($ftchMuse);
	$ftch_muse = mysql_fetch_row($result_muse);
	$museName = $ftch_muse[0];
	$museCity = $ftch_muse[1];
	$state_id = $ftch_muse[2];
	$ftchState = "SELECT abr FROM us_state WHERE active = 1 AND id = $state_id LIMIT 1";
	$result_state = mysql_query($ftchState);
	$ftch_state = mysql_fetch_row($result_state);
	$museState = $ftch_state[0];
	echo "<div class='exos'>";
	echo "<a href='/exhibits/?id=$id&name=$title' title='$title'><img src='/graphics/exhibits/$id.jpg' alt='' /></a>";
	echo "<h3><a href='/exhibits/?id=$id&name=$title' title='$title'>".truncateString($title, 40, true)."</a></h3>";
	echo "<h4>".truncateString($museName, 40, true)."</h4>";
	echo "<h4>$museCity, $museState</h4>";
	echo "</div>";
	}
	mysql_free_result($result_muse);
	mysql_free_result($result_state);
}
echo '</div>';

$ftchExohpo = "SELECT id,title,museums_id,start_date FROM exhibits WHERE active = 1 AND isOnline = 1 ORDER BY RAND() LIMIT 4";
$result_Exohpo = mysql_query($ftchExohpo);
$num_rowso = mysql_num_rows($result_Exohpo);
echo '<div class="exoslist" id="iOnline">';
if ($num_rowso != 0) {
	while(list($id,$title,$museums_id,$start_date)= mysql_fetch_row($result_Exohpo))
	{
	$ftchMuse = "SELECT name,city,state_id FROM museums WHERE active = 1 AND id = $museums_id";
	$result_muse = mysql_query($ftchMuse);
	$ftch_muse = mysql_fetch_row($result_muse);
	$museName = $ftch_muse[0];
	$museCity = $ftch_muse[1];
	$state_id = $ftch_muse[2];
	$ftchState = "SELECT abr FROM us_state WHERE active = 1 AND id = $state_id LIMIT 1";
	$result_state = mysql_query($ftchState);
	$ftch_state = mysql_fetch_row($result_state);
	$museState = $ftch_state[0];
	echo "<div class='exos'>";
	echo "<a href='/exhibits/?id=$id&name=$title' title='$title'><img src='/graphics/exhibits/$id.jpg' alt='' /></a>";
	echo "<h3><a href='/exhibits/?id=$id&name=$title' title='$title'>$title</a></h3>";
	echo "<h4>$museName</h4>";
	echo "<h4>$museCity, $museState</h4>";
	echo "</div>";
	}
	mysql_free_result($result_muse);
	mysql_free_result($result_state);
}
echo '</div>';

echo '<p><a href="/exhibits/">View more</a></p>';
mysql_free_result($result_Exohpc);
mysql_free_result($result_Exohpo);
//include ('bin/db/closedb.php');
?>