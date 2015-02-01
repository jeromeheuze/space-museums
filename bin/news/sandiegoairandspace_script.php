<?php 
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
include_once('bin/news/simple_html_dom.php');
include ('bin/db/config.php');
include ('bin/db/opendb.php');

$museums_id = 1;
$html = file_get_html('http://www.sandiegoairandspace.org/press/');


// grabs
echo "<ol>";
foreach($html->find('.content_bubble .pressBubble') as $a) {
	$text = $a->find('h3', 0)->innertext;
	$text = str_replace(chr(130), ',', $text);    // baseline single quote
	$text = str_replace(chr(132), '"', $text);    // baseline double quote
	$text = str_replace(chr(133), '...', $text);  // ellipsis
	$text = str_replace(chr(145), "'", $text);    // left single quote
	$text = str_replace(chr(146), "'", $text);    // right single quote
	$text = str_replace(chr(147), '"', $text);    // left double quote
	$text = str_replace(chr(148), '"', $text);    // right double quote
	$regex = "/[0-9].+[0-9]+?\s-\s/i";
	$title = preg_replace($regex, '', $text);
	
	$link = "http://www.sandiegoairandspace.org/press/".$a->find('a', 0)->href;
	
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