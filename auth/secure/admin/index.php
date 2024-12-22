<?php

session_start();
require_once ('class.admin.php');
include_once ('session.php');
include_once ('../../functions.php');
include('process.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$reg_user = new USER();

if(!isset($_SESSION['email'])){

  header("Location: login");

  exit(); 
}

$stmt = $reg_user->runQuery("SELECT * FROM account");
$stmt->execute();

$credit = $reg_user->runQuery("SELECT * FROM account");
$credit->execute();

$debit = $reg_user->runQuery("SELECT * FROM account");
$debit->execute();

$trans = $reg_user->runQuery("SELECT * FROM account");
$trans->execute();

$ledg = $reg_user->runQuery("SELECT * FROM account");
$ledg->execute();

$loan = $reg_user->runQuery("SELECT * FROM account");
$loan->execute();

$card = $reg_user->runQuery("SELECT * FROM account");
$card->execute();

$mail = $_SESSION['email'];

$ad = $reg_user->runQuery("SELECT * FROM admin WHERE email = '$mail'");
$ad->execute(); 
$rom = $ad->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['edit']))
{
  $pass = $_POST['upass1'];
  $cpass = $_POST['upass'];
  $email = $_POST['email'];

  if($cpass!==$pass)
  {
    $msg = "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Sorry!</strong>  Passwords Doesn't match. 
    </div>";
  }
  else
  {
    $password = $cpass;
    $ed = $reg_user->runQuery("UPDATE admin SET email = '$email', password = :upass WHERE email=:email");
    $ed->execute(array(":upass"=>$password,":email"=>$_SESSION['email']));

    $msg = "<div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Login Details Was Successfully Changed!</strong>
    </div>";

  }
}



if(isset($_POST['alertSend'])){

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);
  
  $accno = trim($_POST['accno']);
  $accno = strip_tags($accno);
  $accno = htmlspecialchars($accno);
  
  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);
  
  $date = trim($_POST['date']);
  $date = strip_tags($date);
  $date = htmlspecialchars($date);

  $refNo = mt_rand(10000000000,99999999999);


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
  <h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'> </h2>
  </td>
  </tr>
  <tr>
  <td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>
  <h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
  The following transactions has occured in your account.
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

  <h3><span style='color:#2196F3;'>TRANSACTION DETAILS</span> </h3>
  <table style='border:1px solid black;padding:2px;' width='400'>

  <tr>
  <th style='text-align:left;'>Type</th>
  <td>$type</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Refrence</th>
  <td>$refNo</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Account Number</th>
  <td>$accno</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Date/Time</th>
  <td>$date</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Amount</th>
  <td>USD $amount</td>
  </tr>
  <tr style='background-color:#2196F3;'>
  <th style='text-align:left; color:#fff;'>Status</th>
  <td style='color:#fff;'>Success</td>
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

  // $to = $email;

  // $subject = $siteemail .'-'. 'Transaction Alert';

  // if(mail($to,$subject,$messag,$siteemail))
  // {
  //     // echo '<script>alert("Your message has been sent successfully")</script>'; 

  //     $msg= "<div class='alert alert-success'>
  //     <button class='close' data-dismiss='alert'>&times;</button>
  //     <strong> $email Flash Email Successful $amount!</strong> 
  //     </div>";  
  
  // }

  $subject = $siteemail .'-'. 'Transaction Alert';

  send_mail($email,$messag,$subject);  

  $msg= "<div class='alert alert-success'>
  <button class='close' data-dismiss='alert'>&times;</button>
  <strong> $email Flash Email Successful $amount!</strong> 
  </div>";  

}




if(isset($_POST['ledgerAction'])){

  $acc_no = trim($_POST['uname']);
  $acc_no = strip_tags($acc_no);
  $acc_no = htmlspecialchars($acc_no);

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);

  $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
  $read->execute(); 
  $show = $read->fetch(PDO::FETCH_ASSOC);

  $bal = $show['ledger_bal'];

  if ($type === "Debit") {
    if ($amount > $bal) {
      $msg= "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Insufficient Ledger Balance</strong> 
    </div>";
    } else {
      $newBal = $bal - $amount;
    }
  } else if($type === "Credit"){
    $newBal = $bal + $amount;
  } else {
    $msg= "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Unable to be Completed! Contact Admin</strong> 
    </div>"; 
  }

  $readUp = $reg_user->runQuery("UPDATE account SET ledger_bal = '$newBal' WHERE acc_no = '$acc_no'");
  $readUp->execute();

  $msg= "<div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Ledger Balance Updated Successfully</strong> 
    </div>";


}




