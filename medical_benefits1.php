<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Medical Benefits</title>
<style>
.benefits {display:none}
</style>
<body>

<?php require('head1.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Medical Benefits</h2>
  </header>
 
  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openBenefits(event, 'Show_Benefits')">Show Medical Benefits</a></li>
<li><a href="#" class="tablink" onclick="openBenefits(event, 'Add_Benefits')">Add Medical Benefits</a></li>
  </ul>

<div id="Show_Benefits" class="w3-container benefits">
   <h3>Show Medical Benefits</h3>

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search File Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>No.</th>
  <th>File Name</th>
  <th>File Description</th>
  <th>Medical Benefit File</th>
  <th></th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblmedicalbenefits`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["BenefitID"]; ?></td>
        <td><?php echo $row["BenefitName"]; ?></td>
        <td><?php echo $row["BenefitDesc"]; ?></td>
        <td><a href="benefit_files/<?php echo $row["BenefitFile"]; ?>" target="_blank">View File</a></td>
        <td><a href="php_benefits1-update.php?benefitid=<?php echo $row['BenefitID']; ?>&benefitname=<?php echo $row['BenefitName']; ?>&benefitdesc=<?php echo $row['BenefitDesc']; ?>&benefitfile=benefit_files/<?php echo $row['BenefitFile']; ?>">Update</a></td>
        </tr>

<?php 
}
?>

</table>


</div>


<div id="Add_Benefits" class="w3-container benefits">
   <h3>Add Medical Benefits</h3>
<div class="w3-container form">
<form name="add_benefits" action="php_medbenefit-add1.php" method="post" enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">File Name</label>
<input class="w3-input w3-border" type="text" name="benefitname" placeholder="File Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">File Description</label>
<input class="w3-input w3-border" type="text" name="benefitdescription" placeholder="File Description" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Medical Benefit File</label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />
<p></p>
<!-- clearfields -->

</form>
</div>
</div>

 <div class="w3-container w3-light-grey w3-padding">
  </div>
 </div>
</div>


<script>
document.getElementsByClassName("tablink")[0].click();

function openBenefits(evt, benefitsName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("benefits");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(benefitsName).style.display = "block";
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

