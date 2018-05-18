<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$id = $_POST['id'];
// $id = 4;
$sql = "INSERT INTO featured (id, petId) VALUES (NULL, '" . $id . "')";
        
$stmt = $connect->prepare($sql);
$stmt->execute();

?>