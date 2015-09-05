<?php
	/*
	* Following code will update a job information
	* A job is identified by job id (jobid)
	*/
	
	// array for JSON response
	$response = array();
	
	// check for required fields
	if (
			isset($_POST['jobid']) &&
			isset($_POST['jobstatus']) &&
			isset($_POST['comments'])

		) {
		
		// include db connect class
		require_once __DIR__ . '/db_connect.php';
		
		// connecting to db
		$con = new DB_CONNECT();
		
		$jobid = safe($con->getlink(), $_POST['jobid']);
		$jobstatus = safe($con->getlink(), $_POST['jobstatus']);
		$comments = safe($con->getlink(), $_POST['comments']);
		
		// mysql update row with matched jobid
				$result = mysqli_query($con->getlink(), "UPDATE roster 
															SET jobstatus = '$jobstatus',
																comments  = '$comments'
														  WHERE jobid     = '$jobid'");		
		// check if row inserted or not
		if ($result) {
			// successfully updated
			$response["success"] = 1;
			$response["message"] = "Job successfully updated.";
			
			// echoing JSON response
			echo json_encode($response);
		} else {
			//
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