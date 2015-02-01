<?php 
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
include_once('bin/news/simple_html_dom.php');
include ('bin/db/config.php');
include ('bin/db/opendb.php');

$museums_id = 9;
$html = file_get_html('http://www.cosmo.org/newsroom/ne_newsroom.cfm');


// grabs
echo "<ol>";
foreach($html->find('.BGnews table table table') as $a) {
	$text = $a->find('.nwrHeadline', 0)->innertext;
	$text = str_replace(chr(130), ',', $text);    // baseline single quote
	$text = str_replace(chr(132), '"', $text);    // baseline double quote
	$text = str_replace(chr(133), '...', $text);  // ellipsis
	$text = str_replace(chr(145), "'", $text);    // left single quote
	$text = str_replace(chr(146), "'", $text);    // right single quote
	$text = str_replace(chr(147), '"', $text);    // left double quote
	$title = str_replace(chr(148), '"', $text);    // right double quote
	$chklink = $a->find('.nwrLinks > div a', 0)->href;
	$link = "http://www.cosmo.org/newsroom/".$chklink;

	if ( ($title != '')&&($chklink != '') ) {
		
		echo "<li>".$title."<br />".$link."<br /><strong>### ACTION: ";
		$bquery = "SELECT * FROM news_ext WHERE link='".$link."'";
		$result = mysql_query($bquery);// or die("Error: ". mysql_error(). " with query ". $bquery);
		$num_rows = mysql_num_rows($result);

		if ($num_rows == 0) {
			//$query = "INSERT INTO news_ext VALUES ('','$title','$link','$museums_id')";
			//mysql_query($query);
			echo "added</strong></li>";
		} else {
			echo "duplicate</strong></li>";
		}
		
	} //end if empty
}
	
echo "</ol>";
//mysql_free_result($result);

include ('bin/db/closedb.php');
?>