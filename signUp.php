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
      <li style="float:right"><a href="login.php">login</a></li>
      <li style="float:right"><a href="index.php">Browse</a></li>
      <!--<li style="float:left"><a href="#news">Signout</a></li>-->
    </ul>
        
        <div id="body">
            <div id="login">
                 <div class="container">
                    <div class="card card-container">
                        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                        <p id="profile-name" class="profile-name-card"></p>
                         <form method="post" class="form-signin" id="signUp">
                            <h3>Username:</h3><input type="text" name="username" placeholder="username" id="signUser" class="form-control" required/>
                            <span id = "isthere"></span><br>
                            <h3>PhoneNumber:</h3> <input type="text" name="phoneNumber" placeholder="(###) ###-####" id="signPhone" class="form-control" required/>
                            <h3>Password:</h3> <input type="password" name="password" placeholder="password" id="signPass" class="form-control" required/><br/>
                            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block btn-signin" />
                        </form>
                    </div><!-- /card-container -->
                </div><!-- /container -->
                
                
                
                
                <!--<form method="post" id="signUp">-->
                <!--    Username: <input type="text" name="username" placeholder="username" id="signUser"/><span id = "isthere"></span><br>-->
                <!--    PhoneNumber: <input type="text" name="phoneNumber" placeholder="(###) ###-####" id="signPhone"/><br/>-->
                <!--    Password: <input type="password" name="password" placeholder="password" id="signPass"/><br/>-->
                <!--    <input type="submit" name="submit"/>-->
                <!--</form>-->
            </div>
        </div>
        
    </body>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
           <script src="function.js"></script>
 
</html>