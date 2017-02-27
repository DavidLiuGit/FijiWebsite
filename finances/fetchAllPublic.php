<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "127.0.0.1";       	// or the server/domain name
    $username = "public";               // provide username
    $password = "123456";             	// provide password
    $myDB = "financesDB";

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
		// attributes: id, name, elo, matches, nickname
        $stmt = $conn->prepare("SELECT * FROM finances ORDER BY id ASC"); // fetch from tournament table
        //echo "Query prepared<br>";
        $stmt->execute();
        //echo "Executing query...<br>";

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // set the resulting array to associative

        // prepare JSON; echo data
		$outp = "";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			//echo $row['First_Name'] . ' ' . $row['Surname'] . "\n";
			if ($outp != "" ){$outp .= "," ;}
			$outp .= '{"id":"'  . $row["ID"] . '",';
			$outp .= '"name":"'   . $row["Customer"]        . '",';
			$outp .= '"company":"'   . $row["Company"]        . '",';
			$outp .= '"address":"'   . $row["Address"]        . '",';
			$outp .= '"phone":"'   . $row["Phone"]        . '",';
			$outp .= '"email":"'   . $row["Email"]        . '",';
			$outp .= '"attachment":"'   . $row["Attachments"]        . '",';
			$outp .= '"currency":"'   . $row["Currency"]        . '",';
			$outp .= '"open_balance":"'   . $row["Open_Balance"]        . '",';
			$outp .= '"notes":"'   . $row["Notes"]        . '",';
			$outp .= '"undergrad":"'. $row["undergrad"]     . '"}';
		}

		$outp ='{"records":['.$outp.']}';

		echo ($outp);
		return json_encode($outp);
    } catch (PDOException $e){
        echo "Error while executing query: " . $stmt . "<br>" . $e->getMessage();
    }


    $conn = null;				// close the connection
    //echo "</table>";
?>
