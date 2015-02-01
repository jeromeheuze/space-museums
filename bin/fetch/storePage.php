<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch store
if (($sort === 0)||($sort === "AZ")) { $sorting = "ASC"; } else {$sorting = "DESC";}

	$ftchStore = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 AND storecat_id = $storecatid ORDER BY title $sorting LIMIT $startpoint, $limit";
	$ftchStoreCat = "SELECT id,name FROM storecat WHERE active = 1 AND id = $storecatid LIMIT 1";
	$result_StoreCat = mysql_query($ftchStoreCat);
	$ftch_StoreCat = mysql_fetch_row($result_StoreCat);
	$catid = $ftch_StoreCat[0];
	$catname = $ftch_StoreCat[1];
	mysql_free_result($result_StoreCat);
	
	$ftchAll = "SELECT * FROM store WHERE active = 1 AND storecat_id = $storecatid";
	$result_All = mysql_query($ftchAll);
	$num_rows_all = mysql_num_rows($result_All);
	mysql_free_result($result_All);
	
	echo "<div class='cathead'><h2>$catname</h2></div>";

$result_Store = mysql_query($ftchStore);
$num_rows = mysql_num_rows($result_Store);
if ($num_rows != 0) {
	if ($tmb == 1) {echo "<div class='subrowStoreTmbCont'>";}
	while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_Store))
	{
		if ($tmb == 1) {
		echo "<div class='subrowStoreTmb'>";
		echo "<a href='$url' title='Buy $title from Amazon' target='_blank'><img src='".$img."' alt='$title' /></a>";
		echo "</div>";
		} else {
		echo "<div class='subrowStore' style='background:url(".$img.") 5px 5px no-repeat #fff;background-size:50px 80px;'>";
		echo "<div class='amz'><a href='$url' title='Buy $title from Amazon' target='_blank'><img src='/graphics/icons/Amazon-Icon.png' alt='Buy' /></a></div>";
		echo "<h2><a href='$url' title='".htmlspecialchars($title, ENT_QUOTES)."' target='_blank'>$title</a></h2>";
		echo "<p>Category: <a href='?cid=$catid&name=$catname'>$catname</a></p>";
		echo "</div>";
		}
	}
	if ($tmb == 1) {echo "</div>";}
	echo '<div class="eStoFilter">';
	if ($sort === 0) {$sort = "AZ";}
	$jumpLess = -1;
	$jumpMore = -1;
	$next = $startpoint + $limit;
	$prev = $startpoint - $limit;
	if ($next < $num_rows_all) {$jumpMore = $startpoint + $limit;}
	if ($prev >= 0) {$jumpLess = $startpoint - $limit;}
	
	if ($jumpLess != -1) {echo '<div class="ppages"><a href="?s='.$sort.'&cid='.$storecatid.'&st='.$jumpLess.'">Previous 10</a></div>'; }
	echo "<p>Mouse over names for prices and to buy.</p>";
	if ($jumpMore != -1) {echo '<div class="npages"><a href="?s='.$sort.'&cid='.$storecatid.'&st='.$jumpMore.'">Next 10</a></div>'; }
	echo '</div>';
} else {
	echo "<p class='norecords'>No Item in the store yet.</p>";
}

mysql_free_result($result_Store);
//include ('bin/db/closedb.php');
?>