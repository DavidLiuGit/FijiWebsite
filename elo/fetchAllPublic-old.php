<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FetchAllPublic</title>
</head>

<body>

	<!--
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
</body>
</html>