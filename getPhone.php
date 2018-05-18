<?php
session_start();

include 'connect.php';
$connect = getDBConnection();
$petName = $_POST['name'];

$sql = "SELECT * FROM pet WHERE name LIKE :petName";
$data = array(":petName" => $petName);
$stmt = $connect->prepare($sql);
$stmt->execute($data);
$petResult = $stmt->fetch(PDO::FETCH_ASSOC);

$c = $petResult['count'] + 1;


$sql2 = "UPDATE pet SET count = $c WHERE pet.name = :petName";
$data2 = array(":petName" => $petName);
$stmt2 = $connect->prepare($sql2);
$stmt2->execute($data2);

$sql3 = "SELECT * FROM user WHERE username LIKE :username";
$data3 = array(":username" => $_POST['phoneUser']);
        // $data = array(":username" => "daniel");
$stmt3 = $connect->prepare($sql3);
$stmt3->execute($data3);
$result = $stmt3->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>