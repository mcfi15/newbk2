<?php 
include 'includes/header.php'; 

if($row['status'] == 'Dormant/Inactive'){
    $reg_user->redirect('dashboard?dormant');
    exit();
}

if (isset($_POST['transfer'])) {

    $rbname = trim($_POST['rbname']);
    $rbname = strip_tags($rbname);
    $rbname = htmlspecialchars($rbname);
    
    $accno = trim($_POST['accno']);
    $accno = strip_tags($accno);
    $accno = htmlspecialchars($accno);

    $verify = trim($_POST['verify']);
    $verify = strip_tags($verify);
    $verify = htmlspecialchars($verify);
    
    $bname = trim($_POST['bname']);
    $bname = strip_tags($bname);
    $bname = htmlspecialchars($bname);
    
    $bemailadd = trim($_POST['bemailadd']);
    $bemailadd = strip_tags($bemailadd);
    $bemailadd = htmlspecialchars($bemailadd);
    
    $swift = trim($_POST['swift']);
    $swift = strip_tags($swift);
    $swift = htmlspecialchars($swift);
    
    $swift = trim($_POST['iban']);
    $swift = strip_tags($iban);
    $swift = htmlspecialchars($iban);
    
    $swift = trim($_POST['routing']);
    $swift = strip_tags($routing);
    $swift = htmlspecialchars($routing);
    
    $rstate = trim($_POST['rstate']);
    $rstate = strip_tags($rstate);
    $rstate = htmlspecialchars($rstate);
    
    $amt = trim($_POST['amt']);
    $amt = strip_tags($amt);
    $amt = htmlspecialchars($amt);
    
    $desc = trim($_POST['desc']);
    $desc = strip_tags($desc);
    $desc = htmlspecialchars($desc);
    
    $dot = trim($_POST['dot']);
    $dot = strip_tags($dot);
    $dot = htmlspecialchars($dot);
    
    $toption = trim($_POST['toption']);
    $toption = strip_tags($toption);
    $toption = htmlspecialchars($toption);
    
    $saccno = trim($_POST['saccno']);
    $saccno = strip_tags($saccno);
    $saccno = htmlspecialchars($saccno);

    $pin = trim($_POST['pin']);
    $pin = strip_tags($pin);
    $pin = htmlspecialchars($pin);

    if ($amt > $row['total_bal']) {
        $msg = "<div class='alert-danger'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
        <strong>Insufficient Fund </strong>
        </div>
        ";
    } else{
        $otp = mt_rand(100000,999999);

        $email = $row['email'];
        $firstname = $row['firstname'];

        $_SESSION['rbname'] = $rbname;
        $_SESSION['accno'] = $accno;
        $_SESSION['bname'] = $bname;
        $_SESSION['bemailadd'] = $bemailadd;
        $_SESSION['swift'] = $swift;
        $_SESSION['iban'] = $iban;
        $_SESSION['routing'] = $routing;
        $_SESSION['rstate'] = $rstate;
        $_SESSION['amt'] = $amt;
        $_SESSION['desc'] = $desc;
        $_SESSION['dot'] = $dot;
        $_SESSION['toption'] = $toption;
        $_SESSION['saccno'] = $saccno;
        $_SESSION['mode'] = "Same Transfer";
        $_SESSION['pin'] = $pin;

        echo("<script>location.href = 'pin';</script>");
    }
}

include 'includes/html.php'; 
?>  


<link href="assets/css/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="assets/js/SpryValidationTextField.js" type="text/javascript"></script>

<!-- <script src="/secure/admin/library/jquery.min.js" type="text/javascript"></script> -->

<link href="assets/css/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="assets/js/SpryValidationTextarea.js" type="text/javascript"></script>

<link href="assets/css/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="assets/js/SpryValidationSelect.js" type="text/javascript"></script>

<div id="errorCls" style="color:#FF0000 !important;font-size:14px;font-weight:bold;">&nbsp;</div> 






<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
        <span><i class='fas fa-globe' style='font-size:24px;color:orange'></i>check Bank Transfer</span>
    </a>
