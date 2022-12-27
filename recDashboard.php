<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="details.css">
</head>
<body>
    <div class="patient-details">
        <div class="form">
            <div class="details">
                <div class="details-header">
                    <h3>Patient Details</h3>
                </div>
            </div>
            <form class="details-form" method="post" >
                <table class="input-table">
                    <tr>
                <td><label for="pat_name">Name:</label></td>
                <td><input type="text" id="pat_name" name="pat_name"/></td>
                    </tr>
                    <tr>
                        <td><label for="lname">Patientid:</label></td>
                        
                    </tr>
                    <tr>
                        <td><label for="pat_age">Age:</label></td>
                        <td><input type="text" id="pat_age" name="pat_age"/></td>
                   </tr>
            <tr>
                <td><label for="pat_dp">Pshoto:</label></td>
                <td><input type="file" id="pat_dp" name="pat_dp" accept="image/*"/></td>
            </tr>
            
            <tr>
                <td><label for="pat_gen">Gender:</label></td>
                <td><input type="text" id="pat_gen" name="pat_gen"/></td>
            </tr>
        </table>
            <table class="input-table" >
            <tr>
                <td><label for="pat_ht">Height:</label></td>
                <td><input type="text" id="pat_ht" name="pat_ht"/></td>
            </tr>
            <tr>
                <td><label for="pat_wt">Weight:</label></td>
                <td><input type="text" id="pat_wt" name="pat_wt"/></td>
            </tr>
            <tr>
                <td><label for="pat_bg">Blood Group:</label></td>
                <td><input type="text" id="pat_bg" name="pat_bg"/></td>
            </tr>
            <tr>
                <td><label for="pat_insu">Insurance Number:</label></td>
                <td><input type="text" id="pat_insu" name="pat_insu"/></td>
            </tr>
            <tr>
                <td><label for="patphno">Phoneno:</label></td>
                <td><input type="text" id="pat_phno" name="pat_phno"/></td>
            </tr>
            <tr>
                <td></td>
                <td><button>submit</button></td>
            </tr>
            
            </table>
            
            </form>
        </div>

    </div>
</body>
</html>