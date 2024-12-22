<?php
session_start();


require_once 'class.admin.php';
include_once ('session.php');
include_once ('../../functions.php');
include('process.php');
if(!isset($_SESSION['email'])){
	
	header("Location: login");

	exit(); 
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$reg_user = new USER();

$datee = date("d/m/Y"); 
$tep_acc = substr(str_shuffle("0123456789"), 0, 7);
$temp_acc = "207".$tep_acc;

$code = mt_rand(100000,999999);
$cotGenn = mt_rand(10000000,99999999);
$taxGenn = mt_rand(10000000,99999999);
$imfGenn = mt_rand(10000000,99999999);
$atcGenn = mt_rand(10000000,99999999);
$telex_codeGenn = mt_rand(10000000,99999999);
$cotGen = "CT".$cotGenn;
$taxGen = "TX".$taxGenn;
$imfGen = "IM".$imfGenn;
$atcGen = "AT".$atcGenn;
$telex_codeGen = "TLX".$telex_codeGenn;

// $pin = mt_rand(1000,9999);

if(isset($_POST['createAccount'])){


$firstname = trim($_POST['firstname']);
$firstname = strip_tags($firstname);
$firstname = htmlspecialchars($firstname);

$lastname = trim($_POST['lastname']);
$lastname = strip_tags($lastname);
$lastname = htmlspecialchars($lastname);

$email = trim($_POST['email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$phone = trim($_POST['phone']);
$phone = strip_tags($phone);
$phone = htmlspecialchars($phone);

$dob = trim($_POST['dob']);
$dob = strip_tags($dob);
$dob = htmlspecialchars($dob);

$gender = trim($_POST['gender']);
$gender = strip_tags($gender);
$gender = htmlspecialchars($gender);

// $address = trim($_POST['address']);
// $address = strip_tags($address);
// $address = htmlspecialchars($address);

// $city = trim($_POST['city']);
// $city = strip_tags($city);
// $city = htmlspecialchars($city);

// $zipcode = trim($_POST['zipcode']);
// $zipcode = strip_tags($zipcode);
// $zipcode = htmlspecialchars($zipcode);

// $country = trim($_POST['country']);
// $country = strip_tags($country);
// $country = htmlspecialchars($country);

// $state = trim($_POST['state']);
// $state = strip_tags($state);
// $state = htmlspecialchars($state);

$currency = trim($_POST['currency']);
$currency = strip_tags($currency);
$currency = htmlspecialchars($currency);

// $empname = trim($_POST['empname']);
// $empname = strip_tags($empname);
// $empname = htmlspecialchars($empname);

// $emptype = trim($_POST['emptype']);
// $emptype = strip_tags($emptype);
// $emptype = htmlspecialchars($emptype);

// $salary = trim($_POST['salary']);
// $salary = strip_tags($salary);
// $salary = htmlspecialchars($salary);

// $bname = trim($_POST['bname']);
// $bname = strip_tags($bname);
// $bname = htmlspecialchars($bname);

// $boccu = trim($_POST['boccu']);
// $boccu = strip_tags($boccu);
// $boccu = htmlspecialchars($boccu);

// $badd = trim($_POST['badd']);
// $badd = strip_tags($badd);
// $badd = htmlspecialchars($badd);

// $q1 = trim($_POST['q1']);
// $q1 = strip_tags($q1);
// $q1 = htmlspecialchars($q1);

// $ans1 = trim($_POST['ans1']);
// $ans1 = strip_tags($ans1);
// $ans1 = htmlspecialchars($ans1);

// $q2 = trim($_POST['q2']);
// $q2 = strip_tags($q2);
// $q2 = htmlspecialchars($q2);

// $ans2 = trim($_POST['ans2']);
// $ans2 = strip_tags($ans2);
// $ans2 = htmlspecialchars($ans2);

$password = trim($_POST['password']);

$cpassword = trim($_POST['cpassword']);

$pin = trim($_POST['pin']);
$pin = strip_tags($pin);
$pin = htmlspecialchars($pin);

$cpin = trim($_POST['cpin']);
$cpin = strip_tags($cpin);
$cpin = htmlspecialchars($cpin);

$acctype = trim($_POST['acctype']);
$acctype = strip_tags($acctype);
$acctype = htmlspecialchars($acctype);

$cot = trim($_POST['cot']);
$cot = strip_tags($cot);
$cot = htmlspecialchars($cot);

$tax = trim($_POST['tax']);
$tax = strip_tags($tax);
$tax = htmlspecialchars($tax);

$imf = trim($_POST['imf']);
$imf = strip_tags($imf);
$imf = htmlspecialchars($imf);

$atc = trim($_POST['atc']);
$atc = strip_tags($atc);
$atc = htmlspecialchars($atc);

$telex_code = trim($_POST['telex_code']);
$telex_code = strip_tags($telex_code);
$telex_code = htmlspecialchars($telex_code);


$reg_date = $datee;
$acc_no = $temp_acc;

$t_bal = "0";

$a_bal = "0";

$status = "Active";



$stmt = $reg_user->runQuery("SELECT * FROM account WHERE email=:email");
$stmt1 = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":email"=>$email));
$stmt1->execute(array(":acc_no"=>$acc_no));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

if($password !== $cpassword)
{
$msg = "
<div class='alert alert-danger'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Sorry!</strong>  Email or Username already exists! Please, try another one!
</div>
";
exit();
}

if($pin !== $cpin)
{
$msg = "
<div class='alert alert-danger'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Sorry!</strong>  Email or Username already exists! Please, try another one!
</div>
";
exit();
}

if($stmt->rowCount() > 0 || $stmt1->rowCount() > 0)
{
$msg = "
<div class='alert alert-danger'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Sorry!</strong>  Email or Username already exists! Please, try another one!
</div>
";
}


if($stmt->rowCount() > 0 || $stmt1->rowCount() > 0)
{
$msg = "
<div class='alert alert-danger'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Sorry!</strong>  Email or Username already exists! Please, try another one!
</div>
";
}
else
{
if($reg_user->create($temp_acc,$firstname,$lastname,$email,$phone,$dob,$gender,$currency,$password,$pin,$acctype,$cot,$tax,$imf,$atc,$telex_code,$code))
{     
$id = $reg_user->lasdID();  

	$stmtLi = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
	$stmtLi->execute(array(":acc_no"=>$acc_no));
	$rowLi = $stmtLi->fetch(PDO::FETCH_ASSOC);



		$email = $rowLi['email'];
		$firstname = $rowLi['firstname'];
		$pin = $rowLi['pin'];
		$currency = $rowLi['currency'];
		$total_bal = $rowLi['total_bal'];
		$ledger_bal = $rowLi['ledger_bal'];
		$card_bal = $rowLi['card_bal'];
		$loan_bal = $rowLi['loan_bal'];
		$cot = $rowLi['cot'];
	      $imf = $rowLi['imf'];
	      $atc = $rowLi['atc'];

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
<!-- <a href='#' style='text-decoration:none' target='_blank'>                                                  <img alt='' border='0' src='$siteurl' style='width:100%;max-width:150px;height:auto;display:block' width='150'> -->
</a>
</td>
</tr>
<tr>
<td style='padding-bottom: 20px;' align='center' valign='top' class='imgHero'>
<a href='#' style='text-decoration:none' target='_blank'>

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

<p style='font-weight:bold;font-size:13px;line-height: 30px; color:red;'>Please, note that your Internet Banking is automatically activated and you will need a combination of your account number and password to access your online banking at <br /> $siteurl</p>
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
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>©&nbsp;$sitename | $siteaddress.</p>
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
<!--    <a href='#Play-Store-Link' style='display: inline-block;' target='_blank' class='play-store'>
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


$subject = $sitename;

send_mail($email,$messag,$subject);


$msg = "
<div class='alert alert-info'>
<button class='close' data-dismiss='alert'>&times;</button>
<strong>Success!</strong> Account Has Been Successfully Created! <br>
</div>
";

}
else
{
echo "Sorry , Query could no execute...";
}   
}


}  


?>


<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<meta charset="UTF-8">

		<meta name="description" content="">
		<meta name="keywords" content="">
		<link rel="icon" href="../../images/favicon.png" type="image/x-icon">

		<title><?php echo $sitename; ?> | Admin - Create Account</title>

		<!-- CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/form.css" rel="stylesheet">
		<link href="css/calendar.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/icons.css" rel="stylesheet">
		<link href="css/generics.css" rel="stylesheet"> 
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystatecity.js"></script>
	</head>
	<body id="skin-blur-lights">

		<header id="header" class="media">
			<a href="index" id="menu-toggle"></a> 
			<a class="logo pull-left" href="index"><img src="" class="img-responsive" alt=""></a>

			<div class="media-body">
				<div class="media" id="top-menu">

					<div id="time" class="pull-right">
						<span id="hours"></span>
						:
						<span id="min"></span>
						:
						<span id="sec"></span>
					</div>


				</div>
			</div>
		</header>

		<div class="clearfix"></div>

		<section id="main" class="p-relative" role="main">

			<!-- Sidebar -->
			<aside id="sidebar">

				<!-- Sidbar Widgets -->
				<div class="side-widgets overflow">
					<!-- Profile Menu -->
					<div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
						<a href="index" data-toggle="dropdown">
							<img class="profile-pic animated" src="img/htb.jpg" alt="">
						</a>
						<ul class="dropdown-menu profile-menu">

							<li><a href="logout">Sign Out</a> <i class="fa fa-sign-out icon left">&#61903;</i><i class="icon right fa fa-sign-out">&#61815;</i></li>
							<li><a href="#edit" data-toggle="modal">Edit Profile</a><i class="right fa fa-edit fa-2x"></i></li>
						</ul>
						<h4 class="m-0"><?php echo $sitename; ?></h4>

					</div>

					<!-- Calendar -->
					<div class="s-widget m-b-25">
						<div id="sidebar-calendar"></div>
					</div>

					<!-- Feeds -->
					<div class="s-widget m-b-25">
						<h2 class="tile-title">

						</h2>
						<div class="">

							<p><i class="fa fa-skype fa-2x"></i> </p>
						</div>
						<div class="s-widget-body">
							<div id="news-feed"></div>
						</div>
					</div>

					<!-- Projects -->

				</div>

				<!-- Side Menu -->
				<ul class="list-unstyled side-menu">
					<li>
						<a class="sa-side-home" href="index">
							<span class="menu-item">Dashboard</span>
						</a>
					</li>
					<li class="dropdown active">
						<a class="sa-list-vcard" href="">
							<span class="menu-item">Accounts</span>
						</a>
						<ul class="list-unstyled menu-item">	
							<li><a href="create_account">Create Account</a></li>
							<li><a href="view_account">View Accounts</a></li>
							
						</ul>
					</li>
					<li>
						<a class="sa-list-database" href="credit_debit_list">
							<span class="menu-item">Credit/Debit History</span>
						</a>
					</li>
				</ul>

			</aside>
			<section id="content" class="container">
				<h4 class="page-title block-title">Create Account</h4>

				<!-- Required Feilds -->
				<div class="block-area" id="required">
					<h4 class="">Fill the form accurately</h4>
					<?php if (isset($msg)) { echo $msg; } ?>
<?php if (isset($errors)) { echo $errors; } ?>

<form class="p-4" action="#" method="POST" enctype="multipart/form-data" >
<div class="text-center pb-3">
<h3 class="text-purple">Account Opening</h3>
<p>Fill the account opening form to get onboard with Express Banking at a go.
</p>
</div>
<h5>Personal Information</h5>
<div class="form-row">
<div class="col-md-4 form-group">
<label for="firstname">First Name</label>
<input type="text" name="firstname" id="firstname" class="form-control" value="" required>
<span class="help-block text-danger ml-2" id="firsname_error" style="font-size: 0.9rem;"></span>
</div>
<div class="col-md-4 form-group">
<label for="lastname">Last Name</label>
<input type="text" name="lastname" id="lastname" class="form-control" value="" required>
<span class="help-block text-danger ml-2" id="firsname_error" style="font-size: 0.9rem;"></span>
</div>
<div class="col-md-4 form-group">
<label for="middlename">Other Name</label>
<input type="text" name="middlename" id="middlename" class="form-control" value="">
<span class="help-block text-danger ml-2" id="firsname_error" style="font-size: 0.9rem;"></span>
</div>
</div>

<div class="form-row">
<div class="col-md-6">
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control" value="" required>
<span class="help-block text-danger ml-2" id="firsname_error" style="font-size: 0.9rem;"></span>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="phone">Phone Number</label>
<input type="tel" name="phone" id="phone" class="form-control" value="" placeholder=" e.g  +14146767896" required>
<span class="help-block text-danger ml-2" id="firsname_error" style="font-size: 0.9rem;"></span>
</div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="gender">Gender</label>
<select name="gender" id="gender" class="form-control" required>
<option value="">Select Gender</option>
<option value="male" >Male</option>
<option value="female" >Female</option>
</select>
<span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
</div>
<div class="form-group col-md-6">
<label for="dob">Date of Birth</label>
<input type="date" name="dob" id="dob" class="form-control" value="" required>
<span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="account_type">Account Type</label>
<select name="acctype" id="account_type" class="form-control" required>
<option value="">Select Account Type</option>
<option value="savings" >Savings Account</option>
<option value="checking" >Checking Account</option>
<option value="money market" >Money Market</option>
</select>
<span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
</div>
<div class="form-group col-md-6">
<label for="account_type">Account Currency</label>
<select name="currency" id="account_type" class="form-control" required>
<option selected value="">Select Account Currency</option>
<option value="USD">America (United States) Dollars – USD</option>
<option value="AFN">Afghanistan Afghanis – AFN</option>
<option value="ALL">Albania Leke – ALL</option>
<option value="DZD">Algeria Dinars – DZD</option>
<option value="ARS">Argentina Pesos – ARS</option>
<option value="AUD">Australia Dollars – AUD</option>
<option value="ATS">Austria Schillings – ATS</OPTION>

<option value="BSD">Bahamas Dollars – BSD</option>
<option value="BHD">Bahrain Dinars – BHD</option>
<option value="BDT">Bangladesh Taka – BDT</option>
<option value="BBD">Barbados Dollars – BBD</option>
<option value="BEF">Belgium Francs – BEF</OPTION>
<option value="BMD">Bermuda Dollars – BMD</option>

<option value="BRL">Brazil Reais – BRL</option>
<option value="BGN">Bulgaria Leva – BGN</option>
<option value="CAD">Canada Dollars – CAD</option>
<option value="XOF">CFA BCEAO Francs – XOF</option>
<option value="XAF">CFA BEAC Francs – XAF</option>
<option value="CLP">Chile Pesos – CLP</option>

<option value="CNY">China Yuan Renminbi – CNY</option>
<option value="CNY">RMB (China Yuan Renminbi) – CNY</option>
<option value="COP">Colombia Pesos – COP</option>
<option value="XPF">CFP Francs – XPF</option>
<option value="CRC">Costa Rica Colones – CRC</option>
<option value="HRK">Croatia Kuna – HRK</option>

<option value="CYP">Cyprus Pounds – CYP</option>
<option value="CZK">Czech Republic Koruny – CZK</option>
<option value="DKK">Denmark Kroner – DKK</option>
<option value="DEM">Deutsche (Germany) Marks – DEM</OPTION>
<option value="DOP">Dominican Republic Pesos – DOP</option>
<option value="NLG">Dutch (Netherlands) Guilders – NLG</OPTION>

<option value="XCD">Eastern Caribbean Dollars – XCD</option>
<option value="EGP">Egypt Pounds – EGP</option>
<option value="EEK">Estonia Krooni – EEK</option>
<option value="EUR">Euro – EUR</option>
<option value="FJD">Fiji Dollars – FJD</option>
<option value="FIM">Finland Markkaa – FIM</OPTION>

<option value="FRF*">France Francs – FRF*</OPTION>
<option value="DEM">Germany Deutsche Marks – DEM</OPTION>
<option value="XAU">Gold Ounces – XAU</option>
<option value="GRD">Greece Drachmae – GRD</OPTION>
<option value="GTQ">Guatemalan Quetzal – GTQ</OPTION>
<option value="NLG">Holland (Netherlands) Guilders – NLG</OPTION>
    <option value="HKD">Hong Kong Dollars – HKD</option>

    <option value="HUF">Hungary Forint – HUF</option>
    <option value="ISK">Iceland Kronur – ISK</option>
    <option value="XDR">IMF Special Drawing Right – XDR</option>
    <option value="INR">India Rupees – INR</option>
    <option value="IDR">Indonesia Rupiahs – IDR</option>
    <option value="IRR">Iran Rials – IRR</option>

    <option value="IQD">Iraq Dinars – IQD</option>
    <option value="IEP*">Ireland Pounds – IEP*</OPTION>
        <option value="ILS">Israel New Shekels – ILS</option>
        <option value="ITL*">Italy Lire – ITL*</OPTION>
            <option value="JMD">Jamaica Dollars – JMD</option>
            <option value="JPY">Japan Yen – JPY</option>

            <option value="JOD">Jordan Dinars – JOD</option>
            <option value="KES">Kenya Shillings – KES</option>
            <option value="KRW">Korea (South) Won – KRW</option>
            <option value="KWD">Kuwait Dinars – KWD</option>
            <option value="LBP">Lebanon Pounds – LBP</option>
            <option value="LUF">Luxembourg Francs – LUF</OPTION>

                <option value="MYR">Malaysia Ringgits – MYR</option>
                <option value="MTL">Malta Liri – MTL</option>
                <option value="MUR">Mauritius Rupees – MUR</option>
                <option value="MXN">Mexico Pesos – MXN</option>
                <option value="MAD">Morocco Dirhams – MAD</option>
                <option value="NLG">Netherlands Guilders – NLG</OPTION>

                    <option value="NZD">New Zealand Dollars – NZD</option>
                    <option value="NOK">Norway Kroner – NOK</option>
                    <option value="OMR">Oman Rials – OMR</option>
                    <option value="PKR">Pakistan Rupees – PKR</option>
                    <option value="XPD">Palladium Ounces – XPD</option>
                    <option value="PEN">Peru Nuevos Soles – PEN</option>

                    <option value="PHP">Philippines Pesos – PHP</option>
                    <option value="XPT">Platinum Ounces – XPT</option>
                    <option value="PLN">Poland Zlotych – PLN</option>
                    <option value="PTE">Portugal Escudos – PTE</OPTION>
                        <option value="QAR">Qatar Riyals – QAR</option>
                        <option value="RON">Romania New Lei – RON</option>

                        <option value="ROL">Romania Lei – ROL</option>
                        <option value="RUB">Russia Rubles – RUB</option>
                        <option value="SAR">Saudi Arabia Riyals – SAR</option>
                        <option value="XAG">Silver Ounces – XAG</option>
                        <option value="SGD">Singapore Dollars – SGD</option>
                        <option value="SKK">Slovakia Koruny – SKK</option>

                        <option value="SIT">Slovenia Tolars – SIT</option>
                        <option value="ZAR">South Africa Rand – ZAR</option>
                        <option value="KRW">South Korea Won – KRW</option>
                        <option value="ESP">Spain Pesetas – ESP</OPTION> 

                            <option value="SDD">Sudan Dinars – SDD</option>
                            <option value="SEK">Sweden Kronor – SEK</option>
                            <option value="CHF">Switzerland Francs – CHF</option>
                            <option value="TWD">Taiwan New Dollars – TWD</option>
                            <option value="THB">Thailand Baht – THB</option>
                            <option value="TTD">Trinidad and Tobago Dollars – TTD</option>

                            <option value="TND">Tunisia Dinars – TND</option>
                            <option value="TRY">Turkey New Lira – TRY</option>
                            <option value="AED">United Arab Emirates Dirhams – AED</option>
                            <option value="GBP">United Kingdom Pounds – GBP</option>
                            <option value="USD">United States Dollars – USD</option>
                            <option value="VEB">Venezuela Bolivares – VEB</option>

                            <option value="VND">Vietnam Dong – VND</option>
                            <option value="ZMK">Zambia Kwacha – ZMK</option>
                        </select>
                        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                    </div>
                </div>
                

                <h5>Account Password</h5>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ssn">Password</label>
                        <input type="password" name="password" id="ssn" class="form-control" value="" required>
                        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ssn">Comfirm Password</label>
                        <input type="password" name="cpassword" id="ssn" class="form-control" value="" required>
                        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                    </div>
                </div>

                <h5>Account Pin</h5>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ssn">Pin</label>
                        <input type="password" name="pin" id="ssn" class="form-control" value="" required>
                        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ssn">Comfirm Pin</label>
                        <input type="password" name="cpin" id="ssn" class="form-control" value="" required>
                        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                    </div>
                </div>



                <input type="hidden" value="<?php echo $cotGen; ?>"  name="cot" />              
                <input type="hidden" value="<?php echo $taxGen; ?>"  name="tax" />  
                <input type="hidden" value="<?php echo $imfGen; ?>"  name="imf" />
                <input type="hidden" value="<?php echo $atcGen; ?>"  name="atc" />
                <input type="hidden" value="<?php echo $telex_codeGen; ?>"  name="telex_code" />

                <div class="text-center my-3">
                    <button type="submit" name="createAccount" class="btn bg-purple btn-purple text-white w-75">Submit</button>
                </div>

            </form>
			</div>

			<hr class="whiter m-t-20" />
		</section>


		<!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Mozilla firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="img/browsers/ie.png" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
            </section>

            <!-- Javascript Libraries -->
            <!-- jQuery -->
            <script src="js/jquery.min.js"></script> <!-- jQuery Library -->


            <!-- Bootstrap -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Charts -->
            <script src="js/validation/validate.min.js"></script> <!-- jQuery Form Validation Library -->
            <script src="js/validation/validationEngine.min.js"></script> <!-- jQuery Form Validation Library - requirred with above js -->
            <script src="js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
            <script src="js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
            <script src="js/charts.js"></script> <!-- All the above chart related functions -->
            <script src="js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->


            <!-- UX -->
            <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->

            <!-- Other -->
            <script src="js/calendar.min.js"></script> <!-- Calendar -->
            <script src="js/feeds.min.js"></script> <!-- News Feeds -->


            <!-- All JS functions -->
            <script src="js/functions.js"></script>
        </body>
        </html>
