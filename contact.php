<?php
    session_start();
    include 'function.php';
    function localNav(){
        echo ("<ul>
            <li style='float:right'><a href='logout.php'>Logout</a></li>
            <li style='float:right'><a href='index.php'>Browse</a></li>
            <li style='float:left'><h4 style='color:white'>");
        if(isset($_SESSION['owner'])){
            echo ($_SESSION['owner'] ."</h4></li></ul>");
        } 
        else{
            echo ("Trash</h4></li></ul>");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>    
        <style>
            @import url("css/styles.css");
            @import url("css/form.css");
        </style>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     
    </head>
    
    <body>
        <?php localNav() ?>
        
        
    </body>

</html>