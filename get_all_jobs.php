<?php
    /*
    * Following code will list all the products
    */
   
    // array for JSON response
    $response = array();
   
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
   
    // connecting to db
    $con = new DB_CONNECT();
   
    // get all products from products table
    $result = mysqli_query($con->getlink(), "SELECT * FROM roster");
   
    // check for empty result
    if (mysqli_num_rows($result) > 0) {
        // looping through all results
        // jobs node
        ////////*****$response["jobs"] = array();
        //$response["jobs"] = array();
       
        while ($row = mysqli_fetch_array($result)) {
            // temp user array
            $job = array();
            $job["rid"] = $row["rid"];
            $job["fname"] = $row["fname"];
            $job["lname"] = $row["lname"];
            $job["mphone"] = $row["mphone"];
            $job["hphone"] = $row["hphone"];
            $job["jobid"] = $row["jobid"];
            $job["sch_start_date"] = $row["sch_start_date"];
            $job["sch_start_time"] = $row["sch_start_time"];
            $job["jobduration"] = $row["jobduration"];
            $job["act_start_date"] = $row["act_start_date"];
            $job["act_start_time"] = $row["act_start_time"];
            $job["act_end_date"] = $row["act_end_date"];
            $job["act_end_time"] = $row["act_end_time"];
            $job["jobstatus"] = $row["jobstatus"];
			$job["address"] = $row["address"]; 
            $job["comments"] = $row["comments"];           
           
            // push single product into final response array
            ////////*****array_push($response["jobs"], $job);
            //array_push($response["jobs"], $job);
           
            array_push($response, $job);
        }
        // success
        ////////*****$response["success"] = 1;
        //$response["success"] = 1;
       
        // echoing JSON response
        echo json_encode($response);
    }
?>