if(isset($_POST['cardAction'])){

  $acc_no = trim($_POST['uname']);
  $acc_no = strip_tags($acc_no);
  $acc_no = htmlspecialchars($acc_no);

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);

  $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
  $read->execute(); 
  $show = $read->fetch(PDO::FETCH_ASSOC);

  $bal = $show['card_bal'];

  if ($type == "Debit") {
    if ($amount > $bal) {
      $msg= "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Insufficient Ledger Balance</strong> 
    </div>";
    } else {
      $newBal = $bal - $amount;
    }
  } else if($type == "Credit"){
    $newBal = $bal + $amount;
  } else {
    $msg= "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Unable to be Completed! Contact Admin</strong> 
    </div>"; 
  }

  $readUp = $reg_user->runQuery("UPDATE account SET card_bal = '$newBal' WHERE acc_no = '$acc_no'");
  $readUp->execute();

  $msg= "<div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Card Balance Updated Successfully</strong> 
    </div>"; 


}



if(isset($_POST['loanAction'])){

  $acc_no = trim($_POST['uname']);
  $acc_no = strip_tags($acc_no);
  $acc_no = htmlspecialchars($acc_no);

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);

  $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
  $read->execute(); 
  $show = $read->fetch(PDO::FETCH_ASSOC);

  $bal = $show['loan_bal'];

  if ($type == "Debit") {
    if ($amount > $bal) {
      $msg= "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Insufficient Ledger Balance</strong> 
    </div>";
    } else {
      $newBal = $bal - $amount;
    }
  } else if($type == "Credit"){
    $newBal = $bal + $amount;
  } else {
    $msg= "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Unable to be Completed! Contact Admin</strong> 
    </div>"; 
  }

  $readUp = $reg_user->runQuery("UPDATE account SET loan_bal = '$newBal' WHERE acc_no = '$acc_no'");
  $readUp->execute();

  $msg= "<div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Loan Balance Updated Successfully</strong> 
    </div>";


}

if(isset($_POST['transferhis'])){
  $acc_no = trim($_POST['acc_no']);
  $acc_no = strip_tags($acc_no);
  $acc_no = htmlspecialchars($acc_no);
  
  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);
  
  $accno = trim($_POST['accno']);
  $accno = strip_tags($accno);
  $accno = htmlspecialchars($accno);
  
  $acc_name = trim($_POST['acc_name']);
  $acc_name = strip_tags($acc_name);
  $acc_name = htmlspecialchars($acc_name);
  
  $bank_name = trim($_POST['bank_name']);
  $bank_name = strip_tags($bank_name);
  $bank_name = htmlspecialchars($bank_name);
  
  $swift = trim($_POST['swift']);
  $swift = strip_tags($swift);
  $swift = htmlspecialchars($swift);
  
  $routing = trim($_POST['routing']);
  $routing = strip_tags($routing);
  $routing = htmlspecialchars($routing);
  
  $remarks = trim($_POST['remarks']);
  $remarks = strip_tags($remarks);
  $remarks = htmlspecialchars($remarks);  
  
  $rstate = trim($_POST['rstate']);
  $rstate = strip_tags($rstate);
  $rstate = htmlspecialchars($rstate);  
  
  $bemailadd = trim($_POST['bemailadd']);
  $bemailadd = strip_tags($bemailadd);
  $bemailadd = htmlspecialchars($bemailadd);
  
  $date = trim($_POST['date']);
  $date = strip_tags($date);
  $date = htmlspecialchars($date);


  if (strtotime($date)) {

    $dot = strtotime($date);
  } else {
    $msg= "<div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>The $date is not a valid date. use 3 October 2022 10:15 PM format </strong> 
    </div>";
    exit();
  }

  $status = "Success";

  $refNo = mt_rand(10000000000,99999999999);

  $mode = "wire";

  $type = "Debit";

  $naration = "Fund Transfer of ".$amount." Reference#: ".$refNo;


  $TransQuery = $reg_user->runQuery("INSERT INTO `transfer`(`acc_no`, `rbname`, `accno`, `bname`, `bemailadd`, `swift`, `routing`, `rstate`, `amount`, `description`, `dot`, `type`, `status`, `refNo`, `mode`, `naration`) VALUES ('$acc_no', '$bank_name', '$accno', '$acc_name', '$bemailadd', '$swift', '$routing', '$rstate', '$amount', '$remarks', '$dot', '$type', '$status', '$refNo', '$mode', '$naration')");
  ;

  if($TransQuery->execute()){   

    $msg= "<div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>History Successfully Added!</strong> 
    </div>";  
  }
  else 
  {
    $msg ="Error!";
  }
}





