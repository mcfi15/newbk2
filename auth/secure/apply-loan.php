<?php 
include 'includes/header.php';

if (isset($_POST['loan'])) {

  $amount = trim($_POST['amount']);
  $amount = strip_tags($amount);
  $amount = htmlspecialchars($amount);

  $duration = trim($_POST['duration']);
  $duration = strip_tags($duration);
  $duration = htmlspecialchars($duration);

  $naration = trim($_POST['naration']);
  $naration = strip_tags($naration);
  $naration = htmlspecialchars($naration);

  $refNo = mt_rand(10000000000,99999999999);

  $status = "Review";


  $TransQuery = $reg_user->runQuery("INSERT INTO `loan`(`acc_no`, `refNo`, `amount`, `naration`, `status`) VALUES ('$acc_no', '$refNo', '$amount', '$naration', '$status')");
  if ($TransQuery->execute()) {
     
  $msg = "<div class='alert'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Your loan request has been submited successfully!</strong> <br>
              <small>Refrain from submiting multiple request.</small>
          </div>";
      } else{
        $msg = "<div class='alert-danger'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Hello!</strong> Contact Support
          </div>";
      }





}


include 'includes/html.php';
?> 





<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span><i class='fas fa-store-alt-slash' style='font-size:20px;color:gold'></i> Loan and Mortage Application</span>
        </a>
    </li>

</ul>                   

<div class="tab-content">

    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Confidential Document Application</h5>
             in need of facility? kindly complete the form below, approval take 1-2 business working days

             <br>

             <form action="" method="post">

                <div class="position-relative form-group"><label for="exampleAddress" class="">Loan Amount</label>
                    <input name="amount" id="exampleAddress"  type="text" placeholder="Enter Loan Amount e.g <?php echo $row['currency']; ?>10,000.00" class="form-control" required></div>


                    <div class="position-relative form-group"><label for="exampleAddress2" class="">Duration of Facility</label>
                        <input name="duration" id="exampleAddress2"   placeholder="Duration of Loan (e.g 12months)"  type="text" class="form-control" required>
                    </div>

                    <div class="position-relative form-group"><label for="exampleAddress2" class="">Loan Naration</label>
                        <textarea class="form-control" rows="5" name="naration" placeholder="Enter Full Loan Details" required=""></textarea>
                    </div>



                    <button type="submit" name="loan" class="mt-2 btn btn-primary">
                        <i class='fas fa-store-alt-slash' style='font-size:20px;color:gold'></i>
                    Submit Application</button>
                </form>
            </div>
        </div>

    </div>

</div>


<?php include 'includes/footer.php'; ?>  