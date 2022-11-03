<?php

$link = 'mysql:host=localhost;dbname=yt_colours';
$dbname = 'yt_colours';
$table = 'colours';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($link, $user, $password);
    // echo '<h1>Successful Connection</h1>';

    // foreach ($pdo->query('SELECT * from ' . $table) as $row) {
    //     print_r($row);
    // }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
