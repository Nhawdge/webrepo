<?php

function logger ($logdata) {
    $phplog = "logs/php.log";
    $text = "\n" . $logdata;
    file_put_contents($phplog, $text, FILE_APPEND);
}

$mysqli = new mysqli("localhost", "phpbot", "nhawdgebot", "minecraft");

$query = "SELECT * FROM Applications order by dateApplied Desc;"; 

$result = $mysqli->query($query);
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

?>