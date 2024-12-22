<?php 
include 'includes/header.php';

$stmtTrans = $reg_user->runQuery("SELECT * FROM loan WHERE acc_no=:acc_no");
$stmtTrans->execute(array(":acc_no"=>$_SESSION['acc_no']));

$numTransCount = $stmtTrans->rowCount();



include 'includes/html.php';
?>

  
	   <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>  <i class='fab fa-cc-visa' style='font-size:20px;color:gold'></i> Request Bank/ATM Card</span>
                                </a>
                            </li>
                           
                        </ul>                   
	                      
	                      <div class="tab-content">
	                          
	                           
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Confidential Document Application</h5>
                                       in need of facility? kindly complete the form below, approval take 1-2 business working days
                                       
                                       <br>
                                      
                                      <form action="/secure/view/process.php?action=requestcard" method="post">
              
                            <input type="hidden" class="form-control"   name="accno"  value="4668345056"/>
                            <input type="hidden" class="form-control"  name="email"  value="champion4uu@gmail.com" />
                              <input type="hidden" class="form-control"  name="siteemail"  value="support@royalfinan.com"/>
                            <input type="hidden" class="form-control"  name="sitetitle"  value="<?php echo $sitename; ?>"/>
                                           <br>
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Bank Card Type 
                                            </label>
                                            <select name="cardtype" required="" class="form-control"  style="font-size:12px; height:40px; color:black;"> />
                                <option value="">Select Card Type</option>
                                <option value="visa-card"> Visa Card</option>
                                <option value="master-card"> Master Card</option>
                                <option value="American Express">American Express</option>
                            </select> 
                                            
                                            </div>
                                            
                                            
                                          
                                             <div class="position-relative form-group"><label for="exampleAddress2" class="">Comment(s)</label>
                                           <textarea class="form-control" rows="5" name="body" placeholder="Details of Request here" required=""></textarea>
                                            </div>
                                           
                                            
                                            
                                            <button type="submit" name="login" class="mt-2 btn btn-primary">
                                               <i class='fab fa-cc-visa' style='font-size:20px;color:gold'></i> 
                                                Submit Card Application</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
	                      

<?php include 'includes/footer.php'; ?>  