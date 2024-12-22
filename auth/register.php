<?php
session_start();

error_reporting(0);
//header("Location:login ");


require('secure/connectdb.php');
require_once 'secure/class.user.php';
include_once ('secure/session.php');
include_once ('functions.php');
include_once ('mail.php');
// if(!isset($_SESSION['email'])){

// header("Location: login");

// exit(); 
// }
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


// $image = $_FILES['image']['name'];
// $image_size =$_FILES['image']['size'];
// $image_tmp =$_FILES['image']['tmp_name'];
// $image_type=$_FILES['image']['type'];
// $tmp = explode('.', $image);
// $image_ext = end($tmp);
// $image_ext=strtolower(end(explode('.',$image)));

//$expensions= array("jpeg","jpg", "png", "PNG", "JPG");

// if(in_array($image_ext,$expensions)=== false){
// $errors = "
// <div class='alert alert-warning'>
// <button class='close' data-dismiss='alert'>&times;</button>
// You have not selected any image, please select a JPG image

// </div>
// ";
// }

// if($image_size > 2097152){
// $errors[]='File size must be excately 2 MB';
// }

//if(empty($errors)==true){
//move_uploaded_file($image_tmp,"foto/".$image_name);
//move_uploaded_file($image_tmp,"secure/admin/foto/$image");



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
if($reg_user->create($temp_acc,$firstname,$lastname,$email,$phone,$dob,$gender,$address,$city,$zipcode,$country,$state,$currency,$empname,$emptype,$salary,$bname,$boccu,$badd,$q1,$ans1,$q2,$ans2,$password,$pin,$acctype,$cot,$tax,$imf,$atc,$telex_code,$code))
{     
$id = $reg_user->lasdID();  




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
<h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'>Hi $firstname,</h2>
</td>
</tr>
<tr>
<td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>
<h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
Dear Customer, Your account has successfully been created. Please wait till Our Customer Service representative validate your account, then you can login to you account. <br><br>
This Process can take 1-2 business working days, once your account is validated, you will be notify through your registered email address <br><br>
kindly check your mail for further information
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
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>©&nbsp;$sitename </p>
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


$subject = "$sitename";

send_mail($email,$messag,$subject);

// $_SESSION['msg'] = "
// <div class='alert alert-success'>
// <button class='close' data-dismiss='alert'>&times;</button>
// <strong>Success!</strong> Account Has Been Successfully Created! <br>
// An email has been sent to your email address with verification code. <br>
// Please verify your email now.
// </div>
// ";
$_SESSION['temp'] = $temp_acc;

header("Location: application_success");
}
else
{
echo "Sorry , Query could no execute...";
}   
}
//}

}   


include 'header.php'; 

?>
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
<div class="reg-top h-100 py-5">
<div class="container-fluid">
<div class="row">
<div class="col-12 col-md-10 col-lg-8 mx-auto">
<div class="shadow">
<div class="bg-light rounded">

<div class="pl-2 pl-md-5 mt-2 pb-3 sticky-top bg-light d-flex pt-2">
<a href="<?php echo $siteurl; ?>" class=" mb-0 d-flex align-items-center navbar-brand">
                                <i class='fa fa-home' style='font-size:35px;color:black; align-content: center;'></i>
                                

                            </a>
<div class="ml-auto mr-5 mt-2 ">
<a href="login" class="btn btn-outline-purple px-lg-3">Login</a>
</div>


