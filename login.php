<?php
include 'function.php';
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
    <ul>
      <li style="float:right"><a href="signUp.php">SignUp</a></li>
      <li style="float:right"><a href="index.php">Browse</a></li>
      <!--<li style="float:left"><a href="#news">Signout</a></li>-->
    </ul>
        <div id="body">
                <div class="container">
                    <div class="card card-container">
                        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                        <p id="profile-name" class="profile-name-card"></p>
                         <form method="post" action ="verifyUser.php" class="form-signin">
                            <h3>Username:</h3> <input type="text" name="username" placeholder="username" id="username" class="form-control" /><br/>
                            <h3>Password:</h3> <input type="password" name="password" placeholder="password" id="password" class="form-control"/><br/>
                            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block btn-signin"/>
                        </form>
                    </div><!-- /card-container -->
                </div><!-- /container -->
        </div>
    </body>
       <footer style="position:fixed;">    
        <?php footer("index") ?>
    </footer>
</html>



