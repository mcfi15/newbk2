<?php  //Start the Session


session_start();


error_reporting(E_ALL);

require('connectdb.php');
require_once 'class.user.php';

$reg_user = new USER();


$code = mt_rand(1000,9999);

//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['acc_no']) and isset($_POST['upass'])){
//3.1.1 Assigning posted values to variables.

	$acc_no = $_POST['acc_no'];
	$upass = $_POST['upass'];
	// $upass = md5($upass);
//3.1.2 Checking the values are existing in the database or not
	$query = "SELECT * FROM account WHERE acc_no='$acc_no' and password='$upass'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);


	$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	$log = $reg_user->runQuery("UPDATE account SET logins = logins + 1 WHERE '$acc_no'");
	$log->execute();


	$status = $row['status'];
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
	if ($count == 0){
		$msg = "<div class='alert alert-danger'>
		<button class='close' data-dismiss='alert'>&times;</button>
		Invalid Account No or Password!

		</div>";
	}
	elseif($status == 'Disabled'){
		$msg = "<div class='alert alert-danger'>
		<button class='close' data-dismiss='alert'>&times;</button>
		<strong>Sorry! Your Account Has Been Disabled For Violation of Our Terms!</strong>

		</div>";
	}
	elseif($status == 'Closed'){
		$msg = "<div class='alert alert-danger'>
		<button class='close' data-dismiss='alert'>&times;</button>
		<strong>Sorry! That Account No Longer Exist!</strong>

		</div>";
	}
	elseif($status == 'Pending'){
		$msg = "<div class='alert alert-danger'>
		<button class='close' data-dismiss='alert'>&times;</button>
		<strong>Sorry! Your Account Is Not Yet Active. You will be redirected in <span class = 'c' id = '5'></span> secounds to verify your Account!</strong>

		</div>";
		$_SESSION['email'] = $acc_no;
		header( "refresh:5;url=verify" );

	}
	else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
		$_SESSION['temp'] = $acc_no;
   // Redirect user to index
		header("Location: customer_2fa");
		exit();
	}
}
//3.1.4 if the user is logged in Greets the user with message

//3.2 When the user visits the page first time, simple login form will be displayed.
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Login  <?php echo $sitename; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Custom Theme files -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<script src="https://kit.fontawesome.com/128925c979.js" crossorigin="anonymous"></script>
	<!-- //web font -->

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
<body style="background-image: url('assets/images/img-01.jpg'); background-repeat: no-repeat;">


	<center><h1><img src="assets/images/logon.png" width="400"></h1>
	</center>
	<div class="main-agileits">
		<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2>Online Banking login</h2>
			<br>
			<?php if (isset($msg)) { echo $msg; } ?>
			<form action="" method="post">

				&nbsp;  
				<br>

				<div class="form-sub-w3">
					Account Number
					<input type="text" name="acc_no"  placeholder="User ID " required />
					<div class="icon-w3">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
				</div>
				<div class="form-sub-w3">
					Account Password
					<input type="password" name="upass" placeholder="Password" required />
					<div class="icon-w3">
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
					</div>
				</div>

				<div class="submit-w3l">
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
		<!--//form-ends-here-->
	</div>

	<!-- copyright -->
	<div class="copyright w3-agile">
		<p>All rights reserved © 2024</p>
	</div>
	<!-- //copyright --> 
	<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
	<script src="assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
			$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

	<?php include "includes/crips.php"; ?>


</body>
</html>
