<?php
    session_start();
    include 'function.php';
    $type = "";
    $ageFrom = -1;
    $ageTo = -1;
    $priceFrom = -1;
    $priceTo = -1;
     
    if (isset($_GET["category"]) && !empty($_GET["category"])) {
        $type = $_GET["category"]; 
    }
    
    if (isset($_GET["ageFrom"]) && !empty($_GET["ageFrom"])) {
        $ageFrom = $_GET["ageFrom"]; 
    }
    
    if (isset($_GET["ageTo"]) && !empty($_GET["ageTo"])) {
        $ageTo = $_GET["ageTo"]; 
    }
    
    if (isset($_GET["priceFrom"]) && !empty($_GET["priceFrom"])) {
        $priceFrom = $_GET["priceFrom"]; 
    }
    
    if (isset($_GET["priceTo"]) && !empty($_GET["priceTo"])) {
        $priceTo = $_GET["priceTo"]; 
    }
    
    if(isset($_GET['search-submitted'])){
        $items = getMatchingItems("index", $type, $ageFrom, $ageTo, $priceFrom, $priceTo);
    }
    else{
         $items = getMatchingItems("index", "", $ageFrom, $ageTo, $priceFrom, $priceTo);
    }

    
?>
<!DOCTYPE html>
<html>
    <head>

        <title> </title>    
        <style>
            @import url("css/styles.css");
        </style>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    
    <body>
      <?php navBar() ?>
      <div class ="center">
            <div id="filter" class="form">
                <form enctype="text/plain">
                    
                    <strong>Type:</strong><select class="form-control" name="category" id="filterType">
                        <option value="">Select One</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Bird">Bird</option>
                        <option value="unknown">Other</option>
                    </select>
                    <strong>Age:</strong> <input class ="txt" type="text" name="ageFrom" /> - <input class ="txt" type="text" name="ageTo" /><br>
                    <strong>Price Range:</strong> <input class ="txt" type="text" name="priceFrom" /> - <input class ="txt" type="text" name="priceTo" />
                    <input type="submit" name= "search-submitted" id="filterSub"/>
                </form>
            </div>
            <br><br>
          <table>
               
              <?php table("index") ?>
           </table>
           
      </div>
    </body>
    <footer>    
 
        <?php footer("index") ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="function.js"></script>
 
</html>