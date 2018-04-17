<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Medical Equipments</title>
<style>
.equipments {display:none}
</style>
<body>

<?php require('head1.html'); ?>

<div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Equipments</h2>
  </header>

<ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openEquipments(event, 'Show_Equipments')">Show Equipments</a></li>    
<li><a href="#" class="tablink" onclick="openEquipments(event, 'Add_Equipments')">Add Equipments</a></li>
  </ul>

<div id="Show_Equipments" class="w3-container equipments">
   <h2>Show Equipments</h2>

<!-- Equipment Table -->

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Equipment Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Equipment Number</th>
  <th>Equipment Name</th>
  <th>Equipment Description</th>
  <th>Equipment Quantity</th>
  <th>Equipment Price</th>
  <th>Equipment Category</th>
  <th></th>
</tr>
</thead>
<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblequipments`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["EquipmentID"]; ?></td>
        <td><?php echo $row["EquipmentName"]; ?></td>
        <td><?php echo $row["EquipmentDesc"]; ?></td>
        <td><?php echo $row["EquipmentQty"]; ?></td>
        <td><?php echo $row["EquipmentPrice"]; ?></td>
        <td><?php echo $row["CategoryID"]; ?></td>
        <td><a href="php_equip1-update.php?equipmentsid=<?php echo $row['EquipmentID']; ?>&equipmentsname=<?php echo $row['EquipmentName']; ?>&equipmentsdesc=<?php echo $row['EquipmentDesc']; ?>&equipmentsqty=<?php echo $row['EquipmentQty']; ?>&equipmentsprice=<?php echo $row['EquipmentPrice']; ?>">Update</a></td>
        </tr>

<?php 
}
?>
</table>
</div>
<!-- /Equipment Table -->


<div id="Add_Equipments" class="w3-container equipments">
<h2>Add Equipment</h2>
<!-- Add Equipment(s)-->
<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['add']))
{
        $equipmentsname = $_POST['equipmentsname'];
        $equipmentsdescription = $_POST['equipmentsdescription'];
        $equipmentsquantity = $_POST['equipmentsquantity'];
        $equipmentsprice = $_POST['equipmentsprice'];
        $categoryid = $_POST['categoryid'];
	$equipmentsname = stripslashes($equipmentsname);
	$equipmentsname = mysql_real_escape_string($equipmentsname);
	$equipmentsdescription = stripslashes($equipmentsdescription);
	$equipmentsdescription = mysql_real_escape_string($equipmentsdescription);
	$equipmentsquantity= stripslashes($equipmentsquantity);
	$equipmentsquantity = mysql_real_escape_string($equipmentsquantity);
	$equipmentsprice= stripslashes($equipmentsprice);
	$equipmentsprice = mysql_real_escape_string($equipmentsprice);

        $query1 = "INSERT INTO `tblequipments` (EquipmentName, EquipmentDesc, EquipmentQty, EquipmentPrice,CategoryID) VALUES ('$equipmentsname', '$equipmentsdescription', $equipmentsquantity, $equipmentsprice, $categoryid)";
        $result1 = mysql_query($query1);
        if($result1) {
?>

  <script>
  alert('Medical Equipment Added Successfully.');
        window.location.href='medical_equipments1.php';
        </script>

<?php } else { ?>

  <script>
  alert('Error in Adding Medical Equipment.');
        window.location.href='medical_equipments1.php';
        </script>

<?php
}
}
?>

<div class="w3-container form"> 
<form name="equipments" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Equipment Name</label>
<input class="w3-input w3-border" type="text" name="equipmentsname" placeholder="Equipment Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Description</label>
<input class="w3-input w3-border" type="text" name="equipmentsdescription" placeholder="Equipment Description" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Quantity</label>
<input class="w3-input w3-border" type="number" name="equipmentsquantity" placeholder="Equipment Quantity" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Equipment Price</label>
<input class="w3-input w3-border" type="number" name="equipmentsprice" placeholder="Equipment Price" required style="margin-bottom:5px" />
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

<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />
</form>
</div>

  </div>


  <div class="w3-container w3-light-grey w3-padding">
  </div>

</div>


<script>
document.getElementsByClassName("tablink")[0].click();

function openEquipments(evt, equipmentsName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("equipments");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(equipmentsName).style.display = "block";
  evt.currentTarget.className += " w3-light-grey";
}
</script>


<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<?php require('foot.html'); ?>

</body>
</html>