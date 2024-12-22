<?php  //Start the Session

session_start();

require('secure/connectdb.php');
require_once 'secure/class.user.php';

$reg_user = new USER();


if (isset($_POST['verify'])){
//3.1.1 Assigning posted values to variables.

  $acc_no = $_SESSION['temp'];
  $code = $_POST['code'];
  //$status = "Active";

//3.1.2 Checking the values are existing in the database or not
  
  $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no='$acc_no' and code='$code'");
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $status = $row['status'];


  if ($stmt->rowCount() > 0){

    // $stmt = $reg_user->runQuery("UPDATE account SET status = '$status' WHERE acc_no='$acc_no'");
    // $stmt->execute();
    header('Location: application_success');
    exit();

      // $msg = "
      //       <div class='alert-success'>
      //         <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
      //         <strong>Congrats! Account Verified Successfully. <br>
      //         Please note that your account will be activated automatically and your login details sent to your email address. <br>
      //         You can now proceed to <a href='login'> Login</a> Page.</strong>
      //     </div>";


}}

include 'header.php'; 
?>
<script type="text/javascript">
        (function (global) {

        if(typeof (global) === "undefined")
        {
            throw new Error("window is undefined");
        }

        var _hash = "!";
        var noBackPlease = function () {
            global.location.href += "#";

            // making sure we have the fruit available for juice....
            // 50 milliseconds for just once do not cost much (^__^)
            global.setTimeout(function () {
                global.location.href += "!";
            }, 50);
        };
        
        // Earlier we had setInerval here....
        global.onhashchange = function () {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };

        global.onload = function () {
            
            noBackPlease();

            // disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function (e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                    e.preventDefault();
                }
                // stopping event bubbling up the DOM tree..
                e.stopPropagation();
            };
            
        };

        })(window);
    </script>
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
<div>
                                <?php
                            if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        } ?>
                    </div>
                        
            <?php if (isset($msg)) { echo $msg; } ?>
            

                        <form class="px-4 pb-4 mt-2" action="#" method="POST">

                            <div class="form-group">
                                <label for="userid">Verification Code</label>
                                <div class="input-group">
                                    <div class="input-group-prepend d-flex align-items-center justify-content-center">
                                        <span class="input-group-text fa fa-lock text-purple" style="font-size: 1.5em;"></span>
                                    </div>
                                    <input type="text" name="code" id="password" class="form-control" required>

                                </div>
                                <div class="span help-block text-danger"></div>
                            </div>

                            <div class="text-center my-4">
                                <button type="submit" name="verify" class="btn btn-block btn-outline-purple rounded">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>