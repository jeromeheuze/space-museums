<?php include("../includes/globals.php");?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Contact Space Museums</title>
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
<meta itemprop="name" content="SPACE Museums - Watch NASA TV HD">
<meta itemprop="description" content="Watch NASA TV HD">
<meta itemprop="image" content="http://space-museums.com/graphics/space-museums-logo.jpg">
<?php include("../includes/ga.php"); ?>
</head>

<body class="<?=$themeClass?>" id="advertise">
<?php include("../includes/fb-like.php"); ?>
<div id="top">
	<div id="topcont">
    <div id="logo"><a href="/" title="Go Back Home"><img src="/graphics/space-museums-logo.png" alt="SPACE Museums" /></a></div>
    <?php include("../includes/menu.php"); ?>
    <div id="rightTop"><p class="iStars" title="Background Showed"><?=$themeName?></p>
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
    	<h1 class="htitles">Watch NASA TV HD</h1>
        <div id="video">
        <iframe width="720" height="437" src="http://www.ustream.tv/embed/6540154?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;">    </iframe>
        <p><a href="http://www.ustream.tv/" style="padding: 2px 0px 4px;text-align: center;" target="_blank">Live streaming video by Ustream</a></p>
		</div>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://nebulastudio.net/" target="_blank">Nebula Studio, LLC</a></p>
</div>
</body>
</html>
