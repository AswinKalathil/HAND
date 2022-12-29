<?php
session_start();
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
  </head>
  <body>
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <div class="container bootstrap snippets bootdey">
      <div class="row">
        <div class="profile-nav col-md-3">
          <div class="panel">
            <div class="user-heading round">
              <a href="#">
                <img
                  src="https://bootdey.com/img/Content/avatar/avatar3.png"
                  alt=""
                />
              </a>
              <h1>Camila Smith</h1>
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
                <form name="patientSearchForm" action="<?php  search(); ?>" method="post">
                  <input type="hidden" name="patientSearchForm" value=""/>
                      <input name="pat_id" type="text" placeholder="Patient_id">
                      <button type = "submit">Submit</button>
                  </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="profile-info col-md-9">
          <div class="panel">
            <div class="bio-graph-heading">PATIENT DETAILS</div>
            <div class="panel-body bio-graph-info">
              <h1>Basic Details</h1>
              <div class="row">
                <div class="bio-row">
                  <p id="d_age"><span>Age :</span></p>
                </div>
                <div class="bio-row">
                  <p><span>Gender :</span></p>
                </div>
                <div class="bio-row">
                  <p><span>Weight :</span></p>


                </div>
                <div class="bio-row">
                  <p><span>Height :</span></p>
                </div>
                <div class="bio-row">
                  <p><span>Blood Group :</span></p>
                </div>
                <div class="bio-row">
                  <p><span>Mobile :</span></p>
                </div>
                <div class="bio-row">
                  <p><span>Receptionist ID :</span></p>
                </div>
                <div class="bio-row">
                  <p><span>Insurance No:</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <form action="">
            <div class="form-group col-xs-6">
              <div class="input-group">
                <!-- <input type="text" class="form-control" /> -->
                <h4 class="red">Description</h4>
                <textarea class="form-control" id="Description" name="Description" rows="4" cols="60" required >
                  </textarea>

                
              </div>
            </div>
            <div class="form-group col-xs-6">
              <div class="input-group">
                <!-- <input type="text" class="form-control" /> -->
                <h4 class="terques">Prescription</h4>

                <textarea class="form-control" id="Prescription" name="Prescription" rows="4" cols="60" required>
                  </textarea>
                
              </div>
            </div>
            <div class="input-group-btn">
            
                <button class="btn btn-default" type="submit">Submit</button>
              </span>
            </div>
          </form>
          </div>
          <div
            style="
              border: 3px solid rgb(163, 160, 160);
              padding-top: 2.4%;
              padding-left: 2.4%;
              padding-right: 2.4%;
            "
          >
            <div class="row">
              <div class="col-md-6">
                <div class="panel">
                  <div class=" panel-body">
                    <div class="bio-desk" >
                      <h4 class="red">Description</h4>
                      <p>Fever
                        sneesing</p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel">
                  <div class="panel-body">
                    <div class="bio-desk">
                      <h4 class="terques">Prescription</h4>
                      <p>Dolo 650</p>
                      <p>Cetrizines</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript"></script>
  </body>
</html>
<?php

function search(){


if(isset($_POST['patientSearchForm']))
{
    require 'connection.php';

    
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
}
?>
