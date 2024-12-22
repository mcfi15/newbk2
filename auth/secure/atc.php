<?php 
include 'includes/header.php';

if(!isset($_SESSION['atc'])){
    
    header("Location: dashboard");

    exit(); 
}

if (isset($_POST['submitCot'])) {

    $atc = trim($_POST['atc']);
    $atc = strip_tags($atc);
    $atc = htmlspecialchars($atc);

    if ($atc !== $row['atc']) {
        echo("<script>location.href = 'intl-transfer?coterror';</script>");
        //$reg_user->redirect("intl-transfer?atcerror");
    } else{


         $rbname = $_SESSION['rbname'];
        $accno = $_SESSION['accno'];
        $bname = $_SESSION['bname'];
        $bemailadd = $_SESSION['bemailadd'];
        $swift = $_SESSION['swift'];
        $iban = $_SESSION['iban'];
        $routing = $_SESSION['routing'];
        $rstate = $_SESSION['rstate'];
        $amount = $_SESSION['amt'];
        $desc = $_SESSION['desc'];
        $dot = $_SESSION['dot'];
        $toption = $_SESSION['toption'];
        $saccno = $_SESSION['saccno'];

        $total_bal= $row['total_bal'];

        $currency= $row['currency'];
        $firstname= $row['firstname'];
        $acc_no= $row['acc_no'];

        $newBal = $total_bal - $amount;

        $newBalMail = number_format($newBal,2);

        $amountMail = number_format($amount,2);

        $type = "Debit";

        $status = "Pending";

        $refNo = mt_rand(10000000000,99999999999);

        $mode = "wire";

        $naration = "Fund transfer of ".$amountMail." to Account ".$accno." Reference# ".$refNo;

        $TransQuery = $reg_user->runQuery("INSERT INTO `transfer`(`acc_no`, `rbname`, `accno`, `bname`, `bemailadd`, `swift`, `iban`, `routing`, `rstate`, `amount`, `description`, `dot`, `type`, `status`, `refNo`, `mode`, `naration`) VALUES ('$acc_no', '$rbname', '$accno', '$bname', '$bemailadd', '$swift', '$iban', '$routing', '$rstate', '$amount', '$desc', '$dot', '$type', '$status', '$refNo', '$mode', '$naration')");
        $TransQuery->execute();

        $BalUpQuery = $reg_user->runQuery("UPDATE account SET total_bal = '$newBal' WHERE acc_no = '$saccno'");
        $BalUpQuery->execute();



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
<!-- <a href='#' style='text-decoration:none' target='_blank'>                                                  
<img alt='' border='0' src='https://grandsumban.online' style='width:100%;max-width:150px;height:auto;display:block' width='150'> -->
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
<h2 class='text' style='color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0'>Hi $firstname, A/C NO. $acc_no</h2>
</td>
</tr>
<tr>
<td style='padding-bottom: 30px; padding-left: 20px; padding-right: 20px;' align='center' valign='top' class='subTitle'>

</td>
</tr>
<tr>
<td style='padding-left:20px;padding-right:20px' align='center' valign='top' class='containtTable ui-sortable'>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='tableDescription' style=''>
<tbody>
<tr>
<td style='padding-bottom: 20px;' align='center' valign='top' class='description'>
<p class='text' style='color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0'>

<h3><span style='color:#2196F3;'>TRANSACTION NOTIFICATION</span> </h3>

<hr>
<h4 class='text' style='color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0'>
The following transactions has occured on your account, see below for transaction details.
</h4>
<hr>
<table style='border:1px solid black;padding:2px;' width='400'>

<tr>
<th style='text-align:left;'>TRANSACTION TYPE:</th>
<td>Debit</td>
</tr>

<tr>
<th style='text-align:left;'>AMOUNT</th>
<td>$currency $amountMail</td>
</tr>

<tr>
<th style='text-align:left;'>TOTAL BALANCE</th>
<td>$currency $newBalMail</td>
</tr>

<tr>
<th style='text-align:left;'>PENDING DEBIT</th>
<td>$currency 0.00</td>
</tr>

<tr> 
<th style='text-align:left;'>PENDING CREDIT</th>
<td>$currency 0.00</td>
</tr>

<tr style='background-color:#2196F3;'>
<th style='text-align:left; color:#fff;'>AVAILABLE BALANCE</th>
<td style='color:#fff;'>$currency $newBalMail</td>
</tr>

<tr>
<th style='text-align:left;'>STATUS</th>
<td style='color:orange;'>PENDING</td>
</tr>

</table>
</p>
</td>
</tr>
</tbody>
</table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='tableButton' style=''>
<tbody>

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

<hr>
<p style='font-weight:bold;font-size:13px;line-height: 30px; color:red;'>Please, note that your Internet Banking is automatically activated and you will need a commbination of your account number and password to access your online banking at <br /> https://grandsumban.online</p>
<hr>
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

</td>
</tr>
<tr>
<td style='padding: 10px 10px 5px;' align='center' valign='top' class='brandInfo'>
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>©&nbsp;Grand Summit Bank | 800 Broadway, Suite 1500 | New York, NY 000123, USA.</p>
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
<p class='text' style='color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0'>If you have any quetions please contact us <a href='#' style='color:#bbb;text-decoration:underline' target='_blank'>support@grandsumban.online.</a>
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


      $subject = "Grand Summit Bank";

      $reg_user->send_mail($email,$messag,$subject);

        unset($_SESSION['atc']);

        $_SESSION['success'] = "true";

        $reg_user->redirect("success");
    }
}

