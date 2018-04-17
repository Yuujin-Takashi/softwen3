<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['doctorid'] != "")
{
      $doctorid = $_GET['doctorid'];

            $query3 = "DELETE FROM `tblaffliateddoctor` WHERE `tblaffliateddoctor`.`DoctorID` = $doctorid";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

 <script>
  alert('Doctor Deleted Successfully.');
        window.location.href='affliated_doctor.php';
        </script>

<?php } else { ?>

  <script>
  alert('Error in Deleting Doctor.');
        window.location.href='affliated_doctor.php';
        </script>

<?php
}
 }
?>
</body>
</html>