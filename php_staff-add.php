<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['add']))
{    

       $stafffname = $_POST['stafffname'];
        $staffmname = $_POST['staffmname'];
        $stafflname = $_POST['stafflname'];
        $staffgender = $_POST['gender'];
        $staffaddress = $_POST['staffaddress'];
        $staffcontact = $_POST['staffcontact'];
        $staffemail = $_POST['staffemail'];
        $staffsite = $_POST['staffsite'];
        $staffdepartment = $_POST['staffdepartment'];
        $staffposition = $_POST['position'];
	$stafffname = stripslashes($stafffname);
	$stafffname = mysql_real_escape_string($stafffname);
	$staffmname = stripslashes($staffmname);
	$staffmname = mysql_real_escape_string($staffmname);
	$stafflname = stripslashes($stafflname);
	$stafflname = mysql_real_escape_string($stafflname);
	$staffaddress = stripslashes($staffaddress);
	$staffaddress = mysql_real_escape_string($staffaddress);
	$staffcontact = stripslashes($staffcontact);
	$staffcontact = mysql_real_escape_string($staffcontact);
	$staffemail = stripslashes($staffemail);
	$staffemail = mysql_real_escape_string($staffemail);
	$staffsite = stripslashes($staffsite);
	$staffsite = mysql_real_escape_string($staffsite);
	$staffdepartment = stripslashes($staffdepartment);
	$staffdepartment = mysql_real_escape_string($staffdepartment);
	$staffbdate = date("Y-m-d", strtotime($_POST['staffbdate']));



 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "profile/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "INSERT INTO `tblclinicstaff` (StaffFname, StaffMname, StaffLname, StaffPic, StaffGender, StaffAddress, StaffBdate, StaffContactNo, StaffEmail, StaffSite, StaffPosition) VALUES ('$stafffname', '$staffmname' , '$stafflname', '$final_file', '$staffgender', '$staffaddress' , '$staffbdate' , '$staffcontact', '$staffemail', '$staffsite', '$staffposition')";

  mysql_query($sql);
  ?>
<script>
  alert('Staff Added Successfully.');
        window.location.href='clinic_staff.php';
        </script>
  <?php
 }
 else
 {
  ?>
   <script>
  alert('Error in Adding Clinic Staff.');
        window.location.href='clinic_staff.php';
        </script>

  <?php
 }
}
?>