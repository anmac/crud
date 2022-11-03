<?php

include_once 'connection.php';

$id = $_GET['id'];

$sql_delete = 'DELETE FROM colours WHERE id=?';
$delete_sentence = $pdo->prepare($sql_delete);
$delete_sentence->execute(array($id));

header('location:index.php');
