<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Department</title>
<body>

<?php require('head1.html'); ?>

<div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Department</h2>
  </header>
<div class="w3-container">
<br/>

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Department Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Department Number</th>
  <th>Department Name</th>
  <th>Department Description</th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tbldept`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["DeptID"]; ?></td>
        <td><?php echo $row["DeptName"]; ?></td>
        <td><?php echo $row["DeptDesc"]; ?></td>
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