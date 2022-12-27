<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docdashboard</title>
</head>
<body>
    <div class="container">
        <h1>Doctor dashboard</h1>
        <form name="patientSearchForm" action="<?php "docdashboard.php"?>" method="post">
        <input type="hidden" name="patientSearchForm" value=""/>
            <input name="pat_id" type="text" placeholder="Patient_id">
            <button type = "submit">Submit</button>
        </form>
     
    </div>
</body>
</html>

<?php
if(isset($_POST['patientSearchForm']))
{
    
    $patid= $_POST['pat_id'];
    $sql = "SELECT * FROM `patient_table` WHERE pat_id ='$patid'";
    $result = $conn -> query($sql);
    
    if ($result){
        if($result->num_rows ==1) {
    
    
            $row = $result->fetch_assoc();
            $PAT_NAME = $row['pat_name'];
            $PAT_AGE =$row['pat_age'];
            $PAT_PHN =$row['pat_phno'];
            echo "<H2>$PAT_NAME</H2>
            <H3>AGE: $PAT_AGE</H3>
            <H3>PHONE: $PAT_PHN</H3>";
            // header("Location:docdashboard.html");
        }
    else{echo "wrong details ";}
        
    }
    else{echo "sql result error $patid";}
} 
?>
