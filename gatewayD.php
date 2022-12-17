<?php
require 'connection.php';
session_start();
$mypassword= $_POST['userpass'];
$myid=$_POST['userid'];

$sql= "SELECT  * 
FROM doctor_table WHERE doc_id = '$myid' 
AND doc_pass='$mypassword' ";
$result = $conn -> query($sql);

if ($result){
    if($result->num_rows ==1) {
        header("Location:docdashboard.html");
    }
else{echo "incorect 1  login";}
    
}
else{echo "incorect 2";}

?>