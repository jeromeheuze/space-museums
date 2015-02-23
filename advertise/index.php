<?php include("../includes/globals.php");?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Advertise on Space Museums Website</title>
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
<meta itemprop="name" content="SPACE Museums - Advertise on Space Museums Website">
<meta itemprop="description" content="Where to find Space Activities and Exhibits about Space.">
<meta itemprop="image" content="http://space-museums.com/graphics/space-museums-logo.jpg">
<?php include("../includes/ga.php"); ?>
</head>

<body class="<?=$themeClass?>" id="advertise">
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
    	<h1 class="htitles">Advertise on Space Museums Website</h1>
        <p>Space Museums is a gateway to space exhibits and activities categorized by state and by museums.</p>
        <p>Our audience are parents and visitors looking to plan their trip to visit museums in their states but also to discover new museums that they would not know existed.</p>
        <p>We will provide analytics/reports for each Ads placed - weekly or monthly.</p>
        
        <h2 class="htitles">Ads format</h2>
        <p>Our ads format will be located on the bottom of the homepage, topics page, museums listing page, individual museum page, exhibits listing page, and individual exhibit page.</p>
        <p>Note: For the individual pages corresponding to the museums and exhibits the owner of the each museums will have priority for advertising.</p>
        <p>The format for such ads should be 235px by 165px with round corners.</p>
        
        <h2 class="htitles">Ads pricing table</h2>
        <table class="Simp1D" cellpadding="0" cellspacing="1">
        <tbody>
        <tr>
        <thead>
        <th>Pages</th>
        <th>Ad format (pixels)</th>
        <th>Slots Available</th>
        <th>Price per month</th>
        <th>Randomized</th>
        </thead>
        </tr>
        <tr>
        <td>HomePage</td>
        <td>235x165</td>
        <td>3</td>
        <td>$15</td>
        <td>No</td>
        </tr>
        <tr>
        <td>Museums Listing</td>
        <td>235x165</td>
        <td>4</td>
        <td>$15</td>
        <td>Yes*</td>
        </tr>
        <tr>
        <td>Museums Page</td>
        <td>235x165</td>
        <td>4</td>
        <td>$10</td>
        <td>Yes*</td>
        </tr>
        <tr>
        <td>Exhibits Listing</td>
        <td>235x165</td>
        <td>4</td>
        <td>$15</td>
        <td>Yes*</td>
        </tr>
        <tr>
        <td>Exhibits Page</td>
        <td>235x165</td>
        <td>4</td>
        <td>$10</td>
        <td>Yes*</td>
        </tr>
        </tbody>
        <tfoot><tr><th colspan="5">Note: Prices are subject to change when traffic increases. * Random ads ON if all slots are filled.</th></tr></tfoot>
        </table>
        <p>All transactions will be handled by Paypal Subscriptions service for convenience.</p>
        
        <h2 class="htitles">Questions and Inquiries</h2>
        <p>Do not hesitate to contact us at the following: <a href="mailto:ads@space-museums.com?subject=Advertise">ads@space-museums.com</a></p>
        <p>I can provide assistance in making the ads - just sent me the graphic and text to be added.</p>
        
        <h2 class="htitles">Example of Ads</h2>
        <p><img src="/graphics/ads/example.png" alt="" /></p>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://nebulastudio.net/" target="_blank">Nebula Studio, LLC</a></p>
</div>
</body>
</html>
