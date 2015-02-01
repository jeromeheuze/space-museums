<?php
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch museums

if ($simid != 0) {
	$ftchMus = "SELECT * FROM learning WHERE active = 1 AND id = $simid LIMIT 1";
	$result_mus = mysql_query($ftchMus);
	$num_rows = mysql_num_rows($result_mus);

	while(list($id,$name,$description,$url,$active,$fav,$twitter,$facebook,$video,$url_download,$added)= mysql_fetch_row($result_mus))
	{
	echo "<div class='subrow' style='background:url(/graphics/learning/".$id.".jpg) 30px 30px no-repeat #fff;' itemscope itemtype='http://schema.org/Organization'>";
	echo "<a href='$url' class='css3button downloadBtn' title='Learn More about $name' target='_blank'>Visit</a>";
	echo "<h2 itemprop='name'>$name</h2>";
	echo "<p>$description</p>";
	echo "<div class='info'><h3>Project Information</h3><p>Website: <a href='$url' target='_blank'>$url</a></p>";
	echo "<div class='musefb'><fb:like send='false' layout='button_count' width='450' show_faces='true' font='arial'></fb:like></div>";
	if ($facebook != '') {
	echo "<div class='musefb'><a target='_blank' href='$facebook' class='fb-link' title='Facebook Page: ".htmlspecialchars($name, ENT_QUOTES)."'>$name</a></div>";
	}
	echo "<div class='musegp'><div class='g-plus' data-action='share'></div></div>";
	if ($twitter != '') {
	echo "<div class='musefb'>";
	include ('includes/sim-tweet.php');
	echo "</div>";
	}
	echo "<div class='redtri'><div class='iSprites iHeart'></div><div class='iHeartCounter'>$fav</div></div></div>";
	if ($video != '') {
	echo "<div class='video'>$video</div>";
	}
	echo "</div>";
	
	}
	mysql_free_result($result_mus);

} else {
	if ($simid == 0) {
		$ftchAll = "SELECT id,name,description,fav,facebook FROM learning WHERE active = 1 ORDER BY name ASC";
	} else {
		$ftchAll = "SELECT id,name,description,fav,facebook FROM learning WHERE active = 1 AND museums_id = $musmid ORDER BY name ASC";
	}
	
	$result_all = mysql_query($ftchAll);
	while(list($id,$name,$description,$fav,$facebook)= mysql_fetch_row($result_all))
	{
	echo "<div class='subrow' style='background:url(/graphics/learning/".$id.".jpg) 15px 15px no-repeat #fff;'>";
	echo "<h2><a href='?id=$id&name=$name' title='".htmlspecialchars($name, ENT_QUOTES)."'>$name</a></h2>";
	echo "<p>$description</p>";
	echo "<div class='redtri'><div class='iSprites iHeart'></div><div class='iHeartCounter'>$fav</div></div>";
	if ($facebook != '') {echo "<a target='_blank' href='$facebook' class='fb-link' title='Facebook Page: ".htmlspecialchars($name, ENT_QUOTES)."'>$name</a>";}
	echo "</div>";
	}
	mysql_free_result($result_all);

}
//echo "<p class='norecords'>No Museum with this name.</p>";

//include ('bin/db/closedb.php');
?>