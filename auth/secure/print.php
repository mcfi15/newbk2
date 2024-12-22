<?php
session_start();
include_once ('session.php');
require_once 'class.user.php';
if(!isset($_SESSION['acc_no'])){

  header("Location: login");

  exit(); 
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$acc_no = $_SESSION['acc_no'];
$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];
//$email = "support@grandsumba.online";

$me = $row['firstname'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE acc_no =:acc_no ORDER BY id DESC LIMIT 1");
$temp->execute(array(":acc_no"=>$_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Transaction Receipt</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="img/favicon" href="../images/favicon.png">
  <style type="text/css">
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
    @media screen {
      @font-face {
        font-family: 'Source Sans Pro';
        font-style: normal;
        font-weight: 400;
        src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
      }

      @font-face {
        font-family: 'Source Sans Pro';
        font-style: normal;
        font-weight: 700;
        src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
      }
    }

  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
    body,
    table,
    td,
    a {
      -ms-text-size-adjust: 100%; /* 1 */
      -webkit-text-size-adjust: 100%; /* 2 */
    }

  /**
   * Remove extra space added to tables and cells in Outlook.
   */
    table,
    td {
      mso-table-rspace: 0pt;
      mso-table-lspace: 0pt;
    }

  /**
   * Better fluid images in Internet Explorer.
   */
    img {
      -ms-interpolation-mode: bicubic;
    }

  /**
   * Remove blue links for iOS devices.
   */
    a[x-apple-data-detectors] {
      font-family: inherit !important;
      font-size: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
      color: inherit !important;
      text-decoration: none !important;
    }

  /**
   * Fix centering issues in Android 4.4.
   */
    div[style*="margin: 16px 0;"] {
      margin: 0 !important;
    }

    body {
      width: 100% !important;
      height: 100% !important;
      padding: 0 !important;
      margin: 0 !important;
    }

  /**
   * Collapse table borders to avoid space between cells.
   */
    table {
      border-collapse: collapse !important;
    }

    a {
      color: #1a82e2;
    }

    img {
      height: auto;
      line-height: 100%;
      text-decoration: none;
      border: 0;
      outline: none;
    }

    @media print {
      .myDivToPrint {
        background-color: #FFFF00;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
      }
    }
  </style>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body style="background-color: #ece576;" onload="window.print()">

  <!-- start preheader -->
  <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
    <!-- A preheader is the short summary text that follows the subject line when an email is viewed in the inbox. -->
  </div>
  <!-- end preheader -->

  <div class="myDivToPrint">

    <!-- start body -->
    <table border="0" cellpadding="0" cellspacing="10" width="100%">

      <!-- start logo -->
      <tr>
        <td align="center" bgcolor="white">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td align="center" valign="top" style="padding: 36px 24px;">
                <a href="dashboard" target="_blank" style="display: inline-block;">
                  <img src="../images/favicon.png" alt="Logo" border="0" width="100" style="display: block; width: 100; max-width: 100; min-width: 100;">
                </a>
              </td>
            </tr>
          </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
      <![endif]-->
      </td>
    </tr>
    <!-- end logo -->

    <!-- start hero -->
    <tr>
      <td align="center" bgcolor="white">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

            <!-- end copy -->

            <!-- start receipt table -->
            <tr>
              <td align="center" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td bgcolor="white" width="100%" style="padding: 12px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <p style="text-align:center;">
                        <strong>
                          <?php  echo $row['currency']. " ". number_format($rows['amount'], 2); ?>
                        </strong>
                      </p>
                    </td>
                    <td></td>                  
                  </tr>

                  <tr>
                    <td align="center" width="100%" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <p>
                        <b>
                          <?php echo $rows['bname']; ?>
                        </b>
                      </p>
                      <p>
                        <?php  
                        $date=$rows['dot'];
                        echo date('l jS \of F Y h:i:s A', $date);?>
                      </p>
                    </td>
                    <td></td>  

                  </tr>

                  <tr>
                    <td align="left" width="25%" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <div class="row">
                        <div class="col-2">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M22 7h1v10h-1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v3zm-2 10h-6a5 5 0 0 1 0-10h6V5H4v14h16v-2zm1-2V9h-7a3 3 0 0 0 0 6h7zm-7-4h3v2h-3v-2z" fill="rgba(218,196,34,1)"/></svg>
                        </div>
                        <div class="col-10">
                          <p>
                            <small>BENEFICIARY ACCOUNT</small> <br>
                            <b><?php echo $rows['acc_no']; ?></b>
                          </p>
                        </div>
                      </div>
                      <hr>
                    </td>
                  </tr>




                  <tr>
                    <td align="left" width="25%" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <div class="row">
                        <div class="col-2">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z" fill="rgba(218,196,34,1)"/></svg>
                        </div>
                        <div class="col-10">
                          <p>
                            <small>TRANSACTION TYPE</small> <br>
                            <b>ONLINE TRANSFER</b>
                          </p>
                        </div>
                      </div>
                      <hr>
                    </td>
                  </tr>


                  <tr>
                    <td align="left" width="25%" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <div class="row">
                        <div class="col-2">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 6v-3.5l5 4.5-5 4.5V19h-3v-2h3z" fill="rgba(218,196,34,1)"/></svg>
                        </div>
                        <div class="col-10">
                          <p>
                            <small>SENDER NAME</small> <br>
                            <b><?php echo  $row['firstname']." ".$row['lastname']; ?></b>
                          </p>
                        </div>
                      </div>
                      <hr>
                    </td>
                  </tr>


                  <tr>
                    <td align="left" width="25%" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <div class="row">
                        <div class="col-2">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M2 20h20v2H2v-2zm2-8h2v7H4v-7zm5 0h2v7H9v-7zm4 0h2v7h-2v-7zm5 0h2v7h-2v-7zM2 7l10-5 10 5v4H2V7zm2 1.236V9h16v-.764l-8-4-8 4zM12 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" fill="rgba(218,196,34,1)"/></svg>
                        </div>
                        <div class="col-10">
                          <p>
                            <small>DESTINATION BANK</small> <br>
                            <b><?php echo $rows['rbname']; ?></b>
                          </p>
                        </div>
                      </div>
                      <hr>
                    </td>
                  </tr>


                  <tr>
                    <td align="left" width="25%" style="padding: 6px 12px;font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                      <div class="row">
                        <div class="col-2">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" fill="rgba(218,196,34,1)"/></svg>
                        </div>
                        <div class="col-10">
                          <p>
                            <small>NARATION</small> <br>
                            <b>Good</b>
                          </p>
                        </div>
                      </div>
                      <hr>
                    </td>
                  </tr>


                </table>
              </td>
            </tr>
            <!-- end reeipt table -->

          </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
      <![endif]-->
      </td>
    </tr>
    <!-- end copy block -->

    <!-- start receipt address block -->
    
  </table>
</div>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
      <![endif]-->
      </td>
    </tr>
    <!-- end receipt address block -->

    <!-- start footer -->
    
    <!-- end footer -->

  </table>
  <!-- end body -->

  <script src="https://use.fontawesome.com/2aec379aeb.js"></script>


</body>
</html>