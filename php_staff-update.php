<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Clinic Staff</title>
<style>
.staff {display:none}
</style>
<body>

<?php require('head.html'); ?>

<div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Clinic Staff</h2>
  </header>

<?php
if(isset($_GET['staffid']))
{
	$staffid = $_GET['staffid']; 
	$stafffname = $_GET['stafffname'];
	$staffmname = $_GET['staffmname'];
	$stafflname = $_GET['stafflname'];
	$staffaddress = $_GET['staffaddress'];
	$staffbdate = $_GET['staffbdate'];
	$staffcontactno = $_GET['staffcontactno'];
	$staffemail = $_GET['staffemail'];
	$staffsite = $_GET['staffsite'];
}
?>

<div class="w3-container form">
<form name="staff" action="" method="post"  enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">
<p></p>
<p></p>
<label class="w3-label">Picture:</label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">First Name:</label>
<input class="w3-input w3-border" type="text" name="stafffname1" value="<?=$stafffname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Middle Name:</label>
<input class="w3-input w3-border" type="text" name="staffmname1" value="<?=$staffmname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Last Name:</label>
<input class="w3-input w3-border" type="text" name="stafflname1" value="<?=$stafflname?>" required style="margin-bottom:5px" />
<p></p>
<input class="w3-radio" type="radio" name="gender1" value="male">
<label class="w3-label">Male</label>
<p></p>
<input class="w3-radio" type="radio" name="gender1" value="female">
<label class="w3-label">Female</label>
<p></p>
<label class="w3-label">Address:</label>
<textarea class="w3-input w3-border" type="text" name="staffaddress1"value="<?=$staffaddress?>" required style="margin-bottom:5px"></textarea>
<p></p>
<label class="w3-label">Birthdate:</label>
<input class="w3-input w3-border" type="text" name="staffbdate1" value="<?=$staffbdate?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="staffcontactno1"value="<?=$staffcontactno?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="staffemail1" value="<?=$staffemail?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Site:</label>
<input class="w3-input w3-border" type="text" name="staffsite1" value="<?=$staffsite?>" required style="margin-bottom:5px" />
<p></p>
<input class="w3-radio" type="radio" name="position1" value="Doctor">
<label class="w3-label">Doctor</label>
<p></p>
<input class="w3-radio" type="radio" name="position1" value="Nurse">
<label class="w3-label">Nurse</label>
<p></p>
<input class="w3-input w3-black w3-ripple w3-hover-teal" type="submit" name="update" id="submit" value="Update" style="margin-bottom:10px" />

</form>
</div>

   </div>

<?php
if(isset($_POST['update']))
{    
        $stafffname1 = $_POST['stafffname1'];
        $staffmname1 = $_POST['staffmname1'];
        $stafflname1 = $_POST['stafflname1'];
        $staffgender1 = $_POST['gender1'];
        $staffaddress1 = $_POST['staffaddress1'];
        $staffcontactno1 = $_POST['staffcontactno1'];
        $staffemail1 = $_POST['staffemail1'];
        $staffsite1 = $_POST['staffsite1'];
        $staffdepartment1 = $_POST['staffdepartment1'];
        $staffposition1 = $_POST['position1'];
        $staffbdate1 = date("Y-m-d", strtotime($_POST['staffbdate1']));



 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "profile/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "UPDATE `tblclinicstaff` SET `StaffFname` = '$stafffname1', `StaffMname` = '$staffmname1', `StaffLname` = '$stafflname1', `StaffPic` = '$final_file' , `StaffGender` = '$staffgender1', `StaffAddress` = '$staffaddress1', `StaffBdate` = '$staffbdate1', `StaffContactNo` = '$staffcontactno1', `StaffEmail` = '$staffemail1', `StaffSite` = '$staffsite1', `StaffPosition` = '$staffposition1' WHERE `tblclinicstaff`.`StaffID` = $staffid";

  mysql_query($sql);
  ?>
   <script>
  alert('Staff Updated Successfully.');
        window.location.href='clinic_staff.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Updating Clinic Staff.');
        window.location.href='clinic_staff.php';
        </script>

  <?php
 }
}
?>