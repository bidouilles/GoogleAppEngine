<?
// api.safecast.org gateway
//
// ----------------------------------------------------------------
// The contents of this file are distributed under the CC0 license.
//  See http://creativecommons.org/publicdomain/zero/1.0/
// ----------------------------------------------------------------

// Set UTC time mode
date_default_timezone_set("UTC");

// Retrieve the request's body and parse it as JSON
$body = @file_get_contents('php://input');

// Decode JSON body and add the timestamp
$measurement_json = json_decode($body,true);
$measurement_json["captured_at"] = date("Y-m-d H:i:s", time());

// Repack the data in JSON
$data_string = json_encode($measurement_json);

// POST to api.safecast.org
$context =
    array("http"=>
      array(
        "method" => "post",
        "header" => "Content-Type: application/json\r\n" .
                    "Content-Length: " . strlen($data_string)."\r\n",
        "content" => $data_string
      )
    );
$context = stream_context_create($context);
$result = file_get_contents('http://api.safecast.org/measurements.json?api_key='.$_GET["api_key"], false, $context);

echo $result;
?>
