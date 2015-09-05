<?php
	/*
	* Following code will get single job details
	* A job is identified by job id (jobid)
	*/
	
	// array for JSON response
	$response = array();
	
	// check for post data
	if (isset($_GET['jobid'])) {
		
		// include db connect class
		require_once __DIR__ . '/db_connect.php';
		
		// connecting to db
		$con = new DB_CONNECT();
	
		$jobid = safe($con->getlink(), $_GET['jobid']);
		
		// get a job from products table
		$result = mysqli_query($con->getlink(), "SELECT * FROM roster WHERE jobid = '$jobid'");
	
		if (!empty($result)) {
			// check for empty result
			if (mysqli_num_rows($result) > 0) {
			
				$row = mysqli_fetch_array($result);
				
				$job = array();
				$job["jobid"] = $row["jobid"];
				$job["jobstatus"] = $row["jobstatus"];
				$job["comments"] = $row["comments"];	
								
				// user node
				$response["job"] = array();
				
				array_push($response["job"], $job);
				
				// success
				$response["success"] = 1;
				
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