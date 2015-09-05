<?php
	/*
	* Following code will create a new product row
	* All product details are read from HTTP Post Request
	*/
	
	// array for JSON response
	$response = array();
	
	// check for required fields
	if (
			isset($_POST['fname']) &&
			isset($_POST['lname']) &&
			isset($_POST['mphone']) &&
			isset($_POST['hphone']) &&
			isset($_POST['jobid']) &&
			isset($_POST['sch_start_date']) &&
			isset($_POST['sch_start_time']) &&
			isset($_POST['jobduration']) &&
			isset($_POST['act_start_date']) &&
			isset($_POST['act_start_time']) &&
			isset($_POST['act_end_date']) &&
			isset($_POST['act_end_time']) &&
			isset($_POST['jobstatus']) &&
			isset($_POST['address']) &&
			isset($_POST['comments'])
		) {
		
		// include db connect class
		require_once __DIR__ . '/db_connect.php';
		
		// connecting to db
		$con = new DB_CONNECT();
		
		$fname = safe($con->getlink(), $_POST['fname']);
		$lname = safe($con->getlink(), $_POST['lname']);
		$mphone = safe($con->getlink(), $_POST['mphone']);
		$hphone = safe($con->getlink(), $_POST['hphone']);
		$jobid = safe($con->getlink(), $_POST['jobid']);
		$sch_start_date = safe($con->getlink(), $_POST['sch_start_date']);
		$sch_start_time = safe($con->getlink(), $_POST['sch_start_time']);
		$jobduration = safe($con->getlink(), $_POST['jobduration']);
		$act_start_date = safe($con->getlink(), $_POST['act_start_date']);
		$act_start_time = safe($con->getlink(), $_POST['act_start_time']);
		$act_end_date = safe($con->getlink(), $_POST['act_end_date']);
		$act_end_time = safe($con->getlink(), $_POST['act_end_time']);
		$jobstatus = safe($con->getlink(), $_POST['jobstatus']);
		$address = safe($con->getlink(), $_POST['address']);
		$comments = safe($con->getlink(), $_POST['comments']);
				
		// mysql inserting a new row
		$result = mysqli_query($con->getlink(), "INSERT INTO roster (fname, lname, mphone, hphone, jobid, sch_start_date, sch_start_time, jobduration, act_start_date, act_start_time, act_end_date, act_end_time, jobstatus, address, comments) VALUES('$fname','$lname', '$mphone', '$hphone', '$jobid', '$sch_start_date', '$sch_start_time', '$jobduration', '$act_start_date', '$act_start_time', '$act_end_date', '$act_end_time', '$jobstatus', '$address', '$comments')");
		
		
		// check if row inserted or not
		if ($result) {
			// successfully inserted into database
			$response["success"] = 1;
			$response["message"] = "Job successfully created.";
			
			// echoing JSON response
			echo json_encode($response);
		} else {
			// failed to insert row
			$response["success"] = 0;
			$response["message"] = "Oops! An error occurred.";
			
			// echoing JSON response
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