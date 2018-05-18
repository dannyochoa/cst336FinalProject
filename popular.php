<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$breed = $_POST['breed'];
// $breed = "Dog";

$sql = "SELECT * FROM pet WHERE type = '" . $breed . "'";
        
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

$index=0;
$c = 0;
foreach ($result as $r) {
    if($result[$index][8] < $r[8]){
        $index = $c;
    }
    $c++;
}
echo json_encode($result[$index]);

?>