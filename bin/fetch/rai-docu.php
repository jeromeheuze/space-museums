<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');

	$ftchStoreRAId = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 AND storecat_id = 2 ORDER BY id DESC LIMIT 6";
	$result_StoreRAId = mysql_query($ftchStoreRAId);
	$num_rows = mysql_num_rows($result_StoreRAId);
	if ($num_rows != 0) {
		echo '<div class="recentAddedItems">';
		echo '<h2 class="htitles">Recently Added Documentaries</h2>';
		while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_StoreRAId))
		{
			echo "<div><img src='".$img."' alt='".$title."' /></div>";
		}
		echo '<div><a class="raiBtn" href="?cid=2&name=Documentaries">View All</a></div>';
		echo '</div>';
	}
mysql_free_result($result_StoreRAId);
//include ('bin/db/closedb.php');
?>