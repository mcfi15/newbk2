<?php
session_start();
//require_once('process.php');

if (isset($_POST['new_mail'])) {
	$heading = $_POST['heading'];
	$email = $_POST['email'];
	$message = $_POST['story'];

	$messag = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no">
<title>Capital Treasury Bank</title>

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<!--##custom-font-resource##-->
<!--[if gte mso 16]>
<xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<![endif]-->
<style>
html,
body,
table,
tbody,
tr,
td,
div,
p,
ul,
ol,
li,
h1,
h2,
h3,
h4,
h5,
h6 {
margin: 0;
padding: 0;
}

body {
-ms-text-size-adjust: 100%;
-webkit-text-size-adjust: 100%;
}

table {
border-spacing: 0;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt;
}

table td {
border-collapse: collapse;
}

h1,
h2,
h3,
h4,
h5,
h6 {
font-family: Arial;
}

.ExternalClass {
width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
line-height: 100%;
}

/* Outermost container in Outlook.com */
.ReadMsgBody {
width: 100%;
}

img {
-ms-interpolation-mode: bicubic;
}
</style>

<style>
a[x-apple-data-detectors=true] {
color: inherit !important;
text-decoration: inherit !important;
}

u+#body a {
color: inherit;
text-decoration: inherit !important;
font-size: inherit;
font-family: inherit;
font-weight: inherit;
line-height: inherit;
}

a,
a:link,
.no-detect-local a,
.appleLinks a {
color: inherit !important;
text-decoration: inherit;
}
</style>

<style>
.width600 {
width: 600px;
max-width: 100%;
}

@media all and (max-width: 599px) {
.width600 {
width: 100% !important;
}
}

@media screen and (min-width: 600px) {
.hide-on-desktop {
display: none;
}
}

@media all and (max-width: 599px),
only screen and (max-device-width: 599px) {
.main-container {
width: 100% !important;
}

.col {
width: 100%;
}

.fluid-on-mobile {
width: 100% !important;
height: auto !important;
text-align: center;
}

.fluid-on-mobile img {
width: 100% !important;
}

.hide-on-mobile {
display: none !important;
width: 0px !important;
height: 0px !important;
overflow: hidden;
}
}
</style>

<!--[if gte mso 9]>
<style>

.col {
width: 100% !important;
}

.width600 {
width: 600px;
}

.width367 {
width: 367px;
height: auto;
}
.width500 {
width: 500px;
height: auto;
}

.hide-on-desktop {
display: none;
}

.hide-on-desktop table {
mso-hide: all;
}

.nounderline {text-decoration: none !important;}

