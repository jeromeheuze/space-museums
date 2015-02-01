<?php
//fetch store recent

if ($storecatid != 0 ) {
	$ftchStoreRA = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 AND storecat_id = $storecatid ORDER BY id DESC LIMIT 4";
	$result_StoreRA = mysql_query($ftchStoreRA);
	$num_rows = mysql_num_rows($result_StoreRA);
	if ($num_rows != 0) {
		echo '<div class="recentAdded">';
		echo '<h2>Recently Added</h2>';
		while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_StoreRA))
		{
			echo "<div>".$embedcode."</div>";
		}
		echo '</div>';
	}
} else {
	$ftchStoreRA = "SELECT id,title,img,url,embedcode FROM store WHERE active = 1 ORDER BY id DESC LIMIT 4";
	$result_StoreRA = mysql_query($ftchStoreRA);
	$num_rows = mysql_num_rows($result_StoreRA);
	if ($num_rows != 0) {
		echo '<div class="recentAdded">';
		echo '<h2>Recently Added to Store</h2>';
		while(list($id,$title,$img,$url,$embedcode)= mysql_fetch_row($result_StoreRA))
		{
			echo "<div>".$embedcode."</div>";
		}
		echo '</div>';
	}
}

mysql_free_result($result_StoreRA);
?>