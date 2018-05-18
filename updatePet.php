<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$name = $_POST['chngName'];
$breed = $_POST['chngBreed'];


// $name = "Pony";
// $breed = "Pony";

$sql = "UPDATE pet SET breed = '" . $breed . "'WHERE pet.name = '" . $name . "'";
        
$stmt = $connect->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * From pet WHERE pet.name = '" . $name . "'";
        
$stmt2 = $connect->prepare($sql2);
$stmt2->execute();
$result = $stmt2->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>