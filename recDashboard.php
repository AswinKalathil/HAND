<?php
require 'connection.php';
session_start();

function getPatid(){
    require 'connection.php';
    $sql = "SELECT MAX(pat_id) as preid from patient_table; ";
    $result = $conn -> query($sql);
    if($result)
    {
        $row = $result->fetch_assoc();
        $preid=(int)substr($row['preid'],3);
        $pat_id=(string)$preid+1;
        return $pat_id; 
    }
}

    $rec_id="REC201";
   
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<a href="index.php"><button class="btnb"><i class="fa fa-arrow-circle-left"></i> Back</button></a>
    <div class="patient-details">
        <div class="form">
      
            <div class="details">
                <div class="details-header">
                <h1>New Patient</h1>
                    <span class="id-display"><h3>REC201</h3></span> 

                </div>
            </div>

            <form class="details-form" method="post" action="./recDashboard.php">
            <input type="hidden"  name="patientform" value=" "/>
                <table class="input-table">
                    
                    <tr>
                <td><label for="pat_name">Name:</label></td>
                <td><input  type="text" id="pat_name" name="pat_name" required /></td>
                    </tr>
                   
                    <tr>
                        <td><label for="pat_age">Age:</label></td>
                        <td><input type="text" id="pat_age" name="pat_age" required/></td>
                   </tr>
                   <tr>
                <td><label for="pat_gen">Gender:</label></td>
                <td><input type="text" id="pat_gen" name="pat_gen"required/></td>
            </tr>
                   <tr>
                <td><label for="patphno">Phoneno:</label></td>
                <td><input type="text" id="pat_phno" name="pat_phno" required/></td>
                <tr>
                <td><label for="pat_insu">Insurance Number:</label></td>
                <td><input type="text" id="pat_insu" name="pat_insu" required/></td>
            </tr>
            </tr>
            
            
            
        </table>
            <table class="input-table" >
            <tr>
                <td><label for="pat_ht">Height:</label></td>
                <td><input type="text" id="pat_ht" name="pat_ht" required/></td>
            </tr>
            <tr>
                <td><label for="pat_wt">Weight:</label></td>
                <td><input type="text" id="pat_wt" name="pat_wt" required/></td>
            </tr>
            <tr>
                <td><label for="pat_bg">Blood Group:</label></td>
                <td><input type="text" id="pat_bg" name="pat_bg" required/></td>
            </tr>
            
            <tr>
                <td><label for="pat_dp">Photo:</label></td>
                <td><input type="file" id="pat_dp" name="pat_dp" accept="image/*" /></td>
            </tr>
           
            <tr>
            
                <td><h3 name="pat_id"> PAT<?php echo getPatid()?></h3></td>
                <td><button>submit</button></td>
            </tr>
            
            </table>
            
            </form>
        </div>

    </div>
</body>
</html>
<?php
if(isset($_POST['patientform']))
{
 
$pat_name =$_POST['pat_name'] ;
$pat_phno = $_POST['pat_phno'];
$pat_dp = $_POST['pat_dp'];
$pat_gen = $_POST['pat_gen'];
$pat_bg = $_POST['pat_bg'];
$pat_ht = $_POST['pat_ht'];
$pat_wt = $_POST['pat_wt'];
$pat_age = $_POST['pat_age'];
$pat_insu = $_POST['pat_insu'];

// $pat_id=630+rand(10,100);



// echo "got  $pat_id , $pat_phno , $pat_dp , $pat_gen , $pat_gen , $pat_bg ,  $pat_ht ,  $pat_wt ,  $pat_age ,  $recep_id ,  $pat_insu";

$pat_id=getPatid();
$sql = "INSERT INTO `patient_table`(`pat_name` , `pat_id`, `pat_phno`, `pat_dp`, `pat_gen`, `pat_bg`, `pat_ht`, `pat_wt`, `pat_age`, `recep_id`, `pat_insu`) 
VALUES ('$pat_name','PAT$pat_id','$pat_phno','$pat_dp','$pat_gen','$pat_bg', '$pat_ht', '$pat_wt', '$pat_age', '$rec_id', '$pat_insu')";
$result = $conn -> query($sql);

if ($result){
   
    echo " <h2 class =\"output-msg\">INSERTED SUCCESFULLY</h2>";
    echo "<script>alert(\"insertion successfull\")</script> ";
    echo "<script>window.location.href='recDashboard.php';</script>";
           
}
else{echo " sql result error ".mysqli_error($conn);}
}
?>