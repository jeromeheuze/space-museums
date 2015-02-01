<?php include("../includes/globals.php");
include ('../bin/db/config.php');
include ('../bin/db/opendb.php');
if (isset($_GET['id'])&&(is_numeric($_GET['id']))) {$simid = (int)$_GET['id'];} else {$simid = 0;}
//if (isset($_GET['sid'])&&(is_numeric($_GET['mid']))) {$simid = (int)$_GET['sid'];} else {$simid = 0;}
if ($simid > 0) {
	$getFav = "SELECT fav FROM simulations WHERE id='$simid'";
	$result_getFav = mysql_query($getFav);
	$num_rows_getFav = mysql_fetch_row($result_getFav);
	$currentFav = $num_rows_getFav[0] + 1;
	$queryFav = "UPDATE simulations SET fav=$currentFav WHERE id='$simid'";
	$result_setFav = mysql_query($queryFav);
}
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Space Simulations</title>
<link rel="icon" type="image/png" href="http://space-museums.com/favicon.png">
<meta name="description" content="Discover our Space Simulator and Spaceship Simulation list.">
<meta name="abstract" content="Discover our Space Simulator and Spaceship Simulation list.">
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- colorbox -->
<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="/js/colorbox.css" type="text/css" media="all">
<link href="/js/jquery.selectbox.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/js/jquery.selectbox-0.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	<?php include("../includes/globals-js.php"); ?>
});
</script>
<meta itemprop="name" content="SPACE Museums - Space Simulations">
<meta itemprop="description" content="Discover our Space Simulator and Spaceship Simulation list.">
<meta itemprop="image" content="http://space-museums.com/graphics/space-museums-logo.jpg">
<?php include("../includes/ga.php"); ?>
</head>

<body class="<?=$themeClass?>" id="simulations">
<?php if ($simid > 0) {include("../includes/fb-like.php");} ?>
<div id="top">
	<div id="topcont">
    <div id="logo"><a href="/" title="Go Back Home"><img src="/graphics/space-museums-logo.png" alt="SPACE Museums" /></a></div>
    <?php include("../includes/menu.php"); ?>
    <div id="rightTop"><p class="iStars" title="Background Showed"><?=$themeName?></p><p class="nasatvlink iSprites isOnline"><a href="/nasaTV/" title="<?=$NasaTVName?>"><?=$NasaTVName?></a></p>
    <?php if ($ENABLE_STATE == 1) { ?>
    	<div class="dd">
		<select name="state_id" id="state_id" tabindex="1">
			<option value="">-- Select State --</option>
            <?php include("../bin/fetch/us-locations.php"); ?>
		</select>
        </div>
    <?php } ?>
    </div>
    </div>
</div>
<div id="all">
<?php include("../includes/secondaryMenu.php"); ?>
    <div class="row lstsim">
    	<?php if ($simid > 0) {echo "<h1 class='htitles'><a href='/simulations/'>Simulations</a></h1>";} else {echo "<h1 class='htitles'>Simulations</h1>";} ?>
        <?php include("../bin/fetch/simulationsPage.php"); ?>
        
    </div>
    <div class="row mt10">
    	<h3 class="htitles">Sponsors Events you might want to see:</h3>
        <div id="bottomads">
        	<div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty last"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
        </div>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://www.heuze-production.com/" target="_blank">HEUZE Production</a></p>
</div>
</body>
</html>
<?php include ('../bin/db/closedb.php'); ?>