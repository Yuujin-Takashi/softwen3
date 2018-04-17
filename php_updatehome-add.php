<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['add']))
{    

        $imagename = $_POST['imagename'];
        $imagedescription = $_POST['imagedescription'];
	$imagename = stripslashes($imagename);
	$imagename = mysql_real_escape_string($imagename);
	$imagedescription = stripslashes($imagedescription);
	$imagedescription = mysql_real_escape_string($imagedescription);


 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "img/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "INSERT INTO `tblhomeimg` (ImageName, ImageDesc, ImageFile) VALUES ('$imagename', '$imagedescription', '$final_file')";

  mysql_query($sql);
  ?>
  <script>
  alert('Homepage Photo Added Successfully.');
        window.location.href='update_homepage.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Adding Homepage Photo.');
        window.location.href='update_homepage.php';
        </script>
  <?php
 }
}
?>