//         unset($_SESSION['atc']);

//         $_SESSION['telex'] = "true";
//         $reg_user->redirect("telex");
//     }
// }

include 'includes/html.php';
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
<script>
    var counter = 35;
    var c = 35;
    var i = setInterval(function () {
      $(".loading-page .counter h1").html(c + "%");
      $(".loading-page .counter hr").css("width", c + "%");

      counter++;
      c++;

      if (counter == 43) {
        clearInterval(i);

        var loader = document.getElementById("myname");
        loader.style.display = 'none';

        var cott = document.getElementById("cot");
        cott.style.display = 'block';
    }
}, 300);

</script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100);
    * {
      box-sizing: border-box;
      margin: 0;
  }

  h1, p, h2, h3, h4, ul, li, div {
      margin: 0;
      padding: 0;
  }

/*body {
  padding: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: -webkit-box;
  display: flex;
  font-family: Roboto;
}*/

.loading-page {
  background: #0d0d0d;
  /*width: 100vw;*/
  /*height: 100vh;*/
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  align-items: center;
}
.loading-page .counter {
  text-align: center;
}
.loading-page .counter p {
  font-size: 25px;
  font-weight: 100;
  color: #f60d54;
}
.loading-page .counter h1 {
  color: white;
  font-size: 30px;
  margin-top: -10px;
}
.loading-page .counter hr {
  background: #f60d54;
  border: none;
  height: 1px;
}
.loading-page .counter {
  position: relative;
  width: 200px;
}
.loading-page .counter h1.abs {
  position: absolute;
  top: 0;
  width: 100%;
}
.loading-page .counter .color {
  width: 0px;
  overflow: hidden;
  color: #f60d54;
}

</style> 

<div class="loading-page" id="myname">
  <div class="counter">
    <p>Transfer Progress</p>
    <h1>75%</h1>
    <hr/>
</div>
</div>

<div id="cot" style="display: none;">
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span><i class='fas fa-money-check-alt' style='font-size:24px;color:orange'></i> Authorisation Code (ATC)</span>
        </a>
    </li> 
</ul>                   

<div class="tab-content">
    <div class="form-desc" style="color:#05194B; text-align:justify;">
       Dear <strong style="color:brown;"><?php echo $row['firstname']." ". $row['lastname']; ?></strong>, Your Transfer cannot be approved without your bank Authorisation Code for Large Transaction.
       <br>
       You are Transfering <strong style="color:brown;"><?php echo $row['currency']; ?> <?php echo number_format($_SESSION['amt'],2); ?></strong>

       from your <strong style="color:brown;"><?php echo $row['acc_no']; ?></strong>
       to <strong style="color:brown;"><?php echo $_SESSION['rbname']; ?></strong> belonging to
       <strong style="color:brown;"><?php echo $_SESSION['bname']; ?></strong> with the underlisted details


   </div>
   <br>

   <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="main-card mb-3 card">
        <div class="card-body">





         <p>Bank Name: <?php echo $_SESSION['rbname']; ?></p>
         <p>Bank Location: <?php echo $_SESSION['rstate']; ?>, </p>
         <p>Siwft Code/IBAN: <?php echo $_SESSION['swift']; ?></p>
         <p>Bank Account: <?php echo $_SESSION['accno']; ?></p>


         <label>Contact Customer services via <a class="btn btn-primary" href="mailto:support@grandsumban.online">support@grandsumban.online</a>
         for your ATC Code</label>


         <form action="#" method="POST" enctype="multipart/form-data" />





         <div class="position-relative form-group"><label for="exampleAddress" class="">ATC Code</label>
            <input name="atc"  style="height:80px;"  type="text" class="form-control" required=""></div>




            <!-- <input type="hidden" name="rbname" value="Kodak "/>
            <input type="hidden" name="accno" value="0012457896 "/>
            <input type="hidden" name="bname" value="Mich Clerk "/>
            <input type="hidden" name="rcountry" value=" "/>
            <input type="hidden" name="rstate" value="Mar "/>
            <input type="hidden" name="bemailadd" value="kingscloud@hi2.in "/>
            <input type="hidden" name="swift" value="86356874458 "/>
            <input type="hidden" name="dot" value="07:51 PM 11 May 2022 "/>
            <input type="hidden" name="amt" value="1000 "/>
            <input type="hidden" name="toption" value="IT "/>
            <input type="hidden" name="desc" value="Funds Transfer "/>
            <input type="hidden" name="saccno" value="4668345056 "/> -->

            <button  id="submitButton" type="submit" name="submitCot" class="mt-2 btn btn-primary">
                <i class='fas fa-money-check-alt' style='font-size:24px;color:orange'></i>&nbsp;
                Validate ATC ></button>
            </form>
        </div>
    </div>

</div>

</div>

</div>


<?php include 'includes/footer.php'; ?>  