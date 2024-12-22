<?php 
include 'includes/header.php'; 

include 'includes/html.php'; 
?>      
						
						
						  
	   <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>Customer Bio Data</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                    <span>Contact Details</span>
                                </a>
                            </li>
                        </ul>                   
	                      
	                      <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Personal Information</h5>

                                        <div class="img--wrapper" style="text-align:center;">

                                            <!--<img src="admin/foto/<?php //echo $row['image'] ?>" class="image--cover">-->
                                      </div>
                                        <form class="">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class="">Legal Name</label>
                                                    <input name="email" id="exampleEmail11" value="<?php echo $row['firstname']." ".$row['lastname']; ?>" type="email" class="form-control" readonly>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="examplePassword11" class="">Date of Birth</label>
                                                    <input name="text" id="examplePassword11" value="<?php echo $row['dob']; ?>" type="text"class="form-control" readonly>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Email Address</label>
                                            <input name="address" id="exampleAddress" value="<?php echo $row['email']; ?>" type="text" class="form-control" readonly></div>
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Mobile Number</label>
                                            <input name="address2" id="exampleAddress2" value="<?php echo $row['phone']; ?>" type="text" class="form-control" readonly>
                                            </div>
                                           
                                            
                                            
                                            <!-- <button class="mt-2 btn btn-primary">Update</button> -->
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">My Contact Details</h5>
                                        <form class="">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-10"><input name="email" id="exampleEmail" value="<?php echo $row['city']; ?>" type="email" class="form-control" readonly></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-10"><input name="password" id="examplePassword" value="<?php echo $row['state']; ?>" type="text" class="form-control" readonly></div>
                                            </div>
                                             <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Home Address</label>
                                                <div class="col-sm-10"><input name="email" id="exampleEmail" value="<?php echo $row['address']; ?>" type="email" class="form-control" readonly></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Country of Origin</label>
                                                <div class="col-sm-10"><input name="password" id="examplePassword" value="<?php echo $row['country']; ?>" type="text" class="form-control" readonly></div>
                                            </div>
                                            
                                          
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php include 'includes/footer.php'; ?>