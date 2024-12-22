<?php 
include 'includes/header.php';

if (isset($_POST['submitButton'])) {

  $oldPin = trim($_POST['oldPin']);
  $oldPin = strip_tags($oldPin);
  $oldPin = htmlspecialchars($oldPin);

  $newPin = trim($_POST['newPin']);
  $newPin = strip_tags($newPin);
  $newPin = htmlspecialchars($newPin);

  $cPin = trim($_POST['cPin']);
  $cPin = strip_tags($cPin);
  $cPin = htmlspecialchars($cPin);

  if ($oldPin !== $row['pin']) {
      $msg = "<div class='alert-danger'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Wrong Current Pin!</strong>
          </div>";
  } else if ($newPin !== $cPin) { 
      $msg = "<div class='alert-danger'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>New Pin and Comfirm Pin does not match!</strong>
          </div>";
  } else{

    $stmtPin = $reg_user->runQuery("UPDATE account SET pin = '$newPin' WHERE acc_no = '$acc_no'");

    if ($stmtPin->execute()) {
        $msg = "<div class='alert'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Success!</strong> Pin Changed Successfully
          </div>";
    }
    
  }

} 

include 'includes/html.php'; 
?>  



<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span>  <i class='fas fa-fingerprint' style='font-size:20px;color:gold'></i>  Modify Your Transaction PIN Number</span>
        </a>
    </li>

</ul>                   

<div class="tab-content">

    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Change Account Pin</h5>



               <form action=" " method="post">


                <div class="position-relative form-group"><label for="exampleAddress" class="">Current Transaction PIN</label>
                   <span id="sprytf_pin">
                    <input type="text" class="form-control" style="height:40px; background-color:white;"  name="oldPin"/>
                    
                </span>
                
            </div>


                <div class="position-relative form-group"><label for="exampleAddress" class="">New Transaction PIN</label>
                   <span id="sprytf_pin">
                    <input type="text" class="form-control" style="height:40px; background-color:white;"  name="newPin"/>
                    
                </span>

            </div>


            <div class="position-relative form-group"><label for="exampleAddress2" class="">Repeat New Transaction PIN</label>
               <span id="sprytf_cpin" >
                <input type="text"  name="cPin" class="form-control" style="height:40px; background-color:white; "   />
            </span>
        </div>



        <button name="submitButton" type="submit"  id="submitButton" class="mt-2 btn btn-primary">
            <i class='fas fa-fingerprint' style='font-size:20px;color:gold'></i> Change</button>
        </form>
    </div>
</div>

</div>

</div>








<script type="text/javascript">
    <!--
    var spry_pin = new Spry.Widget.ValidationTextField("sprytf_pin", 'integer', {minChars:4, maxChars: 6, validateOn:["blur", "change"]});
//Confirm Password
var spry_cpin = new Spry.Widget.ValidationConfirm("sprytf_cpin", "sprytf_pin", {minChars:4, maxChars: 6, validateOn:["blur", "change"]});
//-->
</script>			


<?php include 'includes/footer.php'; ?>  