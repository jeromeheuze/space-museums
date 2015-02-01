<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch cat/topics

$ftch = "SELECT id,name,fav,url_map,added FROM museums WHERE active = 1 ORDER BY RAND() LIMIT 4";
$result_muse = mysql_query($ftch);
$num_rows = mysql_num_rows($result_muse);

if ($num_rows != 0) {
	while(list($id,$name,$fav,$url_map,$added)= mysql_fetch_row($result_muse))
	{
	$ftchNumber = "SELECT * FROM exhibits WHERE active = 1 AND museums_id = $id";
	$result_exo_num = mysql_query($ftchNumber);
	$result_exo_num_rows = mysql_num_rows($result_exo_num);
	
	$days = (strtotime(date("Y-m-d")) - strtotime("$added")) / (60 * 60 * 24);
	if ($days == 1) {$day_txt = "Yesterday";} else {$day_txt = "Last ".$days." Days";}
	if ($days == 0) {$day_txt = "Today";}
	//echo "<li><div class='hmany'>$result_cat_num_rows</div> <a href='/topics?id=$id' class='lnkTopic'>$catname</a></li>";
	
	echo '<div class="muse">';
	if ( $days < 30 ) { echo '<div class="new iSprites iNew" title="Added '.$day_txt.'"></div>'; }
	echo '<a href="/museums/?id='.$id.'&name='.$name.'" title="'.$name.'"><img src="/graphics/museums/'.$id.'.jpg" alt="'.$name.'" /></a>';
	echo '<div>';
	echo '<h3><a href="/museums/?id='.$id.'&name='.$name.'" title="'.$name.'">'.$name.'</a></h3>';
	echo '<ul><li><a class="iSprites mapIt" href="'.$url_map.'&output=embed" title="Map '.$name.'">Map it!</a></li></ul>';
	echo '<ul><li class="redtri"><div class="iSprites iHeart"></div><div class="iHeartCounter">'.$fav.'</div></li><li class="leftline lnk"><a href="/museums/?id='.$id.'&name='.$name.'">'.$result_exo_num_rows.' Exhibits</a></li></ul>';
	echo '</div>';
	echo '</div>';
	}
	mysql_free_result($result_exo_num);
} //else {echo "<option value='0'>No Active States</option>"; }

//clean up
mysql_free_result($result_muse);
//include ('bin/db/closedb.php');
?>