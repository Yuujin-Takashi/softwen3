<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Equipmets</title>
<style>
.equipments {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Medical Equipments</h2>
  </header>

<?php
if(isset($_GET['equipmentsid']))
{
            $equipmentsid = $_GET['equipmentsid'];
            $equipmentsname = $_GET['equipmentsname'];
            $equipmentsdesc = $_GET['equipmentsdesc'];
            $equipmentsqty = $_GET['equipmentsqty'];
            $equipmentsprice = $_GET['equipmentsprice'];
}
?>

<div class="w3-container form"> 
<form name="equipments" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Equipment Name</label>
<input class="w3-input w3-border" type="text" name="equipmentsname1" value="<?=$equipmentsname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Description</label>
<input class="w3-input w3-border" type="text" name="equipmentsdesc1" value="<?=$equipmentsdesc?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Quantity</label>
<input class="w3-input w3-border" type="number" name="equipmentsqty1" value="<?=$equipmentsqty?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Price</label>
<input class="w3-input w3-border" type="number" name="equipmentsprice1" value="<?=$equipmentsprice?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Category</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT CategoryID, CategoryName FROM `tblcategory` ORDER BY CategoryName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='categoryid'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['CategoryID']."'>".$row['CategoryName']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>

<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />
</form>
</div>

</div>


<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['update']))
{
            $equipmentsname1 = $_POST['equipmentsname1'];
            $equipmentsdesc1 = $_POST['equipmentsdesc1'];
            $equipmentsquantity = $_POST['equipmentsqty1'];
            $equipmentsprice1 = $_POST['equipmentsprice1'];
            $categoryid = $_POST['categoryid'];          

            $query2 = "UPDATE `tblequipments` SET `EquipmentName`='$equipmentsname1',`EquipmentDesc`='$equipmentsdesc1',`EquipmentQty`=$equipmentsquantity,`EquipmentPrice`=$equipmentsprice1,`CategoryID`= $categoryid WHERE `EquipmentID`=$equipmentsid";

            $result2 = mysql_query($query2);
            
           if($result2) {	
?>

  <script>
  alert('Medical Equipment Updated Successfully.');
        window.location.href='medical_equipments.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Updating Medical Equipment.');
        window.location.href='medical_equipments.php';
        </script>

<?php
}
 }
?>

<?php require('foot.html'); ?>
</body>
</html>