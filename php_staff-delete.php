<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['staffid'] != "")
{
        $staffid = $_GET['staffid'];

            $query3 = "DELETE FROM `tblclinicstaff` WHERE `tblclinicstaff`.`StaffID` = $staffid";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

    <script>
  alert('Staff Deleted Successfully.');
        window.location.href='clinic_staff.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Deleting Clinic Staff.');
        window.location.href='clinic_staff.php';
        </script>

<?php
}
 }
?>
</body>
</html>