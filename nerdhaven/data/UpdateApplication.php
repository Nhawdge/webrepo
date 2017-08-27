<?php
$mysqli = new mysqli("localhost", "phpbot", "nhawdgebot", "minecraft");

$data = file_get_contents("php://input");
$response = json_decode($data, true );

$mcUsername = filter_var($response["mcUserName"], FILTER_SANITIZE_STRING);
$whitelist = $response["whitelisted"];
$banned = $response["banned"];

if (strlen($mcUsername) > 0)  {
    $query = "Update Applications Set whitelisted='$whitelist', banned='$banned' where mcUserName='$mcUsername'";
    
    $result = $mysqli->query($query);
    
    if ($result) {
        echo json_encode("Success");
    }
    else {
        echo json_encode("Failed 1" );
    }

}
else {
    echo json_encode("Failed $mcUsername" );
} 


?>