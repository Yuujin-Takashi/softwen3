<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Hospital / Clinic</title>
<style>
.hospital {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Hospital / Clinic</h2>
  </header>

<?php
if(isset($_GET['hospitalid']))
{
	$hospitalid = $_GET['hospitalid']; 
	$hospitalname = $_GET['hospitalname'];
	$hospitaladdress = $_GET['hospitaladdress'];
	$hospitalcontactno = $_GET['hospitalcontactno'];
	$hospitalemail = $_GET['hospitalemail'];
}
?>

<div class="w3-container form">
<form name="hospitalclinic" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Name:</label>
<input class="w3-input w3-border" type="text" name="hospitalname1" value="<?=$hospitalname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Address:</label>
<input class="w3-input w3-border" type="text" name="hospitaladdress1" value="<?=$hospitaladdress?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="text" name="hospitalcontact1" value="<?=$hospitalcontactno?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="hospitalemail1" value="<?=$hospitalemail?>" required style="margin-bottom:5px" />
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
        $hospitalname1 = $_POST['hospitalname1'];      
        $hospitaladdress1 = $_POST['hospitaladdress1'];      
        $hospitalcontact1 = $_POST['hospitalcontact1'];      
        $hospitalemail1 = $_POST['hospitalemail1'];  

       $query2 = "UPDATE `tblhospital` SET `HospitalName` = '$hospitalname1', `HospitalAddress` = '$hospitaladdress1', `HospitalContactNo` = '$hospitalcontact1', `HospitalEmail` = '$hospitalemail1' WHERE `tblhospital`.`HospitalID` = $hospitalid";
        $result2 = mysql_query($query2);
        if($result2) {
?>

   <script>
  alert('Hospital Updated Successfully.');
        window.location.href='hospital.php';
        </script>

<?php }   else { ?>

  <script>
  alert('Error in Updating Hospital.');
        window.location.href='hospital.php';
        </script>

<?php
}
} 
?>
<?php require('foot.html'); ?>
</body>
</html>