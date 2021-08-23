<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

<!--extra Bootstrap CSS-->
<link rel="stylesheet"
          href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> 
     
     <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
    
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
  </script>  
 <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">

<!-- Bootstrap core CSS -->
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


        
    <!-- Custom styles for this template -->
    <link href="footers.css" rel="stylesheet">




























    <title>PHP login system!</title>
  </head>
  <body>




  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
 
  <symbol id="facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
  </symbol>
  <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
  </symbol>
  <symbol id="twitter" viewBox="0 0 16 16">
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
  </symbol>
</svg>



<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>



















  
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
        <li class="nav-item">

          <a class="nav-link" href="about.php">About</a>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Services
          </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/services.html">Stationary</a>
            <a class="dropdown-item" href="/services.html">Xerox</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/services.html">Something else here</a>
          </div>
        </li> -->
        <li class="nav-item">

          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item">

      <a class="nav-link" href="line.php">Line Chart</a>
      </li>
      <!-- <li class="nav-item">

      <a class="nav-link" href="barchart.php">Bar Chart</a>
      </li> -->
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    
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
        <a class="nav-link" href="register_1.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul> -->

  <!-- <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-"> 
  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"
  <li class="nav-item active">-->
  <!-- <ul class="nav-item active"> -->
  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false" href="#" style="color:blue;"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
     



        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Services
          </a> -->












        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="logout.php">Logout</a>
            <!-- <a class="dropdown-item" href="/services.html">Xerox</a> -->
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="/services.html">Something else here</a> -->
          </div>
      </li>
  <!-- </ul> -->
  


  </div>
</nav>
<!-- style="position: topleft; top: 0px; left: 0px;" -->
<!-- <a   class="btn btn-lg btn-primary" href="website 03.php" role="button">Home</a> -->
<!-- <div class="position-relative">
  <div class="btn btn-lg btn-primary position-absolute top-0 start-0 translate-middle" href="website 03.php" role="button">Home</div>
</div> -->


<!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Check out latest Cryptocurrency</strong> rates here!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button> -->
      <!-- <div class="container"> -->
        <!-- <h1>
      <span style="color:green"><h3>! You can now use this website</h3></span>
      <button class='btn btn-success pull-right'>
        Button Text
          </button>
    </h1>padding: 10px 65px; ;  <div class=" d-sm-flex ">          margin-top: 10px; margin-bottom: 60px; margin-right: 150px; margin-left: 80px; padding: 10px 65px;-->
    <div class="container">
       
        
    
     <h2>
      
      <span style="color:green"> <?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</span>
       <!-- <a class="btn btn-lg btn-primary d-grid " href="website 03.php" role="button" style="position: absolute;  margin-top: 10px; margin-bottom: 90px; margin-right: 150px; margin-left: 80px; padding: 8px 65px;  top:40; right:15;"> -->
       <!-- <a class="btn btn-lg btn-primary d-grid " href="website 03.php" role="button" style="position: absolute;  margin-top: 10px; margin-bottom: 90px; margin-right: 150px; margin-left: 50px; padding: 8px 35px;  top:40; right:15;">
       Home   <span class="d-sm-flex  justify-content-sm-center mx-auto">Home</span> 
          </button></a></div>-->
</h2>
   
    </div>
    
    <!-- <span style="color:green>! You can now use this website</span>
      <a class='btn btn-success pull-right' href="website 03.php" role="button" style="position:absolute; top:40; right:15;">
        Back to Home
          </button></a> -->
    




<div class="container mt-3">
    <div class="jumbotron">
    <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="new.jpg" alt="" style="display: block;
  margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto;  width: 40%;  height: 40%;">
     <h1 class="display-4 d-sm-flex  justify-content-sm-center mx-auto">Cryptocurrency</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">A cryptocurrency, crypto-currency, or crypto is a digital asset designed to work as a medium of exchange where in individual coin ownership records are stored in a ledger existing in a form of a computerized database using strong cryptography to secure transaction records, to control the creation of additional coins, and to verify the transfer of coin ownership. Cryptocurrency does not exist in physical form and is typically not issued by a central authority.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a class="btn btn-primary btn-lg" href="index_new.php" target="_blank" role="button">Dashboard</a>
         
      </div>
    </div>
</div>
</div>
<!-- <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">© 2021 Company, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Project</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Support</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contact</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
  </footer>
<div></div></div> -->
<!-- <footer class="bd-footer py-5 mt-5 bg-light"> -->
  <!-- <div class="container py-5">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"/></svg>
          <span class="fs-5">Bootstrap</span>
        </a>
        <ul class="list-unstyled small text-muted">
          <li class="mb-2">Designed and built with all the love in the world by the <a href="/docs/5.1/about/team/">Bootstrap team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</li>
          <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.</li>
          <li class="mb-2">Currently v5.1.0.</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/">Home</a></li>
          <li class="mb-2"><a href="/docs/5.1/">Docs</a></li>
          <li class="mb-2"><a href="/docs/5.1/examples/">Examples</a></li>
          <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
          <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Guides</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/docs/5.1/getting-started/">Getting started</a></li>
          <li class="mb-2"><a href="/docs/5.1/examples/starter-template/">Starter template</a></li>
          <li class="mb-2"><a href="/docs/5.1/getting-started/webpack/">Webpack</a></li>
          <li class="mb-2"><a href="/docs/5.1/getting-started/parcel/">Parcel</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Projects</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap">Bootstrap 5</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev">Bootstrap 4</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/icons">Icons</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/rfs">RFS</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap-npm-starter">npm starter</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Community</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues">Issues</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions">Discussions</a></li>
          <li class="mb-2"><a href="https://github.com/sponsors/twbs">Corporate sponsors</a></li>
          <li class="mb-2"><a href="https://opencollective.com/bootstrap">Open Collective</a></li>
          <li class="mb-2"><a href="https://bootstrap-slack.herokuapp.com/">Slack</a></li>
          <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5">Stack Overflow</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

 -->
 <!-- <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">© 2021 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div> -->



<!-- <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">© 2021 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"> <use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div> -->

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="text-muted">&copy; 2021 Company, Inc</span>
    </div>

    <!-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul> -->
  <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/?lang=en"><svg class="bi" width="50" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-4"><a class="text-muted" href="https://www.instagram.com/"><svg class="bi" width="50" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-5"><a class="text-muted" href="https://www.facebook.com/"><svg class="bi" width="50" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>
