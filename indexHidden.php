<?php include("includes/globals.php"); 
include ('bin/db/config.php');
include ('bin/db/opendb.php');
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Where to find Space Activities</title>
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
	<?php include("includes/globals-js.php"); ?>
	$("#tabOnline").click( function () {
		if ( $("#iOnline:visible") ){
			$("#iCurrent").fadeOut("fast");
			$("#iOnline").fadeIn("fast");
			$("#tabCurrent").removeClass("selected");
			$("#tabOnline").addClass("selected");
		}
	});
	$("#tabCurrent").click( function () {
		if ( $("#iCurrent:visible") ){
			$("#iOnline").fadeOut("fast");
			$("#iCurrent").fadeIn("fast");
			$("#tabOnline").removeClass("selected");
			$("#tabCurrent").addClass("selected");
		}
	});
});
</script>
<meta itemprop="name" content="SPACE Museums">
<meta itemprop="description" content="Where to find Space Activities and Exhibits about Space.">
<meta itemprop="image" content="http://space-museums.com/graphics/space-museums-logo.jpg">
<?php include("includes/ga.php"); ?>
</head>

<body class="<?=$themeClass?>">
<?php include("includes/fb-like.php"); ?>
<div id="top">
	<div id="topcont">
    <div id="logo"><a href="/" title="Go Back Home"><img src="/graphics/space-museums-logo.png" alt="SPACE Museums" /></a></div>
    <?php include("includes/menu.php"); ?>
    <div id="rightTop"><p class="iStars" title="Background Showed"><?=$themeName?></p>
    <?php if ($ENABLE_STATE == 1) { ?>
    	<div class="dd">
		<select name="state_id" id="state_id" tabindex="1">
			<option value="">-- Select State --</option>
            <?php include("bin/fetch/us-locations.php"); ?>
		</select>
        </div>
    <?php } ?>
    </div>
    </div>
</div>
<div id="all">
<?php include("includes/secondaryMenu.php"); ?>
	<div class="row">
    	<div class="col lnews">
        	<h1 class="htitles">News from Museums and Space Blogs</h1>
            <div class="lnewslines">
            <?php include("bin/fetch/news-hp.php"); ?>
            </div>
        </div>
        <div class="col tweet">
        	<h2 class="htitles">Tweets about Space</h2>
            <div class="tweetlines">
            <?php include("includes/hp-tweet.php"); ?>
            </div>
        </div>
    </div>
	<div class="row padrow">
    	<div class="col topic">
        <h3 class="htitles">Exhibits by Topic</h3>
            <div class="eTopic">
            <?php include("bin/fetch/topics.php"); ?>
            </div>
        </div>
        <div class="col exotab">
        <h3 class="htitles">Exhibitions</h3>
            <div class="lstexhibits">
            <?php include("bin/fetch/exhibitsTab.php"); ?>
            </div>
        </div>
    </div>
    <div class="row padrow">
    	<h3 class="htitles">Featured Museums</h3>
        <div class="lstmuseums">
        	<?php include("bin/fetch/featuredmuseums.php"); ?>
        </div>
    </div>
    <?php if ($ENABLE_STORE == 1) { ?>
    <div class="row padrow">
    	<h3 class="htitles">Store</h3>
        <div class="lststore">
        <?php include("bin/fetch/rai-hp.php"); ?>
        </div>
    </div>
    <?php } ?>
    <div class="row">
    	<h3 class="htitles">Sponsors Events you might want to see:</h3>
        <div id="bottomads">
        	<div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="social empty last">
            <div class="fb"><fb:like send="false" layout="box_count" width="450" show_faces="false" font="arial"></fb:like></div>
            <div class="gp"><div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div></div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://nebulastudio.net/" target="_blank">Nebula Studio, LLC</a></p>
</div>
</body>
</html>
<?php include ('bin/db/closedb.php'); ?>
