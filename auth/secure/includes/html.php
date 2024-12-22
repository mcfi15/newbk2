
<!doctype html>
    <html lang="en">

    <head>
        <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW"> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Dashboard - <?php echo $sitename; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is the first mobile banking application from <?php echo $sitename; ?> Team.">
        <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * 
Grand Summit Bank Application Dashboard - v1.0.0
    =========================================================
    * Product from: Digital Forest Team via digitalforest4@gmail.com 
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<link rel="icon" type="img/favicon" href="../images/favicon.png">
<link href="assets/css/digital_forest_team_assets_main.css" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="https://kit.fontawesome.com/128925c979.js" crossorigin="anonymous"></script>

<style>
    .arrow {
      border: solid green;
      border-width: 0 3px 3px 0;
      display: inline-block;
      padding: 3px;
  }

  .down {
      transform: rotate(45deg);
      -webkit-transform: rotate(45deg);
  }
</style>


<style>
    .alert {
      padding: 20px;
      background-color: #28049c;
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

  .img--wrapper {
      padding: 6px;
  }

  .image--cover {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin: 20px;
      align-items: center;

      object-fit: cover;
      object-position: center right;
  }


</style>


</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow" style="background-color: #1dab72;">
            <div class="app-header__logo">
                <div> </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a style='color:white' href="Statement" class="nav-link">

                                <i class='fas fa-chart-line' style='font-size:20px;color:white'></i>&nbsp;E-Estatement
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a style='color:white' href="loan-menu" class="nav-link">
                                <i class='fas fa-piggy-bank' style='font-size:20px;color:white'></i>&nbsp;
                                Loans
                            </a>
                        </li>
                        <!-- <li class="dropdown nav-item">
                            <a style='color:white' href="pay-bills" class="nav-link">
                               <i class='fas fa-donate' style='font-size:20px;color:#28049c'></i>&nbsp;
                               Pay Bills
                           </a>
                       </li> -->
                   </ul>        </div>
                   <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">

                                          <img width="42" class="rounded-circle" src="/secure/images/thumbnails/anonymous-user.jpg" alt="">

                                      </a>
                                      
                                  </div>
                              </div>
                              <div class="widget-content-left  ml-3 header-user-info">
                                <div style='color:white' class="widget-heading">
                                    <?php echo $row['firstname']." ".$row['lastname']; ?>                                    </div>
                                    <div style='color:white' class="widget-subheading">

                                        <?php echo $sitename; ?> Customer
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <a href="logout">  <i class='fas fa-power-off' style='font-size:28px;color:white'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>        </div>
                </div>
            </div>        


            <div class="app-main">


                <!----only from Digital Forest--Side Bar----------->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            
                            <ul class="vertical-nav-menu responsive">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <!-- <li>
                                    <a href="/" class="mm-active">
                                      <i class="fa fa-home" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                      Main Home
                                  </a>
                              </li> -->
                                <li>
                                    <a href="dashboard" class="mm-active">
                                      <i class="fa fa-user" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                      Dashboard
                                  </a>
                              </li>
                              <li class="app-sidebar__heading">User Menu</li>
                              <li >
                                <a href="#">
                                    <i class="fa fa-bank" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                    My Account Menu
                                    &nbsp;<i class="arrow down"></i>
                                </a>
                                <ul >
                                    <li>
                                        <a href="account">
                                            <i class="metismenu-icon"></i>
                                            Customer Profile
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="nok">
                                            <i class="metismenu-icon">
                                            </i>Next of kin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="job">
                                            <i class="metismenu-icon">
                                            </i>Job History
                                        </a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="Summary">
                                            <i class="metismenu-icon">
                                            </i>Account Summary
                                        </a>
                                    </li> -->
                                    <!--    <li>
                                            <a href="transaction-codes">
                                                <i class="metismenu-icon">
                                                </i>Transaction Codes
                                            </a>
                                        </li>-->
                                        
                                    </ul>
                                </li>
                                <li >
                                    <a href="#">
                                       <i class="fa fa-exchange" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                       Money Transfer
                                       &nbsp;<i class="arrow down"></i>
                                   </a>
                                   <ul >
                                    <li>
                                        <a href="intl-transfer">
                                            <i class="metismenu-icon">
                                            </i>Wire Transfer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="samebank-transfer">
                                            <i class="metismenu-icon">
                                            </i>Same Bank Transfer
                                        </a>
                                    </li>

                                    

                                </ul>
                            </li>





                            <li >
                                <a href="#">
                                    <i class="fa fa-list" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                    Account Statement
                                    &nbsp;<i class="arrow down"></i>
                                </a>
                                <ul >
                                    <li>
                                        <a href="Statement">
                                            <i class="metismenu-icon">
                                            </i>View E-Estatement
                                        </a>
                                    </li>
                                    <li>
                                        <a href="print">
                                            <i class="metismenu-icon">
                                            </i>Last Transaction Receipt
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li >
                                <a href="#">
                                 <i class="fa fa-money" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                 Loan & Mortage
                                 &nbsp;<i class="arrow down"></i>
                             </a>
                             <ul >
                                <li>
                                    <a href="apply-loan">
                                        <i class="metismenu-icon">
                                        </i>Request Loan
                                    </a>
                                </li>
                                <li>
                                    <a href="loan-menu">
                                        <i class="metismenu-icon">
                                        </i>Loan Status
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- <li >
                            <a href="#">
                             <i class="fa fa-credit-card" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                             My Bank Card
                             &nbsp;<i class="arrow down"></i>
                         </a>
                         <ul >
                            <li>

                                <a href="request-card">
                                    <i class="metismenu-icon">
                                    </i>Request Credit/Debit Card
                                </a>
                            </li>
                            <li>
                                <a href="card">
                                    <i class="metismenu-icon">
                                    </i>My Card Status
                                </a>
                            </li>
                            <li>
                                <a href="card">
                                    <i class="metismenu-icon">
                                    </i>My Approved Cards
                                </a>
                            </li>


                        </ul>
                    </li> -->
                               <!--- <li><a href="deposit-funds">
                                           <i class="fa fa-arrow-down" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                        Make Deposit
                                    </a>
                                </li>-->
                                <!-- <li><a href="pay-bills">
                                 <i class="fa fa-shopping-cart" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                 Pay Utility Bills
                             </a>
                         </li> -->
                         <li class="app-sidebar__heading">Support</li>
                         <li >
                            <a href="#">
                                <i class="fa fa-envelope-o" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                                Customer Support
                                &nbsp;<i class="arrow down"></i>
                            </a>
                            <ul >
                                <li>
                                    <a href="support">
                                        <i class="metismenu-icon">
                                        </i>Contact Customer Services
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li >
                            <a href="#">
                               <i class="fa fa-cogs" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                               Account Settings
                               &nbsp;<i class="arrow down"></i>
                           </a>
                           <ul >
                            <li>
                                <a href="ChangePin">
                                    <i class="metismenu-icon">
                                    </i>Change Transaction PIN
                                </a>
                            </li>
                            <li>
                                <a href="ChangePwd">
                                    <i class="metismenu-icon">
                                    </i>Change Account Password
                                </a>
                            </li>
                            <li>
                                <a href="edit_profile">
                                    <i class="metismenu-icon">
                                    </i>Edit Profile
                                </a>
                            </li>



                        </ul>
                    </li>

                    <li  >
                        <a href="logout">
                          <i class="fa fa-sign-out" style='font-size:20px;color:#28049c' aria-hidden="true"></i>&nbsp;
                          Logout
                      </a>
                  </li>

          </ul>


      </div>
  </div>
</div>                                             	   
<!------Side Bar----------->







<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class='fas fa-comments-dollar' style='font-size:28px;color:#28049c'></i>&nbsp;
                    </div>
                    <div>
                        <?php 
                        $hour = date('H');
                        $dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");
                        ?>
                        Good <?php echo $dayTerm; ?> ! <?php echo $row['firstname']." ".$row['lastname']; ?>                                        <div class="page-title-subheading"><?php echo $row['acctype']; ?> Number: <strong class="badge badge-warning">
                            <?php echo $row['acc_no']; ?></strong>
                        </div>
                    </div>

                    &nbsp;&nbsp;&nbsp;
            <?php 
if (isset($_GET['dormant'])) {
  ?>
  <div class='alert-danger'>
      <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
      <strong>Your account is Dormant/Inactive </strong>
  </div>
<?php } ?>

<?php 
if (isset($_GET['image_status'])) {
  ?>
  <div class='alert-danger'>
      <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
      <strong>You need to verify your account! Please go to account settings->edit profile and upload your image. </strong>
  </div>
<?php } ?>

<?php 
if (isset($msg)) { 
    echo $msg; 
    unset($msg);
} 
  if (isset($_GET['coterror'])) {
      ?>
      <div class='alert-danger'>
          <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
          <strong>Incorrect COT </strong>
      </div>
  <?php }
  if (isset($_GET['imferror'])) {
      ?>
      <div class='alert-danger'>
          <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
          <strong>Incorrect IMF </strong>
      </div>
  <?php }
  if (isset($_GET['taxerror'])) {
      ?>
      <div class='alert-danger'>
          <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
          <strong>Incorrect TAX </strong>
      </div>
  <?php }
  if (isset($_GET['atcerror'])) {
      ?>
      <div class='alert-danger'>
          <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
          <strong>Incorrect ATC </strong>
      </div>
  <?php }
  if (isset($_GET['pinerror'])) {
      ?>
      <div class='alert-danger'>
          <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
          <strong>Incorrect PIN </strong>
      </div>
  <?php }
  if (isset($_GET['telexerror'])) {
      ?> 
      <div class='alert-danger'>
          <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
          <strong>Incorrect TELEX </strong>
      </div>
  <?php } ?>



      </div>
      <div class="page-title-actions">

        <div class="d-inline-block dropdown">
            <button style="background-color: #1dab72;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                   <i class='far fa-money-bill-alt' style='font-size:20px;color:white'></i>&nbsp;
               </span>
               Quick Transfer
           </button>
           <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="intl-transfer" class="nav-link">
                        <i class="nav-link-icon lnr-inbox"></i>
                        <span>
                            Wire Transfer
                        </span>
                        <div class="ml-auto badge badge-pill badge-secondary"><?php echo $numTransCount; ?></div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="samebank-transfer" class="nav-link">
                        <i class="nav-link-icon lnr-picture"></i>
                        <span>
                            Same Bank Transfer
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    
    
    <div class="d-inline-block dropdown">
   
            <a href="support" style="background-color: white; border-color: #1dab72; color: #1dab72;" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                   <i class='far fa-comment-dots' style='font-size:20px;color:#1dab72;'></i>&nbsp;
               </span>
               Get Quick Help
            </a href="support">
             
    </div>
    
</div>    </div>
</div>  
