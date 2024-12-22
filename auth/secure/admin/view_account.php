<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
include_once ('../../functions.php');
include('process.php');
include('connectdb.php');
if(!isset($_SESSION['email'])){
	
    header("Location: login");

    exit(); 
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$user_home = new USER();

if (isset($_GET['delete'])){
    $id = $_GET['id'];
    $query = "DELETE FROM account WHERE id = $id";
    $result = mysqli_query($connection, $query);
    
    if ($result){
        $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> User Deleted Successfully!

    </div>";
}
}

if ($_POST['status'] === "Dormant/Inactive") {
    $id = $_POST['id'];
    $status = "Dormant/Inactive";

    $upStatus = $user_home->runQuery("UPDATE account SET status = 'Dormant/Inactive' WHERE id = '$id'");
    $upStatus->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("view_account");

}else if ($_POST['status'] === "Active") {
    $id = $_POST['id'];
    $status = "Active";

    $stmt = $user_home->runQuery("SELECT * FROM account WHERE id='$id'");
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0){

    $upStatus = $user_home->runQuery("UPDATE account SET status = 'Active' WHERE id = '$id'");
    $upStatus->execute();

    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Status Updated Successfully!

    </div>
    ";

      $email = $row['email'];
      $acc_no = $row['acc_no'];
      $firstname = $row['firstname'];
      $pin = $row['pin'];
      $currency = $row['currency'];
      $total_bal = $row['total_bal'];
      $ledger_bal = $row['ledger_bal'];
      $card_bal = $row['card_bal'];
      $loan_bal = $row['loan_bal'];
      $cot = $row['cot'];
      $imf = $row['imf'];
      $atc = $row['atc'];
      $telex_code = $row['telex_code'];

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
Your account has successfully been activated!<br>Please see the details of your account below.
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

<p style='font-weight:bold;font-size:13px;line-height: 30px; color:red;'>Please note that you will need a combination of your account number and password to access your online banking at <br /> $siteurl</p>
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
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>©&nbsp;$sitename</p>
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

      $user_home->redirect("view_account");
    //echo("<script>location.href='view_account'</script>");

}    
}else if ($_POST['status'] === "Disabled") {
    $id = $_POST['id'];
    $status = "Disabled";

    $upStatus = $user_home->runQuery("UPDATE account SET status = 'Disabled' WHERE id = '$id'");
    $upStatus->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("view_account");

}else if ($_POST['status'] === "Closed") {
    $id = $_POST['id'];
    $status = "Closed";

    $upStatus = $user_home->runQuery("UPDATE account SET status = 'Closed' WHERE id = '$id'");
    $upStatus->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("view_account");

}else if ($_POST['status'] === "Pending") {
    $id = $_POST['id'];
    $status = "Pending";

    $upStatus = $user_home->runQuery("UPDATE account SET status = 'Pending' WHERE id = '$id'");
    $upStatus->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("view_account");

}else if ($_POST['status'] === "Blocked") {
    $id = $_POST['id'];
    $status = "Blocked";

    $upStatus = $user_home->runQuery("UPDATE account SET status = 'Blocked' WHERE id = '$id'");
    $upStatus->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("view_account");

}

$stmt = $user_home->runQuery("SELECT * FROM account ORDER BY id DESC LIMIT 200");
$stmt->execute();

?>


<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="icon" href="../../images/favicon.png" type="image/x-icon">

        <title><?php echo $sitename; ?> | Admin - View Accounts</title>

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
    <body id="skin-blur-wood">

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
        <?php if (isset($_SESSION['msg'])): ?>
            <?php echo $_SESSION['msg']; ?>
        <?php endif ?>
     <h4 class="page-title block-title">View Accounts</h4>
     <div class="block-area" id="tableHover">
        <h3 class="block-title">Active Accounts</h3>
        <div class="table-responsive overflow">
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>

                        <th>Full Name</th>
                        <th>Account No</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Sex</th>
                        <th>Account Type</th>
                        <th>Total Balance</th>
                        <th>PIN</th>
                        <th>COT</th>
                        <!--<th>TAX</th>-->
                        <th>IMF</th>
                        <th>ATC</th>
                        <!--<th>TELEX</th>-->
                        <th>Logins</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                   <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>	
                    <tr>

                        <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?><br></td>
                        <td><?php echo $row['acc_no']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['acctype']; ?></td>
                        <td><?php echo $row['currency']; ?><?php echo number_format($row['total_bal'],2); ?></td>
                        <td><?php echo $row['pin']; ?></td>
                        <td><?php echo $row['cot']; ?></td>
                        <!--<td><?php //echo $row['tax']; ?></td>-->
                        <td><?php echo $row['imf']; ?></td>
                        <td><?php echo $row['atc']; ?></td>
                        <!--<td><?php //echo $row['telex_code']; ?></td>-->
                        <td><?php echo $row['logins']; ?></td>

                                    <td>
                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <select name="status" id="" class="form-control" onchange="form.submit()">
                                                <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                                                <option value="Dormant/Inactive">Dormant/Inactive</option>
                                                <option value="Active">Active</option>
                                                <option value="Disabled">Disabled</option>
                                                <option value="Closed">Closed</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Blocked">Blocked</option>
                                            </select>
                                        </form>
                                    </td>
                        <td><a class="btn"  data-toggle="modal" href="#alertAction<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    
                    
                    <!--Edit billing code-->
                    <div class="modal fade" id="alertAction<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete User</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this user?</p>
                        </div>
                        <form method="get">
                            <div class="container-fluid">
                            
                            <div class="row">
                                

                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            </div>

                            <div class="modal-footer" style="text-align:right;">
                                <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                                <button type="submit" name="delete" class="btn btn-success btn-lg">Yes, Delete</button>

                                </div>
                            </div>
                            </div>
                        </form>

                        </div>
                    </div>
                    </div>
                <?php }?>                          
            </tbody>
        </table>
    </div>
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
