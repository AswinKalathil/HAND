<?php
require 'connection.php';
session_start();
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
    
}
else{echo "incorect";}

}
?>