</li> 
</ul>                   

  <div class="tab-content">
    <!-- <div class="form-desc" style="color:#05194B; text-align:justify;">
        The Grand Summit Bank International Money Transfer (IMT) is designed to enable both Grand Summit Bank account holders
        and non-account holders 
        send and receive 
        funds to and from any Grand Summit Bank subsidiary in America, Europe, Asia, Australia and Africa. In line with a directive by the 
        International Money Funds and US Department of States,
        recipients of funds through Grand Summit Bank in United States
        must either be Grand Summit Bank account holders or must be identified by a Grand Summit Bank account holder.

    </div>
    <br> -->
    <?php

   if (isset($_GET['check'])) { 
       $accno = $_GET['check'];
   
    
    $stmtCheck = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = $accno");
    $stmtCheck->execute();
    $rows = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    }

    ?>

    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Please ensure all fields are completed</h5>
                <form class="" action="" method="POST">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Beneficiary Bank Name</label>
                                <input name="rbname" id="exampleEmail11" value="<?php echo $sitename; ?>" type="text" class="form-control" readonly></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="examplePassword11" class="">Beneficiary Account Number</label>
                                    <input name="accno" id="examplePassword11" value="<?php echo $rows['acc_no']; ?>" type="text"  class="form-control" readonly></div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Beneficiary FullName</label>
                                        <input name="bname" id="exampleEmail11" value="<?php echo $rows['firstname'].' '.$rows['lastname']; ?>" type="text" class="form-control" readonly></div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="examplePassword11" class="">Verification Method</label>
                                            <select name="verify" class="form-control" required>
                                                <option value="auc">Verify Using Authorization Code</option>
                                                <option value="otp">Verify Using OTP Code</option>
                                            </select>
                                        </div>
                                        </div> -->
                                    </div>
                                    <!-- <br>
                                    <font color="red"> Please fill only the one available to you ( Either Swiftcode, Routing or IBAN)</font><hr>
                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Swift Code</label>
                                                <input name="swift" id="exampleEmail11" value="" placeholder="Swift Code" type="text" class="form-control"></div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">IBAN</label>
                                                    <input name="iban" id="exampleEmail11" value="" placeholder="IBAN" type="text" class="form-control"></div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Routing</label>
                                                        <input name="routing" id="exampleEmail11" value="" placeholder="Routing" type="text" class="form-control"></div>
                                                    </div>

                                                </div> -->
                                                <!-- <br>
                                                <font color="red"> Beneficiary Bank Address</font>
                                                <hr>

                                                <div class="form-row">

                                                    <script type= "text/javascript" src="/secure/digital_forest_team_assets/Digital_forest_team_bankia_countries.js"></script>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Country</label>
                                                           <select id="country" class="form-control"  name=""></select>  </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">State</label>
                                                         <input class="form-control"  name ="" id ="state"  ></div>
                                                     </div>

                                                     <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">City</label>
                                                         <input class="form-control"  name ="" id ="state"  > </div>
                                                     </div>

                                                     <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">Zipcode</label>
                                                         <input class="form-control"  name ="" id ="state"  > </div>
                                                     </div>
                                                 </div>


                                                 <br>
                                                 <font color="red"> Beneficiary Address</font>
                                                 <hr>

                                                 <div class="form-row">

                                                    <script type= "text/javascript" src="assets/js/Digital_forest_team_bankia_countries.js"></script>

                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">State</label>
                                                         <input class="form-control"  name ="rstate" id ="state"  > </div>
                                                     </div>

                                                     <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">City</label>
                                                         <input class="form-control"  name ="" id ="state"  ></div>
                                                     </div>

                                                     <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">Zipcode</label>
                                                         <input class="form-control"  name ="" id ="state"  > </div>
                                                     </div>
                                                 </div>
 -->
                                                 <br><hr>
                                                 <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="examplePassword11" class="">Amount (<?php echo $row['currency']; ?>):</label>
                                                            <input name="amt" id="amt" value="" placeholder="Amount" type="number" step="0.01"  class="form-control" required></div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="position-relative form-group"><label for="exampleAddress" class="">Reason for Wire</label>
                                                        <input name="desc"  style="height:80px;" id="exampleAddress"  type="text" class="form-control"></div> -->


                                                        <input type="hidden" value="<?php echo strtotime("now"); ?>" name="dot" > 
                                                        <input name="toption" type="hidden" readonly="true" value="IT"  class="form-control"  />
                                                        <input name="saccno" type="hidden" readonly="true" value="<?php echo $row['acc_no']; ?>"  id="saccno" class="form-control"  />
                                                        <input name="pin" type="hidden" readonly="true" value="<?php echo $row['pin']; ?>"  id="saccno" class="form-control"  />

                                                        <button name="transfer" id="submitButton" type="submit" class="mt-2 btn btn-primary">
                                                            <i class='fas fa-globe' style='font-size:24px;color:orange'></i>&nbsp;
                                                            Proceed Transfer ></button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>







                                        <script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	populateCountries("country2");
</script>

<script type="text/javascript">
    <!--
    var sprytf_rbname = new Spry.Widget.ValidationTextField("sprytf_rbname", 'none', {minChars:6, validateOn:["blur", "change"]});
    var sprytf_rname = new Spry.Widget.ValidationTextField("sprytf_rname", 'none', {minChars:6, validateOn:["blur", "change"]});
    var sprytf_accno = new Spry.Widget.ValidationTextField("sprytf_accno", 'integer', {minChars:10, maxChars: 15, validateOn:["blur", "change"]});
    var sprytf_bemailadd = new Spry.Widget.ValidationTextField("sprytf_bemailadd", 'none', {minChars:6, validateOn:["blur", "change"]});
    var sprytf_rcountry = new Spry.Widget.ValidationTextField("sprytf_rcountry", 'none', {minChars:6, validateOn:["blur", "change"]});
    var sprytf_rstate = new Spry.Widget.ValidationTextField("sprytf_rstate", 'none', {minChars:6, validateOn:["blur", "change"]});
    var sprytf_swift = new Spry.Widget.ValidationTextField("sprytf_swift", 'none', {minChars:10, maxChars: 20, validateOn:["blur", "change"]});
    var sprytf_amt = new Spry.Widget.ValidationTextField("sprytf_amt", "none", {validateOn:["blur", "change"]});

    var sprytf_opt = new Spry.Widget.ValidationSelect("spryselect_opt");

    var sprytf_dot = new Spry.Widget.ValidationTextField("sprytf_dot", "date", {format:"", useCharacterMasking: true, validateOn:["blur", "change"]});
    var sprytf_desc = new Spry.Widget.ValidationTextarea("sprytf_desc", {is:true, validateOn:["blur", "change"]});
//-->
</script>




<?php include 'includes/footer.php'; ?>  