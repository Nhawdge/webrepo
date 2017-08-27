<?php
$to = "JohnQPavek@gmail.com";
$subject = "Welcome to Nerd Haven Minecraft!";

$message = "Welcome! \r\n\r\n
You are whitelisted, join the server at: nerdhaven.nhawdge.net.\r\n
You can also talk to us offline if you have issues on our discord channel. \r\n
An up-to-date link can always be found on our website.\r\n
\r\n\r\n
Thanks!\r\nNH Staff";

$header = 'To: '. $to;
$header .= "\r\nFrom: www-data@nhawdge.net";

$header =  'To: '. $to . "\r\n" .
    'From: www-data@nhawdge.net' . "\r\n" .
    'Reply-To: nhawdge@nhawdge.net' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$result = mail($to, $subject, $message, $header, '-fNhawdge@nhawdge.net');
if ($result) {
  echo '<br>'."Email Sent".'</br>';
} 
else {
  echo "<p>Email Message delivery failed...</p><pre>";
  echo var_dump($to);
  echo var_dump($subject);
  echo var_dump($message);
  echo var_dump($header);
  echo "</pre>";
}
?>