<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['equipmentsid'] != "")
{
      $equipmentsid = $_GET['equipmentsid'];       

            $query3 = "DELETE FROM `tblequipments` WHERE `tblequipments`.`EquipmentID` = $equipmentsid";

            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

 <script>
  alert('Medical Equipment Deleted Successfully.');
        window.location.href='medical_equipments.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Deleting Medical Equipment.');
        window.location.href='medical_equipments.php';
        </script>

<?php
}
 }
?>
</body>
</html>