<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['deptid'] != "")
{
      $deptid = $_GET['deptid'];       

            $query3 = "DELETE FROM `tbldept` WHERE `tbldept`.`DeptID` = $deptid;";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

  <script>
  alert('Department Deleted Successfully.');
        window.location.href='department.php';
        </script>

 <?php }else { ?>

  <script>
  alert('Error in Deleting Department.');
        window.location.href='department.php';
        </script>

<?php
}
 }
?>
</body>
</html>