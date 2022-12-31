<?php
session_start();
// insertData();
function getPrid(){
  require 'connection.php';
  $sql = "SELECT MAX(pr_id) as prePRid from patient_record_table; ";
  $result = $conn -> query($sql);
  if($result)
  {
      $row = $result->fetch_assoc();
      $prid=(int)substr($row['prePRid'],2);
      $pat_id=(string)$prid+1;
      return $pat_id; 
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link
      href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style1.css" />
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
      
      // function insertData(){
  
      //   var patid = document.getElementById("pat_id").value;
      //   sessionStorage.setItem("pat_id", patid);
       
      //   let lastname = sessionStorage.getItem("pat_id");
        
      //   console.log($_SESSION[lastname]);
      //   <?php  
      //   echo "got " .$_SESSION["pat_id"];
        
      //   ?>
      // }


    </script>
  </head>
  <body>
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <div class="container bootstrap snippets bootdey">
      <div class="row">
        <div class="profile-nav col-md-3" >
          <div class="panel">
            <div class="user-heading round">
              <a href="#">
                <img
                  src="https://bootdey.com/img/Content/avatar/avatar3.png"
                  alt=""
                />
              </a>
              <h1  id="name_tag">Camila Smith</h1>
              <p>#<span></span></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
              <li class="active">
                <a href="#"> <i class="fa fa-user"></i> Profile</a>
              </li>
              <li>
                <a href="#"> <i class="fa fa-edit"></i> Edit profile</a>
              </li>
              <li>
                <form name="patientSearchForm" action="" method="post">
                  <input type="hidden" name="patientSearchForm" value=""/>
                      <input name="pat_id" id="pat_id" type="text" placeholder="Patient_id" value="<?php 
                if(isset($_POST['pat_id'])){
                  echo $_POST["pat_id"];
                }
                ?>">
                      <button type = "" onclick="">Submit</button>
                  </form>
              </li>
              
              <li>
                <div style="height:500px !important;"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="profile-info col-md-9">
          <div class="panel">
            <div style="font-size: 30px;" class="bio-graph-heading">PATIENT DETAILS</div>
            <div class="panel-body bio-graph-info">
              <h1>Basic Details</h1>
              <div class="row">
                <div class="bio-row">
                  <h4 id="pat_age"><span>Age :</span></h4>
                </div>
                <div class="bio-row">
                  <h4 id="pat_gen"  ><span>Gender :</span></h4>
                </div>
                <div class="bio-row">
                  <h4 id="pat_wt" ><span>Weight :</span></h4>


                </div>
                <div class="bio-row">
                  <h4 id="pat_ht" ><span>Height :</span></h4>
                </div>
                <div class="bio-row">
                  <h4 id="pat_bg" ><span>Blood Group :</span></h4>
                </div>
                <div class="bio-row">
                  <h4 id="pat_ph" ><span>Mobile :</span></h4>
                </div>
                <!-- <div class="bio-row">
                  <h4 id="pat_rec" ><span>Receptionist ID :</span></h4>
                </div> -->
                <div class="bio-row">
                  <h4 id="pat_inc" ><span>Insurance No:</span></h4>
                </div>
              </div>
            </div>
          </div>

          <div class="row" >
            <form action="detailsdisplay.php" method="POST" >
              <input type="hidden" name="pat_id" value="<?php 
                if(isset($_POST['pat_id'])){
                  echo $_POST["pat_id"];
                }
                ?>">
                <input type="hidden" name="medform" value="">
          <h4 class="red">Description</h4>
                <textarea class="form-control" id="Description" name="Description" rows="4" cols="60" required >
                
                  </textarea>
                  <h4 class="terques">Prescription</h4>
                <textarea class="form-control" id="Prescription" name="Prescription" rows="4" cols="60" required >
                
                
                </textarea>
                <div style=" display:flex; justify-content:right ; padding: 20px;">
                <button  style="background-color:#2da44e;color:aliceblue" class="btn btn-default" type="" onclick="<?php insertData();  ?>" ><B>INSERT<B></button>

                </div>

                </form>



          </div>
          
          <div class="row">
              <a href="<?php creatCard(search());  ?>"></a>
              </div>
      </div>
      
             
        </div>
       
    </div>
    
 
  </body>
</html>




<?php


function insertData(){
echo "<script>console.log(\"insertData\")</script>";

  if(isset($_POST['pat_id']) && isset($_POST['medform']) &&  $_SESSION['prepat_id']!==$_POST['pat_id'] )
  {

    $_POST['pat_id']=$_POST['pat_id'];
    $_POST['patientSearchForm']="j";


    require 'connection.php';

    $_SESSION['prepat_id']=$_POST['pat_id'];
    $pat_id= $_POST['pat_id'];
    $pr_id=getPrid();
    $pat_desc=$_POST['Description'];
    $pat_pre=$_POST['Prescription'];
    
    $doc_id="DOC407";

    $sql2 = "INSERT INTO `patient_record_table` (`pr_id`, `pat_desc`, `pat_pre`, `pat_id`, `doc_id`, `pr_date`)
     VALUES ('PR$pr_id', '$pat_desc', '$pat_pre', '$pat_id', '$doc_id', CURDATE())";
    $result = $conn -> query($sql2);
    
    if ($result)
        {
    
    echo "<script>console.log(\"insert   Data success      
    \"$pr_id', '$pat_desc', '$pat_pre', '$pat_id', '$doc_id'\")</script>";
    
        }
    else{
      
      $sqlerror=mysqli_error($conn);
      echo "<script>console.log(\" $sqlerror\")</script>";}
        
    
   



    
  }


}

$patid;
'connection.php';




function creatCard($result){

$n=$result->num_rows;
if($n==0)
{
  echo "<h3 style;\" pading:20px;\" class=\"date-sticker\">NO HISTORY TO SHOW </h3>";
}
for($i=0;$i<$n;$i++)
{
  $row = $result->fetch_assoc();
$desc=$row['pat_desc'];
$pre=$row['pat_pre'];
$date=$row['pr_date'];


// $test=$_SESSION["pat_id"];

if($i==0)
{ echo "</a><h2 type=\"hiden\" class=\" hist\"></h2>";}
echo "
<div class=\"card-panel\">
<div class=\"row\">
  <div class=\"col-md-6\">
    <div class=\"panel\">
    
      <div class=\" panel-body\">
        <div class=\"bio-desk\"  >
        
         

          <h4 class=\"red\" style=\"margin-top:-4px;\" >Description</h4>
          <p>$desc</p>
          
        </div>
      </div>
    </div>
  </div>
  <div class=\"col-md-6\">
    <div class=\"panel\">
      <div class=\"panel-body\">
        <div class=\"bio-desk\">
        <h3 class=\"date-sticker\">$date</h3>
          <h4 class=\"terques\">Prescription</h4>
          <p> $pre</p>
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>";

}
}


function search(){


if(isset($_POST['patientSearchForm']))
{
    require 'connection.php';

    $_SESSION['pat_id']=$_POST['pat_id'];
    $patid= $_POST['pat_id'];
    $sql = "SELECT * FROM `patient_display_view` WHERE `pat_id`='$patid'";
    $sql3="SELECT * FROM `patient_table` WHERE `pat_id`='$patid'";
    $result = $conn -> query($sql);
    $result3 = $conn -> query($sql3);
    echo "<script>document.getElementById(\"name_tag\").innerHTML =\"name\";</script>";
    echo "<script>document.getElementById(\"pat_age\").innerHTML =\"Age:\";</script>";



    if($result3)
    {
      if($result->num_rows > 0) {
    

      $row3 = $result3->fetch_assoc();
      $name = $row3['pat_name'];
      $age=$row3['pat_age'];
      $gen=$row3['pat_gen'];
      $wt=$row3['pat_wt'];
      $ht=$row3['pat_ht'];
      $bg=$row3['pat_bg'];
      $ph=$row3['pat_phno'];
      $inc=$row3['pat_insu'];
      


      echo "<script>document.getElementById(\"name_tag\").innerHTML =\"$name\";</script>";
    echo "<script>document.getElementById(\"pat_age\").innerHTML =\"Age: $age\";</script>";
    echo "<script>document.getElementById(\"pat_gen\").innerHTML =\"Gender: $gen\";</script>";

    echo "<script>document.getElementById(\"pat_wt\").innerHTML =\"Weight: $wt\";</script>";
    echo "<script>document.getElementById(\"pat_ht\").innerHTML =\"height: $ht\";</script>";
    echo "<script>document.getElementById(\"pat_bg\").innerHTML =\"Blood Group: $bg\";</script>";
    echo "<script>document.getElementById(\"pat_ph\").innerHTML =\"Mobile: $ph\";</script>";
    echo "<script>document.getElementById(\"pat_inc\").innerHTML =\"Age: $inc\";</script>";




      }

      

    }
    else
    {
      // error msd
    }
    
    
    if ($result){
        if($result->num_rows > 0) {
    

    
            
           return $result;




        }
    else{echo "wrong details ";}
        
    }
    else{echo "sql result error $patid";}


   

} 
}
?>
<script>


function setValues(){
document.getElementById("name_tag").innerHTML = "good";


}
       
</script>