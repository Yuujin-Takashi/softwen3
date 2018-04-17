<!DOCTYPE html>
<html>
<title>Reports</title>
<body>
<?php require('head1.html'); ?>

<!-- Add something for home -->


 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Reports</h2>
  </header>

<div class="w3-container">
<h2></h2>

<table class="w3-table w3-striped w3-border w3-hoverable w3-third" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Clinic Visit</th>
  <th>Name</th>
  <th>Department</th>
  <th>Date</th>
  <th>Time</th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT VisitID, VisitName, VisitDept, VisitDate, VisitTime FROM `tblclinicvisit` ORDER BY  VisitDate";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["VisitID"]; ?></td>
        <td><?php echo $row["VisitName"]; ?></td>
        <td><?php echo $row["VisitDept"]; ?></td>
        <td><?php echo $row["VisitDate"]; ?></td>
        <td><?php echo $row["VisitTime"]; ?></td>
        </tr>

<?php 
}
?>

</table>

</div>

  <div class="w3-container w3-light-grey w3-padding">
  </div>



<?php require('foot.html'); ?>

</body>
</html>

