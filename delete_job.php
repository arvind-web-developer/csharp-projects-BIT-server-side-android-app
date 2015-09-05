<?php
	/*
	* Following code will delete a job from table
	* A job is identified by request id (jobid)
	*/
	
	// array for JSON response
	$response = array();
	
	// check for required fields
	if (isset($_POST['jobid'])) {
		
		// include db connect class
		require_once __DIR__ . '/db_connect.php';
		
		// connecting to db
		$con = new DB_CONNECT();
		
		$jobid = safe($con->getlink(), $_POST['jobid']);
		
		// mysql update row with matched jobid
		$result = mysqli_query($con->getlink(), "DELETE FROM roster WHERE jobid = '$jobid'");
		
		// check if row deleted or not
		if ($result) {
			// successfully updated
			$response["success"] = 1;
			$response["message"] = "Job successfully deleted";
			
			// echoing JSON response
			echo json_encode($response);
		} else {
			// no job found
			$response["success"] = 0;
			$response["message"] = "No job found";
			
			// echo no users JSON
			echo json_encode($response);
		}
	} else {
		// required field is missing
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";
		
		// echoing JSON response
		echo json_encode($response);
	}
	
	function safe($link, $string) {
		return mysqli_real_escape_string($link, $string);
	}
?>