if(isset($_POST['his']))
{
  $uname = trim($_POST['uname']);
  $uname = strip_tags($uname);
  $uname = htmlspecialchars($uname);
  
  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);
  
  $sender_name = trim($_POST['sender_name']);
  $sender_name = strip_tags($sender_name);
  $sender_name = htmlspecialchars($sender_name);
  
  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);
  
  $remarks = trim($_POST['remarks']);
  $remarks = strip_tags($remarks);
  $remarks = htmlspecialchars($remarks);
  
  $date = trim($_POST['date']);
  $date = strip_tags($date);
  $date = htmlspecialchars($date);
  
  if (strtotime($date)) {

    $dot = strtotime($date);
  } else {
    $msg= "<div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>The $date is not a valid date. use 3 October 2022 10:15 PM format </strong> 
    </div>";
    exit();
  }

  $status = "Success";

  $refNo = mt_rand(10000000000,99999999999);

  $mode = "Transaction";

  $naration = "Fund Transfer of ".$amount." Reference#: ".$refNo;


   $creditRun = $reg_user->runQuery("INSERT INTO `transfer`(`acc_no`, `amount`, `description`, `dot`, `type`, `status`, `refNo`, `mode`, `naration`) VALUES ('$uname', '$amount', '$remarks', '$dot', '$type', '$status', '$refNo', '$mode', '$naration')"); 

  if($creditRun->execute())
  {     
    $id = $reg_user->lasdID();    


    $msg= "<div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>History Successfully Added!</strong> 
    </div>";  
  }
  else 
  {
    $msg ="Error!";
  }
}




if(isset($_POST['credit'])){

  $uname = trim($_POST['uname']);
  $uname = strip_tags($uname);
  $uname = htmlspecialchars($uname);
  
  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);
  
  $sender_name = trim($_POST['sender_name']);
  $sender_name = strip_tags($sender_name);
  $sender_name = htmlspecialchars($sender_name);
  
  $remarks = trim($_POST['remarks']);
  $remarks = strip_tags($remarks);
  $remarks = htmlspecialchars($remarks);
  
  $date = trim($_POST['date']);
  $date = strip_tags($date);
  $date = htmlspecialchars($date);

  $status = "Success";

  $refNo = mt_rand(10000000000,99999999999);

  $mode = "Deposit";

  $type = "Credit";

  $naration = "Deposit of ".$amount." Reference#: ".$refNo;

  

  if (strtotime($date)) {

    $dot = strtotime($date);
  } else {
    $msg= "<div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>The $date is not a valid date. use 3 October 2022 10:15 PM format </strong> 
    </div>";
    exit();
  }




  $creditRun = $reg_user->runQuery("INSERT INTO `transfer`(`acc_no`, `amount`, `description`, `dot`, `type`, `status`, `refNo`, `mode`, `naration`) VALUES ('$uname', '$amount', '$remarks', '$dot', '$type', '$status', '$refNo', '$mode', '$naration')");  
  

  if($creditRun->execute()){

    $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
    $read->execute(); 
    $show = $read->fetch(PDO::FETCH_ASSOC);

    $currency = $show['currency'];
    $acc = $show['acc_no'];
    $fname = $show['firstname'];
    $lname = $show['lastname'];
    $email = $show['email'];
    $phone = $show['phone'];
    $tbal = $show['total_bal'];
    $diff = $amount + $tbal;

    $credited = $reg_user->runQuery("UPDATE account SET total_bal = '$diff' WHERE acc_no = '$uname'");
    $credited->execute();

    $id = $reg_user->lasdID(); 

    $amount = number_format($amount, 2); 
    $tbal = number_format($tbal, 2); 
    $diff = number_format($diff, 2); 

    $dot = date('jS \of F y h:i:s A', $dot);

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
    <h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'>Hi $fname,</h2>
    </td>
    </tr>
    <tr>
    <td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>
    <h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
    The following transactions has occured in your account.
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

    <h3><span style='color:#2196F3;'>TRANSACTION DETAILS</span> </h3>
    <table style='border:1px solid black;padding:2px;' width='400'>

    <tr>
    <th style='text-align:left;'>Type</th>
    <td>$type</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Account Number</th>
    <td>$uname</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Date/Time</th>
    <td>$dot</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Description</th>
    <td>$remarks</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Amount</th>
    <td>$currency $amount</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Balance</th>
    <td>$currency $diff</td>
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
    <td style='color:#fff;'>$currency $diff</td>
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

    $subject = $sitename .'-'. 'Transaction Alert';

    send_mail($email,$messag,$subject);  

    $receiver = preg_replace('/\D+/', '', $phone);
    $date = date('l jS \of F Y h:i:s A');
    $acc_first= substr($acc , 0, 3);
    $acc_last = substr($acc , -3);
    $message = "Your Acct " . $acc_first . "XXXX" . $acc_last . " Has Been Credited with " .$currency . $amount . " on " . $date . " By FIP: Transfer/ " .$sender_name. ". Bal: " .$currency.$diff. "CR"; 
    // $reg_user->sms($receiver, $message);  



    $msg= "<div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>$uname Successfully Credited the Sum of $amount!</strong> 
    </div>";  
  }
  else 
  {
    $msg ="Error!";
  }
}

