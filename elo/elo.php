<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>ELO</title>

<link href="../css/style.css" rel="stylesheet" type="text/css">

<script src="../js/angular.min.js"></script>	<!-- Angular -->

<style>		<!-- table style -->
.eloTable{
	border:none;
	border-collapse: collapse;
	max-width:95%;
}
.eloTable th{
	border: none;
    text-align: left;
    padding: 8px;
	border-bottom: 1px #000000;
}
.eloTable td {
	width:30%;
	max-width:300px;
    border: none;
    text-align: left;
    padding: 8px;
}
.eloTable tr:nth-child(even) {
    background-color: #E2C3E5;
}
</style>

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

<div style="margin:40px auto; max-width:95%">

<?php
    echo "<table class='eloTable' style='max-width:95%; margin 0 auto;'>";
    echo "<tr><th>Name</th><th>ELO</th><th>matches</th></tr>";

    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
    }
    }
    $servername = "127.0.0.1";       	// or the server/domain name
    $username = "public";               // provide username
    $password = "123456";             	// provide password
    $myDB = "tournamentDB";

	// create connection
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=$myDB", $username, $password);

        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully<br>";
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

	try{
		// select - prepare a select statement
		//echo "Preparing query<br>";
		$stmt = $conn->prepare("SELECT name, elo, matches FROM tournament"); // fetch from tournament table
		//echo "Query prepared<br>";
		$stmt->execute();
		//echo "Executing query...<br>";

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // set the resulting array to associative

		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
	} catch (PDOException $e){
        echo "Error while executing query: " . $stmt . "<br>" . $e->getMessage();
    }

	$conn = null;				// close the connection
	echo "</table>";
?>

</div>

</body>
</html>
