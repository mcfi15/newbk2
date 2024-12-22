<?php 
include 'includes/header.php';

if(!isset($_SESSION['success'])){
    
    header("Location: dashboard");

    exit(); 
}

if (isset($_POST['submitTelex'])) {

  $telex = trim($_POST['telex']);
  $telex = strip_tags($telex);
  $telex = htmlspecialchars($telex);

  if ($telex !== $row['telex_code']) {
    echo("<script>location.href = 'intl-transfer?telexerror';</script>");
    //$reg_user->redirect("intl-transfer?telexerror");
  } else{

    $rbname = $_SESSION['rbname'];
    $accno = $_SESSION['accno'];
    $bname = $_SESSION['bname'];
    $bemailadd = $_SESSION['bemailadd'];
    $swift = $_SESSION['swift'];
    $iban = $_SESSION['iban'];
    $routing = $_SESSION['routing'];
    $rstate = $_SESSION['rstate'];
    $amount = $_SESSION['amt'];
    $desc = $_SESSION['desc'];
    $dot = $_SESSION['dot'];
    $toption = $_SESSION['toption'];
    $saccno = $_SESSION['saccno'];

    $total_bal= $row['total_bal'];

    $currency= $row['currency'];
    $firstname= $row['firstname'];
    $acc_no= $row['acc_no'];

    $newBal = $total_bal - $amount;

    $TransQuery = $reg_user->runQuery("");
    $TransQuery->execute();

    $BalUpQuery = $reg_user->runQuery("UPDATE account SET total_bal = '$newBal' WHERE acc_no = '$saccno'");
    $BalUpQuery->execute();



    $messag = "

    ";


    $subject = "E-royal Credit Union";

    $reg_user->send_mail($email,$messag,$subject);

    echo("<script>location.href = 'success';</script>");
    $reg_user->redirect("sucess");
  }
}

unset($_SESSION['rbname']);
unset($_SESSION['accno']);
unset($_SESSION['bname']);
unset($_SESSION['bemailadd']);
unset($_SESSION['swift']);
unset($_SESSION['iban']);
unset($_SESSION['routing']);
unset($_SESSION['rstate']);
unset($_SESSION['amt']);
unset($_SESSION['desc']);
unset($_SESSION['dot']);
unset($_SESSION['toption']);
unset($_SESSION['saccno']);
unset($_SESSION['success']);


$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE acc_no = '$acc_no' ORDER BY id DESC LIMIT 1");
$temp->execute();
$rows = $temp->fetch(PDO::FETCH_ASSOC);

include 'includes/html.php';
?>


<script>
  var counter = 82;
  var c = 82;
  var i = setInterval(function () {
    $(".loading-page .counter h1").html(c + "%");
    $(".loading-page .counter hr").css("width", c + "%");

    counter++;
    c++;

    if (counter == 101) {
      clearInterval(i);

      var loader = document.getElementById("myname");
      loader.style.display = 'none';

      var cott = document.getElementById("cot");
      cott.style.display = 'block';
    }
  }, 500);

</script>

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
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100);
  * {
    box-sizing: border-box;
    margin: 0;
  }

  h1, p, h2, h3, h4, ul, li, div {
    margin: 0;
    padding: 0;
  }

/*body {
  padding: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: -webkit-box;
  display: flex;
  font-family: Roboto;
}*/

.loading-page {
  background: #0d0d0d;
  /*width: 100vw;*/
  /*height: 100vh;*/
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  align-items: center;
}
.loading-page .counter {
  text-align: center;
}
.loading-page .counter p {
  font-size: 25px;
  font-weight: 100;
  color: #f60d54;
}
.loading-page .counter h1 {
  color: white;
  font-size: 30px;
  margin-top: -10px;
}
.loading-page .counter hr {
  background: #f60d54;
  border: none;
  height: 1px;
}
.loading-page .counter {
  position: relative;
  width: 200px;
}
.loading-page .counter h1.abs {
  position: absolute;
  top: 0;
  width: 100%;
}
.loading-page .counter .color {
  width: 0px;
  overflow: hidden;
  color: #f60d54;
}

</style> 

<div class="loading-page" id="myname">
  <div class="counter">
    <p>Transfer Progress</p>
    <h1>82%</h1>
    <hr/>
  </div>
</div>

<div id="cot" style="display: none;">

  <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="main-card mb-3 card">
      <div class="card-body">

        <div class="text-center">
          <h3 class="m-b-0" ><b style="color:#fff00;">Transfer Successful</b> </h3><br>
          
          <img src="success.gif" alt="" width="100" height="100" />
          <p>International transfer will take 2-3 days to be processed and sent.</p>
          
            <h4 class=""><b style="">Amount Transfered</b></h4>
                    <div class=" "> <h5><?php echo $row['currency']?><?php echo number_format($rows['amount'], 2)?></h5></div>
                    
            <h4 class=""><b style="">Beneficiary</b></h4>
                    <div class=" "><h5><?php echo $rows['bname']; ?> - <?php echo $rows['rbname']; ?> - [<?php echo $rows['accno']?>]</h5></div>
                    
            <h4 class=""><b style="">Balance</b></h4>
                    <div class=""><h5><?php echo $row['currency']; ?><?php echo number_format($row['total_bal'], 2); ?></h5></div>
                    
            <a href="print" class="btn btn-success">Print Receipt</a>
          
         

        </div>
        
      </div>
    </div>


  </div>

</div>

</div>


<?php include 'includes/footer.php'; ?>  