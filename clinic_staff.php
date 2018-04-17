<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Clinic Staff</title>
<style>
.staff {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Clinic Staff</h2>
  </header>

 <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openStaff(event, 'Show_Staff')">Show Clinic Staff</a></li> 
   <li><a href="#" class="tablink" onclick="openStaff(event, 'Add_Staff')">Add Clinic Staff</a></li>
  </ul>

  <div id="Show_Staff" class="w3-container staff">
   <h3>Show Clinic Staff</h3>

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Staff Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Staff No.</th>
  <th>Name</th>
  <th>Gender</th>
  <th>Address</th>
  <th>Birthdate</th>
  <th>Contact No.</th>
  <th>Email</th>
  <th>Site</th>
  <th>Position</th>
  <th></th>
 <th></th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblclinicstaff`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["StaffID"]; ?></td>
        <td><?php echo $row["StaffFname"] . " " .$row["StaffMname"]. " " .$row["StaffLname"]; ?></td>
        <td><?php echo $row["StaffGender"]; ?></td>
        <td><?php echo $row["StaffAddress"]; ?></td>
        <td><?php echo $row["StaffBdate"]; ?></td>
        <td><?php echo $row["StaffContactNo"]; ?></td>
        <td><?php echo $row["StaffEmail"]; ?></td>
        <td><?php echo $row["StaffSite"]; ?></td>
        <td><?php echo $row["StaffPosition"]; ?></td>
         <td><a href="php_staff-update.php?staffid=<?php echo $row['StaffID'];?>&stafffname=<?php echo $row['StaffFname'];?>&staffmname=<?php echo $row['StaffMname'];?>&stafflname=<?php echo $row['StaffLname'];?>&staffaddress=<?php echo $row['StaffAddress'];?>&staffbdate=<?php echo $row['StaffBdate'];?>&staffcontactno=<?php echo $row['StaffContactNo'];?>&staffemail=<?php echo $row['StaffEmail'];?>&staffsite=<?php echo $row['StaffSite'];?>">Update</a></td>
         <td><a href="php_staff-delete.php?staffid=<?php echo $row['StaffID']; ?>">Delete</a></td>
        </tr>

<?php 
}
?>

</table>
   </div>

  <div id="Add_Staff" class="w3-container staff">
   <h3>Add Clinic Staff</h3>

<div class="w3-container form">
<form name="staff" action="php_staff-add.php" method="post" enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">
<p></p>
<label class="w3-label">Picture:</label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">First Name:</label>
<input class="w3-input w3-border" type="text" name="stafffname" placeholder="First Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Middle Name:</label>
<input class="w3-input w3-border" type="text" name="staffmname" placeholder="Middle Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Last Name:</label>
<input class="w3-input w3-border" type="text" name="stafflname" placeholder="Last Name" required style="margin-bottom:5px" />
<p></p>
<input class="w3-radio" type="radio" name="gender" value="Male">
<label class="w3-label">Male</label>
<p></p>
<input class="w3-radio" type="radio" name="gender" value="Female">
<label class="w3-label">Female</label>
<p></p>
<label class="w3-label">Address:</label>
<textarea class="w3-input w3-border" type="text" name="staffaddress" placeholder="Address" required style="margin-bottom:5px"></textarea>
<p></p>
<label class="w3-label">Birthdate:</label>
<input class="w3-input w3-border" type="text" name="staffbdate" placeholder="Format: YYYY-MM-DD" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="staffcontact" placeholder="Contact No." required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="staffemail" placeholder="Email" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Site:</label>
<input class="w3-input w3-border" type="text" name="staffsite" placeholder="Site" required style="margin-bottom:5px" />
<p></p>
<input class="w3-radio" type="radio" name="position" value="Doctor">
<label class="w3-label">Doctor</label>
<p></p>
<input class="w3-radio" type="radio" name="position" value="Nurse">
<label class="w3-label">Nurse</label>
<p></p>
<input class="w3-input w3-black w3-ripple w3-hover-teal" type="submit" name="add" value="Add" style="margin-bottom:10px" />

</form>
</div>

   </div>


  <div class="w3-container w3-light-grey w3-padding">
  </div>



<script>
document.getElementsByClassName("tablink")[0].click();

function openStaff(evt, staffName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("staff");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(staffName).style.display = "block";
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
