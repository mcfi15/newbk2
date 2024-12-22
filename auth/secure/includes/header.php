<?php
session_start();
include_once ('session.php');
require_once 'class.user.php';
require_once '../functions.php';
require_once 'mail.php';
if(!isset($_SESSION['acc_no'])){
    
    header("Location: ../login");

    exit(); 
}

$acc_no = $_SESSION['acc_no'];
$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];

$me = $row['firstname'];


$transCount = $reg_user->runQuery("SELECT * FROM transfer WHERE acc_no='$acc_no' AND mode = 'wire'");
$transCount->execute();
$numTransCount = $transCount->rowCount();

$stat = $row['status'];

// $temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
// $temp->execute(array(":acc_no"=>$_SESSION['acc_no']));
// $rows = $temp->fetch(PDO::FETCH_ASSOC);

