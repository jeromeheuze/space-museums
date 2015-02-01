<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch store categories

$ftch = "SELECT id,name FROM storecat WHERE active = 1";
$result_cat = mysql_query($ftch);
$num_rows = mysql_num_rows($result_cat);
echo "<h2>Store Categories</h2>";
echo "<ul>";
if ($num_rows != 0) {
	while(list($id,$catname)= mysql_fetch_row($result_cat))
	{
	$ftchNumber = "SELECT * FROM store WHERE active = 1 AND storecat_id = $id";
	$result_cat_num = mysql_query($ftchNumber);
	$result_cat_num_rows = mysql_num_rows($result_cat_num);
	echo "<li><div class='hmany'>$result_cat_num_rows</div> <a href='?cid=$id&name=$catname' class='lnkStoreCat'>$catname</a></li>";
	}
	//mysql_free_result($result_cat_num);
	mysql_free_result($result_cat);
} //else {echo "<option value='0'>No Active States</option>"; }
echo "</ul>";

include("../bin/fetch/storePageRecent.php");


//include ('bin/db/closedb.php');
?>