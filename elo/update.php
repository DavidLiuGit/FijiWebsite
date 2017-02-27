<?php
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	// load data from Angular HTTP post
	@$idA1 = $request->selA1;
	@$idA2 = $request->selA2;
	@$idB1 = $request->selB1;
	@$idB2 = $request->selB2;
	@$winA = $request->winnerA;
	
	echo "Data received: " . $idA1 . " " . $idB1 . ", winnerA: " .$winA;
?>