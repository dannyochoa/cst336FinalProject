<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$username = $_POST['username'];
$password = $_POST['password'];
$phoneNumber = $_POST['phoneNumber'];

$sql = "INSERT INTO user (id, username, password, contact) VALUES (NULL, :username, SHA1(:password), :phoneNumber)";

$data = array(
        ":username" => $username,
        ":password" => $password,
        ":phoneNumber" => $phoneNumber);
        
$stmt = $connect->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>