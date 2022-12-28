<?php
require 'connection.php';
session_start();
echo "<script>errorfixMessage();</script>";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="/images/medicine.png">
    <title>Welcome</title>
  </head>
  <body>
    <div class="hero" style="background-image: url('images/hosp.jpg');    background-size: 55%;
    background-position-y: bottom;
    background-position-x: 35%; ;">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

     <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=yourdomain@name.com" target="_blank"><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">yourdomain@name.com</span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="tel:0484-123456" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">0484-123456</span></a>
            </div>
          </div>
        </div>
      </div>

      <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="site-logo">
              <a href="index.php" class="text-black"><img src="images/hospital.png" alt="hosp"></a>
            </div>
            <div class="col-12">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="#home-section" class="nav-link">Home</a></li>
                  <li><a href="#services-section" class="nav-link">Services</a></li>
                  <li class="has-children">
                    <a href="#about-section" class="nav-link">About Us</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="#team-section" class="nav-link">Team</a></li>
                      <li><a href="#faq-section" class="nav-link">FAQ</a></li>
                    </ul>
                  </li>
                  <li><a href="#why-us-section" class="nav-link">Why Us</a></li>
                  <li><a href="#contact-section" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>
           <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </header>
      
        <div class="wrapper">
          <div class="title-text">
            <div class="title login">Login as Doctor</div>
            <div class="title signup">Login as Receptionist</div>
          </div>
          <div class="form-container">
          
            <div class="slide-controls">
              <input type="radio" name="slide" id="login" checked>
              <input type="radio" name="slide" id="signup">
              <label for="login" class="slide login">Doctor</label>
              <label for="signup" class="slide signup">Receptionist</label>
              <div class="slider-tab"></div>
            </div>
            <div class="form-inner">

              <form action="index.php" class="login" method="post">
                <div class="field">
                  <input type="hidden" name="loginForm" value=""/>
                  <input type="hidden" name="doc" value=""/>
                  <input name="userid" type="text"  placeholder="User ID" required>
                </div>
                <div class="field">
                  <input name="userpass" type="password" placeholder="Password" required>
                </div> 
                <div class="field btn">

                  <div class="btn-layer" ></div>
                  <input type="submit" value="Login" style="padding-top: 2px;">

                </div>  
                <div class="error-field">
                <label id="error"  ></label>

                </div>              
              </form>
              <form action="index.php" class="signup" method="post">
                <div class="field">
                  <input type="hidden" name="loginForm" value=""/>
                  <input type="hidden" name="rec" value=""/>


                  <input name="userid" type="text" placeholder="User ID" required>
                </div>
                <div class="field">
                  <input name="userpass" type="password" placeholder="Password" required>
                </div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Login">
                  
                </div>
                <div class="error-field">
                <label id="error"  ></label>

                </div> 
               
              </form>
            </div>
        </div>
      </div>
    </div>
    <script>
      // const error = document.querySelector("error");
      function errorfixMessage() {
        var error = document.getElementById("error")

            // Changing content and color of content
            error.textContent = ""
            error.style.color = "yellow"
        
           
      
    }
    function errorMessage() {
      console.log("error msg function")
        var error = document.getElementById("error")

            // Changing content and color of content
            error.textContent = "Please enter  a valid userid password"
            error.style.color = "red"
            setTimeout(function() {
                error.textContent = ""
      }, 5000);
        
           
      
    }
</script>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      <script src="js/main.js"></script>
      <script src="js/log.js"></script>
  </body>
</html>
<?php
if(isset($_POST['loginForm']))
{
    
    $myid=$_POST['userid'];
  
    

$mypassword= $_POST['userpass'];

$sql= "SELECT  * 
FROM staff_view WHERE staff_id = '$myid' 
AND staff_pass='$mypassword' ";
$result = $conn -> query($sql);

if ($result){
    if($result->num_rows ==1) {
        if($myid[0]=='D'&& isset($_POST['doc'])){
            echo "<script>window.location.href='docdashboard.php';</script>";
            exit; 
        }
        else if($myid[0]=='A'){
            echo "<script>window.location.href='admDashboard.html';</script>";
            exit;
        }
        else if($myid[0]=='R' && isset($_POST['rec'])){
            echo "<script>window.location.href='recDashboard.php';</script>";
            exit;
        }
        
    }
    else{
      if(isset($_POST['userpass']))
      {
        echo "<script>errorMessage();</script>";

        echo "<script>console.log(\"incorrect values\")</script>";
    // echo "<script>alert(\"login unsuccessfull\")</script> ";
  
  
      }

    }

   
    
}
else{
  echo "<h2>fail</h2>";
  




}

}
?>