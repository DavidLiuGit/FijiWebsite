<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>ELO</title>

<link href="../css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../css/bootstrap-select.min.css">	<!-- Bootstrap select CSS -->

<script src="../js/jquery.1.8.3.min.js"></script>
<script src="../js/angular.min.js"></script>	<!-- Angular -->
<script src="../js/bootstrap-select.js"></script>
				

<style>		<!-- table style -->
	.eloTable table{
		border:none;
		border-collapse: collapse;
		max-width:95%;
	}
	.eloTable th{
		border: none;
	    text-align: left;
	    padding: 2px 8px;
	    margin-bottom: 3px;
		border-bottom: 2px solid #000000 !important;
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
		border: 1px solid #E2C3E5;
	}
	.matchForm{
		max-width:95%;
		margin: 20px auto;
		border: 1px solid #993399;
		border-radius: 25px;
		padding: 20px 20px;
	}

</style>

</head>
<body ng-app="eloModule">

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


<!-- NEW MATCH FORM -->
<div style="margin: 0 auto;"  ng-controller="formController as formCtrl">
	<form name="match" class="matchForm">

        <!-- drop-down list, for selecting player 1; -->
		<select name="singleSelect1" id="singleSelect" ng-model="formCtrl.selA1" 
        	class="selectpicker" data-live-search="true">		<!-- ng-model binds selected data to specified var -->
    		<option ng-repeat="p in persons" value="{{p.id}}">{{p.name}}</option>
		</select>
		<br>
        <!-- drop-down list, for selecting player 1; -->
		<select name="singleSelect2" id="singleSelect" ng-model="formCtrl.selB1" >		<!-- ng-model binds selected data to specified var -->
    		<option ng-repeat="p in persons" value="{{p.id}}">{{p.name}}</option>
		</select>
	</form>



	<!-- Ranking table -->
    <h1 style="text-align:center; padding-bottom:20px">Current Rankings</h1>
    <table class='eloTable' style='max-width:95%; margin: 0 auto;'>
    	<tr><th>Name</th><th>ELO</th><th>matches</th></tr>								<!-- table header -->
        <tr ng-repeat="p in persons">
        	<td>{{p.name}}</td><td>{{p.elo}}</td><td>{{p.matches}}</td>
        </tr>
    </table>
</div>


<script src="eloNG.js"></script>			<!-- elo AngularJS script -->


<div style="margin:40px auto; max-width:95%">

    

    <!-- fetched with PHP-PDO<->MySQL 
    <?php
        echo "<table class='eloTable' style='max-width:95%; margin: 0 auto;'>";
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
            $stmt = $conn->prepare("SELECT name, elo, matches FROM tournament ORDER BY elo,id"); // fetch from tournament table
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
	-->
</div>

</body>
</html>
