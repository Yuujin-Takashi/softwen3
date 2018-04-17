<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['supplyid'] != "")
{
   $supplyid = $_GET['supplyid'];      

 $query3 = "DELETE FROM `tblsupply` WHERE `tblsupply`.`SupplyID` = $supplyid";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

  <script>
  alert('Medical Supply Deleted Successfully.');
        window.location.href='medical_supplies.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Deleting Medical Supply.');
        window.location.href='medical_supplies.php';
        </script>

<?php
}
 }
?>
</body>
</html>