<?php 
include 'includes/header.php'; 

if($row['image_status'] == 0){
    $reg_user->redirect('dashboard?image_status');
    exit();
}

if($row['status'] == 'Dormant/Inactive'){
    $reg_user->redirect('dashboard?dormant');
    exit();
}

if (isset($_GET['check'])) {
   
    $accno = trim($_GET['accno']);
    $accno = strip_tags($accno);
    $accno = htmlspecialchars($accno);

    $stmtCheck = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$accno'");
    $stmtCheck->execute();


    $countt = $stmtCheck->rowCount();

    
    


   if ($countt < 1) {
        $msg = "<div class='alert-danger'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>Account Not Found!</strong>
          </div>";
    } else{
        $rowCheck = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($acc_no === $rowCheck['acc_no']) {
            $msg = "<div class='alert-danger'>
              <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
              <strong>You cannot send money to self!</strong>
          </div>";
        } else{
            header("Location: same_transfer?check=$accno");
            
        }

    }
}

include 'includes/html.php';
?>                                           	   

			   
   
	   <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                             
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span><i class='fas fa-passport' style='font-size:24px;color:orange'></i> <?php echo $sitename; ?> TO <?php echo $sitename; ?>  Money Transfer </span>
                                </a>
                            </li> 
                        </ul>                   
	                      
	                      <div class="tab-content">
                            
                                <br>

                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"> 
                                        
            
                          
                               <form action="" method="get"  enctype="multipart/form-data" id="formValidate">
                            
                                                        
                          
                          
                            <div class="position-relative form-group"><label for="exampleAddress" class="">10 Digit<?php echo $sitename; ?> Account Number</label>
                            <input name="accno" placeholder="Enter Beneficiary Account Number" id="token" style="height:80px;"  type="text" class="form-control" required=""></div>
 
                                            
                                            <button  id="submitButton" type="submit" name="check"   class="mt-2 btn btn-primary">
                                                <i class='fas fa-passport' style='font-size:24px;color:orange'></i>&nbsp;
                                                Check Account ></button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>


<?php include 'includes/footer.php'; ?>  