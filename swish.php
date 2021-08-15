<?php
$amount = $_GET["amount"];
$message = $_GET["message"];
$payee = $_GET["payee"];
$format = 'jpg'; // Use jpg, png or svg

// Passing our data to the array
$data = json_encode(array(
    "amount" => array(
        "type" => "swishNumber",
        "value" => "$amount",
     ),
     
    "format" => "$format",
        "size" => "300",
     
    "message" => array(
        "type" => "swishString",
        "value" => "$message"
     ),
     
    "payee" => array(
        "type" => "swishString",
        "value" => "$payee",
     ),     
     
    "type" => "object"
));

$data_string = ($data);

// Using CURL to get the generated QR from Swish API
$ch = curl_init('https://mpc.getswish.net/qrg-swish/api/v1/prefilled');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    )
);

$result = curl_exec($ch);

if ($result === false) {
	echo curl_error($ch);
}

$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// If any errors occurs
if ($response_code == 200 or $response_code == 201) {
	echo '';
} else {
	echo 'The request failed. Code: ' . $response_code;
}

 // Picture output
header("Content-Type: image/$format");
header("Content-Disposition: inline; filename=\"swish.$format\"");

echo $result;