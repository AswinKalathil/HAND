<?php
require 'connection.php';
session_start();
$mypassword= $_POST['userpass'];
$myid=$_POST['userid'];

$sql= "SELECT  * 
FROM admin_table WHERE adm_id = '$myid' 
AND adm_pass='$mypassword' ";
$result = $conn -> query($sql);

if ($result){
    if($result->num_rows ==1) {
        header("Location:dashboard.html");
    }
    
}
else{echo "incorect";}

?>