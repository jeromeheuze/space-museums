<?php include("../includes/globals.php");
include ('../bin/db/config.php');
include ('../bin/db/opendb.php');
if (isset($_GET['id'])&&(is_numeric($_GET['id']))) {$exoid = (int)$_GET['id'];} else {$exoid = 0;}
if (isset($_GET['mid'])&&(is_numeric($_GET['mid']))) {$exomid = (int)$_GET['mid'];} else {$exomid = 0;}
if ($exoid > 0) {
	$getFav = "SELECT loveit FROM exhibits WHERE id='$exoid'";
	$result_getFav = mysql_query($getFav);
	$num_rows_getFav = mysql_fetch_row($result_getFav);
	$currentFav = $num_rows_getFav[0] + 1;
	$queryFav = "UPDATE exhibits SET loveit=$currentFav WHERE id='$exoid'";
	$result_setFav = mysql_query($queryFav);
}
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Exhibits</title>
<link rel="icon" type="image/png" href="http://space-museums.com/favicon.png">
<meta name="description" content="SPACE Museums - Where to find Space Activities and Exhibits about Space.">
<meta name="abstract" content="SPACE Museums - Where to find Space Activities and Exhibits about Space.">
<link rel="stylesheet" href="/css/custom.css" type="text/css" />
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
<meta itemprop="name" content="SPACE Museums - Exhibits">
<meta itemprop="description" content="Where to find Space Activities and Exhibits about Space.">
<meta itemprop="image" content="http://space-museums.com/graphics/space-museums-logo.jpg">
<?php include("../includes/ga.php"); ?>
</head>

<body class="<?=$themeClass?>" id="exhibits">
<?php include("../includes/fb-like.php"); ?>
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
    <div class="row">
    	<h1 class="htitles">Exhibits</h1>
        <div id="exolist" class="eExo">
        <?php if ($exoid == 0) { echo "<div class='exotopics'>"; include("../bin/fetch/topics.php"); echo '</div>'; } else {echo "<h3><a href='/exhibits/' class='lnkAllExo'>See All Exhibits</a></h3>";} ?>
        <?php include("../bin/fetch/museums.php"); ?>
        </div>
        <?php include("../bin/fetch/exhibitsPage.php"); ?>
    </div>
    <div class="row mt10">
    	<h3 class="htitles">Sponsors Events you might want to see:</h3>
        <div id="bottomads">
        	<div class="ads astronomy"><div>
            <a href="http://www.amazon.com/gp/product/B000PUAI3E/ref=as_li_tf_il?ie=UTF8&camp=1789&creative=9325&creativeASIN=B000PUAI3E&linkCode=as2&tag=spacmuse-20"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B000PUAI3E&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=spacmuse-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=spacmuse-20&l=as2&o=1&a=B000PUAI3E" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
			</div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty last"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
        </div>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://nebulastudio.net/" target="_blank">Nebula Studio, LLC</a></p>
</div>
</body>
</html>
<?php include ('../bin/db/closedb.php'); ?>