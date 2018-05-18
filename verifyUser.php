<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

// $score = $_POST['score'];
//Checking credentials in database
$sql = "SELECT * FROM user 
        WHERE username = :username
            AND password = :password";

$stmt = $connect->prepare($sql);
$data = array(":username" => $_POST['username'], ":password" => sha1($_POST['password']));
$stmt->execute($data);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($user['username'])){
    $_SESSION['username'] = $user['username'];
    if($user['username']=="admin"){
        header('Location: admin.php');
    }else{
        header('Location: index.php');
    }
}
else{
    header('Location: login.php');
}

//redirecting user to quiz if credentials are valid
?>