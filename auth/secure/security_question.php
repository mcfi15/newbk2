<?php 
include 'includes/header.php';

include 'includes/html.php';
?>


 <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>  <i class='fas fa-lock-open' style='font-size:30px;color:gold'></i>   My Account Security Questions</span>
                                </a>
                            </li>
                           
                        </ul>                   
	                      
	                      <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Please treat as confidential</h5>
                                        <form class="">
                                           
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Question One </label>
                                            <input name="address" id="exampleAddress" value="<?php echo $row['q1']; ?>" type="text" class="form-control" readonly></div>
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Answered Data</label>
                                            <input name="address2" id="exampleAddress2" value="<?php echo $row['ans1']; ?>" type="text" class="form-control" readonly>
                                            </div>
                                            
                                             <div class="position-relative form-group"><label for="exampleAddress" class="">Question Two </label>
                                            <input name="address" id="exampleAddress" value="<?php echo $row['q2']; ?>" type="text" class="form-control" readonly></div>
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Answered Data</label>
                                            <input name="address2" id="exampleAddress2" value="<?php echo $row['ans2']; ?>" type="text" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Account PIN</label>
                                            <input name="address2" id="exampleAddress2" value="<?php echo $row['pin']; ?>" type="text" class="form-control" readonly>
                                            </div>
                                            
                                             
                                           
                                            
                                            
                                            <!-- <button class="mt-2 btn btn-primary">None Editable By User</button> -->
                                        </form>
                                    </div>
                                </div>
                                
    </div>
</table>
 						
						
                
<?php include 'includes/footer.php'; ?>  