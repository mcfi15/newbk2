<?php  //Start the Session

session_start();

require('connectdb.php');
require_once 'class.user.php';

$reg_user = new USER();


if (isset($_POST['verify'])){
//3.1.1 Assigning posted values to variables.

  $email = $_SESSION['email'];
  $code = $_POST['code'];
  $status = "Active";

//3.1.2 Checking the values are existing in the database or not
  
  $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no='$email' and code='$code'");
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);


  if ($stmt->rowCount() > 0){

    $stmt = $reg_user->runQuery("UPDATE account SET status = '$status' WHERE acc_no='$email'");
    $stmt->execute();


      $msg = "
            <div class='alert-success'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Congrats! Account Verified Successfully. You Can now proceed to <a href='login'> Login</a> Page.</strong>
          </div>";
      $acc_no = $row['acc_no'];
      $firstname = $row['firstname'];
      $pin = $row['pin'];
      $currency = $row['currency'];
      $total_bal = $row['total_bal'];
      $ledger_bal = $row['ledger_bal'];
      $card_bal = $row['card_bal'];
      $loan_bal = $row['loan_bal'];

      $messag = "
      <!-- © 2018 Shift Technologies. All rights reserved. -->
<table border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout:fixed;background-color:#f9f9f9' id='bodyTable'>
<tbody>
<tr>
<td style='padding-right:10px;padding-left:10px;' align='center' valign='top' id='bodyCell'>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapperWebview' style='max-width:600px'>
<tbody>
<tr>
<td align='center' valign='top'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tbody>
<tr>
<td style='padding-top: 20px; padding-bottom: 20px; padding-right: 0px;' align='right' valign='middle' class='webview'> 
<!-- <a href='#' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:right;text-decoration:underline;padding:0;margin:0' target='_blank' class='text hideOnMobile'>Oh wait, there's more! →</a> -->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapperBody' style='max-width:600px'>
<tbody>
<tr>
<td align='center' valign='top'>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='tableCard' style='background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;'>
<tbody>
<tr>
<td style='background-color:#00d2f4;font-size:1px;line-height:3px' class='topBorder' height='3'>&nbsp;</td>
</tr>
<tr>
<td style='padding-top: 60px; padding-bottom: 20px;' align='center' valign='middle' class='emailLogo'>
<!-- <a href='#' style='text-decoration:none' target='_blank'>													<img alt='' border='0' src='$siteurl' style='width:100%;max-width:150px;height:auto;display:block' width='150'> -->
</a>
</td>
</tr>
<tr>
<td style='padding-bottom: 20px;' align='center' valign='top' class='imgHero'>
<a href='#' style='text-decoration:none' target='_blank'>
// <img alt='' border='0' src='$siteurl/logo.png' style='width:50px;height:50px;display:block;color: #f9f9f9;' width='600'>
</a>
</td>
</tr>
<tr>
<td style='padding-bottom: 5px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='mainTitle'>
<h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'>Congratulations $firstname,</h2>
</td>
</tr>
<tr>
<td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>
<h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
Your account was successfully opened!<br>Please see the details of your account below.
</h4>
</td>
</tr>
<tr>
<td style='padding-left:20px;padding-right:20px' align='center' valign='top' class='containtTable ui-sortable'>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='tableDescription' style=''>
<tbody>
<tr>
<td style='padding-bottom: 20px;' align='center' valign='top' class='description'>
<p class='text' style='color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0'>

<h3><span style='color:#2196F3;'>Account Details</span> </h3>
<table style='border:1px solid black;padding:2px;' width='400'>

<tr>
<th style='text-align:left;'>Account Number</th>
<td>$acc_no</td>
</tr>

<tr>
<th style='text-align:left;'>Account Password</th>
<td>************</td>
</tr>

<tr>
<th style='text-align:left;'>Account pin</th>
<td>$pin</td>
</tr>

<tr>
<th style='text-align:left;'>Total Balance</th>
<td>$currency $total_bal</td>
</tr>

<tr>
<th style='text-align:left;'>Ledger Balance</th>
<td>$currency $ledger_bal</td>
</tr>

<tr>
<th style='text-align:left;'>Card Balance</th>
<td>$currency $card_bal</td>
</tr>

<tr>
<th style='text-align:left;'>Loan Balance</th>
<td>$currency $loan_bal</td>
</tr>
<tr>

<th style='text-align:left;'>Pending Debit</th>
<td>$currency 0.00</td>
</tr>
<tr> 
<th style='text-align:left;'>Pending Credit</th>
<td>$currency 0.00</td>
</tr>
<tr style='background-color:#2196F3;'>
<th style='text-align:left; color:#fff;'>Available Balance</th>
<td style='color:#fff;'>$currency $total_bal</td>
</tr>
</table>
</p>
</td>
</tr>
</tbody>
</table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='tableButton' style=''>
<tbody>
<tr>
<td style='padding-top:20px;padding-bottom:20px' align='center' valign='top'>
<table border='0' cellpadding='0' cellspacing='0' align='center'>
<tbody>
<tr>
<!-- <td style='background-color: rgb(0, 210, 244); padding: 12px 35px; border-radius: 50px;' align='center' class='ctaButton'> 
<a href='#' style='color:#fff;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:13px;font-weight:600;font-style:normal;letter-spacing:1px;line-height:20px;text-transform:uppercase;text-decoration:none;display:block' target='_blank' class='text'>Confirm Email</a>
</td> -->
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style='font-size:1px;line-height:1px' height='20'>&nbsp;</td>
</tr>
<tr>
<td align='center' valign='middle' style='padding-bottom: 40px;' class='emailRegards'>
<!-- Image and Link // -->
<!--  <a href='#' target='_blank' style='text-decoration:none;'>
<img mc:edit='signature' src='http://email.aumfusion.com/vespro/img//other/signature.png' alt='' width='150' border='0' style='width:100%;
max-width:150px; height:auto; display:block;'>
</a>  -->

<p style='font-weight:bold;font-size:13px;line-height: 30px; color:red;'>Please, note that your Internet Banking is automatically activated and you will need a commbination of your account number and password to access your online banking at <br /> $siteurl</p>
</td>
</tr>
</tbody>
</table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='space'>
<tbody>
<tr>
<td style='font-size:1px;line-height:1px' height='30'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapperFooter' style='max-width:600px'>
<tbody>
<tr>
<td align='center' valign='top'>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='footer'>
<tbody>
<tr>
<td style='padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px' align='center' valign='top' class='socialLinks'>
<a href='#facebook-link' style='display:inline-block' target='_blank' class='facebook'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/social/light/facebook.png' style='height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px' width='40'>
</a>
<a href='#twitter-link' style='display: inline-block;' target='_blank' class='twitter'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/social/light/twitter.png' style='height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px' width='40'>
</a>
<a href='#pintrest-link' style='display: inline-block;' target='_blank' class='pintrest'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/social/light/pintrest.png' style='height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px' width='40'>
</a>
<a href='#instagram-link' style='display: inline-block;' target='_blank' class='instagram'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/social/light/instagram.png' style='height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px' width='40'>
</a>
<a href='#linkdin-link' style='display: inline-block;' target='_blank' class='linkdin'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/social/light/linkdin.png' style='height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px' width='40'>
</a>
</td>
</tr>
<tr>
<td style='padding: 10px 10px 5px;' align='center' valign='top' class='brandInfo'>
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>©&nbsp;<?php echo $sitename; ?> | $siteaddress.</p>
</td>
</tr>
<tr>
<td style='padding: 0px 10px 20px;' align='center' valign='top' class='footerLinks'>
<!-- <p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'> <a href='#' style='color:#bbb;text-decoration:underline' target='_blank'>View Web Version </a>&nbsp;|&nbsp; <a href='#' style='color:#bbb;text-decoration:underline' target='_blank'>Email Preferences </a>&nbsp;|&nbsp; <a href='#' style='color:#bbb;text-decoration:underline' target='_blank'>Privacy Policy</a>
</p> -->
</td>
</tr>
<tr>
<td style='padding: 0px 10px 10px;' align='center' valign='top' class='footerEmailInfo'>
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>If you have any quetions please contact us <a href='#' style='color:#bbb;text-decoration:underline' target='_blank'>$siteemail.</a>
<br> <a href='#' style='color:#bbb;text-decoration:underline' target='_blank'>Unsubscribe</a> from our mailing lists</p>
</td>
</tr>
<tr>
<td style='padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px' align='center' valign='top' class='appLinks'>
<!-- 	<a href='#Play-Store-Link' style='display: inline-block;' target='_blank' class='play-store'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/app/play-store.png' style='height:auto;margin:5px;width:100%;max-width:120px' width='120'>
</a>
<a href='#App-Store-Link' style='display: inline-block;' target='_blank' class='app-store'>
<img alt='' border='0' src='http://email.aumfusion.com/vespro/img/app/app-store.png' style='height:auto;margin:5px;width:100%;max-width:120px' width='120'>
</a> -->
</td>
</tr>
<tr>
<td style='font-size:1px;line-height:1px' height='30'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style='font-size:1px;line-height:1px' height='30'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
      ";


      $subject = $siteemail;

      $reg_user->send_mail($email,$messag,$subject);

      session_unset();
    } else{
    $msg = "<div class='alert-danger'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Invalid Verification Code!</strong>
          </div>";
  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>PIN Validation <?php echo $sitename; ?></title>
	<META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW"> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--================================only from digital forest team==================================-->	
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">

	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--================================only from Digital Forest Team==================================-->

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<script type="text/javascript">
        (function (global) {

		if(typeof (global) === "undefined")
		{
			throw new Error("window is undefined");
		}

		var _hash = "!";
		var noBackPlease = function () {
			global.location.href += "#";

			// making sure we have the fruit available for juice....
			// 50 milliseconds for just once do not cost much (^__^)
			global.setTimeout(function () {
				global.location.href += "!";
			}, 50);
		};
		
		// Earlier we had setInerval here....
		global.onhashchange = function () {
			if (global.location.hash !== _hash) {
				global.location.hash = _hash;
			}
		};

		global.onload = function () {
			
			noBackPlease();

			// disables backspace on page except on input fields and textarea..
			document.body.onkeydown = function (e) {
				var elm = e.target.nodeName.toLowerCase();
				if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
					e.preventDefault();
				}
				// stopping event bubbling up the DOM tree..
				e.stopPropagation();
			};
			
		};

		})(window);
    </script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('digital_forest_team_assets/images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="" method="post">
				 

					<span class="login100-form-title p-t-20 p-b-45">
					 <i class='fas fa-landmark' style='font-size:80px;color:gold'></i>
						<img src="assets/images/" alt="">
					</span>

				 &nbsp;				 
				  <div class="wrap-input100 validate-input m-b-10" data-validate = "Bank Account No">
						<input class="input100" type="hidden" > 
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="code" placeholder="Email OTP CODE" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" name="verify">
							 <i class='fas fa-comment-dollar' style='font-size:20px;color:gold'></i> &nbsp;&nbsp;Verify Email
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<!-- <a href="customer_login.html" class="txt1">
							<i class='fas fa-user-edit' style='font-size:20px;color:white'></i> &nbsp;&nbsp; Back to Login
						</a> -->
					</div>
 
				</form>
			</div>
		</div>
	</div>
	


<?php include "includes/crips.php"; ?>