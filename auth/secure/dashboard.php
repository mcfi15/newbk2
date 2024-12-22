<?php 
include 'includes/header.php';
include 'includes/html.php';


function getVisIpAddr() {
      
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
  
// Store the IP address
$vis_ip = getVisIPAddr();
  
$ip = $vis_ip;
  
// Use JSON encoded string and converts
// it into a PHP variable
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));
   
// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
// echo 'City Name: ' . $ipdat->geoplugin_city . "\n";
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
// echo 'Timezone: ' . $ipdat->geoplugin_timezone;
?>          

<div class="row">


   <div class="col-md-6 col-xl-4">

    <div class="card mb-3 widget-content bg-grow-early" >
        <div class="widget-content-wrapper text-white" style="height: 150px; padding-bottom: rem;">
           
            <div class="widget-content-left pl-10">
                <img src="img/<?php echo $row['image']; ?>" alt="" style="height: 100px;width:100px;border-radius:50px;">                
            </div>
            <div class="widget-content-right p-2">
                <div class="widget-heading">Avaliable Balance</div>
                <div class="widget-numbers text-white">
                    <span style="font-size:25px;"><?php echo $row['currency']; ?> <?php echo number_format($row['total_bal'], 2); ?></span>
                </div>
                
                <div class="widget-heading"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
                
                <br>
                
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content bg-arielle-smile">
        <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
                <div class="widget-heading">Legder Balance</div>
            </div>
            <div class="widget-content-right">
                <div class="widget-numbers text-white"><span><?php echo $row['currency']; ?> <?php echo number_format($row['ledger_bal'], 2); ?></span></div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
   <!-- <div class="card mb-3 widget-content bg-midnight-bloom">
    <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
            <div class="widget-heading">Card Balance</div>
            <div class="widget-subheading">ATM only</div>
        </div>
        <div class="widget-content-right">
            <div class="widget-numbers text-white"><span><?php //echo $row['currency']; ?> <?php //echo number_format($row['card_bal'], 2); ?></span></div>
        </div>
    </div>
   </div> -->
   <div class="card mb-3 widget-content bg-premium-dark">
        <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
                <div class="widget-heading">Loan Balance</div>
                <div class="widget-subheading">Avaliable </div>
            </div>
            <div class="widget-content-right">
                <div class="widget-numbers text-warning"><span><?php echo $row['currency']; ?> <?php echo number_format($row['loan_bal'], 2); ?></span></div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-4">
    
</div>
</div>


<?php include 'includes/footer.php'; ?>