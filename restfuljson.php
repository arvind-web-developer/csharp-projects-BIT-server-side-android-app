<?php

  // Decode JSON-formatted parameter named "params"
  $json = $_POST["params"];
  $params = json_decode($json);

  // Echo individual parameters
  echo "Parsed from JSON:\r\n";
  foreach($params as $k => $v) {
    echo "$k = $v\r\n";
  }

?>
