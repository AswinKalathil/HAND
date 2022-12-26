<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login page</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>LOGIN</h3>
                    <p>Please enter your credentials to login</p>
                </div>
            </div>
            <form name=' loginForm' class="login-form" action="login.php" method="post">
                <input type="hidden" name="loginForm" value=""/>
                <input name="userid" type="text" placeholder="username"/>
                <input name="userpass" type="password" placeholder="password"/>
                <button type ="submit">login</button>
            

            </form>
        </div>

    </div>
</body>
</html>

<?php
if(isset($_POST['loginForm']))
{
  
$mypassword= $_POST['userpass'];
$myid=$_POST['userid'];
$sql= "SELECT  * 
FROM staff_view WHERE staff_id = '$myid' 
AND staff_pass='$mypassword' ";
$result = $conn -> query($sql);

if ($result){
    if($result->num_rows ==1) {
        if($myid[0]=='D'){
            echo "<script>window.location.href='docdashboard.php';</script>";
            exit; 
        }
        else if($myid[0]=='A'){
            echo "<script>window.location.href='admDashboard.html';</script>";
            exit;
        }
        else if($myid[0]=='R'){
            echo "<script>window.location.href='recDashboard.html';</script>";
            exit;
        }


    }
    
}
else{echo "incorect";}
}
?>