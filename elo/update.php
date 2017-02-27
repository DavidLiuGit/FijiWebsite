<?php
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	echo "top kek";
?>