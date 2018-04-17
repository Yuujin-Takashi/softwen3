<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['employeeid'] != "")
{
   $employeeid = $_GET['employeeid'];

            $query3 = "DELETE FROM `tblemployees` WHERE `tblemployees`.`EmployeeID` = $employeeid";


            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

    <script>
  alert('Employee Deleted Successfully.');
        window.location.href='employee.php';
        </script>

 <?php }  else { ?>

  <script>
  alert('Error in Deleting Employee.');
        window.location.href='employee.php';
        </script>

<?php
}
 }
?>
</body>
</html>