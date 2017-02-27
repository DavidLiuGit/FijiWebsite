<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

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
			// attributes: id, name, elo, matches, nickname
            $stmt = $conn->prepare("SELECT * FROM tournament ORDER BY elo desc, id asc"); // fetch from tournament table
            //echo "Query prepared<br>";
            $stmt->execute();
            //echo "Executing query...<br>";

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // set the resulting array to associative

			$outp = "";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   				//echo $row['First_Name'] . ' ' . $row['Surname'] . "\n";
   				if ($outp != "" ){$outp .= "," ;}
				$outp .= '{"id":"'  . $row["id"] . '",';
    			$outp .= '"name":"'   . $row["name"]        . '",';
				$outp .= '"elo":"'   . $row["elo"]        . '",';
				$outp .= '"matches":"'   . $row["matches"]        . '",';
    			$outp .= '"nickname":"'. $row["nickname"]     . '"}';
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
