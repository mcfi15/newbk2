<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
include_once ('connectdb.php');
include_once ('../../functions.php');
if(!isset($_SESSION['email'])){
	
    header("Location: login");

    exit(); 
}
$user_home = new USER();

if(isset($_POST['messageSend'])){
    $taxmsg = mysqli_real_escape_string($connection, $_POST['taxmsg']);
    $cotmsg = mysqli_real_escape_string($connection, $_POST['cotmsg']);
    $imfmsg = mysqli_real_escape_string($connection, $_POST['imfmsg']);
    $id = $_POST['id'];

    $setBilling = $user_home->runQuery("UPDATE account SET taxmsg = '$taxmsg', cotmsg = '$cotmsg', imfmsg = '$imfmsg' WHERE id = '$id'");
    $setBilling->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Billing Message Updated Successfully!

    </div>
    ";
    $user_home->redirect("billing_system");
}

if(isset($_POST['codeSend'])){
    $tax = mysqli_real_escape_string($connection, $_POST['tax']);
    $cot = mysqli_real_escape_string($connection, $_POST['cot']);
    $imf = mysqli_real_escape_string($connection, $_POST['imf']);
    $id = $_POST['id'];

    $setBilling = $user_home->runQuery("UPDATE account SET tax = '$tax', cot = '$cot', imf = '$imf' WHERE id = '$id'");
    $setBilling->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Billing Code Updated Successfully!

    </div>
    ";
    $user_home->redirect("billing_system");
}

if ($_POST['billing_switch'] === "No") {
    $id = $_POST['id'];
    $billing_switch = "No";

    $upBilling = $user_home->runQuery("UPDATE account SET billing_switch = 'No' WHERE id = '$id'");
    $upBilling->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Billing Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("billing_system");

   
}else if ($_POST['billing_switch'] === "Yes") {
    $id = $_POST['id'];
    $billing_switch = "Yes";

    $upBilling = $user_home->runQuery("UPDATE account SET billing_switch = 'Yes' WHERE id = '$id'");
    $upBilling->execute();
    $_SESSION['msg'] = "
    <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Billing Status Updated Successfully!

    </div>
    ";
    $user_home->redirect("billing_system");

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
                        <th>TAX</th>
                        <th>COT</th>
                        <th>IMF</th>
                        <th>Edit Billing Code</th>
                        <th>Edit Billing Message</th>
                        <th>Billing Status</th>

                    </tr>
                </thead>
                <tbody>
                   <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>	
                    <tr>

                        <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?><br></td>
                        <td><?php echo $row['acc_no']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tax']; ?></td>
                        <td><?php echo $row['cot']; ?></td>
                        <td><?php echo $row['imf']; ?></td>
                        <td><a class="btn" data-toggle="modal" href="#alertAction<?php echo $row['id']; ?>">Edit Code</a></td>
                        <td><a class="btn" data-toggle="modal" href="#message<?php echo $row['id']; ?>">Edit Message</a></td>

                                    <td>
                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <select name="billing_switch" id="" class="form-control" onchange="form.submit()">
                                                <option value="<?php echo $row['billing_switch']; ?>"><?php echo $row['billing_switch']; ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </form>
                                    </td>

                    </tr>
                    <!--Edit billing code-->
                    <div class="modal fade" id="alertAction<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Change Billing Code</h4>
                        </div>
                        <div class="modal-body">
                            <p>Fill the form correctly.</p>
                        </div>
                        <form method="POST">
                            <div class="container-fluid">
                            
                            <div class="row">

                                <div class="col-md-12 form-group" >
                                <label>TAX Code</label>
                                <input type="text" name="tax" class="input-sm form-control [required]" value="<?php echo $row['tax']; ?>" required/>
                                </div>

                                <div class="col-md-12 form-group" >
                                <label>COT Code</label>
                                <input type="text" name="cot" step="0.01" class="input-sm form-control [required] mask-money" value="<?php echo $row['cot']; ?>" required/>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                <div class="col-md-12 form-group" >
                                <label>IMF Code</label>
                                <input type="text" name="imf" step="0.01" class="input-sm form-control [required] mask-money" value="<?php echo $row['imf']; ?>" required/>
                                </div>
                                
                            </div>

                            <div class="modal-footer" style="text-align:right;">
                                <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                                <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                <button type="submit" name="codeSend" class="btn btn-success btn-lg">Update Code</button>

                                </div>
                            </div>
                            </div>
                        </form>

                        </div>
                    </div>
                    </div>
                    
                    <!--Edit billing message modal-->
                    
                    <div class="modal fade" id="message<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Change Billing Message</h4>
                        </div>
                        <div class="modal-body">
                            <p>Fill the form correctly.</p>
                        </div>
                        <form method="POST">
                            <div class="container-fluid">
                            
                            <div class="row">

                                <div class="col-md-12 form-group" >
                                <label>TAX Message</label>
                                <textarea name="taxmsg" class=" form-control" required><?php echo $row['taxmsg']; ?></textarea>
                                </div>

                                <div class="col-md-12 form-group" >
                                <label>COT Message</label>
                                <textarea name="cotmsg" class="form-control" required><?php echo $row['cotmsg']; ?></textarea>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                <div class="col-md-12 form-group" >
                                <label>IMF Message</label>
                                <textarea name="imfmsg" class=" form-control " required><?php echo $row['imfmsg']; ?></textarea>
                                
                                </div>
                                
                            </div>

                            <div class="modal-footer" style="text-align:right;">
                                <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                                <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                <button type="submit" name="messageSend" class="btn btn-success btn-lg">Update Message</button>

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
