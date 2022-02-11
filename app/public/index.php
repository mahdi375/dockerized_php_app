<?php
$app_name = $_ENV['APP_NAME'] ?? "-";

echo "<h1> Test Done </h1>";
echo "<h2> Welcome to {$app_name} app</h2>";

echo '<h3><pre>';
$time = date("Y.d.m G:i:s");
$agent = $_SERVER['HTTP_USER_AGENT'];
exec('whoami', $output);
$user = $output[0];
$log = "{$time} exec by {$user} : {$agent} \n";

file_put_contents('../logs/request.log', $log, FILE_APPEND);
