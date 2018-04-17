<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['benefitid'] != "")
{
        $benefitid = $_GET['benefitid'];   

            $query3 = "DELETE FROM `tblmedicalbenefits` WHERE `tblmedicalbenefits`.`BenefitID` = $benefitid";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

   <script>
  alert('File Deleted Successfully.');
        window.location.href='medical_benefits.php';
        </script>

 <?php }  else { ?>

  <script>
  alert('Error in Deleting File.');
        window.location.href='medical_benefits.php';
        </script>

<?php
}
 }
?>
</body>
</html>