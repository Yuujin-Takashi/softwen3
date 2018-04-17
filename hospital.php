<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hospital / Clinic</title>
<style>
.hospital {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Hospital / Clinic</h2>
  </header>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openHospital(event, 'Show_Hospital')">Show Hospital / Clinic</a></li> 
   <li><a href="#" class="tablink" onclick="openHospital(event, 'Add_Hospital')">Add Hospital / Clinic</a></li>
  </ul>

  <div id="Show_Hospital" class="w3-container hospital">
   <h3>Show Hospital / Clinic</h3>

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Hospital Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Number</th>
  <th>Name</th>
  <th>Address</th>
  <th>Contact No.</th>
  <th>Email</th>
  <th></th>
  <th></th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblhospital`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["HospitalID"]; ?></td>
        <td><?php echo $row["HospitalName"]; ?></td>
        <td><?php echo $row["HospitalAddress"]; ?></td>
        <td><?php echo $row["HospitalContactNo"]; ?></td>
        <td><?php echo $row["HospitalEmail"]; ?></td>  
        <td><a href="php_hospital-update.php?hospitalid=<?php echo $row['HospitalID']; ?>&hospitalname=<?php echo $row['HospitalName'];?>&hospitaladdress=<?php echo $row['HospitalAddress'];?>&hospitalcontactno=<?php echo $row['HospitalContactNo'];?>&hospitalemail=<?php echo $row['HospitalEmail'];?>">Update</a></td>
        <td><a href="php_hospital-delete.php?hospitalid=<?php echo $row['HospitalID']; ?>">Delete</a></td>
      </tr>

<?php 
}
?>

</table>

  </div>

  <div id="Add_Hospital" class="w3-container hospital">
   <h3>Add Hospital / Clinic</h3>

<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['add']))
{
        $hospitalname = $_POST['hospitalname'];      
        $hospitaladdress = $_POST['hospitaladdress'];      
        $hospitalcontact = $_POST['hospitalcontact'];      
        $hospitalemail = $_POST['hospitalemail'];  
	$hospitalname = stripslashes($hospitalname);
	$hospitalname = mysql_real_escape_string($hospitalname);
	$hospitaladdress = stripslashes($hospitaladdress);
	$hospitaladdress = mysql_real_escape_string($hospitaladdress);
	$hospitalemail = stripslashes($hospitalemail);
	$hospitalemail = mysql_real_escape_string($hospitalemail);

       $query1 = "INSERT INTO `tblhospital` (HospitalName, HospitalAddress, HospitalContactNo, HospitalEmail) VALUES ('$hospitalname', '$hospitaladdress', '$hospitalcontact', '$hospitalemail')";
        $result1 = mysql_query($query1);
        if($result1) {
?>

   <script>
  alert('Hospital Added Successfully.');
        window.location.href='hospital.php';
        </script>

<?php }   else { ?>

  <script>
  alert('Error in Adding Hospital.');
        window.location.href='hospital.php';
        </script>

<?php
}
} 
?>

<div class="w3-container form">
<form name="hospitalclinic" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Hospital / Clinic Name:</label>
<input class="w3-input w3-border" type="text" name="hospitalname" placeholder="Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Address:</label>
<input class="w3-input w3-border" type="text" name="hospitaladdress" placeholder="Address" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="text" name="hospitalcontact" placeholder="Contact Number" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="hospitalemail" placeholder="Email" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />
<p><br></p>

</form>
</div>

</div>


  <div class="w3-container w3-light-grey w3-padding">
  </div>
</div>

<script>
document.getElementsByClassName("tablink")[0].click();

function openHospital(evt, hospitalName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("hospital");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(hospitalName).style.display = "block";
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