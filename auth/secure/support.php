<?php 
include 'includes/header.php';

if (isset($_POST['support'])) {

  $dept = trim($_POST['dept']);
  $dept = strip_tags($dept);
  $dept = htmlspecialchars($dept);

  $body = trim($_POST['body']);
  $body = strip_tags($body);
  $body = htmlspecialchars($body);

  $name= $row['firstname']." ".$row['lastname'];

  $accNum = $row['acc_no'];

  $email = $siteemail;

  $messag = "
  <table style='color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;' width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#001736'>
<tbody>
<tr>
<td valign='top' align='center'>
<table class='mobile-shell' width='650' cellspacing='0' cellpadding='0' border='0'>
<tbody>
<tr>
<td class='td container' style='width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;'>
<div style='text-align: center;'>
// <img src='$siteurl/images/logo.png' style='height: 240 !important;width: 338px;margin-bottom: 20px;'>
</div>
<table style='width: 650px; margin: 0px auto;' cellspacing='0' cellpadding='0' border='0'>
<tbody>
<tr>
<td style='padding-bottom: 10px;'>
<table width='100%' cellspacing='0' cellpadding='0' border='0'>
<tbody>
<tr>
<td class='tbrr p30-15' style='padding: 60px 30px; border-radius: 26px 26px 0px 0px;' bgcolor='#000036'>
<table width='100%' cellspacing='0' cellpadding='0' border='0'>
<tbody>
<tr>
<td style='color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;'>
Hi Admin , <br>

MESSAGE FROM

<hr> 
Name : $name <br>
Account Number : $accNum

<hr>

MESSAGE CONTENT

<hr>
Depertment : $dept
</td>
</tr>
<tr>
<td style='color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;'>$body</td></tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table style='width: 650px; margin: 0px auto;' cellspacing='0' cellpadding='0' border='0'>
<tbody>
<tr>
<td class='p30-15 bbrr' style='padding: 50px 30px; border-radius: 0px 0px 26px 26px;' bgcolor='#000036'>
<table width='100%' cellspacing='0' cellpadding='0' border='0'><tbody>
<tr>
<td class='text-footer1 pb10' style='color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;'>
© 2024 . All Rights Reserved.</td></tr></tbody></table>
</td>
</tr>
</tbody>
</table>
</td>
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

  $msg = "<div class='alert'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Message sent successfully!</strong> <br>
              <small>Refrain from submiting multiple request.</small>
          </div>";
}



include 'includes/html.php';
?>


<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span>  <i class='far fa-comment-dots' style='font-size:20px;color:gold'></i>   Get Quick Help</span>
        </a>
    </li>

</ul>                   

<div class="tab-content">

    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Confidential Messaging Application</h5>
             Customer service is the act of taking care of the customer's needs by providing and delivering professional, 
             helpful, high quality service and assistance before, during, and after the customer's requirements are met. Customer service is meeting the
             needs and desires of any customer, Use our Internal Messaging Application to Contact our customer's service with easy.

             <br>

             <form action="" method="post">

                 <br>
                 <div class="position-relative form-group"><label for="exampleAddress" class="">Please Select Customer Service Department 
                 </label>
                 <select class="form-control"  name="dept"  required="">

                    <option  value="">Please Select Customer Service Department</option>
                    <option  value="Customer Services Department">Customer Services Department</option>
                    <option  value="Account Department">Account Department</option>
                    <option  value="Transfer Department">Transfer Department</option>
                    <option  value="Card Services Department">Card Services Department</option>
                    <option  value="Loan Department">Loan Department</option>
                    <option  value="Bank Deposit Department">Bank Deposit Department</option>

                </select>

            </div>



            <div class="position-relative form-group"><label for="exampleAddress2" class="">Message Body</label>
              <textarea class="form-control" rows="5" name="body" placeholder="Enter Message Details Here" required=""></textarea>
          </div>



          <button type="submit" name="support" class="mt-2 btn btn-primary">
             <i class='far fa-comment-dots' style='font-size:20px;color:gold'></i> 
         Submit Message</button>
     </form>
 </div>
</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>  