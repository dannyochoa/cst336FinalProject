<?php
    session_start();
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
        <!--I got this code from: https://bootsnipp.com/snippets/33qRV-->
        <div class="column left">
    	    <div id="add">
                <h4 class="heading"><strong>Add </strong> Pet <span></span></h4>
                    <div class="form">
                        <form id="addPet" method="post" id="contactFrm" name="contactFrm">
                            <input type="text" required="" placeholder="Name"  name="name" class="txt" id="newName">
                            <select class="form-control" name="type" id="newType">
                                <option value="unknown">Select One</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Bird">Bird</option>
                                <option value="unknown">Other</option>
                            </select>

                            <input type="text" required="" placeholder="Breed" name="areed" class="txt" id="newBreed">
                            <input type="text" required="" placeholder="Age" name="age" class="txt" id="newAge">
                            <input type="text" required="" placeholder="Cost" name="cost" class="txt" id="newCost">
                            <textarea placeholder="Image URL" name="mess" type="text" class="txt_3" id="newImg"></textarea>
                            <input type="submit" value="submit" name="submit" class="txt2">
                        </form>
                    </div>
    	    </div>
        </div>
        
        <div class="column right">
           <table id="manage">
              <?php table("manage") ?>
           </table>
        </div>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="function.js"></script>
    
</html>