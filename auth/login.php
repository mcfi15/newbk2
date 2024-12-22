<?php 

session_start();

error_reporting(0);

require('secure/connectdb.php');
require_once 'secure/class.user.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
        <strong>Sorry! Your Account Is Not Yet Active. You will be redirected in <span class = 'c' id = '5'></span> seconds!</strong>

        </div>";
        $_SESSION['temp'] = $acc_no;
        header( "refresh:5;url=login" );

    }
    else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $_SESSION['temp'] = $acc_no;
   // Redirect user to index
        //header("Location: 2fa");
        echo "<script> location.href='2fa'; </script>";
        exit();
    }
}

include 'header.php'; 
?>

 <div class="top-login">
        <div class="container h-100">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <div class="shadow">
                    <div class="bg-light rounded">

                        <div class="pl-5 mt-2 py-3">
                            <a href="<?php echo $siteurl; ?>" class=" mb-0 d-flex align-items-center navbar-brand">

                                <i class='fa fa-home' style='font-size:35px;color:black; align-content: center;'></i>
                                

                            </a>
                        </div>


            <?php if (isset($msg)) { echo $msg; } ?>

                        <form class="px-4 pb-4 mt-2" action="#" method="POST">
                                                        <div class="form-group">
                                <label for="userid">Account Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend d-flex align-items-center justify-content-center">
                                        <span class="input-group-text fa fa-user text-purple" style="font-size: 1.5em;"></span>
                                    </div>
                                    <input type="text" name="acc_no" id="userid" class="form-control" value="" required>

                                </div>
                                <div class="span help-block text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label for="userid">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend d-flex align-items-center justify-content-center">
                                        <span class="input-group-text fa fa-lock text-purple" style="font-size: 1.5em;"></span>
                                    </div>
                                    <input type="password" name="upass" id="password" class="form-control" required>

                                </div>
                                <div class="span help-block text-danger"></div>
                            </div>

                            <div class="text-center my-4">
                                <button type="submit" name="login" class="btn btn-block btn-outline-purple rounded">Login</button>
                            </div>
                            <!-- <div class="my-1 mr-auto">
                                <a href="forgotpassword" class="text-purple">Forgot Password?</a>
                            </div> -->
                            <div class="my-1 mr-auto">
                                Don't have an account? <br /> <a href="register" class="text-purple"> Open an
                                    Account</a>
                            </div>
                             <!-- <div class="my-1 mr-auto">
                                <a href="https://grandsumban.online" class="text-purple">Back Home</a>
                            </div>  -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>