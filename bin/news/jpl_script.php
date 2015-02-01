<?php 
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
include_once('bin/news/simple_html_dom.php');
include ('bin/db/config.php');
include ('bin/db/opendb.php');

$museums_id = 6;
$html = file_get_html('http://www.jpl.nasa.gov/news/');


// grabs
echo "<ol>";
foreach($html->find('#fontsize table tr') as $a) {
	$text = $a->find('td a h3', 0)->innertext;
	$text = str_replace(chr(130), ',', $text);    // baseline single quote
	$text = str_replace(chr(132), '"', $text);    // baseline double quote
	$text = str_replace(chr(133), '...', $text);  // ellipsis
	$text = str_replace(chr(145), "'", $text);    // left single quote
	$text = str_replace(chr(146), "'", $text);    // right single quote
	$text = str_replace(chr(147), '"', $text);    // left double quote
	$title = str_replace(chr(148), '"', $text);    // right double quote
	$link = "http://www.jpl.nasa.gov/news/".$a->find('td a', 0)->href;
	
	if ($title != '') {
		
		
		$bquery = "SELECT * FROM news_ext WHERE link='".$link."'";
		$result = mysql_query($bquery);// or die("Error: ". mysql_error(). " with query ". $bquery);
		$num_rows = mysql_num_rows($result);

		if ($num_rows == 0) {
			$query = "INSERT INTO news_ext VALUES ('','$title','$link','$museums_id')";
			mysql_query($query);
			echo "<li>".$title."<br />".$link."<br /><strong>### ACTION: ";
			echo "added</strong></li>";
		} else {
			//echo "duplicate</strong></li>";
		}
		
	} //end if empty
}
echo "</ol>";
mysql_free_result($result);

include ('bin/db/closedb.php');
?>