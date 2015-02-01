<?php
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch museums

if ($musid != 0) {
	$ftchMus = "SELECT * FROM museums WHERE active = 1 AND id = $musid LIMIT 1";
	$result_mus = mysql_query($ftchMus);
	$num_rows = mysql_num_rows($result_mus);

	while(list($id,$name,$address,$zip,$city,$country,$state_id,$description,$url,$active,$fav,$twitter,$url_pricing,$url_map,$added)= mysql_fetch_row($result_mus))
	{
	$ftchState = "SELECT id,state,abr FROM us_state WHERE active = 1 AND id = $state_id LIMIT 1";
	$result_state = mysql_query($ftchState);
	$ftch_state = mysql_fetch_row($result_state);
	$stateid = $ftch_state[0];
	$statename = $ftch_state[1];
	$stateabr = $ftch_state[2];
	
	echo "<div class='subrow' style='background:url(/graphics/museums/".$id.".jpg) 30px 30px no-repeat #fff;' itemscope itemtype='http://schema.org/Organization'>";
	echo "<h2 itemprop='name'>$name</h2>";
	echo "<p>$description</p>";
	echo "<div class='address'><h3>Location</h3><p itemprop='address' itemscope itemtype='http://schema.org/PostalAddress'><span itemprop='streetAddress'>$address</span><br /><span itemprop='addressLocality'>$city, $stateabr</span> <span itemprop='postalCode'>$zip</span><br />$country</p><p><a class='iSprites mapIt' href='$url_map&output=embed' title='Map $name'>Map it!</a> or <a class='iSprites gmapIt' href='$url_map' target='_blank' title='Map $name in Google Map'>Google Map it!</a></p></div>";
	echo "<div class='info'><h3>Museum Information</h3><p>Website: <a href='$url' target='_blank'>$url</a></p>";
	//if ($twitter != '') { echo "<div class='musefollow'>"; include ('includes/muse-followTwitter.php'); echo "</div>"; }
	echo "<div class='musefb'><fb:like send='false' layout='button_count' width='450' show_faces='true' font='arial'></fb:like></div>";
	echo "<div class='musegp'><div class='g-plus' data-action='share'></div></div>";
	echo "<div class='redtri'><div class='iSprites iHeart'></div><div class='iHeartCounter'>$fav</div></div></div>";
	if ($twitter != '') {
	echo "<div class='musetweets'>";
	include ('includes/muse-tweet.php');
	echo "</div>";
	}
	echo "</div>";
	
	}
	mysql_free_result($result_mus);
	mysql_free_result($result_state);
} else {
	if ($musmid == 0) {
		$ftchAll = "SELECT id,name,description,state_id,url,fav,twitter,url_pricing,url_map FROM museums WHERE active = 1 ORDER BY name ASC";
	} else {
		$ftchAll = "SELECT id,name,description,state_id,url,fav,twitter,url_pricing,url_map FROM museums WHERE active = 1 AND museums_id = $musmid ORDER BY name ASC";
	}
	
	$result_all = mysql_query($ftchAll);
	while(list($id,$name,$description,$state_id,$url,$fav,$twitter,$url_pricing,$url_map)= mysql_fetch_row($result_all))
	{
	$ftchState = "SELECT id,state,abr FROM us_state WHERE active = 1 AND id = $state_id LIMIT 1";
	$result_state = mysql_query($ftchState);
	$ftch_state = mysql_fetch_row($result_state);
	$stateid = $ftch_state[0];
	$statename = $ftch_state[1];
	$stateabr = $ftch_state[2];

	echo "<div class='subrow' style='background:url(/graphics/museums/".$id.".jpg) 15px 15px no-repeat #fff;'>";
	echo "<h2><a href='?id=$id&name=$name' title='".htmlspecialchars($name, ENT_QUOTES)."'>$name</a></h2>";
	echo "<p>$description</p>";
	echo "</div>";
	}
	mysql_free_result($result_all);
	mysql_free_result($result_state);
}
//echo "<p class='norecords'>No Museum with this name.</p>";

//include ('bin/db/closedb.php');
?>