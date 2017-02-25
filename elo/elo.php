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

<div style="margin:40px auto; max-width:95%">

<?php
    echo "<table style='border: solid 1px black; margin:0 auto'>";
    echo "<tr><th>Id</th><th>Name</th><th>ELO</th><th>matches</th><th>nickname</th></tr>";

    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
    }
    }
    $servername = "127.0.0.1";       // or the server/domain name
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
		$stmt = $conn->prepare("SELECT * FROM tournament"); // fetch all entries from tournament table
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