if(isset($_POST['debit'])){

  $uname = trim($_POST['uname']);
  $uname = strip_tags($uname);
  $uname = htmlspecialchars($uname);
  
  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);
  
  $sender_name = trim($_POST['sender_name']);
  $sender_name = strip_tags($sender_name);
  $sender_name = htmlspecialchars($sender_name);
  
  $remarks = trim($_POST['remarks']);
  $remarks = strip_tags($remarks);
  $remarks = htmlspecialchars($remarks);
  
  $date = trim($_POST['date']);
  $date = strip_tags($date);
  $date = htmlspecialchars($date);

  if (strtotime($date)) {

    $dot = strtotime($date);
  } else {
    $msg= "<div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>The $date is not a valid date. use 3 October 2022 10:15 PM format </strong> 
    </div>";
    exit();
  }

  $status = "Success";

  $refNo = mt_rand(10000000000,99999999999);

  $mode = "Withdraw";

  $type = "Debit";

  $naration = "Withdraw of ".$amount." Reference#: ".$refNo;
  
  $readd = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
  $readd->execute(); 
  $show = $readd->fetch(PDO::FETCH_ASSOC);



  $currency = $show['currency'];
  $acc = $show['acc_no'];
  $fname = $show['firstname'];
  $lname = $show['lastname'];
  $email = $show['email'];
  $phone = $show['phone'];
  $tbal = $show['total_bal'];
  $diffi = $tbal - $amount;


  $debitRun = $reg_user->runQuery("INSERT INTO `transfer`(`acc_no`, `amount`, `description`, `dot`, `type`, `status`, `refNo`, `mode`, `naration`) VALUES ('$uname', '$amount', '$remarks', '$dot', '$type', '$status', '$refNo', '$mode', '$naration')");

  if($tbal < $amount){

    $msg = "<div class='alert alert-warning'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>The Amount ($amount) to be Debited is Higher Than $name's Account Balance ($tbal)</strong> 
    </div>";

  }
  elseif($debitRun->execute()){  

    $debited = $reg_user->runQuery("UPDATE account SET total_bal = '$diffi' WHERE acc_no = '$uname'");
    $debited->execute();

    $id = $reg_user->lasdID();  



    $amount = number_format($amount, 2); 
    $tbal = number_format($tbal, 2); 
    $diffi = number_format($diffi, 2);   

    $dot = date('jS \of F y h:i:s A', $dot); 


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
    <h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'>Hi $fname,</h2>
    </td>
    </tr>
    <tr>
    <td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>
    <h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
    The following transactions has occured in your account.
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

    <h3><span style='color:#2196F3;'>TRANSACTION DETAILS</span> </h3>
    <table style='border:1px solid black;padding:2px;' width='400'>

    <tr>
    <th style='text-align:left;'>Type</th>
    <td>$type</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Account Number</th>
    <td>$uname</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Date/Time</th>
    <td>$dot</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Description</th>
    <td>$remarks</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Amount</th>
    <td>$currency $amount</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Balance</th>
    <td>$currency $diffi</td>
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
    <td style='color:#fff;'>$currency $diffi</td>
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

    $subject = $sitename .'-'. 'Transaction Alert';

    send_mail($email,$messag,$subject);  

    $receiver = preg_replace('/\D+/', '', $phone);
    $date = date('l jS \of F Y h:i:s A');
    $acc_first= substr($acc , 0, 3);
    $acc_last = substr($acc , -3);
    $message = "Your Acct " . $acc_first . "XXXX" . $acc_last . " Has Been Debited with " .$currency . $amount . " on " . $date . " By FIP: Online Banking/ " .$sender_name. ". Bal: " .$currency.$diffi. "DR"; 
    // $reg_user->sms($receiver, $message);          


    $msg= "<div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>$uname Successfully Debited the Sum of $amount!</strong> 
    </div>";

  }
  else 
  {
    $msg ="Error!";
  }
}

$con=mysqli_connect('localhost', 'root', '', 'bank');
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="SELECT * FROM account ORDER BY id";
// $sql1="SELECT * FROM ticket ";
$sql2="SELECT * FROM transfer";
// $sql3="SELECT * FROM temp_account";


if ($result=mysqli_query($con,$sql))
{
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  // Free result set
  mysqli_free_result($result);
  
  // if ($result1=mysqli_query($con,$sql1))
  // {
  //   // Return the number of rows in result set
  //   $rowcount1=mysqli_num_rows($result1);
    
  //   // Free result set
  //   mysqli_free_result($result1);
    
    if ($result2=mysqli_query($con,$sql2))
    {
      // Return the number of rows in result set
      $rowcount2=mysqli_num_rows($result2);
      
      // Free result set
      mysqli_free_result($result2);
      
      // if ($result3=mysqli_query($con,$sql3))
      // {
      // // Return the number of rows in result set
      //   $rowcount3=mysqli_num_rows($result3);

      // // Free result set
      //   mysqli_free_result($result3);

      // }
    }
  //}
  
}

