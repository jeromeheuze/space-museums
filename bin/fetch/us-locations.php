<?php
//set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
//include ('bin/db/config.php');
//include ('bin/db/opendb.php');
//fetch

$ftch = "SELECT id,state,abr FROM us_state WHERE active = 1";
$result_state = mysql_query($ftch);
$num_rows = mysql_num_rows($result_state);
if ($num_rows != 0) {
	while(list($id,$stname,$stabr)= mysql_fetch_row($result_state))
	{
	echo "<option value='$stname' stateID='$id'>$stname, $stabr</option>";
	}
} else {echo "<option value='0'>No Active States</option>"; }

//clean up
mysql_free_result($result_state);
//include ('bin/db/closedb.php');
?>