<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>ELO</title>

<link href="../css/style.css" rel="stylesheet" type="text/css">

<script src="../js/angular.min.js"></script>	<!-- Angular -->

</head>

<body>
<nav class="main-nav-outer" id="test"><!--main-nav-start-->
	<div class="container">
        <ul class="main-nav">
        	<li><a href="../index.html">Home</a></li>
            <li><a href="#service">Chapter</a></li>
            <li><a href="#Portfolio">Events</a></li>
            <li class="small-logo"><a href="#header"><img src="../img/FijiShieldLogo.png" alt="" width="100" height="105"></a></li>
            <li><a href="#client">Grads</a></li>
            <li><a href="#team">Fiji</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav>
<!--main-nav-end-->

<!-- main body begin -->

<!-- heading -->
<div style="margin:25px auto">
	<h1 style="text-align:center"> Welcome to the Fiji ELO System!</h1>
    <h3 style="text-align:center; color:#4F4F4F">For all your ranking needs</h3>
</div>

<?php
    $servername = "127.0.0.1";       // or the server/domain name
    $username = "public";               // provide username
    $password = "123456";             	// provide password

	// create connection
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=tournamentDB", $username, $password);

        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>

</body>
</html>
