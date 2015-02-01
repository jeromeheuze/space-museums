<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');

	$ftchNewshp = "SELECT id,title,link,museums_id FROM news_ext ORDER BY id DESC";
	$result_Newshp = mysql_query($ftchNewshp);
	$num_rows = mysql_num_rows($result_Newshp);
	if ($num_rows != 0) {
		echo '<div class="recentNewsALL">';
		while(list($id,$title,$link,$museums_id)= mysql_fetch_row($result_Newshp))
		{
			$ftchMuseum = "SELECT id,name FROM museums WHERE id = $museums_id LIMIT 1";
			$result_Museum = mysql_query($ftchMuseum);
			$muse = mysql_fetch_row($result_Museum);
			$museID = $muse[0];
			$museName = $muse[1];
			echo "<div><img src='/graphics/museums/".$museums_id.".jpg' alt='".$title."' /><h3 class='htitles'><a href='$link' target='_blank'>$title</a></h3><p><a href='/museums/?id=$museID&name=$museName'>$museName</a></p></div>";
		}
		echo "</div>";
	}
mysql_free_result($result_Newshp);
//include ('bin/db/closedb.php');
?>