mysqli_close($con);


?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
  <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">


    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon">

    <title><?php echo $sitename; ?> | Admin Panel</title>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/icons.css" rel="stylesheet">
    <link href="css/generics.css" rel="stylesheet"> 
  </head>
  <body id="skin-blur-kiwi">

    <header id="header" class="media">
      <a href="index" id="menu-toggle"></a> 
      <a class="logo pull-left" href="index"><img src="" class="img-responsive" alt=""></a>

      <div class="media-body">
        <div class="media" id="top-menu">
          <div class="pull-left tm-icon">
            <a data-drawer="messages" >
              <i class="sa-top-message"></i>
              <i class="n-count animated"><?php //printf("%d\n",$rowcount1) ?></i>
              <span>Tickets</span>
            </a>
          </div>
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
              <img class="profile-pic animated" src="img/htb.jpg" alt="Profile Pic">
            </a>
            <ul class="dropdown-menu profile-menu">

              <li><a href="logout">Sign Out</a><i class="right fa fa-sign-out fa-2x"></i></li>
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

      <!-- Content -->
      <section id="content" class="container">



        <!-- Notification Drawer -->


        <h4 class="page-title">DASHBOARD</h4>
        <?php if(isset($msg)) echo $msg;  ?>         
        <!-- Shortcuts -->
        <div class="block-area shortcut-area">
          <a class="shortcut tile" href="create_account">
            <img src="img/png/256/user-plus.png" alt="">
            <small class="t-overflow">Add Account</small>
          </a>
          <a class="shortcut tile" href="view_account">
            <img src="img/png/256/vcard.png" alt="">
            <small class="t-overflow">View Accounts</small>
          </a>
          <a class="shortcut tile" href="loan">
            <img src="img/png/256/vcard.png" alt="">
            <small class="t-overflow">Loan</small>
          </a>
          <!-- <a class="shortcut tile" href="trading">
            <img src="img/png/256/vcard.png" alt="">
            <small class="t-overflow">Trading</small>
          </a>
          <a class="shortcut tile" href="trading_withdrawal">
            <img src="img/png/256/vcard.png" alt="">
            <small class="t-overflow">Trading Withdrawal</small>
          </a> -->
          <!-- <a class="shortcut tile" href="pending_accounts">
            <img src="img/png/256/user-secret.png" alt="">
            <small class="t-overflow">Pending Accounts</small>
          </a> -->
          <!-- <a class="shortcut tile" data-toggle="modal" href="#modalDefault" >
            <img src="img/png/256/list.png" alt="">
            <small class="t-overflow">Add Cred/Debt History</small>
          </a> -->
          <a class="shortcut tile" data-toggle="modal" href="#transferhis" >
            <img src="img/png/256/list.png" alt="">
            <small class="t-overflow">Add Transfer History</small>
          </a>
          <a class="shortcut tile" data-toggle="modal" href="#credit" >
            <img src="img/png/256/money.png" alt="">
            <small class="t-overflow">Credit Acc</small>
          </a>
          <a class="shortcut tile" data-toggle="modal" href="#debit" >
            <img src="img/png/256/cc-mastercard.png" alt="">
            <small class="t-overflow">Debit Acc</small>
          </a>
          <a class="shortcut tile" data-toggle="modal" href="#ledgerAction" >
            <img src="img/png/256/cc-mastercard.png" alt="">
            <small class="t-overflow">Add / Remove Legder Bal</small>
          </a>
          <a class="shortcut tile" data-toggle="modal" href="#loanAction" >
            <img src="img/png/256/cc-mastercard.png" alt="">
            <small class="t-overflow">Add / Remove Loan Bal</small>
          </a>
          <a class="shortcut tile" data-toggle="modal" href="#cardAction" >
            <img src="img/png/256/cc-mastercard.png" alt="">
            <small class="t-overflow">Add / Remove Card Bal</small>
          </a>
          <a class="shortcut tile" data-toggle="modal" href="#alertAction" >
            <img src="img/png/256/cc-mastercard.png" alt="">
            <small class="t-overflow">Flash Alert</small>
          </a>
          <a class="shortcut tile" href="billing_system" >
            <img src="img/png/256/folder.png" alt="">
            <small class="t-overflow">Billing System</small>
          </a>
        </div>

        <hr class="whiter" />

        <!-- Quick Stats -->
        <div class="block-area">
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <div class="tile quick-stats">
                <div id="stats-line-2" class="pull-left"></div>
                <div class="data">
                  <h2 data-value="<?php printf("%d\n",$rowcount) ?>">0</h2>
                  <small>Total Account</small>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="tile quick-stats media">
                <div id="stats-line-3" class="pull-left"></div>
                <div class="media-body">
                  <h2 data-value="<?php printf("%d\n",$rowcount1) ?>">0</h2>
                  <small>Tickets</small>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="tile quick-stats media">

                <div id="stats-line-4" class="pull-left"></div>

                <div class="media-body">
                  <h2 data-value="<?php printf("%d\n",$rowcount2) ?>">0</h2>
                  <small>Transfers Made</small>
                </div>
              </div>
            </div>

           <!--  <div class="col-md-3 col-xs-6">
              <div class="tile quick-stats media">
                <div id="stats-line" class="pull-left"></div>
                <div class="media-body">
                  <h2 data-value="<?php //printf("%d\n",$rowcount3) ?>">0</h2>
                  <small>Total Pending Accounts</small>
                </div>
              </div>
            </div> -->

          </div>
          
        </div>
        <div class="container-fluid">
          <!--h6>ALL UPLOADED IMAGES </h6-->
          <?php
