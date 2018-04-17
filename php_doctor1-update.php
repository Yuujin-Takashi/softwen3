<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Affliated Doctor</title>
<style>
.doctor {display:none}
</style>
<body>

<?php require('head1.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Affliated Doctor</h2>
  </header>

<?php
if(isset($_GET['doctorid']))
{
        $doctorid = $_GET['doctorid'];
        $doctorname = $_GET['doctorname'];      
        $doctorspecialty = $_GET['doctorspecialty'];
        $doctorcontact = $_GET['doctorcontactno'];      
        $doctoremail = $_GET['doctoremail'];  
        $doctorhrs = $_GET['doctorhrs'];
        $doctordays = $_GET['doctordays'];  
}
?>

<div class="w3-container form">
<form name="affdoctor" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Name:</label>
<input class="w3-input w3-border" type="text" name="doctorname1" value="<?=$doctorname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Specialty:</label>
<input class="w3-input w3-border" type="text" name="doctorspecialty1" value="<?=$doctorspecialty?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Hospital:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT HospitalName, HospitalAddress FROM `tblhospital` ORDER BY HospitalName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='hospitalid'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['HospitalName']." - " .$row['HospitalAddress']."'>".$row['HospitalName']." - " .$row['HospitalAddress']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="doctorcontactno1" value="<?=$doctorcontactno?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="doctoremail1" value="<?=$doctoremail?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Operating Hours:</label>
<input class="w3-input w3-border" type="text" name="doctorhrs1" value="<?=$doctorhrs?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Operating Days:</label>
<input class="w3-input w3-border" type="text" name="doctordays1" value="<?=$doctordays?>" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />
<p><br></p>

</form>
</div>

</div>


<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['update']))
{
        $doctorname1 = $_POST['doctorname1'];      
        $doctorspecialty1 = $_POST['doctorspecialty1'];   
        $doctorhospital1 = $_POST['hospitalid'];   
        $doctorcontact1 = $_POST['doctorcontactno1'];      
        $doctoremail1 = $_POST['doctoremail1'];  
        $doctorhrs1 = $_POST['doctorhrs1'];
        $doctordays1 = $_POST['doctordays1'];  

$query2 = "UPDATE `tblaffliateddoctor` SET `DoctorName` = '$doctorname1', `DoctorSpecialty` = '$doctorspecialty1', `DoctorHospital` = '$doctorhospital1', `DoctorContactNo` = '$doctorcontact1', `DoctorEmail` = '$doctoremail1', `DoctorOperatingHrs` = '$doctorhrs1', `DoctorOperatingDays` = '$doctordays1' WHERE `tblaffliateddoctor`.`DoctorID` = $doctorid";

        $result2 = mysql_query($query2);
        if($result2) {
?>

   <script>
  alert('Doctor Updated Successfully.');
        window.location.href='affliated_doctor1.php';
        </script>

<?php } else { ?>

  <script>
  alert('Error in Updating Doctor.');
        window.location.href='affliated_doctor1.php';
        </script>

<?php
}
} 
?>
<?php require('foot.html'); ?>
</body>
</html>