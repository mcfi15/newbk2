<?php  //Start the Session

session_start();
error_reporting(0);

 require('secure/connectdb.php');
 require_once 'secure/class.user.php';
 require_once 'functions.php';

 
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
    
    //session_unset($_SESSION['temp']);
    
    $_SESSION['acc_no'] = $acc_no;
    $_SESSION['mail'] = "mail";
   // Redirect user to index
        //header("Location: secure/dashboard");
        echo "<script> location.href='secure/dashboard'; </script>";
} else{
    $msg = "<div class='alert-danger'>
                        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                          Incorrect Account Pin!
                   
              </div>";
}
}

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

                        
            <?php if (isset($msg)) { echo $msg; } ?>

                        <form class="px-4 pb-4 mt-2" action="#" method="POST">

                            <div class="form-group">
                                <label for="userid">Account Pin</label>
                                <div class="input-group">
                                    <div class="input-group-prepend d-flex align-items-center justify-content-center">
                                        <span class="input-group-text fa fa-lock text-purple" style="font-size: 1.5em;"></span>
                                    </div>
                                    <input type="password" name="accpin" id="password" class="form-control" required>

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