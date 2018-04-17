<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Medical Supplies</title>
<style>
.supply {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Medical Supplies</h2>
  </header>

<?php
if(isset($_GET['supplyid']))
{
        $supplyid = $_GET['supplyid'];
        $supplyname = $_GET['supplyname'];
        $supplydesc = $_GET['supplydesc'];
        $supplyquantity = $_GET['supplyquantity'];
        $supplyprice = $_GET['supplyprice'];
}
?>

<div class="w3-container form"> 
<form name="supply" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Supply Name</label>
<input class="w3-input w3-border" type="text" name="supplyname1" value="<?=$supplyname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Description</label>
<input class="w3-input w3-border" type="text" name="supplydesc1" value="<?=$supplydesc?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Quantity</label>
<input class="w3-input w3-border" type="number" name="supplyquantity1" value="<?=$supplyquantity?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Price</label>
<input class="w3-input w3-border" type="number" name="supplyprice1" value="<?=$supplyprice?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Category</label>
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
        $supplyname1 = $_POST['supplyname1'];
        $supplydesc1 = $_POST['supplydesc1'];
        $supplyquantity1 = $_POST['supplyquantity1'];
        $supplyprice1 = $_POST['supplyprice1'];
        $categoryid = $_POST['categoryid'];

            $query2 = "UPDATE `tblsupply` SET `SupplyName` = '$supplyname1', `SupplyDesc` = '$supplydesc1', `SupplyQty` = '$supplyquantity1', `SupplyPrice` = '$supplyprice1', `CategoryID` = '$categoryid' WHERE `tblsupply`.`SupplyID` = $supplyid";

            $result2 = mysql_query($query2);
            
           if($result2) {	
?>

  <script>
  alert('Medical Supply Updated Successfully.');
        window.location.href='medical_supplies.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Updating Medical Supply.');
        window.location.href='medical_supplies.php';
        </script>

<?php
}
 }
?>

<?php require('foot.html'); ?>
</body>
</html>