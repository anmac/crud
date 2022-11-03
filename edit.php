<?php

// echo 'edit.php?id=1&colour=success&description=This colour is green';
// echo '<br/>';

$id = $_GET['id'];
$colour = $_GET['colour'];
$description = $_GET['description'];

// echo $id . '<br/>';
// echo $colour . '<br/>';
// echo $description . '<br/>';

include_once 'connection.php';

$sql_edit = 'UPDATE colours SET colour=?,description=? WHERE id=?';
$edit_sentence = $pdo->prepare($sql_edit);
$edit_sentence->execute(array($colour,$description,$id));

header('location:index.php');
