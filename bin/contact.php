<?php
set_include_path('/home/heuzep5/public_html/SPACE-MUSEUMS/');
include ('bin/phpmailer.php');

if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['msg'])) && (strlen(trim($_POST['msg'])) > 0)) {
	$msg = stripslashes(strip_tags($_POST['msg']));
} else {$msg = 'No msg entered';}

$body = '
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#eaeaea" width="60">Name</td>
    <td>'.$name.'</td>
  </tr>
  <tr>
    <td bgcolor="#eaeaea" width="60">Email</td>
    <td>'.$email.'</td>
  </tr>
  <tr>
    <td bgcolor="#eaeaea" width="60">Message</td>
    <td>'.$msg.'</td>
  </tr>
</table>
</body>
</html>';

$mail = new PHPMailer();
$mail->From     = "Website@space-museums.com";
$mail->FromName = "SpaceMuseums";
$mail->AddAddress("jeromeheuze@gmail.com","Admin");
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject  =  "SpaceMuseums.com Contact Page";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'jeromeheuze@gmail.com';
	$subject = 'SM Contact failed';
	$content = $body;
  mail($recipient, $subject, $content, "From: Website\r\nX-Mailer: DT_formmail");
  exit;
}
?>