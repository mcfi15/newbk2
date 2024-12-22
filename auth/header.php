<?php include('../../functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/reg_style.css?version2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" integrity="sha512-77kidyGDJGWWmJ0MVO0CRp+6nRgZRK67frUVBRvnL1zCcmcw9FkCQxpDHq52SebW+KWTAnnuX0Qk2/MQWogWoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo $sitename; ?> - Secure Portal</title>
</head>

<body>
     

    <div id="overlayer"></div>
 <div class="loader">
     <div class="loadingio-spinner-double-ring-kl1ac9u3aco">
         <div class="ldio-qf2q7ibdt8">
             <div></div>
             <div></div>
             <div>
                 <div></div>
             </div>
             <div>
                 <div></div>
             </div>
         </div>
     </div> 
     <style type="text/css">
     @keyframes ldio-qf2q7ibdt8 {
         0% {
             transform: rotate(0)
         }

         100% {
             transform: rotate(360deg)
         }
     }

     .ldio-qf2q7ibdt8 div {
         box-sizing: border-box !important
     }

     .ldio-qf2q7ibdt8>div {
         position: absolute;
         width: 72px;
         height: 72px;
         top: 14px;
         left: 14px;
         border-radius: 50%;
         border: 8px solid #000;
         border-color: #6f42c1 transparent #6f42c1 transparent;
         animation: ldio-qf2q7ibdt8 1s linear infinite;
     }

     .ldio-qf2q7ibdt8>div:nth-child(2),
     .ldio-qf2q7ibdt8>div:nth-child(4) {
         width: 54px;
         height: 54px;
         top: 23px;
         left: 23px;
         animation: ldio-qf2q7ibdt8 1s linear infinite reverse;
     }

     .ldio-qf2q7ibdt8>div:nth-child(2) {
         border-color: transparent #826af8 transparent #826af8
     }

     .ldio-qf2q7ibdt8>div:nth-child(3) {
         border-color: transparent
     }

     .ldio-qf2q7ibdt8>div:nth-child(3) div {
         position: absolute;
         width: 100%;
         height: 100%;
         transform: rotate(45deg);
     }

     .ldio-qf2q7ibdt8>div:nth-child(3) div:before,
     .ldio-qf2q7ibdt8>div:nth-child(3) div:after {
         content: "";
         display: block;
         position: absolute;
         width: 8px;
         height: 8px;
         top: -8px;
         left: 24px;
         background: #6f42c1;
         border-radius: 50%;
         box-shadow: 0 64px 0 0 #6f42c1;
     }

     .ldio-qf2q7ibdt8>div:nth-child(3) div:after {
         left: -8px;
         top: 24px;
         box-shadow: 64px 0 0 0 #6f42c1;
     }

     .ldio-qf2q7ibdt8>div:nth-child(4) {
         border-color: transparent;
     }

     .ldio-qf2q7ibdt8>div:nth-child(4) div {
         position: absolute;
         width: 100%;
         height: 100%;
         transform: rotate(45deg);
     }

     .ldio-qf2q7ibdt8>div:nth-child(4) div:before,
     .ldio-qf2q7ibdt8>div:nth-child(4) div:after {
         content: "";
         display: block;
         position: absolute;
         width: 8px;
         height: 8px;
         top: -8px;
         left: 15px;
         background: #826af8;
         border-radius: 50%;
         box-shadow: 0 46px 0 0 #826af8;
     }

     .ldio-qf2q7ibdt8>div:nth-child(4) div:after {
         left: -8px;
         top: 15px;
         box-shadow: 46px 0 0 0 #826af8;
     }

     .loadingio-spinner-double-ring-kl1ac9u3aco {
         width: 98px;
         height: 98px;
         display: inline-block;
         overflow: hidden;
         background: #ffffff;
     }

     .ldio-qf2q7ibdt8 {
         width: 100%;
         height: 100%;
         position: relative;
         transform: translateZ(0) scale(0.98);
         backface-visibility: hidden;
         transform-origin: 0 0;
         /* see note above */
     }

     .ldio-qf2q7ibdt8 div {
         box-sizing: content-box;
     }

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

  .text-blu{
    color: #085454;
  }
     </style>
 </div>    