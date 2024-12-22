<?php 
include 'includes/header.php'; 



include 'includes/html.php';
?>
               
               
               
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span><i class='fab fa-amazon-pay' style='font-size:23px;color:gold'></i> Bills Pay Channel</span>
                                </a>
                            </li>
                           
                        </ul>                   
	                      
	                      <div class="tab-content">
	                             Take Control of your bills. Renew your Pay TV, Internet, Electricity and so much more with Trust International Bank’s smooth bill
                        payment service. ... We 
                        are building an ecosystem to enable people to digitally send and receive money, and creating simple financial access for everyone.
                   
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Ensure avaliable bill amount is avaliable (only avaliable in USA)</h5>
                                        
                     
                    
                    
                                        <form class="">
                                           
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Choose Your State in USA</label>
                                            <select name ="rstate" class="form-control" >            
                          <option value="">Choose your State in United States</option>
<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option>
<option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option>
<option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option>
<option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option>
<option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option>
                          </select>
                                            </div>
                                            
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Receiving Institution</label>
                                            <select name ="rbname" class="form-control" required >            
                                                        <option value="">Select Receiving Institution</option>
                                                        <option value="DSTV">TV Subscription</option>
                                                        <option value="Electricity Bills">Electricity Bills</option>
                                                        <option value="House Rent">Hosue Rent Renewal</option>
                                                        <option value="Tax Payment and Revenue">Tax Payment and Revenue</option>
                                                        <option value="Tuition Fee">Tuition Fee</option>
                                                        <option value="Flight Booking Charges">Flight Booking Charges</option>
                                                        <option value="Loan Repayment">Loan Repayment</option>
                                                        
 
                    				            </select> 
                                            </div>
                                            
                                             <div class="position-relative form-group"><label for="exampleAddress2" class="">Amount to Deposit (EUR):</label>
                                    <input  name="amt" class="form-control"  id="amt" Placeholder="Amount to deposit" required>
                                            </div>
                                           
                                            
                                            
                                            <button name="submitButton" id="submitButton" type="submit" class="mt-2 btn btn-primary">
                                                
                                                <i class='fab fa-amazon-pay' style='font-size:30px;color:gold'></i>
                                                </button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
	                      

<?php include 'includes/footer.php'; ?>  