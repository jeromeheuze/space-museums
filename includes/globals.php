<?php
//Theme backdrop content
if ( ($_SERVER['PHP_SELF'] == "/") || ($_SERVER['PHP_SELF'] == "/index.php") ) {$themeClass = "NGC-1232";} else {$themeClass = "NGC-1232-sub";}
//$themeName = $_SERVER['PHP_SELF'];
$themeName = "Spiral Galaxy NGC 1232";
$NasaTVName = "Watch NASA TV in HD";

//OFFLINE switch
$OFFLINE = 0;

//Feature VARS
$ENABLE_STATE = 0;
$ENABLE_STORE = 1;
?>
<? date_default_timezone_set('America/Los_Angeles'); ?>