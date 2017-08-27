<?php
$validLogin = false;

$data = file_get_contents("php://input");
$response = json_decode($data, true );

$password = trim($response["pass"]);

$mysqli = new mysqli("localhost", "phpbot", "nhawdgebot", "minecraft");
$query = "Select * FROM webuser;";

$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    //echo var_dump($row["password"]);
    if (md5($password) == $row["password"] ) {
        echo "true";
        return;
    }
}
echo "false";

?>