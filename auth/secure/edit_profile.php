<?php 
include 'includes/header.php';

include 'includes/html.php';
?>

<div>
                                <?php
                            if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        } ?>
                    </div>

 <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>  <i class='fas fa-lock-open' style='font-size:30px;color:gold'></i>   Edit Profile</span>
                                </a>
                            </li>
                           
                        </ul>                   
	                      
	                      <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Please treat as confidential</h5>
                                        <form class="" action="process" method="post">
                                           
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">First Name </label>
                                            <input name="fname" id="exampleAddress" value="<?php echo $row['firstname']; ?>" type="text" class="form-control" ></div>
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Last Name</label>
                                            <input name="lname" id="exampleAddress2" value="<?php echo $row['lastname']; ?>" type="text" class="form-control" >
                                            </div>

                                            <input type="hidden" name="acc_no" value="<?php echo $acc_no ?>">
                                            
                                             <div class="position-relative form-group"><label for="exampleAddress" class="">Email Address </label>
                                            <input name="email" id="exampleAddress" value="<?php echo $row['email']; ?>" type="text" class="form-control" ></div>
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Phone</label>
                                            <input name="phone" id="exampleAddress2" value="<?php echo $row['phone']; ?>" type="text" class="form-control" >
                                            </div>

                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Date of Birth</label>
                                            <input name="dob" id="exampleAddress2" value="<?php echo $row['dob']; ?>" type="date" class="form-control" >
                                            </div>
                                            
                                            <button name="update_profile" id="submitButton" type="submit" class="mt-2 btn btn-primary">
                                            <i class='fas fa-globe' style='font-size:24px;color:orange'></i>&nbsp;
                                            Update Profile ></button>
                                            
                                             
                                           
                                            
                                            
                                            <!-- <button class="mt-2 btn btn-primary">None Editable By User</button> -->
                                        </form>

                                        <br>

                                        <form class="" action="process" method="post" enctype="multipart/form-data">
                                           
                                            <img src="img/<?php echo $row['image']; ?>" alt="" style="height:150px; width: 150px; border-radius: 5px;">

                                            <input type="hidden" name="acc_no" value="<?php echo $acc_no ?>">
                                            
                                            
                                            <div class="position-relative form-group"><label for="exampleAddress2" class="">Upload Image</label>
                                            <input name="image" id="exampleAddress2" type="file" class="form-control" >
                                            </div>
                                            
                                            <button name="update_image" id="submitButton" type="submit" class="mt-2 btn btn-primary">
                                            <i class='fas fa-globe' style='font-size:24px;color:orange'></i>&nbsp;
                                            Update Image ></button>
                                            
                                             
                                           
                                            
                                            
                                            <!-- <button class="mt-2 btn btn-primary">None Editable By User</button> -->
                                        </form>
                                    </div>
                                </div>
                                
    </div>
</table>
 						
						
                
<?php include 'includes/footer.php'; ?>  