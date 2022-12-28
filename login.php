<?php
require 'connection.php';
session_start();
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
            echo "<script>window.location.href='recDashboard.php';</script>";
            exit;
        }
    }
    
}
else{echo "incorect";}
}
?>