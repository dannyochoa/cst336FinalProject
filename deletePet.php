<?php
session_start();

include 'connect.php';
$connect = getDBConnection();
$sql = "DELETE FROM pet WHERE pet.id = :idPet";
$data = array(":idPet" => $_POST["petID"]);
$stmt = $connect->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>