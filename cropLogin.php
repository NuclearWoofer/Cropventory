<?php

    include_once __DIR__ . "/model_crop.php";
    include_once __DIR__ . "/functions.php";
    include __DIR__ . "/model/db.php";
    
    
    if(isset($_POST['login'])){
        $userName = mysqli_real_escape_string($con,$_POST['userName']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
    
        if ($userName = !"" && $password = !""){
    
            $sql_query = "select count(0) as cntUser from users where userName='".$userName."' and password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row['cntUser'];
    
            if($count > 0){
                $_SESSION['userName'] = $userName;
                header('Location: searchsort.php');
            }else{
                echo "Invalid username and password";
            }
    
        }
    
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">

    
    </style>
<title>Login</title>
</head>
<body>
    
<h3>Welcome Farmer! Please Log in.</h3>
    <div id="login">
        <form method="post" action="login.php">
           
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

    <div class="col-sm-offset-2 col-sm-10"><a href="./cropHome.php">Home Page</a></div>
    

</body>
</html>