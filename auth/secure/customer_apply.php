<?php
session_start();
//header("Location:login ");


require('connectdb.php');
require_once 'class.user.php';
include_once ('session.php');
include_once ('mail.php');
// if(!isset($_SESSION['email'])){

// header("Location: login");

// exit(); 
// }
$reg_user = new USER();

$datee = date("d/m/Y"); 
$tep_acc = substr(str_shuffle("0123456789"), 0, 7);
$temp_acc = "207".$tep_acc;

$code = mt_rand(10000,999999);
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

  $address = trim($_POST['address']);
  $address = strip_tags($address);
  $address = htmlspecialchars($address);

  $city = trim($_POST['city']);
  $city = strip_tags($city);
  $city = htmlspecialchars($city);

  $zipcode = trim($_POST['zipcode']);
  $zipcode = strip_tags($zipcode);
  $zipcode = htmlspecialchars($zipcode);

  $country = trim($_POST['country']);
  $country = strip_tags($country);
  $country = htmlspecialchars($country);

  $state = trim($_POST['state']);
  $state = strip_tags($state);
  $state = htmlspecialchars($state);

  $currency = trim($_POST['currency']);
  $currency = strip_tags($currency);
  $currency = htmlspecialchars($currency);

  $empname = trim($_POST['empname']);
  $empname = strip_tags($empname);
  $empname = htmlspecialchars($empname);

  $emptype = trim($_POST['emptype']);
  $emptype = strip_tags($emptype);
  $emptype = htmlspecialchars($emptype);

  $salary = trim($_POST['salary']);
  $salary = strip_tags($salary);
  $salary = htmlspecialchars($salary);

  $bname = trim($_POST['bname']);
  $bname = strip_tags($bname);
  $bname = htmlspecialchars($bname);

  $boccu = trim($_POST['boccu']);
  $boccu = strip_tags($boccu);
  $boccu = htmlspecialchars($boccu);

  $badd = trim($_POST['badd']);
  $badd = strip_tags($badd);
  $badd = htmlspecialchars($badd);

  $q1 = trim($_POST['q1']);
  $q1 = strip_tags($q1);
  $q1 = htmlspecialchars($q1);

  $ans1 = trim($_POST['ans1']);
  $ans1 = strip_tags($ans1);
  $ans1 = htmlspecialchars($ans1);

  $q2 = trim($_POST['q2']);
  $q2 = strip_tags($q2);
  $q2 = htmlspecialchars($q2);

  $ans2 = trim($_POST['ans2']);
  $ans2 = strip_tags($ans2);
  $ans2 = htmlspecialchars($ans2);

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

  $status = "Pending";

  
  $image = $_FILES['image']['name'];
  $image_size =$_FILES['image']['size'];
  $image_tmp =$_FILES['image']['tmp_name'];
  $image_type=$_FILES['image']['type'];
  $tmp = explode('.', $image);
  $image_ext = end($tmp);
      // $image_ext=strtolower(end(explode('.',$image)));

  $expensions= array("jpeg","jpg");

  if(in_array($image_ext,$expensions)=== false){
    $errors = "
    <div class='alert alert-warning'>
    <button class='close' data-dismiss='alert'>&times;</button>
    You have not selected any image, please select a JPG image

    </div>
    ";
  }

  if($image_size > 2097152){
   $errors[]='File size must be excately 2 MB';
 }

 if(empty($errors)==true){
         //move_uploaded_file($image_tmp,"foto/".$image_name);
   move_uploaded_file($image_tmp,"admin/foto/$image");



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
    if($reg_user->create($temp_acc,$firstname,$lastname,$email,$phone,$dob,$gender,$address,$city,$zipcode,$country,$state,$currency,$empname,$emptype,$salary,$bname,$boccu,$badd,$q1,$ans1,$q2,$ans2,$password,$pin,$acctype,$image,$cot,$tax,$imf,$atc,$telex_code))
    {     
      $id = $reg_user->lasdID();  
      
      
      
      
      $messagg = " 
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
<img alt='' border='0' src='$siteurl/logo.png' style='width:50px;height:50px;display:block;color: #f9f9f9;' width='600'>
</a>
</td>
</tr>
<tr>
<td style='padding-bottom: 5px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='mainTitle'>
<h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'>Hi $firstname,</h2>
</td>
</tr>
<tr>
<td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>
<h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
Welcome to $sitename, your account has been created.
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

Kindly use this code: $code to verify your account for $sitename.<br>
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
<!-- <a href='#' target='_blank' style='text-decoration:none;'>
<img mc:edit='signature' src='http://email.aumfusion.com/vespro/img//other/signature.png' alt='' width='150' border='0' style='width:100%;
max-width:150px; height:auto; display:block;'>
</a> -->
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
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>©&nbsp;$sitename | $siteaddress</p>
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


    $subject = $sitename;

    send_mail($email,$messag,$subject);


    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Account Has Been Successfully Created! <br>
    You will be redirected to verify your Account.
    </div>
    ";
    $_SESSION['email'] = $temp_acc;
    header("Location: verify");
  }
  else
  {
    echo "Sorry , Query could no execute...";
  }   
}
}

}   


