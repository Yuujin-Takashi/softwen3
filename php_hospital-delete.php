<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['hospitalid'] != "")
{
      $hospitalid = $_GET['hospitalid'];

             $query3 = "DELETE FROM `tblhospital` WHERE `tblhospital`.`HospitalID` = $hospitalid";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

  <script>
  alert('Hospital Deleted Successfully.');
        window.location.href='hospital.php';
        </script>

 <?php }  else { ?>

  <script>
  alert('Error in Deleting Hospital.');
        window.location.href='hospital.php';
        </script>

<?php
}
 }
?>
</body>
</html>