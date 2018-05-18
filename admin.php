<?php
    session_start();
    if($_SESSION['username']!= "admin"){
        header('Location: login.php');
    }
    include 'function.php';
    function localNav(){
        echo ("        <ul>
            <li style='float:right'><a href='logout.php'>Logout</a></li>
            <li style='float:right'><a href='index.php'>Browse</a></li>
            <li style='float:left'><h4 style='color:white'>" . $_SESSION['username'] ."</h4></li>
        </ul>");
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
        
        <div class="column left">
        <h4 class="heading"><strong>Manage </strong> Pet <span></span></h4>
            <div class="form">
                <form id="changePet" method="post" id="contactFrm" name="contactFrm">
                    <input type="text" required="" placeholder="Name"  name="name" class="txt" id="changeName">
                    <input type="text" required="" placeholder="Breed" name="areed" class="txt" id="changeBreed">
                    <input type="submit" value="submit" name="changeSubmit" class="txt2">
                </form>
   
                  <br><br>
                   <h4 class="heading"><strong>Most </strong> Popular <span></span></h4>
                <select id="popular" class="form-control" name="popularType">
                    <option value="Dog">Select a type of pet To search</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                    <option value="unknown">Other</option>
                </select>

                <span id="popularImg"></span><span id="popularName"></span>
                
            </div>
        </div>
        
        <div class="column right">
           <table id="manage">
              <?php $items = getMatchingItems("index","" ,-1,-1,-1,-1);
              table("admin") ?>
           </table>
        </div>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="function.js"></script>
    
</html>