?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $sitename; ?> - Online Account Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
/*the container must be positioned relative:*/
.custom-select {
position: relative;
font-family: Arial;
}

.custom-select select {
display: none; /*hide original SELECT element:*/
}

.select-selected {
background-color: white;
}

/*style the arrow inside the select element:*/
.select-selected:after {
position: absolute;
content: "";
top: 14px;
right: 10px;
width: 0;
height: 0;
border: 6px solid transparent;
border-color: #000 transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
border-color: transparent transparent #000 transparent;
top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
color: #000;
padding: 8px 16px;
border: 2px solid transparent;
border-color: transparent transparent rgba(0.1, 0.1, 0.1, 0.1) transparent;
cursor: pointer;
user-select: none;
}

/*style items (options):*/
.select-items {
position: absolute;
background-color: #fff;
top: 100%;
left: 0;
right: 0;
z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
display: none;
}

.select-items div:hover, .same-as-selected {
background-color: rgba(0, 0, 0, 0.1);
}


.alert {
      padding: 20px;
      background-color: orange;
      color: white;
  }

  .alert-danger {
      padding: 20px;
      background-color: red;
      color: white;
  }

  .alert-success {
      padding: 20px;
      background-color: green;
      color: white;
  }

  .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
  }

  .closebtn:hover {
      color: black;
  }
</style>

<!-- //web font -->
</head>
<body style="background-image: linear-gradient(#dc0009, #f12e36); background-size:cover; background-attachment:fixed;">


<center><h1><img src="assets/images/logon.png" width="400"></h1>
</center>
<div class="main-agileits">
<!--form-stars-here-->
<div class="form-w3-agile">
<h2>Get Started (Online Account Opening)</h2>
&nbsp;<br>
<?php if (isset($msg)) {
	echo $msg;
} ?>
&nbsp;<br>
<form id="regForm" method="GET" enctype="multipart/form-data"  action="">
<strong style="color: white; font-weight: 200;">Personal Information</strong><hr><br>

<div class="form-sub-w3">
<input type="text" name="firstname"  placeholder="  First Name" oninput="this.className = ''"  />
<div class="icon-w3">
<i class="fa fa-user" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="lastname" placeholder="Last Name" oninput="this.className = ''" />
<div class="icon-w3">
<i class="fa fa-user" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="email" placeholder="Email Address" oninput="this.className = ''" />
<div class="icon-w3">
<i class="fa fa-envelope" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="phone" placeholder="Mobile/Phone No" oninput="this.className = ''"  />
<div class="icon-w3">
<i class="fa fa-phone" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="dob" placeholder="Date of birth in this format (DD/MM/YYYY)" oninput="this.className = ''" />
<div class="icon-w3">
<i class="fa fa-calendar" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" placeholder="Gender (Male or Female)" name="gender"  oninput="this.className = ''" />
<div class="icon-w3">
<i class="fa fa-user" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="address" placeholder="Home Address" oninput="this.className = ''" />
<div class="icon-w3">
<i class="fa fa-address-card" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="city" placeholder="City of Origin" oninput="this.className = ''"  />
<div class="icon-w3">
<i class="fa fa-address-card" aria-hidden="true"></i>
</div>
</div>

