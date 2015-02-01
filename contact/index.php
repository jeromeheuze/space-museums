<?php include("../includes/globals.php");?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>SPACE Museums - Contact Space Museums</title>
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
<script type="text/javascript">
$(document).ready(function() {
	<?php include("../includes/globals-js.php"); ?>
	//reset form
	$("input#name_field").val('');
	$("input#email_field").val('');
	$("textarea#msg_field").val('');
	//form action
    $("#submit").click(function() {
  	  var name = $("input#name_field").val();
  		if (name == "") {
        $("input#name_field").css("border","1px solid #ff0000");
        $("input#name_field").focus();
        return false;
      }
  		var email = $("input#email_field").val();
  		if (email == "") {
        $("input#email_field").css("border","1px solid #ff0000");
        $("input#email_field").focus();
        return false;
      }
	    var msg = $("textarea#msg_field").val();
	  
	  var dataString = 'name='+ name + '&email=' + email + '&msg=' + msg;
	  $.ajax({
		type: "POST",
		url: "../bin/contact.php",
		data: dataString,
		success: function() {
		  $('.forms').html("<div id='message'></div>");
		  $('#message').html("<h3>Email Submitted!</h3>")
		  .append("<p>Thank you so much from your email.</p>")
		  .hide()
		  .fadeIn(1500, function() {
			$('#message').append("<p>Message Sent!</p>");
		  });
		}
	  });
	  return false;
    });
});
</script>
<meta itemprop="name" content="SPACE Museums - Contact Space Museums">
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
    	<h1 class="htitles">Contact Space Museums</h1>
        <p>You can contact HEUZE Production Staff which is the maker of Space Museums Website for inquiries and questions.</p>
        <br /><br />
        <form method="post" name="qcontact" class="forms">
        <label>Name:</label><br />
        <input type="text" size="40" name="name" id="name_field" />
        <br /><br />
        <label>Email:</label><br />
        <input type="text" size="40" name="email" id="email_field" />
        <br /><br />
        <label>Message:</label><br />
        <textarea cols="31" rows="3" name="msg" id="msg_field"></textarea>
        <br /><br />
        <input type="submit" name="submit" value="SUBMIT" id="submit" />
        </form>
    </div>
</div>
<div id="footer">
    <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://www.heuze-production.com/" target="_blank">HEUZE Production</a></p>
</div>
</body>
</html>