.mso-font-fix-arial { font-family: Arial, sans-serif;}
.mso-font-fix-georgia { font-family: Georgia, sans-serif;}
.mso-font-fix-tahoma { font-family: Tahoma, sans-serif;}
.mso-font-fix-times_new_roman { font-family: \'Times New Roman\', sans-serif;}
.mso-font-fix-trebuchet_ms { font-family: \'Trebuchet MS\', sans-serif;}
.mso-font-fix-verdana { font-family: Verdana, sans-serif;}

</style>
<![endif]-->
</head>

<body id="body" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="font-family:Arial, sans-serif; font-size:0px;margin:0;padding:0;background-color:#ffffff;">
<span style="display:none;font-size:0px;line-height:0px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">Check in for your upcoming stay at Hotel Atelier in Playa del Carmen, Mexico.</span>
<style>
@media screen and (min-width: 600px) {
.hide-on-desktop {
display: none;
}
}

@media all and (max-width: 599px) {
.hide-on-mobile {
display: none !important;
width: 0px !important;
height: 0px !important;
overflow: hidden;
}
}
</style>
<div style="background-color:#ffffff">

<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td valign="top" align="left">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ececeb" style="background-color:#ececeb">
<tr>

<td valign="top" style="padding:20px">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-bottom:5px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ffffff" style="border-radius:2px;border-collapse:separate !important;background-color:#ffffff">
<tr>

  <td valign="top" style="padding-top:20px;padding-right:10px;padding-bottom:30px;padding-left:10px">
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>

        <td valign="top" align="center" style="padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:30px">
          <!--[if gte mso 9]><table width="367" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

            <table cellpadding="0" cellspacing="0" border="0" width="367" style="max-width:100%" class="fluid-on-mobile img-wrap">
              <tr>

                <td valign="top" align="center"><img src="cid:logo" width="367" height="102" alt="Capital Treasury Bank" border="0" style="display:block;font-size:14px;max-width:100%;height:auto;" class="width367" />
                </td>
              </tr>
            </table>

            <!--[if gte mso 9]></td></tr></table><![endif]-->
          </td>
        </tr>
      </table>

      <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>

          <td valign="top" align="center" style="padding:10px">
            <!--[if gte mso 9]><table width="500" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

              <table cellpadding="0" cellspacing="0" border="0" width="500" style="max-width:100%" class="fluid-on-mobile img-wrap">
                <tr>

                  <td valign="top" align="center"><img src="cid:image" width="500" height="200" alt="Capital Treasury Bank" border="0" style="display:block;font-size:14px;max-width:100%;height:auto;" class="width500" />
                  </td>
                </tr>
              </table>

              <!--[if gte mso 9]></td></tr></table><![endif]-->
            </td>
          </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>

            <td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:5px;padding-left:10px">
              <div style="font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:20px;color:#1c78a5;line-height:26px;text-align:left">
                <p style="padding: 0; margin: 0;text-align: center;"><u><span style="font-size:24px;">' .$heading. '</span></u></p><span class="mso-font-fix-arial">
                </span>
              </div>
            </td>
          </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>

            <td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px">
              <div style="font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:17px;color:#929292;line-height:25px;text-align:left">
                <p style="padding: 0; margin: 0;text-align: center;">' .$message. '</p><span class="mso-font-fix-arial">
                </span>
              </div>
            </td>
          </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>

            <td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px">
              <div style="font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:17px;color:#929292;line-height:25px;text-align:left">
                <hr>
                <p style="padding: 0; margin: 0;text-align: center;">Keep your card and Pin information secure. Do not respond to emails requesting for your card/PIN details.</p><span class="mso-font-fix-arial">
                </span>
              </div>
            </td>
          </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>

            <td valign="top" align="center" style="padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px">
              <!--[if !mso]><!-- -->
              <a href="mailto:customercare@capitaltreasurybnk.com" target="_blank" style="display:inline-block; text-decoration:none;" class="fluid-on-mobile">
                <span>

                  <table cellpadding="0" cellspacing="0" border="0" bgcolor="#1c78a5" style="border:1px solid #10587a;border-radius:5px;border-collapse:separate !important;background-color:#1c78a5" class="fluid-on-mobile">
                    <tr>

                      <td align="center" style="padding-top:14px;padding-right:25px;padding-bottom:14px;padding-left:25px">
                        <span style="color:#ffffff !important;font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:17px;mso-line-height:exactly;line-height:25px;mso-text-raise:4px;">
                          <font style="color:#ffffff;" class="button">
                            <span>Mail Us</span>
                          </font>
                        </span>
                      </td>
                    </tr>
                  </table>

                </span>
              </a>
              <!--<![endif]-->
              <div style="display:none; mso-hide: none;">

                <table cellpadding="0" cellspacing="0" border="0" bgcolor="#1c78a5" style="border:1px solid #10587a;border-radius:5px;border-collapse:separate !important;background-color:#1c78a5" class="fluid-on-mobile">
                  <tr>

                    <td align="center" style="padding-top:14px;padding-right:25px;padding-bottom:14px;padding-left:25px">
                      <a href="https://healthyvacation.online/hv/checkin/51" target="_blank" style="color:#ffffff !important;font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:17px;mso-line-height:exactly;line-height:25px;mso-text-raise:4px;text-decoration:none;text-align:center;">

                        <span style="color:#ffffff !important;font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:17px;mso-line-height:exactly;line-height:25px;mso-text-raise:4px;">
                          <font style="color:#ffffff;" class="button">
                            <span>CHECK IN NOW</span>
                          </font>
                        </span>
                      </a>
                    </td>
                  </tr>
                </table>

              </div>
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td></tr></table><![endif]-->
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:15px;padding-right:30px;padding-bottom:15px;padding-left:30px">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

  <td valign="top" style="padding-top:15px;padding-bottom:15px">
    <div style="font-family:Raleway, Trebuchet MS, Segoe UI, sans-serif;font-size:15px;color:#707070;line-height:19px;text-align:left">
      <p style="padding: 0; margin: 0;text-align:center;">This email was intended for '.$email.'. If this has arrived to your inbox by mistake, please delete immediately.</p><span class="mso-font-fix-arial">

      </span>
      <p style="padding: 0; margin: 0;text-align:center;">&nbsp;</p><span class="mso-font-fix-arial">

      </span>
      <p style="padding: 0; margin: 0;text-align:center;">Copyright 2021 - <a href="https://capitaltreasurybnk.com" target="_blank" style="color: #00c0e7 !important; text-decoration: underline !important;">
        <font style=" color:#00c0e7;">Capital Treasury Bank</font>
      </a></p><span class="mso-font-fix-arial">
      </span>
    </div>
  </td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td></tr></table><![endif]-->
</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>

</html>';
			$subject = "Capitl Treasury Bank | Urgent";
			$_SESSION['email'] = $email;
			$_SESSION['message'] = $messag;
			$_SESSION['subject'] = $subject;

			header('Location: process.php');


	// if (send_mail($email,$messag,$subject) === TRUE) {
	// 	$msg = '<div class="uk-alert-success" uk-alert>
	// 	    <a class="uk-alert-close" uk-close></a>
	// 	    <p>Mail Sent Successfully.</p>
	// 	</div>';
	// } else {
	// 	$msg = '<div class="uk-alert-error" uk-alert>
	// 	    <a class="uk-alert-close" uk-close></a>
	// 	    <p>Mail Not Sent.</p>
	// 	</div>';
	// }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post</title>

	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />
  <link rel="icon" href="img/fav.png" type="image/x-icon">

	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>
</head>
<body>


	<br><br><br><br>
	<div class="uk-container uk-container-xsmall">
		<div class="uk-section uk-section-primary">
			<center>
				<?php if(isset($msg)) echo $msg;  ?>
				<form method="post" action="#">
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Send New Mail</legend>

						<div class="uk-margin">
							<input class="uk-input uk-width-1-2" name="heading" type="text" placeholder="Heading" required>
						</div>

						<div class="uk-margin">
							<input class="uk-input uk-width-1-2" name="email" type="email" placeholder="Email" required>
						</div>

						<div class="uk-margin">
							<textarea class="uk-textarea uk-width-1-2" rows="5" placeholder="Message" name="story"></textarea>
						</div>
						<div class="uk-margin">
							<button type="submit" class="uk-button uk-button-default" name="new_mail">Send Mail</button>
							&nbsp;
							<a class="uk-button uk-button-default" href="javascript:history.go(-1)">Back</a>
						</div>
						<div class="uk-margin">
						</div>
					</center>

				</div>
			</div>

		</body>
		</html>