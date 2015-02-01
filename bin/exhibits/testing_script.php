<?php 
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
date_default_timezone_set('America/Los_Angeles');
include_once('bin/exhibits/simple_html_dom.php');
include ('bin/db/config.php');
include ('bin/db/opendb.php');

$museum_id = 10;
$html = file_get_html('http://www.chabotspace.org/exhibits.htm');


// grabs
echo "<ol>";
foreach($html->find('.mainContent .exhibitList ul li') as $a) {
	$title = htmlspecialchars($a->find('div > h2 a', 0)->innertext, ENT_QUOTES);
	$pic_url = 'http://www.chabotspace.org'.str_replace(' ', '',$a->find('img', 0)->src);
	$ext = strtolower(pathinfo($pic_url, PATHINFO_EXTENSION));
	$newfilename = uniqid();
	$uniqueName = $newfilename.'.'.$ext;
	//copy($pic_url, 'pics/'.$uniqueName);
	$new_pic_url = 'pics/'.$uniqueName;
	$url = 'http://www.chabotspace.org/'.$a->find('div > h2 a', 0)->href;
	$short_desc_raw = $a->find('div p', 0)->innertext;
	$short_desc = str_replace('<br />', '', $short_desc_raw);
	$short_desc = htmlspecialchars($short_desc, ENT_QUOTES);

	if ($title!='') {
		
		echo "<li>".$title." [".$url."][".$pic_url."]<p>".$short_desc."</p></li>";
		/*$bquery = "SELECT * FROM chabot WHERE url='".$url."' LIMIT 1";
		$result = mysql_query($bquery) or die("Error: ". mysql_error(). " with query ". $bquery);
		$num_rows = mysql_num_rows($result);

		if ($num_rows == 0) {
			$query = "INSERT INTO chabot VALUES ('','$title','$short_desc','$url','$new_pic_url','$museum_id')";
			mysql_query($query) or die("Error: ". mysql_error(). " with query ". $bquery);
		}*/
		
	} //end if empty
}
	
echo "</ol>";
//mysql_free_result($result);

include ('bin/db/closedb.php');
?>