<div class="form-sub-w3">
<input type="text" name="zipcode" placeholder="Postal/Zip Code" oninput="this.className = ''" />
<div class="icon-w3">
<i class="fa fa-address-card" aria-hidden="true"></i>
</div>
</div>

<script type= "text/javascript" src = "assets/js/Digital_forest_team_bankia_countries.js"></script>

<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="country" oninput="this.className = ''"  id="country">
<option value="">Please select Country</option> 
</select>
<br><br>
<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="state"  oninput="this.className = ''"  id="state">
<option value="">Please select State</option> 
</select>

<script language="javascript">
populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
populateCountries("country2");
populateCountries("country2");
</script>

<br>	<br>
<center>	
	<strong style="color: white; font-weight: 200;">Employment Section</strong>
</center>
<hr>
<br>
<div class="input-container">
<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="currency"  id="country" oninput="this.className = ''" >
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
		</div>


		<div class="form-sub-w3">
			<input type="text" name="empname" placeholder="Name and Address of Employer" oninput="this.className = ''" />
			<div class="icon-w3">
				<i class="fa fa-user" aria-hidden="true"></i>
			</div>
		</div>


		<div class="input-container">
			<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="emptype" oninput="this.className = ''"   id="form-first-name">
				<option value="">Type of Employment</option>
				<option value="self Employed">Self Employed</option>  
				<option value="self Employed">Public/Government Office</option>  
				<option value="self Employed">Private/Partnership Office</option>  
				<option value="self Employed">Business/Sales</option>  
				<option value="self Employed">Trading/Market</option>  
				<option value="self Employed">Military/Paramilitary</option>  
				<option value="self Employed">Politician/Celebrity</option>  
			</select></div>

			<br>
			<div class="input-container">
				<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="salary" oninput="this.className = ''"  >
					<option value="">Select Your Salary Range</option>
					<option value="$100.00 - $500.00">$100.00 - $500.00</option> 
					<option value="$700.00 - $1,000.00">$700.00 - $1,000.00</option> 
					<option value="$1,000.00 - $2,000.00">$1,000.00 - $2,000.00</option> 
					<option value="$2,000.00 - $5,000.00">$2,000.00 - $5,000.00</option> 
					<option value="$5,000.00 - $10,000.00">$5,000.00 - $10,000.00</option> 
					<option value="$15,000.00 - $20,000.00">$15,000.00 - $20,000.00</option> 
					<option value="$25,000.00 - $30,000.00">$25,000.00 - $30,000.00</option> 
					<option value="$30,000.00 - $70,000.00">$30,000.00 - $70,000.00</option> 
					<option value="$80,000.00 - $140,000.00">$80,000.00 - $140,000.00</option> 
					<option value="$150,000.00 - $300,000.00">$150,000.00 - $300,000.00</option> 
					<option value="$300,000.00 - $1,000,000.00">$300,000.00 - $1,000,000.00</option> 
				</select>
      </div>

				<div class="form-sub-w3">
					<input type="text" name="bname"  placeholder="Beneficiary Legal Name" oninput="this.className = ''"  />
					<div class="icon-w3">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
				</div>

				<div class="form-sub-w3">
					<input type="text" name="boccu"  placeholder="Beneficiary Occupation" oninput="this.className = ''" />
					<div class="icon-w3">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					</div>
				</div>

				<div class="form-sub-w3">
					<input type="text" name="badd"  placeholder="Next of Kin Residential Address" oninput="this.className = ''" />
					<div class="icon-w3">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
				</div>

				<br><br>
				<center><strong style="color: white; font-weight: 200;">Security Section</strong><hr></center><br>

				<div class="input-container">
					<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="q1" oninput="this.className = ''"  >
						<option value="">Select Question One</option>
						<option value="What is your pet name?">What is your pet name?</option>    
						<option value="What is your nick name?">What is your nick name?</option>    
						<option value="What is the name of your first car?">What is the name of your first car?</option>    
						<option value="when did you finish high school?">when did you finish high school?</option>    
						<option value="your favorite music?">your favorite music?</option>    
						<option value="your favorite movie?">your favorite movie</option>    
						<option value="your favorite roll model?">your favorite role model</option>    
						<option value="favorite state?">favorite state?</option>    
					</select></div>

					<div class="form-sub-w3">
						<input type="text" name="ans1"  placeholder="Answer Question One" oninput="this.className = ''" />
						<div class="icon-w3">
							<i class="fa fa-key" aria-hidden="true"></i>
						</div>
					</div>

					<div class="input-container">
						<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;" name="q2" oninput="this.className = ''" >
							<option value="">Select Question Two</option>
							<option value="What is your pet name?">What is your pet name?</option>    
							<option value="What is your nick name?">What is your nick name?</option>    
							<option value="What is the name of your first car?">What is the name of your first car?</option>    
							<option value="when did you finish high school?">when did you finish high school?</option>    
							<option value="your favorite music?">your favorite music?</option>
							<option value="your favorite roll model?">your favorite role model</option>    
							<option value="favorite state?">favorite state?</option>  												
						</select></div>

						<div class="form-sub-w3">
							<input type="text" name="ans2"  placeholder="Answer Question Two" oninput="this.className = ''"  />
							<div class="icon-w3">
								<i class="fa fa-key" aria-hidden="true"></i>
							</div>
						</div>

						<div class="form-sub-w3">
							<input type="password" id="pass" name="password" placeholder="Account Password" oninput="this.className = ''"  />
							<div class="icon-w3">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>


						<div class="form-sub-w3">
							<input type="password" id="pass" name="cpassword" placeholder="Confirm Account Password" oninput="this.className = ''"  />
							<div class="icon-w3">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>


						<div class="form-sub-w3">
							<input type="text" name="pin" placeholder="Choose Transaction PIN" oninput="this.className = ''" />
							<div class="icon-w3">
								<i class="fa fa-key" aria-hidden="true"></i>
							</div>
						</div>

						<div class="form-sub-w3">
							<input type="text" name="cpin" placeholder="Confirm Transaction PIN" oninput="this.className = ''"  />
							<div class="icon-w3">
								<i class="fa fa-key" aria-hidden="true"></i>
							</div>
						</div>

						<select class="custom-select fcustom-select select select-selected select-selected:after " style="width:100%;"  name="acctype" oninput="this.className = ''" >
							<option value="">Please select Account Type</option> 
							<option value="Checking Account">Checking Account</option>
							<option value="Savings Account">Saving Account</option>
							<option value="Fixed Deposit Account">Fixed Deposit Account</option>
							<option value="Current Account">Current Account</option>
							<option value="Business Account">Business Account</option>
							<option value="Non Resident Account">Non Resident Account</option>
							<option value="Cooperate Business Account">Cooperate Business Account</option>
							<option value="Investment Account">Investment Account</option>
						</select>
						<br><br>
						<input class="custom-select fcustom-select select select-selected select-selected:after " style="width:92%;" type="file" name="image"  class="btn btn-primary" oninput="this.className = ''"  /> 


						<input type="hidden" value="<?php echo $cotGen; ?>"  name="cot" />				
						<input type="hidden" value="<?php echo $taxGen; ?>"  name="tax" />	
						<input type="hidden" value="<?php echo $imfGen; ?>"  name="imf" />
						<input type="hidden" value="<?php echo $atcGen; ?>"  name="atc" />
						<input type="hidden" value="<?php echo $telex_codeGen; ?>"  name="telex_code" />
						<!-- <input type="hidden" name="msg"  value="Your Account Has Been Activated Successfully" /> -->


						<div class="submit-w3l">
							<input type="submit" name="createAccount" value="Open Account Now">
						</div>
					</form>

				</div>

				<!--//form-ends-here-->
			</div>

			<!-- copyright -->
			<div class="copyright w3-agile">
				<p>All rights reserved © 2024</p>
			</div>
			<!-- //copyright --> 
			<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
			<!-- pop-up-box -->  
			<script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
			<!--//pop-up-box -->
			<script>
				$(document).ready(function() {
					$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});

				});
			</script>

			

		</body>
		</html>

