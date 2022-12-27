<?php
require 'connection.php';
session_start();
// $pat_id= $_POST['pat_id'];
// $pat_name = $_POST['pat_name'];
// $pat_phno = $_POST['pat_phno'];
// $pat_dp = $_POST['pat_dp'];
// $pat_gen = $_POST['pat_gen'];
// $pat_bg = $_POST['pat_bg'];
// $pat_ht = $_POST['pat_ht'];
// $pat_wt = $_POST['pat_wt'];
// $pat_age = $_POST['pat_age'];
// $rec_id = $_POST['rec_id'];
// $pat_insu = $_POST['pat_insu'];

$pat_id=630+rand(10,100);
$pat_name ='pat_name';
$pat_phno ='pat_phno';
$pat_dp ='pat_dp';
$pat_gen ='pat_gen';
$pat_bg ='pat_bg';
$pat_ht ='pat_ht';
$pat_wt ='pat_wt';
$pat_age ='pat_age';
$recep_id ='REC201';
$pat_insu ='pat_insu';


echo "got  $pat_id , $pat_phno , $pat_dp , $pat_gen , $pat_gen , $pat_bg ,  $pat_ht ,  $pat_wt ,  $pat_age ,  $recep_id ,  $pat_insu";


$sql = "INSERT INTO `patient_table`(`pat_name` , `pat_id`, `pat_phno`, `pat_dp`, `pat_gen`, `pat_bg`, `pat_ht`, `pat_wt`, `pat_age`, `recep_id`, `pat_insu`) 
VALUES ('$pat_name','PAT$pat_id','$pat_phno','$pat_dp','$pat_gen','$pat_bg', '$pat_ht', '$pat_wt', '$pat_age', '$recep_id', '$pat_insu')";
$result = $conn -> query($sql);

if ($result){
    echo "inserted   $pat_id , $pat_phno , $pat_dp , $pat_gen , $pat_gen , $pat_bg ,  $pat_ht ,  $pat_wt ,  $pat_age ,  $recep_id ,  $pat_insu";
}
else{echo " sql result error ".mysqli_error($conn);}

?>