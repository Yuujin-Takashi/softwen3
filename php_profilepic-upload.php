<?php
require('clinic_database/clinicdb.php');
require('session.php');

if(isset($_POST['upload']))
{    
        $staffemail = $_POST['email'];

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "profile/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
 $sql = "UPDATE `tblclinicstaff` SET `StaffPic` = '$final_file' WHERE `tblclinicstaff`.`StaffEmail` = '$staffemail'";

  mysql_query($sql);
  ?>
  <script>
  alert('Profile Picture Successfully Uploaded.');
        window.location.href='user_profile.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Uploading Profile Picture.');
        window.location.href='user_profile.php';
        </script>
  <?php
 }
}
?>