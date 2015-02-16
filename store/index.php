<?php include("../includes/globals.php");
include ('../bin/db/config.php');
include ('../bin/db/opendb.php');
if (isset($_GET['cid'])&&(is_numeric($_GET['cid']))) {$storecatid = (int)$_GET['cid'];} else {$storecatid = 0;}
if ( (isset($_GET['s']))||($_GET['s'] == "AZ")||($_GET['s'] == "ZA") ) {$sort = $_GET['s'];} else {$sort = 0;}
if (isset($_GET['st'])&&(is_numeric($_GET['st']))) {$startpoint = (int)$_GET['st'];} else {$startpoint = 0;}
if (isset($_GET['t'])&&(is_numeric($_GET['t']))) {$tmb = (int)$_GET['t'];} else {$tmb = 0;}
$isStore = 1;
$limit = 10;
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Store</title>
<link rel="icon" type="image/png" href="http://space-museums.com/favicon.png">
<meta name="description" content="SPACE Museums - Where to find Space Activities and Exhibits about Space.">
<meta name="abstract" content="SPACE Museums - Where to find Space Activities and Exhibits about Space.">
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- colorbox -->
<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="/js/colorbox.css" type="text/css" media="all">
<link href="/js/jquery.selectbox.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/js/jquery.selectbox-0.2.min.js"></script>
<!-- nivoSlider 3.1 - http://nivo.dev7studios.com -->
<script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>
<link rel="stylesheet" href="/js/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/js/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript">
$(document).ready(function() {
	<?php include("../includes/globals-js.php"); ?>
	$('#slider').nivoSlider({pauseTime: 6000});
	$('#rslider').nivoSlider({pauseTime: 10000});
});
</script>
<meta itemprop="name" content="SPACE Museums - Store">
<meta itemprop="description" content="Where to find Space Activities and Exhibits about Space.">
<meta itemprop="image" content="http://space-museums.com/graphics/space-museums-logo.jpg">
<?php include("../includes/ga.php"); ?>
</head>

<body class="<?=$themeClass?>" id="store">
<?php include("../includes/fb-like.php"); ?>
<div id="top">
	<div id="topcont">
    <div id="logo"><a href="/" title="Go Back Home"><img src="/graphics/space-museums-logo.png" alt="SPACE Museums" /></a></div>
    <?php include("../includes/menu.php"); ?>
    <div id="rightTop"><p class="iStars" title="Background Showed"><?=$themeName?></p><p class="nasatvlink iSprites isOnline"><a href="/nasaTV/" title="<?=$NasaTVName?>"><?=$NasaTVName?></a></p>
    <?php if ( ($ENABLE_STATE == 1)||($isStore = 0) ) { ?>
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
    <div class="slider-wrapper theme-default">
    	<div class="ribbon"></div>
        <div id="slider" class="nivoSlider">
            <a href="/store/?cid=1&name=Movies"><img src="/graphics/slides/s1.jpg" alt="" title="Checkout our Movies section we have more than 100+" /></a>
            <a href="/store/?cid=2&name=Documentaries"><img src="/graphics/slides/s2.jpg" alt="" title="We have a section just for Space Documentaries - Blu-ray" /></a>
            <a href="/store/?cid=3&name=Mars"><img src="/graphics/slides/s3.jpg" alt="" title="All about Mars Documentaries are available!" /></a>
        </div>
    </div>
    </div>
    <div class="row">
    	<h1 class="htitles">Store</h1>
        <div id="storelist" class="eSto">
        <?php include("../bin/fetch/storecat.php"); ?>
        </div>
        <?php if ($storecatid != 0 ) { ?>
        	<div class="eStoFilter">
        	Filters: <a href="?s=AZ<?php if ($storecatid != 0) {echo "&cid=".$storecatid;} ?>" class="fltbtns<?php if ( ($sort === "AZ")||($sort === 0) ) {echo " selected";} ?>">Sort by A-Z</a> <a class="fltbtns<?php if ($sort === "ZA") {echo " selected";} ?>" href="?s=ZA<?php if ($storecatid != 0) {echo "&cid=".$storecatid;} ?>">Sort by Z-A</a> <?php if ($storecatid != 0) { ?><a href="?s=AZ&cid=<?=$storecatid?>&t=1" <?php if ($tmb === 1) {echo "class='selected'";} ?>>Images Only</a> <?php } ?>
        	</div>
        	<?php include("../bin/fetch/storePage.php"); ?>
            <p class="disclaimer">Note: You will be redirected to Amazon.com for purchasing.</p>
        <?php } else { ?>
        	<?php include("../bin/fetch/rai-movies.php"); ?>
            <?php include("../bin/fetch/rai-docu.php"); ?>
            <?php include("../bin/fetch/rai-mars.php"); ?>
            <?php include("../bin/fetch/rai-books.php"); ?>
            <?php include("../bin/fetch/rai-telescope.php"); ?>
        <?php } ?>
        
        <div class="adsamz">
        <?php include("../includes/ads/amz-486x60_".$storecatid.".php"); ?>
        </div>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://nebulastudio.net/" target="_blank">Nebula Studio, LLC</a></p>
</div>
<script type="text/javascript" src="http://wms.assoc-amazon.com/20070822/US/js/link-enhancer-common.js?tag=spacmuse-20">
</script>
<noscript>
    <img src="http://wms.assoc-amazon.com/20070822/US/img/noscript.gif?tag=spacmuse-20" alt="" />
</noscript>
</body>
</html>
<?php include ('../bin/db/closedb.php'); ?>