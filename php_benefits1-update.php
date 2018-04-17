<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Medical Benefits</title>
<style>
.benefits {display:none}
</style>
<body>

<?php require('head1.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Medical Benefits</h2>
  </header>

<?php
if(isset($_GET['benefitid']))
{
	  $benefitid = $_GET['benefitid']; 
        	  $benefitname = $_GET['benefitname'];
       	  $benefitdesc = $_GET['benefitdesc'];
	  $benefitfile = $_GET['benefitfile']; 
}
?>

<div class="w3-container form">
<form name="update_benefits" action="" method="post" enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">File Name</label>
<input class="w3-input w3-border" type="text" name="benefitname1" value="<?=$benefitname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">File Description</label>
<input class="w3-input w3-border" type="text" name="benefitdesc1" value="<?=$benefitdesc?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Medical Benefit File</label>
<p></p>
<input type="file" name="file" value="<?=$benefitfile?>" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />
<p></p>

</form>
</div>

</div>

<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['update']))
{    
        $benefitname1 = $_POST['benefitname1'];
        $benefitdesc1 = $_POST['benefitdesc1'];

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "benefit_files/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "UPDATE `tblmedicalbenefits` SET `BenefitName` = '$benefitname1', `BenefitDesc` = '$benefitdesc1', `BenefitFile`= '$final_file' WHERE `tblmedicalbenefits`.`BenefitID` = '$benefitid'";

  mysql_query($sql);
  ?>
  <script>
  alert('File Updated Successfully.');
        window.location.href='medical_benefits1.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Updating File.');
        window.location.href='medical_benefits1.php';
        </script>
  <?php
 }
}
?>
<?php require('foot.html'); ?>
</body>
</html>