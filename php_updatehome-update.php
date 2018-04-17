<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['update']))
{    
        $imageid = $_POST['imageid']; 
        $imagename = $_POST['imagename'];
        $imagedescription = $_POST['imagedescription'];

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "img/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "UPDATE `tblhomeimg` SET `ImageName` = '$imagename', `ImageDesc` = '$imagedescription', `ImageFile`= '$final_file' WHERE `tblhomeimg`.`ImageID` = '$imageid'";

  mysql_query($sql);
  ?>
  <script>
  alert('Homepage Photo Updated Successfully.');
        window.location.href='update_homepage.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Updating Homepage Photo.');
        window.location.href='update_homepage.php';
        </script>
  <?php
 }
}
?>