<?php
$mysqli = new mysqli("localhost", "phpbot", "nhawdgebot", "minecraft");

$data = file_get_contents("php://input");
$response = json_decode($data, true );

$emailAddr = filter_var($response["email"], FILTER_SANITIZE_EMAIL);
$mcUsername = filter_var($response["mcUsername"], FILTER_SANITIZE_STRING);
$firstName = filter_var($response["firstName"], FILTER_SANITIZE_STRING);
$age = filter_var($response["age"], FILTER_SANITIZE_STRING);
$country = filter_var($response["country"], FILTER_SANITIZE_STRING);
$personalInfo = filter_var($response["personalInfo"], FILTER_SANITIZE_STRING);
$projectInfo = filter_var($response["projectInfo"], FILTER_SANITIZE_STRING);
$timePlayed = filter_var($response["timePlayed"], FILTER_SANITIZE_STRING);
$reference = filter_var($response["reference"], FILTER_SANITIZE_STRING);

if (strlen($mcUsername) > 0 && strlen($firstName) > 0 && strlen($age) > 0 && strlen($emailAddr) > 0  )  {
    $query = "INSERT INTO Applications (mcUserName, firstName, age, country, personalInfo, projectInfo, timePlayed, reference, whitelisted, email) 
    VALUES ('$mcUsername', '$firstName', '$age', '$country', '$personalInfo', '$projectInfo', '$timePlayed', '$reference', 'false', '$emailAddr');";
    
    $result = $mysqli->query($query);
    
    if ($result) {
        echo json_encode("Success");
    }
    else {
        echo json_encode("Failed");
    }

}
else {
    echo json_encode("Failed");
}
?>