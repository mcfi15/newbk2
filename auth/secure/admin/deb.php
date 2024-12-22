<?php
error_reporting(0);
session_start();
include_once ('session.php');
include_once ('../../functions.php');
if(!isset($_SESSION['email'])){
	
header("Location: login");

exit(); 
}

$db = mysqli_connect('localhost', 'scibonli_scib', 'ocw2U63Tj2', 'scibonli_sci') or die("Some error occurred during connection " . mysqli_error($db));  



    if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $amount = $_POST['amount'];
    $sender_name = $_POST['sender_name'];
    $remarks = $_POST['remarks'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "SELECT * FROM account WHERE acc_no = '$uname'";
    $query = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($query))
{
     $email = $row['email'];
      $name = $row['fname'];
      $tbal = $row['t_bal'];
      $abal = $row['a_bal'];
  }
     if($tbal < $amount && $abal < $amount)
    {
            echo "<script type='text/javascript'>alert('Insuficient Balance');</script>";
    }else{

         $sql = "SELECT * FROM account WHERE acc_no = '$uname'";
        $query = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($query)){

      $currency = $row['currency'];
      $acc = $row['acc_no'];
      $fname = $row['fname'];
      $mname = $row['mname'];
      $lname = $row['lname'];
      $email = $row['email'];
      $phone = $row['phone'];
      $tbal = $row['t_bal'];
      $abal = $row['a_bal'];
      $use = $row['uname'];
      $diffi = $tbal - $amount;
      $difi  = $abal - $amount;
      $type = 'Debit';
      $status = 'Succesful';

       $sql = "UPDATE account SET t_bal = '".$diffi."', a_bal = '".$difi."' WHERE acc_no = '".$uname."' "; 
         $resultt = mysqli_query($db, $sql);
        
    $querry = "INSERT INTO `alerts` (uname, amount, sender_name, type, remarks, date, status) 
  			  VALUES('$use', '$amount', '$sender_name', '$type', '$remarks', '$date', '$status')";
  	       $querryy = mysqli_query($db, $querry);
  	       
  	    $querryyy = "INSERT INTO `transfer` (uname, amount, sender_name, type, remarks, date, status) 
  			  VALUES('$use', '$amount', '$sender_name', '$type', '$remarks', '$date', '$status')";
  	       $querryyyy = mysqli_query($db, $querryyy);
  	     if(!$querryyyy){
  	          echo "<script type='text/javascript'>alert('Summary Not Added');</script>";
  	         }else{
  	             echo "<script type='text/javascript'>alert('Summary Added Successfully');</script>";
  	         } 
  	        
  	      if(!$querryy){
  	          echo "<script type='text/javascript'>alert('History Not Added');</script>";
  	         }else{
  	             echo "<script type='text/javascript'>alert('History Added Successfully');</script>";
  	         }
         if(!$resultt){ 

        echo "<script type='text/javascript'>alert('Account Debit Failed');</script>";
         }else{

        echo "<script type='text/javascript'>alert('Account Debited Successfully');</script>";
         }
          
}

         
        
      }

}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon">

    <!-- Title Page-->
    <title>Debit Account</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Debit Account</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Select Account</div>

      
                            <div class="value">
                            <select class="input--style-6" name="uname">
                              <?php
             $sql = "SELECT * FROM account";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
        ?>
                            <option value="<?php echo $row['acc_no']; ?>"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></option>
                            <?php } ?>  
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Amount</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="number" name="amount" placeholder="30,000.00">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Debit To</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="sender_name" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="remarks" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Time</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="time" name="time">
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="input-group">
                                    <input class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">
                                </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="index" class="btn btn-info" role="button">Home</a>
                </div>
            </div>
        </div>
    </div>

    <?php
   // mysql_free_result($result);
                            ?>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->