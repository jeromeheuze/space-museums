<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch cat/topics

if ($exoid != 0) {
	$ftchExo = "SELECT * FROM exhibits WHERE active = 1 AND id = $exoid LIMIT 1";
	$ftchCat = "SELECT id,name FROM cat WHERE active = 1 AND id = $exoid LIMIT 1";
	$result_cat = mysql_query($ftchCat);
	$ftch_cat = mysql_fetch_row($result_cat);
	$catid = $ftch_cat[0];
	$catname = $ftch_cat[1];
	$result_exo = mysql_query($ftchExo);
	$num_rows = mysql_num_rows($result_exo);

	while(list($id,$title,$description,$url_exhibit,$cat_id,$museums_id,$start_date,$end_date,$active,$loveit,$isSpace,$isOnline,$url_online)= mysql_fetch_row($result_exo))
	{
	$text = str_replace(chr(130), ',', $description);    // baseline single quote
	$text = str_replace(chr(132), '"', $text);    // baseline double quote
	$text = str_replace(chr(133), '...', $text);  // ellipsis
	$text = str_replace(chr(145), "'", $text);    // left single quote
	$text = str_replace(chr(146), "'", $text);    // right single quote
	$text = str_replace(chr(147), '"', $text);    // left double quote
	$text = str_replace(chr(150), '-', $text);    // en dash
	$description = str_replace(chr(148), '"', $text);    // right double quote
	$ftchCat = "SELECT id,name FROM cat WHERE active = 1 AND id = $cat_id LIMIT 1";
	$ftchMus = "SELECT id,name FROM museums WHERE active = 1 AND id = $museums_id LIMIT 1";
	$result_cat = mysql_query($ftchCat);
	$ftch_cat = mysql_fetch_row($result_cat);
	$catid = $ftch_cat[0];
	$catname = $ftch_cat[1];
	$result_mus = mysql_query($ftchMus);
	$ftch_mus = mysql_fetch_row($result_mus);
	$musid = $ftch_mus[0];
	$musname = $ftch_mus[1];
	
	echo "<div class='subrowExo'>";
	if ($isSpace != 0) {echo "<div class='isSpace'></div>";}
	echo "<div class='mainimg'><img src='/graphics/exhibits/".$id.".jpg' alt='".htmlspecialchars($title, ENT_QUOTES)."' /><ul><li class='redtri'><div class='iSprites iHeart'></div><div class='iHeartCounter'>$loveit</div></li></ul></div>";
	echo "<h2>$title</h2>";
	echo "<p>$description</p>";
	echo "<p class='pt10'><strong>Museum:</strong> <a href='../museums/?id=$musid&name=$musname'>$musname</a> <span>&bull;</span> <strong>Topic:</strong> <a href='../topics/?id=$catid&name=$catname'>$catname</a></p>";
	echo "<p class='pt10'><strong>Link To Exhibit";
	if ($isOnline != 0) { 
		echo" <strong>Online:</strong> <a href='$url_online' target='_blank' class='iSprites isOnline'>&nbsp;</a></p>";
	} else { echo ":</strong> <a href='$url_exhibit' target='_blank'>$title</a>"; }
	echo "</p>";
	echo "<p></p>";
	echo "</div>";

	}
	mysql_free_result($result_exo);
} else {
	if ($exomid == 0) {
		$ftchAll = "SELECT id,title,cat_id,museums_id,isSpace FROM exhibits WHERE active = 1 ORDER BY title ASC";
	} else {
		$ftchAll = "SELECT id,title,cat_id,museums_id,isSpace FROM exhibits WHERE active = 1 AND museums_id = $exomid ORDER BY title ASC";
	}
	
	$result_all = mysql_query($ftchAll);
	while(list($id,$title,$cat_id,$museums_id,$isSpace)= mysql_fetch_row($result_all))
	{
	$ftchCat = "SELECT id,name FROM cat WHERE active = 1 AND id = $cat_id LIMIT 1";
	$ftchMus = "SELECT id,name FROM museums WHERE active = 1 AND id = $museums_id LIMIT 1";
	$result_cat = mysql_query($ftchCat);
	$ftch_cat = mysql_fetch_row($result_cat);
	$catid = $ftch_cat[0];
	$catname = $ftch_cat[1];
	$result_mus = mysql_query($ftchMus);
	$ftch_mus = mysql_fetch_row($result_mus);
	$musid = $ftch_mus[0];
	$musname = $ftch_mus[1];

	echo "<div class='subrow' style='background:url(/graphics/exhibits/".$id.".jpg) -7px -7px no-repeat #fff;'>";
	if ($isSpace != 0) {echo "<div class='isSpace'></div>";}
	echo "<h2><a href='../exhibits/?id=$id&name=$title' title='".htmlspecialchars($title, ENT_QUOTES)."'>$title</a></h2>";
	echo "<p>Topic name: <a href='../topics/?id=$catid&name=$catname'>$catname</a></p>";
	echo "<p>Museum: <a href='../museums/?id=$musid&name=$musname'>$musname</a></p>";
	echo "</div>";
	}
	mysql_free_result($result_all);
}
//	echo "<p class='norecords'>No Exhibits with this name.</p>";

//clean up
mysql_free_result($result_cat);
mysql_free_result($result_mus);
//include ('bin/db/closedb.php');
?>