<?php 

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">

    
    #login {margin-left: 1100px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}
    .col1 {width: 100px; float: left;}
    .col2 {float: left;}
    .rowContainer {clear: none; height: 40px; width: 500px;}
    .error {margin-left: 100px; clear: left; color: red;}
        
    h1, h2, h3{
        margin-top: 50px;
        padding-top: 10px;
        font-size: 40px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color:#1E8449;
        text-align: center;
    }

    body{
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
       text-align: center;
    }

    </style>
<title>CropVentory Login</title>
</head>
<body>
    
<h3>Welcome Farmer! Please Log in.</h3>

    <div id="login">
        <form method="post" action="cropLogin.php">
           
            <div class="rowContainer">

            </div>
            <div class="rowContainer">
                <div class="col1">User Name:</div>
                <div class="col2"><input type="text" name="userName" value="donald"></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password" value="duck"></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
            </div>
            
        </form>
        
    </div>

    <h3>Register Here</h3>
    <div id="register">
        <form method="post" action="cropRegistered.php">
            <div class="rowContainer">

            </div>
            <div class="rowContainer">
                <div class="col1">userName</div>
                <div class="col2"><input type="text" name="userName"></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password"></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Farm Name:</div>
                <div class="col2"><input type="text" name="farmName"></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="register" value="Register" class="btn btn-warning"></div> 
            </div>
            


        </form>
    </div>



    <div class="col-sm-offset-2 col-sm-10"><a href="./cropHome.php">Home Page</a></div>
    

</body>
</html>