<?php 
session_start();
require_once 'class.admin.php';
$reg_user = new USER();


$stmtUser = $reg_user->runQuery("SELECT * FROM trading WHERE status = 'Active'");
$stmtUser->execute();

while ($rowm = $stmtUser->fetch(PDO::FETCH_ASSOC)) {

	$checkTime = strtotime("now");
	$newUpTime = strtotime("+12 hours");
	$uptime =$rowm['newDate'];
	$user =$rowm['user'];
	$id =$rowm['id'];
	$amount =$rowm['amount'];
	$profit =$rowm['profit'];

	$percentage = $rowm['intrest'];

	$getPercentage = ($percentage / 100) * $amount;

	$newProfit = $profit + $getPercentage;

	if ($uptime < $checkTime) {


		$sinal = $reg_user->runQuery("UPDATE trading SET newDate = '$checkTime', profit = '$newProfit' WHERE id = '$id'");
		$sinal->execute();
	}





} 






