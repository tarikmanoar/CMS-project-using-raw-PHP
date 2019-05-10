<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/dbconn.php" ?>
<?php include "function.php" ?>
<?php 
    if (!$_SESSION['username']) {
        header("location: ../index.php");
    }
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] !== 'Admin') {
            header("location: ../index.php");
        }
    }


 ?>
<html lang="en">

<head>
    <style>
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(images/cube.gif) center no-repeat #fff;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--     <link href="css/loader.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- google charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
        <!-- jQuery -->
    <script src="js/jquery.js"></script>



</head>

<body>
<!-- Paste this code after body tag -->
    <div class="se-pre-con"></div>
    <div id="wrapper">