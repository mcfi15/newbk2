<?php 
include 'includes/header.php';

if (isset($_POST['submitButton'])) {

	$oldPass = trim($_POST['oldPass']);
	$oldPass = strip_tags($oldPass);
	$oldPass = htmlspecialchars($oldPass);

	$newPass = trim($_POST['newPass']);
	$newPass = strip_tags($newPass);
	$newPass = htmlspecialchars($newPass);

	$cPass = trim($_POST['cPass']);
	$cPass = strip_tags($cPass);
	$cPass = htmlspecialchars($cPass);

	if ($oldPass !== $row['password']) {
		$msg = "<div class='alert-danger'>
		<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
		<strong>Wrong Current Password!</strong>
		</div>";
	} else if ($newPass !== $cPass) { 
		$msg = "<div class='alert-danger'>
		<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
		<strong>New Password and Comfirm Password does not match!</strong>
		</div>";
	} else{

		$stmtPin = $reg_user->runQuery("UPDATE account SET password = '$newPass' WHERE acc_no = '$acc_no'");

		if ($stmtPin->execute()) {
			$msg = "<div class='alert'>
			<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
			<strong>Success!</strong> Password Changed Successfully
			</div>";
		}

	}

} 

include 'includes/html.php'; 
?>  




<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
			<span>  <i class='fas fa-user-secret' style='font-size:20px;color:gold'></i>  Modify Your Password</span>
		</a>
	</li>

</ul>                   

<div class="tab-content">

	Dear Customer, kindly use the below form to change your Account Password, 
	If you feel that you have a weaker strength password, then please change it. We recommend to change your password in
	every 45 days to make it secure.
	<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Account Password</h5>


				<form action="" method="post">

					<div class="position-relative form-group"><label for="exampleAddress" class="">Current Account Password</label>
						<span id="sprypwd">
							<input type="text" class="form-control" style="height:40px; background-color:white;"  name="oldPass"/>
							<br/>
							<span class="textfieldRequiredMsg">required.</span>
							<span class="textfieldMinCharsMsg">min of 6 characters.</span>
							<span class="textfieldMaxCharsMsg">max of 10 characters.</span>
							<span class="textfieldInvalidFormatMsg">must be strong.</span>
						</span>

					</div>

					<div class="position-relative form-group"><label for="exampleAddress" class="">New Account Password</label>
						<span id="sprypwd">
							<input type="text" class="form-control" style="height:40px; background-color:white;"  name="newPass"/>
							<br/>
							<span class="textfieldRequiredMsg">required.</span>
							<span class="textfieldMinCharsMsg">min of 6 characters.</span>
							<span class="textfieldMaxCharsMsg">max of 10 characters.</span>
							<span class="textfieldInvalidFormatMsg">must be strong.</span>
						</span>

					</div>


					<div class="position-relative form-group"><label for="exampleAddress2" class="">Repeat New Account Password</label>
						<span id="sprycpwd" >
							<input type="text"  name="cPass" class="form-control" style="height:40px; background-color:white; "   />
							<br/>
							<span class="confirmRequiredMsg">Password required.</span>
							<span class="textfieldRequiredMsg">Account required.</span>
							<span class="confirmInvalidMsg">values don't match</span>
						</span>
					</div>



					<button name="submitButton" type="submit"  id="submitButton" class="mt-2 btn btn-primary">
						<i class='fas fa-user-secret' style='font-size:20px;color:gold'></i> Change</button>
					</form>
				</div>
			</div>

		</div>

	</div>


	<script type="text/javascript">
		<!--
//Password
var sprypass1 = new Spry.Widget.ValidationPassword("sprypwd", {minChars:6, maxChars: 12, validateOn:["blur", "change"]});
//Confirm Password
var spryconf1 = new Spry.Widget.ValidationConfirm("sprycpwd", "sprypwd", {minChars:6, maxChars: 12, validateOn:["blur", "change"]});
//-->
</script>


<?php include 'includes/footer.php'; ?>  