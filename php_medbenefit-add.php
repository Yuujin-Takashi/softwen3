<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['add']))
{    

        $benefitname = $_POST['benefitname'];
        $benefitdescription = $_POST['benefitdescription'];
	$benefitname = stripslashes($benefitname);
	$benefitname = mysql_real_escape_string($benefitname);
	$benefitdescription = stripslashes($benefitdescription);
	$benefitdescription = mysql_real_escape_string($benefitdescription);


 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "benefit_files/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "INSERT INTO `tblmedicalbenefits` (BenefitName, BenefitDesc, BenefitFile) VALUES ('$benefitname', '$benefitdescription', '$final_file')";

  mysql_query($sql);
  ?>
  <script>
  alert('File Added Successfully.');
        window.location.href='medical_benefits.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Adding File.');
        window.location.href='medical_benefits.php';
        </script>
  <?php
 }
}
?>