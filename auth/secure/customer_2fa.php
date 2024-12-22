<?php  //Start the Session

session_start();

 require('connectdb.php');
 require_once 'class.user.php';
 
 $reg_user = new USER();


if (isset($_POST['verify'])){
//3.1.1 Assigning posted values to variables.

$acc_no = $_SESSION['temp'];
$code = $_POST['accpin'];

//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM account WHERE acc_no='$acc_no' and pin='$code'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count > 0){
	
	session_unset($_SESSION['temp']);
	
	$_SESSION['acc_no'] = $acc_no;
	$_SESSION['mail'] = "mail";
   // Redirect user to index
	    header("Location: dashboard");
} else{
	$msg = "<div class='alert-danger'>
						<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
						  Incorrect Account Pin!
                   
			  </div>";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>PIN Validation <?php echo $sitename; ?></title>
	<META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW"> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--================================only from digital forest team==================================-->	
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">

	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--================================only from Digital Forest Team==================================-->

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style type="text/css">
	.alert {
      padding: 20px;
      background-color: orange;
      color: white;
  }

  .alert-danger {
      padding: 20px;
      background-color: red;
      color: white;
  }

  .alert-success {
      padding: 20px;
      background-color: green;
      color: white;
  }

  .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
  }

  .closebtn:hover {
      color: black;
  }
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('digital_forest_team_assets/images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="" method="post" enctype="multipart/form-data" id="acclogin">
				 

					<span class="login100-form-title p-t-20 p-b-45">
					 <i class='fas fa-landmark' style='font-size:80px;color:gold'></i>
						<!-- <img src="assets/images/favicon.ico" alt=""> -->
					</span>

				 &nbsp;	
				 			 
				  <div class="wrap-input100 validate-input m-b-10" data-validate = "Bank Account No">
						<?php if (isset($msg)) {
				echo $msg;
			} ?>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="accpin" id="accpin" placeholder="Transaction PIN" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" name="verify">
							 <i class='fas fa-comment-dollar' style='font-size:20px;color:gold'></i> &nbsp;&nbsp;Login Now
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="customer_login.html" class="txt1">
							<i class='fas fa-user-edit' style='font-size:20px;color:white'></i> &nbsp;&nbsp; Back to Login
						</a>
					</div>
 
				</form>
			</div>
		</div>
	</div>
	


<?php include "includes/crips.php"; ?>