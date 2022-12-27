require 'connection.php';
session_start();
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

?>