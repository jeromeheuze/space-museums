<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');

	$ftchStoreRAIm = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 AND storecat_id = 1 ORDER BY id DESC LIMIT 6";
	$result_StoreRAIm = mysql_query($ftchStoreRAIm);
	$num_rows = mysql_num_rows($result_StoreRAIm);
	if ($num_rows != 0) {
		echo '<div class="recentAddedItems">';
		echo '<h2 class="htitles">Recently Added Movies</h2>';
		while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_StoreRAIm))
		{
			echo "<div><img src='".$img."' alt='".$title."' /></div>";
		}
		echo '<div><a class="raiBtn" href="?cid=1&name=Movies">View All</a></div>';
		echo '</div>';
	}
mysql_free_result($result_StoreRAIm);
//include ('bin/db/closedb.php');
?>