</div>
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
<input type="text" name="middlename" id="middlename" class="form-control" value="" required>
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
                <!--<h5>Address</h5>-->
                <!--<div class="form-row">-->
                <!--    <div class="col-md-6">-->
                <!--        <div class="form-group">-->
                <!--            <label for="street">Street</label>-->
                <!--            <input type="text" name="address" id="street" class="form-control" placeholder="e.g 1, 15th Street" value="" required>-->
                <!--            <span class="help-block text-danger ml-2" style="font-size: 0.9rem;"></span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-md-3">-->
                <!--        <div class="form-group">-->
                <!--            <label for="apartment">Apartment</label>-->
                <!--            <input type="text" name="apartment" id="apartment" class="form-control" placeholder="e.g 209" value="" required>-->
                <!--            <span class="help-block text-danger ml-2" style="font-size: 0.9rem;"></span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-md-3">-->
                <!--        <div class="form-group">-->
                <!--            <label for="zip">ZIP</label>-->
                <!--            <input type="text" name="zipcode" id="zip" class="form-control" placeholder="e.g 1123234" value="" required>-->
                <!--            <span class="help-block text-danger ml-2" style="font-size: 0.9rem;"></span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!-- <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" class="form-control countries order-alpha presel-byip " id="countryId" required>
                                <option value="">Select Country</option>
                            </select>
                            <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="state">State</label>
                            <select name="state" class="form-control states order-alpha" id="stateId" required>
                                <option value="">Select State</option>
                            </select>
                            <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" class="form-control cities order-alpha" id="cityId" required>
                                <option value="">Select City</option>
                            </select>
                            <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>
                        </div>
                    </div>

                </div> -->

                <!--<h5>Employment Details</h5>-->

                <!--<div class="form-row">-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="account_type">Type of Employment</label>-->
                <!--        <select name="emptype" id="account_type" class="form-control" required>-->
                <!--            <option value="">Type of Employment</option>-->
                <!--            <option value="Self Employed">Self Employed</option>  -->
                <!--            <option value="Public/Government Office">Public/Government Office</option>  -->
                <!--            <option value="Private/Partnership Office">Private/Partnership Office</option>  -->
                <!--            <option value="Business/Sales">Business/Sales</option>  -->
                <!--            <option value="Trading/Market">Trading/Market</option>  -->
                <!--            <option value="Military/Paramilitary">Military/Paramilitary</option>  -->
                <!--            <option value="Politician/Celebrity">Politician/Celebrity</option>   -->
                <!--        </select>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="ssn">Select Your Salary Range</label>-->
                <!--        <select class="form-control" name="salary" required>-->
                <!--            <option value="">Select Your Salary Range</option>-->
                <!--            <option value="$100.00 - $500.00">$100.00 - $500.00</option> -->
                <!--            <option value="$700.00 - $1,000.00">$700.00 - $1,000.00</option> -->
                <!--            <option value="$1,000.00 - $2,000.00">$1,000.00 - $2,000.00</option> -->
                <!--            <option value="$2,000.00 - $5,000.00">$2,000.00 - $5,000.00</option> -->
                <!--            <option value="$5,000.00 - $10,000.00">$5,000.00 - $10,000.00</option> -->
                <!--            <option value="$15,000.00 - $20,000.00">$15,000.00 - $20,000.00</option> -->
                <!--            <option value="$25,000.00 - $30,000.00">$25,000.00 - $30,000.00</option> -->
                <!--            <option value="$30,000.00 - $70,000.00">$30,000.00 - $70,000.00</option> -->
                <!--            <option value="$80,000.00 - $140,000.00">$80,000.00 - $140,000.00</option> -->
                <!--            <option value="$150,000.00 - $300,000.00">$150,000.00 - $300,000.00</option> -->
                <!--            <option value="$300,000.00 - $1,000,000.00">$300,000.00 - $1,000,000.00</option> -->
                <!--        </select>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="form-row">-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="account_type">Name and Address of Employer</label>-->
                <!--        <input type="text" name="empname" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="ssn">Beneficiary Legal Name</label>-->
                <!--        <input type="text" name="bname" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="form-row">-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="account_type">Beneficiary Occupation</label>-->
                <!--        <input type="text" name="boccu" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="ssn">Next of Kin Residential Address</label>-->
                <!--        <input type="text" name="badd" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--</div>-->



                <!--<h5>Security Question</h5>-->

                <!--<div class="form-row">-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="account_type">Select Question One</label>-->
                <!--        <select name="q1" id="account_type" class="form-control" required>-->
                <!--            <option value="">Select Question One</option>-->
                <!--            <option value="What is your pet name?">What is your pet name?</option>    -->
                <!--            <option value="What is your nick name?">What is your nick name?</option>    -->
                <!--            <option value="What is the name of your first car?">What is the name of your first car?</option>    -->
                <!--            <option value="when did you finish high school?">when did you finish high school?</option>    -->
                <!--            <option value="your favorite music?">your favorite music?</option>    -->
                <!--            <option value="your favorite movie?">your favorite movie</option>    -->
                <!--            <option value="your favorite roll model?">your favorite role model</option>    -->
                <!--            <option value="favorite state?">favorite state?</option>   -->
                <!--        </select>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="ssn">Answer Question One</label>-->
                <!--        <input type="text" name="ans1" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--</div>-->


                <!--<div class="form-row">-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="account_type">Select Question Two</label>-->
                <!--        <select name="q2" id="account_type" class="form-control" required>-->
                <!--            <option value="">Select Question Two</option>-->
                <!--            <option value="What is your pet name?">What is your pet name?</option>    -->
                <!--            <option value="What is your nick name?">What is your nick name?</option>    -->
                <!--            <option value="What is the name of your first car?">What is the name of your first car?</option>    -->
                <!--            <option value="when did you finish high school?">when did you finish high school?</option>    -->
                <!--            <option value="your favorite music?">your favorite music?</option>    -->
                <!--            <option value="your favorite movie?">your favorite movie</option>    -->
                <!--            <option value="your favorite roll model?">your favorite role model</option>    -->
                <!--            <option value="favorite state?">favorite state?</option>   -->
                <!--        </select>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--    <div class="form-group col-md-6">-->
                <!--        <label for="ssn">Answer Question Two</label>-->
                <!--        <input type="text" name="ans2" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--</div>-->

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

                <!--<div class="form-row">-->
                <!--    <div class="form-group col-md-12">-->
                <!--        <label for="account_type">Account Image</label>-->
                <!--        <input type="file" name="image" id="ssn" class="form-control" value="" required>-->
                <!--        <span class="help-block text-danger ml-2" style="font-size:0.9rem;"></span>-->
                <!--    </div>-->
                <!--</div>-->



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
    </div>
</div>
</div>
</div>
</div>



<?php include 'footer.php'; ?>