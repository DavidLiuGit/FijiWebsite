<?php
	//header("Content-Type: application/json; charset=UTF-8");

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	// load data from Angular HTTP post
	@$idA1 = $request->selA1;
	@$idA2 = $request->selA2;
	@$idB1 = $request->selB1;
	@$idB2 = $request->selB2;
	@$winA = $request->winnerA;

	echo "Data received: " . $idA1 . " " . $idB1 . ", winnerA: " .$winA;
	
	
	// get current scores of players
	$servername = "127.0.0.1";       	// localhost - server that runs this PHP file also has MySQL db
    $username = "tournamentAdmin";      // provide username
    $password = "prophet";             	// provide password
    $myDB = "tournamentDB";
	
	// create connection
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=myDB", $username, $password);

        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
	
    $stmt = $conn->prepare("SELECT elo FROM tournament WHERE id=:$playerID");		// get ELO
    $stmt->bindParam(':playerID', $id); 
	
	try{
		$id = $idA1;						// player A1
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloA1 = $row[0];
			$id = $idB1;					// player B1
		}
		
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloB1 = $row[0];
			$id = $idA2;					// player A2
		}
		
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloA2 = $row[0];
			$id = $idB2;					// player B2
		}
		
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloB2 = $row[0];
		}
	} catch ( PDOException $e ) {
		echo "Score query unsuccesful!";
	}
	
	echo "Scores fetched: " . $eloA1 . " " . $eloB1;
	
?>
