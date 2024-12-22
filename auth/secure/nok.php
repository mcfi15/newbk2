<?php 
include 'includes/header.php';
include 'includes/html.php';
 ?>          
        
						
  
	   <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>Next of Kin Information</span>
                                </a>
                            </li>
                           
                        </ul>                   
	                      
	                      <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Next of Kin Personal Information</h5>
                                        <form class="">
                                           
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Next of Kin Legal Name</label>
                                            <input name="address" id="exampleAddress" value="Andrea Bocelli" type="text" class="form-control" readonly></div>
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Next of Kin Occupation</label>
                                            <input name="address2" id="exampleAddress2" value="musician and instrumentalist" type="text" class="form-control" readonly>
                                            </div>
                                           
                                            
                                            
                                            <!-- <button class="mt-2 btn btn-primary">Update</button> -->
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>


<?php include 'includes/footer.php'; ?>  