/*
    $files = glob("foto/*.*");
    for ($i=0; $i<count($files); $i++)
     {
       $image = $files[$i];
       $supported_file = array(
               'gif',
               'jpg',
               'jpeg',
               'png'
        );
    $base = basename($image);
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_file)) {
           // show only image name if you want to show full path then use this code // echo $image."<br />";
            echo '<img src="'.$image .'" title="'.$base .'" height="50px" width="45px"/>'."&nbsp;";
           } else {
               continue;
           }
         }
         */
         ?>
       </div>
       <hr class="whiter" />

       <!-- Main Widgets -->

       <div class="block-area">
        <div class="row">
          <div class="col-md-12">
            <!-- Main Chart -->


            <!--  Recent Postings -->

            <div class="clearfix"></div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>


    </section>



    <div class="modal fade" id="transferhis" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add Transfer History</h4>
          </div>
          <div class="modal-body">
            <p>Fill the for correctly.</p>
          </div>
          <form method="POST">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Select Account</label>
                  <select name="acc_no" class="form-control input-sm validate[required]">
                    <?php while($row = $trans->fetch(PDO::FETCH_ASSOC)){?>
                      <option value="<?php echo $row['acc_no']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>Amount</label>
                  <input type="number" name="amount" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" step="0.01" required/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group" >
                  <label>Beneficiary Account Number</label>
                  <input type="number" name="accno" class="input-sm form-control [required] mask-money" placeholder="" required/>
                </div>
                <div class="col-md-6 form-group">
                  <label>Beneficiary Account Name</label>
                  <input type="text" name="acc_name" class="input-sm form-control [required] mask-money" placeholder="" required/>
                </div>
              </div>

              <div class="col-md-12 form-group">
                <label>Beneficiary Email</label>
                <input type="text" name="bank_name" class="input-sm form-control [required] mask-money" placeholder="" required/>
              </div>

              <div class="row">
                <div class="col-md-6 form-group" >
                  <label>Bank Name</label>
                  <input type="text" name="bemailadd" class="input-sm form-control [required] mask-money" placeholder="" required/>
                </div>
                <div class="col-md-6 form-group">
                  <label>Bank Location</label>
                  <input type="text" name="rstate" class="input-sm form-control [required] mask-money" placeholder="" required/>
                </div>
              </div>

              
              <div class="row">
                <div class="col-md-6 form-group" >
                  <label>Swift</label>
                  <input type="text" name="swift" class="input-sm form-control [required] mask-money" placeholder="" required/>
                </div>
                <div class="col-md-6 form-group">
                  <label>Routing Number</label>
                  <input type="text" name="routing" class="input-sm form-control [required] mask-money" placeholder="" required/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group" >
                 <label>Select Account Type</label>
                 <select name="type" class="form-control input-sm validate[required]">
                  <option value="Savings">Savings</option>
                  <option value="Current">Current</option>
                  <option value="Checking">Checking</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label>Description</label>
                <textarea  name="remarks" class="input-sm form-control " placeholder="Eg, Flight Payment" required ></textarea>
              </div>
            </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>Date </label>
              <div class="input-icon">
                <input type="text" name="date" class="input-sm validate[required] form-control" placeholder="Eg, 3 October 2022 10:15 PM" required />
                <span class="add-on">
                  <i class="sa-plus"></i>
                </span>
              </div>
              <span>format (3 October 2022 10:15 PM)</span>
            </div>          
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="transferhis" class="btn btn-success btn-lg">Add Transfer History</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>




<div class="modal fade" id="modalDefault" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Debit/Credit History</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Select Account</label>
              <select name="uname" class="form-control input-sm validate[required]">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $row['acc_no']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Transaction Type</label>
              <select name="type" class="form-control input-sm validate[required]">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group" >
              <label>Amount</label>
              <input type="number" name="amount"  step="0.01" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
            </div>
            <div class="col-md-6 form-group">
              <label>Description</label>
              <textarea  name="remarks" class="input-sm form-control " placeholder="Eg, Flight Payment" required ></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group" >
              <label>To/From</label>
              <input type="text" name="sender_name" class="input-sm form-control [required] mask-money" placeholder="Eg, John Kennedy" required/>
            </div>

            <div class="col-md-6 form-group">
              <label>Date </label>
              <div class="input-icon">
                <input type="text" name="date" class="input-sm validate[required] form-control" placeholder="Eg, 3 October 2022 10:15 PM" required />
                <span class="add-on">
                  <i class="sa-plus"></i>
                </span>
              </div>
              <span>format (3 October 2022 10:15 PM)</span>
            </div>          
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="his" class="btn btn-success btn-lg">Add History</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="ledgerAction" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Legder Debit/Credit History</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Select Account</label>
              <select name="uname" class="form-control input-sm validate[required]">
                <?php while($row = $ledg->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $row['acc_no']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Transaction Type</label>
              <select name="type" class="form-control input-sm validate[required]">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group" >
              <label>Amount</label>
              <input type="number" name="amount" step="0.01" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
            </div>
            
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="ledgerAction" class="btn btn-success btn-lg">Send Legder</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="loanAction" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Loan Debit/Credit History</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Select Account</label>
              <select name="uname" class="form-control input-sm validate[required]">
                <?php while($row = $loan->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $row['acc_no']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Transaction Type</label>
              <select name="type" class="form-control input-sm validate[required]">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group" >
              <label>Amount</label>
              <input type="number" name="amount" step="0.01" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
            </div>
            
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="loanAction" class="btn btn-success btn-lg">Send Loan</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>



<div class="modal fade" id="cardAction" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Loan Debit/Credit History</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Select Account</label>
              <select name="uname" class="form-control input-sm validate[required]">
                <?php while($row = $card->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $row['acc_no']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Transaction Type</label>
              <select name="type" class="form-control input-sm validate[required]">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group" >
              <label>Amount</label>
              <input type="number"   class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
              <input type="number" name="amount" step="0.01"  class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
            </div>
            
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="cardAction" class="btn btn-success btn-lg">Send Card</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="alertAction" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Send Alert</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Email</label>
              <input type="text" name="email" class="input-sm form-control [required]" required/>
            </div>

            <div class="col-md-6 form-group">
              <label>Transaction Type</label>
              <select name="type" class="form-control input-sm validate[required]">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12 form-group" >
              <label>Account Number</label>
              <input type="number" name="accno" class="input-sm form-control [required]" required/>
            </div>

            <div class="col-md-12 form-group" >
              <label>Amount</label>
              <input type="number" name="amount" step="0.01" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
            </div>
            
          </div>

          <div class="col-md-12 form-group">
              <label>Date </label>
              <div class="input-icon">
                <input type="text" name="date" class="input-sm validate[required] form-control" placeholder="Eg, 3 October 2022 10:15 PM" required />
                <span class="add-on">
                  <i class="sa-plus"></i>
                </span>
              </div>
              <span>format (3 October 2022 10:15 PM)</span>
            </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="alertSend" class="btn btn-success btn-lg">Send Card</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="credit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Credit User's Account</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Select Account To Credit</label>
              <select name="uname" class="form-control input-sm validate[required]">
                <?php while($rows = $credit->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $rows['acc_no']; ?>"><?php echo $rows['firstname']; ?> <?php echo $rows['lastname']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>From</label>
              <input type="text" name="sender_name"  class="input-sm form-control " required/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group" >
              <label>Amount</label>
              <input type="number" name="amount" step="0.01" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
              <input type="hidden" name="type" value="Credit"/>
            </div>
            <div class="col-md-6 form-group">
              <label>Description</label>
              <textarea  name="remarks" class="input-sm form-control " placeholder="Eg, Flight Payment" required ></textarea>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12 form-group">
              <label>Date </label>
              <div class="input-icon">
                <input type="text" name="date" class="input-sm validate[required] form-control" placeholder="Eg, 3 October 2022 10:15 PM" required />
                <span class="add-on">
                  <i class="sa-plus"></i>
                </span>
              </div>
              <span>format (3 October 2022 10:15 PM)</span>
            </div>
          </div>

          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="credit" class="btn btn-success btn-lg">Credit Account</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="debit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Debit User's Account</h4>
      </div>
      <div class="modal-body">
        <p>Fill the for correctly.</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Select Account To Debit</label>
              <select name="uname" class="form-control input-sm validate[required]">
                <?php while($rowd = $debit->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $rowd['acc_no']; ?>"><?php echo $rowd['firstname']; ?> <?php echo $rowd['lastname']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Debit To</label>
              <input type="text" name="sender_name"  class="input-sm form-control " required/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group" >
              <label>Amount</label>
              <input type="number" name="amount" step="0.01" class="input-sm form-control [required] mask-money" placeholder="Eg, 3,500,000.00" required/>
              <input type="hidden" name="type" value="Debit"/>
            </div>
            <div class="col-md-6 form-group">
              <label>Description</label>
              <textarea  name="remarks" class="input-sm form-control " placeholder="Eg, Flight Payment" required ></textarea>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12 form-group">
              <label>Date </label>
              <div class="input-icon">
                <input type="text" name="date" class="input-sm validate[required] form-control" placeholder="Eg, 3 October 2022 10:15 PM" required />
                <span class="add-on">
                  <i class="sa-plus"></i>
                </span>
              </div>
              <span>format (3 October 2022 10:15 PM)</span>
            </div>

            
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-warning btn-lg">Reset</button>
              <button type="submit" name="debit" class="btn btn-success btn-lg">Debit Account</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Admin Account</h4>
      </div>
      <div class="modal-body">
        <p>Change Your Login Details</p>
      </div>
      <form method="POST">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-6 form-group">
              <label>Email</label>
              <input type="text" name="email"  value="<?php echo $rom['email']; ?>" class="input-sm form-control " required/>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group" >
              <label>New Password</label>
              <input type="password" name="upass1" class="input-sm form-control [required]" required/>

            </div>
            <div class="col-md-6 form-group" >
              <label>Repeat Password</label>
              <input type="password" name="upass" class="input-sm form-control [required]" required/>

            </div>
          </div>
          <div class="modal-footer" style="text-align:right;">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>

              <button type="submit" name="edit" class="btn btn-success btn-lg">Change Details</button>

            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
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
              <script src="js/jquery-ui.min.js"></script> <!-- jQuery UI -->

              <!-- Bootstrap -->
              <script src="js/bootstrap.min.js"></script>

              <!-- Charts -->


              <script src="js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
              <script src="js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
              <script src="js/charts.js"></script> <!-- All the above chart related functions -->
              <script src="js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->
              <script src="js/input-mask.min.js"></script> <!-- Input Mask -->
              <script src="js/icheck.js"></script> <!-- Custom Checkbox + Radio -->
              <script src="js/autosize.min.js"></script> <!-- Textare autosize -->
              <script src="js/toggler.min.js"></script> <!-- Toggler -->

              <!-- UX -->
              <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->

              <!-- Other -->
              <script src="js/calendar.min.js"></script> <!-- Calendar -->
              <script src="js/feeds.min.js"></script> <!-- News Feeds -->


              <!-- All JS functions -->
              <script src="js/functions.js"></script>
              <script src="js/markdown.min.js"></script> <!-- Markdown Editor -->
              <script type="text/javascript">
                $(document).ready(function(){
                  /* Tag Select */
                  (function(){
                    /* Limited */
                    $(".tag-select-limited").chosen({
                      max_selected_options: 5
                    });
                    
                    /* Overflow */
                    $('.overflow').niceScroll();
                  })();

                  /* Input Masking - you can include your own way */
                  (function(){
                    $('.mask-date').mask('00/00/0000');
                    $('.mask-time').mask('00:00:00');
                    $('.mask-date_time').mask('00/00/0000 00:00:00');
                    $('.mask-cep').mask('00000-000');
                    $('.mask-phone').mask('0000-0000');
                    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
                    $('.mask-phone_us').mask('(000) 000-0000');
                    $('.mask-mixed').mask('AAA 000-S0S');
                    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
                    $('.mask-money').mask('000,000,000,000,000.00', {reverse: true});
                    $('.mask-money2').mask("#.##0,00", {reverse: true, maxlength: false});
                    $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});
                    $('.mask-ip_address').mask('099.099.099.099');
                    $('.mask-percent').mask('##0,00%', {reverse: true});
                    $('.mask-credit_card').mask('0000 0000 0000 0000');
                  })();

                  /* Spinners */
                  (function(){
                    //Basic
                    $('.spinner-1').spinedit();
                    
                    //Set Value
                    $('.spinner-2').spinedit('setValue', 100);
                    
                    //Set Minimum                    
                    $('.spinner-3').spinedit('setMinimum', -10);
                    
                    //Set Maximum                    
                    $('.spinner-4').spinedit('setMaxmum', 100);
                    
                    //Set Step
                    $('.spinner-5').spinedit('setStep', 10);
                    
                    //Set Number Of Decimals
                    $('.spinner-6').spinedit('setNumberOfDecimals', 2);
                  })();
                });
              </script>
            </body>
            </html>
