<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');

	$ftchStoreRAIhp = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 ORDER BY id DESC LIMIT 9";
	$result_StoreRAIhp = mysql_query($ftchStoreRAIhp);
	$num_rows = mysql_num_rows($result_StoreRAIhp);
	if ($num_rows != 0) {
		echo '<div class="recentAddedItemsHP">';
		while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_StoreRAIhp))
		{
			echo "<div><img src='".$img."' alt='".$title."' /></div>";
		}
		echo '<div><a class="raiBtn" href="/store/">View Store</a></div>';
		echo '</div>';
	}
mysql_free_result($result_StoreRAIhp);
//include ('bin/db/closedb.php');
?>