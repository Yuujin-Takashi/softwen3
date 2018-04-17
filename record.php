<!DOCTYPE html>
<html>
<title>Records</title>
<style>
.record {display:none}
</style>
<body>
<?php require('head1.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Records</h2>
  </header>

 <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openRecord(event, 'Record1')">Clinic Visit</a></li> 
   <li><a href="#" class="tablink" onclick="openRecord(event, 'Record2')">Medical Certificate</a></li>
   <li><a href="#" class="tablink" onclick="openRecord(event, 'Record3')">History</a></li>
</ul>

  <div id="Record1" class="w3-container record">
<h2>Clinic Visit</h2>
<?php require('clinic_visit1.php'); ?>

</div>

  <div id="Record2" class="w3-container record">
<h2>Medical Certificate</h2>
<?php require('med_cert1.php'); ?>

</div>

  <div id="Record3" class="w3-container record">
<h2>History</h2>

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

<table class="w3-table w3-striped w3-border w3-hoverable w3-third" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Medical Certificate</th>
  <th>Name</th>
  <th>Department</th>
  <th>Date</th>
  <th>Time</th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT CertID, CertName, CertDept, CertDate, CertTime FROM `tblmedcert` ORDER BY CertDate";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["CertID"]; ?></td>
        <td><?php echo $row["CertName"]; ?></td>
        <td><?php echo $row["CertDept"]; ?></td>
        <td><?php echo $row["CertDate"]; ?></td>
        <td><?php echo $row["CertTime"]; ?></td>
        </tr>

<?php 
}
?>
</table>

</div>

  <div class="w3-container w3-light-grey w3-padding">
  </div>
</div>

<script>
document.getElementsByClassName("tablink")[0].click();

function openRecord(evt, recordName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("record");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(recordName).style.display = "block";
  evt.currentTarget.className += " w3-light-grey";
}
</script>


<?php require('foot.html'); ?>

</body>
</html>

