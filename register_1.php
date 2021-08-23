<?php
require_once "config.php";

$username = $password = $confirm_password = $city = $address = $zip = "";
$username_err = $password_err = $confirm_password_err = $city_err = $address_err = $zipcode_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);

                    // if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
                    //   $username_err = "Only letters and white space allowed";
                    //      } 
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    // mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
// elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
//   $password_err = 'the password does not meet the requirements!';
// }
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $confirm_password_err = "Passwords should match";
}
//check for city.
if (empty($_POST["city"])) {
  $city_err = "Field is required";
} else {
  // $city = test_input($_POST["city"]);
  $city = trim($_POST['city']);
}
//check for address
if (empty($_POST["address"])) {
  $address_err = "Field is required";
} else {
  // $city = test_input($_POST["city"]);
  $address = trim($_POST['address']);
}
// if (empty($_POST["Zip"])) {
//   $zipcode_err = "Field is required";
// } else {
//   $zip = trim($_POST['Zip']);
// }
if(empty($_POST["Zip"])) {
  $zipcode_err = "Please enter a value";
} else if(!is_numeric($_POST["Zip"])) {
  $zipcode_err = "Data entered was not numeric";
} else if(strlen($_POST["Zip"]) != 6) {
  $zipcode_err = "The number entered was not 6 digits long";
} else {
  /* Success */
  $zip = trim($_POST['Zip']);
}



// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($city_err) && empty($address_err) && empty($zipcode_err))
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
}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
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
         </li> -->
        <!-- <li class="nav-item">

          <a class="nav-link" href="about.php">About</a>
        </li> -->

        <!-- <li class="nav-item">
         <a class="nav-link" href="contact.php">Contact Us</a>
       </li> -->
  </ul>
  
  </div>
</nav>
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>
  </div> 
</nav>-->

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<h7><a style="color:red;">*this is required field</a></h7><br></br> 
<form action="" method="post">
<!-- <p><span class="error">* required field</span></p> -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username<span class="required" style="color:red">*</span></label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">
      <span class="error" style="color:red;"> <?php echo $username_err;?></span>
      
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password<span class="required" style="color:red">*</span></label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
      <span class="error" style="color:red;"> <?php echo $password_err;?></span>
      
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password<span class="required" style="color:red">*</span></label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
      <span class="error" style="color:red;"><?php echo $confirm_password_err;?></span>
        
    </div>
  <div class="form-group">
    <label for="inputAddress2">Address<span class="required" style="color:red">*</span></label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address">
    <span class="error" style="color:red;"><?php echo $address_err;?></span>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City<span class="required" style="color:red">*</span></label>
      <input type="text" class="form-control" id="inputCity" name="city">
      <span class="error" style="color:red;"><?php echo $city_err;?></span>
        
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" id="inputState" class="form-control">

        <!-- <option selected>Choose...</option>
        <option>...</option>
      </select> -->
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip<span class="required" style="color:red">*</span</label>
      <input type="text" class="form-control" id="inputZip" name="Zip">
      <span class="error" style="color:red;"> <?php echo $zipcode_err;?></span>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

























