<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');

	$ftchStoreRAIma = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 AND storecat_id = 3 ORDER BY id DESC LIMIT 6";
	$result_StoreRAIma = mysql_query($ftchStoreRAIma);
	$num_rows = mysql_num_rows($result_StoreRAIma);
	if ($num_rows != 0) {
		echo '<div class="recentAddedItems">';
		echo '<h2 class="htitles">Recently Added Items about Mars</h2>';
		while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_StoreRAIma))
		{
			echo "<div><img src='".$img."' alt='".$title."' /></div>";
		}
		echo '<div><a class="raiBtn" href="?cid=3&name=Mars">View All</a></div>';
		echo '</div>';
	}
mysql_free_result($result_StoreRAIma);
//include ('bin/db/closedb.php');
?>