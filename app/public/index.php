<?php
include_once '../helpers/Env.php';
include_once '../helpers/Db.php';
include_once '../helpers/Log.php';

$logger = new Log;
$db = new Db;

$app_name = Env::get('APP_NAME');



echo "<h1> Test Done </h1>";
echo "<h2> Welcome to {$app_name} app</h2>";

$db->insert('title 1', 'body 1 bomo tepo');
$posts = $db->getAll();

echo '<pre>';
print_r($posts);
echo '</pre>';

$logger::write('Test DOPE');
