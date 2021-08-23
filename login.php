<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = $err_pass = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter your username";
        $err_pass = "Please enter your password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err) && empty($err_pass))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome.php");
                            
                        }
                    }

                }

    }
}    


}


?> 
<!--require_once "config.php";

 $username = $password = $confirm_password = "";
 $username_err = $password_err = $confirm_password_er = "";
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
     //Check if username is empty
     if(empty(trim($_POST["username"]))){
         $username_err = "Username cannot be blank";
     }
     else{
         $sql = "SELECT id FROM users WHERE username= ?";
         $stmt = mysqli_prepare($con, $sql);
         if($stmt){
             mysqli_stmt_bind_param($stmt, "s", $param_username);

             //Set the value of param username
             $param_username = trim($_POST['username']);
              //Try to execute this statement
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);
                  if(mysqli_stmt_num_rows($stmt) == 1)
                  {
                      $username_err = "This username is already taken";

                  }
                  else{
                      $username = trim($_POST['username']);
                  }
              }
              else{
                  echo "Something went wrong";
              }
            }
     }
     mysqli_stmt_close($stmt);
 }
 //check for password
 if(empty(trim($_POST['password']))){
$password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";

}
else{
    $password = trim($_POST['password']);
}

//Check for confirm password field
if(trim($_POST['password']) != trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}

//If there are errors, go ahead and insert into the database

   if(empty($username_err) && empty($password_err) && empty
   ($confirm_password_err))
   {
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt); 
   }
   mysqli_close($conn);
}-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP Login system</title>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="website 03.php">Cryptocurrency Tracker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="website 03.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
      <a class="nav-link" href="register_1.php">Register</a>
         </li>
        <!-- <li class="nav-item">
        <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
         </li> -->
        <!-- <li class="nav-item">
        <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
         </li>
        <li class="nav-item"> -->
<!-- 
          <a class="nav-link" href="about.php">About</a>
        </li> -->

        <!-- <li class="nav-item">
         <a class="nav-link" href="contact.php">Contact Us</a>
       </li> -->
  </ul>
  
  </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cryptocurrency Tracker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register_1.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
</ul>
        -->
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
     
<!-- </div>
  </div>
</nav> -->

<div class="container mt-4">
<h3>Please Login Here</h3>
    <hr>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
    <div id="emailHelp" class="form-text"></div>
    <span class="error" style="color:red;"><?php echo $err;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
    <span class="error" style="color:red;"><?php echo $err_pass;?></span>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>  


 </div>  
          
</body>
</html>