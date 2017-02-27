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

	echo "Data received: " . $idA1 . "," . $idB1 . ", winnerA: " .$winA;

	// initiaalize connection details
	$servername = "127.0.0.1";       	// localhost - server that runs this PHP file also has MySQL db
    $username = "tournamentAdmin";      // provide username
    $password = "prophet";             	// provide password
    $myDB = "tournamentDB";

	// create connection
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=$myDB", $username, $password);

        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo " Connected successfully";
    }
    catch(PDOException $e){
        echo " Connection failed: " . $e->getMessage();
    }

	// get current ELO score of players in match
    $stmt = $conn->prepare("SELECT elo FROM tournament WHERE id=:playerID");
    $stmt->bindParam(':playerID', $idA1);
	try{
		$id = $idA1;						// player A1
		$stmt->execute();
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			//echo " Query executed:". $row . " " . $row['elo'];
			$eloA1 = $row['elo'];
			$id = $idB1;					// player B1
		}

		$stmt->execute();
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloB1 = $row['elo'];
			$id = $idA2;					// player A2
		}

		$stmt->execute();
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloA2 = $row['elo'];
			$id = $idB2;					// player B2
		}

		$stmt->execute();
		if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$eloB2 = $row['elo'];
		}
	} catch ( PDOException $e ) {
		echo "Score query unsuccesful!";
	}



	// compute average score for each team
	$eloA = ($idA1 && $idA2) ? ($eloA1+$eloA2)/2 : $eloA1;
	$eloB = ($idB1 && $idB2) ? ($eloB1+$eloB2)/2 : $eloB1;

	// compute expected: E = 1 / ( 1 + 10 ^ ( (R_opp - R_myTeam) / 400 ) )

	$E_a = 1 / ( 1 + pow ( 10, ($eloB - $eloA) / 400 ) );
	$E_b = 1 / ( 1 + pow ( 10, ($eloA - $eloB) / 400 ) );
	//echo " Expected:" . $E_a . "," . $E_b;


	// compute delta for each team: k ( S + E ),	where k is a constant defined below; S = { 1 for win, 0 for loss }
	// WolframAlpha chart: plot 50(1- (1/(1+10^(x/400)))), 50(0- (1/(1+10^(x/400)))) for x = [-500,500] 				for k = 50
	$k = 50;
	$d_A = $k * ( (($winA) ? 1 : 0) - $E_a );
	$d_B = $k * ( (($winA) ? 0 : 1) - $E_b );
	echo " Deltas:" . $d_A . "," . $d_B;

	// compute new scores for each individual player
	$newA1 = $eloA1 + $d_A;
	$newA2 = $eloA2 + $d_A;
	$newB1 = $eloB1 + $d_B;
	$newB2 = $eloB2 + $d_B;
	echo " newScores:" . $newA1 .",". $newB1;

	$conn = null;

?>
}
