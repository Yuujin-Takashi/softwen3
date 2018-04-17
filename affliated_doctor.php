<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Affliated Doctor</title>
<style>
.doctor {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Affliated Doctor</h2>
  </header>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openDoctor(event, 'Show_Doctor')">Show Affliated Doctor</a></li> 
   <li><a href="#" class="tablink" onclick="openDoctor(event, 'Add_Doctor')">Add Affliated Doctor</a></li>
  </ul>

  <div id="Show_Doctor" class="w3-container doctor">
   <h3>Show Affliated Doctor</h3>

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Doctor Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Number</th>
  <th>Name</th>
  <th>Specialty</th>
  <th>Hospital</th>
  <th>Contact No.</th>
  <th>Email</th>
  <th>Operating Hours</th>
  <th>Operating Days</th>
  <th></th>
  <th></th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblaffliateddoctor`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["DoctorID"]; ?></td>
        <td><?php echo $row["DoctorName"]; ?></td>
        <td><?php echo $row["DoctorSpecialty"]; ?></td>
        <td><?php echo $row["DoctorHospital"]; ?></td>
        <td><?php echo $row["DoctorContactNo"]; ?></td>
        <td><?php echo $row["DoctorEmail"]; ?></td>  
        <td><?php echo $row["DoctorOperatingHrs"]; ?></td>
        <td><?php echo $row["DoctorOperatingDays"]; ?></td>
        <td><a href="php_doctor-update.php?doctorid=<?php echo $row['DoctorID']; ?>&doctorname=<?php echo $row['DoctorName'];?>&doctorspecialty=<?php echo $row['DoctorSpecialty'];?>&doctorcontactno=<?php echo $row['DoctorContactNo'];?>&doctoremail=<?php echo $row['DoctorEmail'];?>&doctorhrs=<?php echo $row['DoctorOperatingHrs']?>&doctordays=<?php echo $row['DoctorOperatingDays']?>">Update</a></td>
        <td><a href="php_doctor-delete.php?doctorid=<?php echo $row['DoctorID']?>">Delete</a></td>
      </tr>

<?php 
}
?>

</table>

  </div>

  <div id="Add_Doctor" class="w3-container doctor">
   <h3>Add Affliated Doctor</h3>

<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['add']))
{
        $doctorname = $_POST['doctorname'];      
        $doctorspecialty = $_POST['doctorspecialty'];   
        $doctorhospital = $_POST['hospitalid'];   
        $doctorcontact = $_POST['doctorcontactno'];      
        $doctoremail = $_POST['doctoremail'];  
        $doctorhrs = $_POST['doctorhrs'];  
        $doctordays = $_POST['doctordays'];  
	$doctorname = stripslashes($doctorname);
	$doctorname = mysql_real_escape_string($doctorname);
	$doctorspecialty = stripslashes($doctorspecialty);
	$doctorspecialty = mysql_real_escape_string($doctorspecialty);
	$doctoremail = stripslashes($doctoremail);
	$doctoremail = mysql_real_escape_string($doctoremail);
	$doctorhrs = stripslashes($doctorhrs);
	$doctorhrs = mysql_real_escape_string($doctorhrs);
	$doctordays = stripslashes($doctordays);
	$doctordays = mysql_real_escape_string($doctordays);

       $query1 = "INSERT INTO `tblaffliateddoctor` (DoctorName, DoctorSpecialty, DoctorHospital, DoctorContactNo, DoctorEmail, DoctorOperatingHrs, DoctorOperatingDays) VALUES ('$doctorname', '$doctorspecialty', '$doctorhospital', '$doctorcontact', '$doctoremail', '$doctorhrs', '$doctordays')";
        $result1 = mysql_query($query1);
        if($result1) {
?>

   <script>
  alert('Doctor Added Successfully.');
        window.location.href='affliated_doctor.php';
        </script>

<?php } else { ?>

  <script>
  alert('Error in Adding Doctor.');
        window.location.href='affliated_doctor.php';
        </script>

<?php
}
} 
?>

<div class="w3-container form">
<form name="affdoctor" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Name:</label>
<input class="w3-input w3-border" type="text" name="doctorname" placeholder="Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Specialty:</label>
<input class="w3-input w3-border" type="text" name="doctorspecialty" placeholder="Specialty" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Hospital:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT HospitalName, HospitalAddress FROM `tblhospital` ORDER BY HospitalName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='hospitalid'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['HospitalName']." - " .$row['HospitalAddress']."'>".$row['HospitalName']." - " .$row['HospitalAddress']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="doctorcontactno" placeholder="Contact No." required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="doctoremail" placeholder="Email" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Operating Hours:</label>
<input class="w3-input w3-border" type="text" name="doctorhrs" placeholder="Operating Hours" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Operating Days:</label>
<input class="w3-input w3-border" type="text" name="doctordays" placeholder="Operating Days" required style="margin-bottom:5px" />
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

function openDoctor(evt, doctorName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("doctor");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(doctorName).style.display = "block";
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