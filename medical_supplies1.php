<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Medical Supplies</title>
<style>
.supply {display:none}
</style>
<body>

<?php require('head1.html'); ?>

<div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Medical Supply</h2>
  </header>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
   <li><a href="#" class="tablink" onclick="openSupply(event, 'Show_Supply')">Show Supply</a></li>
 <li><a href="#" class="tablink" onclick="openSupply(event, 'Add_Supply')">Add Supply</a></li>
  </ul>


<div id="Show_Supply" class="w3-container supply">
   <h2>Show Medical Supplies</h2>
<!-- Supply Table -->

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Supply Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Supply Number</th>
  <th>Supply Name</th>
  <th>Supply Description</th>
  <th>Supply Quantity</th>
  <th>Supply Price</th>
  <th>Supply Category</th>
  <th></th>
</tr>
</thead>
<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblsupply`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["SupplyID"]; ?></td>
        <td><?php echo $row["SupplyName"]; ?></td>
        <td><?php echo $row["SupplyDesc"]; ?></td>
        <td><?php echo $row["SupplyQty"]; ?></td>
        <td><?php echo $row["SupplyPrice"]; ?></td>
        <td><?php echo $row["CategoryID"]; ?></td>
        <td><a href="php_supply1-update.php?supplyid=<?php echo $row['SupplyID']; ?>&supplyname=<?php echo $row['SupplyName']; ?>&supplydesc=<?php echo $row['SupplyDesc']; ?>&supplyquantity=<?php echo $row['SupplyQty']; ?>&supplyprice=<?php echo $row['SupplyPrice']; ?>">Update</a></td>
        </tr>

<?php 
}
?>
</table>
</div>
<!-- /Supply Table -->

  <!-- Add Supply-->

  <div id="Add_Supply" class="w3-container supply">
   <h2>Add Supply</h2>

<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['add']))
{
        $supplyname = $_POST['supplyname'];
        $supplydescription = $_POST['supplydescription'];
        $supplyquantity = $_POST['supplyquantity'];
        $supplyprice = $_POST['supplyprice'];
        $categoryid = $_POST['categoryid'];
	$supplyname = stripslashes($supplyname);
	$supplyname = mysql_real_escape_string($supplyname);
	$supplydescription = stripslashes($supplydescription);
	$supplydescription = mysql_real_escape_string($supplydescription);
	$supplyquantity= stripslashes($supplyquantity);
	$supplyquantity = mysql_real_escape_string($supplyquantity);
	$supplyprice= stripslashes($supplyprice);
	$supplyprice = mysql_real_escape_string($supplyprice);

        $query1 = "INSERT INTO `tblsupply` (SupplyName, SupplyDesc, SupplyQty, SupplyPrice,CategoryID) VALUES ('$supplyname', '$supplydescription', '$supplyquantity', '$supplyprice', '$categoryid')";
        $result1 = mysql_query($query1);
        if($result1) {
?>

  <script>
  alert('Medical Supply Added Successfully.');
        window.location.href='medical_supplies1.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Adding Medical Supply.');
        window.location.href='medical_supplies1.php';
        </script>

<?php
}
 }
?>

<div class="w3-container form"> 
<form name="supply" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Supply Name</label>
<input class="w3-input w3-border" type="text" name="supplyname" placeholder="Supply Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Description</label>
<input class="w3-input w3-border" type="text" name="supplydescription" placeholder="Supply Description" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Quantity</label>
<input class="w3-input w3-border" type="number" name="supplyquantity" placeholder="Supply  Quantity" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Supply Price</label>
<input class="w3-input w3-border" type="number" name="supplyprice" placeholder="Supply Price" required style="margin-bottom:5px" />
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
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />

<!-- clearfields -->

</form>
</div>

</div>
  <div class="w3-container w3-light-grey w3-padding">
  </div>

</div>

<script>
document.getElementsByClassName("tablink")[0].click();

function openSupply(evt, supplyName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("supply");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
    tablinks[i].classList.remove("w3-light-grey");
  } 
 document.getElementById(supplyName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
<!-- /Modal -->

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
