<?php
session_start();

include 'connect.php';
$connect = getDBConnection();
$sql = "INSERT INTO pet (id, name, type, breed, age, cost, owner, img) VALUES (NULL, :name, :type, :breed, :age, :cost, :owner, :img)";
$data = array(
        ":name" => $_POST["jName"],
        ":type" => $_POST["jType"],
        ":breed" => $_POST["jBreed"],
        ":age" => $_POST["jAge"],
        ":cost" => $_POST["jCost"],
        ":owner" => $_SESSION["username"],
        ":img" => $_POST["jImg"]);

$stmt = $connect->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>