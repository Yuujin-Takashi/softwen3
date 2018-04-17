<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Employees</title>
<body>

<?php require('head1.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Employees</h2>
  </header>

  <div class="w3-container">
   <h3>Show Employees</h3>
<div style="overflow-x:auto;">
<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Employee Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Number</th>
  <th>Name</th>
  <th>Gender</th>
  <th>Address</th>
  <th>Birthdate</th>
  <th>Position</th>
  <th>Contact No.</th>
  <th>Hire Date</th>
  <th>Department</th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblemployees`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["EmployeeID"]; ?></td>
        <td><?php echo $row["EmployeeFname"] . " " .$row["EmployeeMname"]. " " . $row["EmployeeLname"]; ?></td>
        <td><?php echo $row["EmployeeGender"]; ?></td>
        <td><?php echo $row["EmployeeAddress"]; ?></td>
        <td><?php echo $row["EmployeeBdate"]; ?></td>
        <td><?php echo $row["EmployeePosition"]; ?></td>
        <td><?php echo $row["EmployeeContactNo"]; ?></td>
        <td><?php echo $row["EmployeeHireDate"]; ?></td>
        <td><?php echo $row["EmployeeDept"]; ?></td>
        </tr>

<?php 
}
?>

</table>
</div>
   </div>

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

