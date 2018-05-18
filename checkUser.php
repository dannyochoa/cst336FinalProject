<?php

include 'connect.php';
$conn =getDBConnection();
$username = $_POST['username'];
$sql = "SELECT * FROM user WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->execute(array(":username"=>$username));
$record = $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($record);
echo json_encode($record);

?>
