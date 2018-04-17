<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Employees</title>
<style>
.patientprofile {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Employees</h2>
  </header>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openPatientProfile(event, 'Show_PatientProfile')">Show Employees</a></li> 
   <li><a href="#" class="tablink" onclick="openPatientProfile(event, 'Add_PatientProfile')">Add Employees</a></li>
  </ul>

  <div id="Show_PatientProfile" class="w3-container patientprofile">
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
  <th>Email</th>
  <th>Hire Date</th>
  <th>Department</th>
  <th>Account</th>
  <th>HMO No.</th>
  <th>SSS No.</th>
  <th></th>
  <th></th>
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
        <td><?php echo $row["EmployeeEmail"]; ?></td>
        <td><?php echo $row["EmployeeHireDate"]; ?></td>
        <td><?php echo $row["EmployeeDept"]; ?></td>
        <td><?php echo $row["EmployeeAcc"]; ?></td>
        <td><?php echo $row["EmployeeHmoNo"]; ?></td>
        <td><?php echo $row["EmployeeSssNo"]; ?></td>
        <td><a href="php_employee-update.php?employeeid=<?php echo $row['EmployeeID']; ?>&employeefname=<?php echo $row['EmployeeFname'];?>&employeemname=<?php echo $row['EmployeeMname'];?>&employeelname=<?php echo $row['EmployeeLname'];?>&employeeaddress=<?php echo $row['EmployeeAddress'];?>&employeebdate=<?php echo $row['EmployeeBdate'];?>&employeeposition=<?php echo $row['EmployeePosition'];?>&employeecontactno=<?php echo $row['EmployeeContactNo'];?>&employeeemail=<?php echo $row['EmployeeEmail'];?>&employeehiredate=<?php echo $row['EmployeeHireDate'];?>&employeedept=<?php echo $row['EmployeeDept'];?>&employeeacc=<?php echo $row['EmployeeAcc'];?>&employeehmo=<?php echo $row['EmployeeHmoNo'];?>&employeesss=<?php echo $row['EmployeeSssNo'];?>">Update</a></td>
        <td><a href="php_employee-delete.php?employeeid=<?php echo $row['EmployeeID']; ?>">Delete</a></td>
        </tr>

<?php 
}
?>

</table>
</div>
   </div>

  <div id="Add_PatientProfile" class="w3-container patientprofile">
   <h3>Add Employee</h3>

<div class="w3-container form">
<form name="patientprofile" action="php_employee-add.php" method="post"  class="w3-left" style="margin-bottom:50px">
<label class="w3-label">First Name:</label>
<input class="w3-input w3-border" type="text" name="employeefirstname" placeholder="First Name"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Middle Name:</label>
<input class="w3-input w3-border" type="text" name="employeemiddlename" placeholder="Middle Name"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Last Name:</label>
<input class="w3-input w3-border" type="text" name="employeelastname" placeholder="Last Name"  required style="margin-bottom:5px" />
<p></p>
<input class="w3-radio" type="radio" name="gender" value="Male">
<label>Male</label>
<p></p>
<input class="w3-radio" type="radio" name="gender" value="Female">
<label>Female</label>
<p></p>
<label class="w3-label">Address:</label>
<input class="w3-input w3-border" type="text" name="employeeaddress" placeholder="Address"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Birthdate:</label>
<input class="w3-input w3-border" type="text" name="employeebdate" placeholder="Format: YYYY-MM-DD" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Position:</label>
<input class="w3-input w3-border" type="text" name="employeeposition" placeholder="Position"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="employeecontactno" placeholder="Contact Number"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="employeeemail" placeholder="Email"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Hire Date:</label>
<input class="w3-input w3-border" type="text" name="employeehiredate" placeholder="Format: YYYY-MM-DD"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Department:</label>
<input class="w3-input w3-border" type="text" name="employeedept" placeholder="Department"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Account:</label>
<input class="w3-input w3-border" type="text" name="employeeacc" placeholder="Account"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">HMO Number:</label>
<input class="w3-input w3-border" type="number" name="employeehmo" placeholder="HMO No."  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">SSS Number:</label>
<input class="w3-input w3-border" type="number" name="employeesss" placeholder="SSS No."  required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />

</form>
</div>

  </div>

  <div class="w3-container w3-light-grey w3-padding">
  </div>
 </div>
</div>

<script>
document.getElementsByClassName("tablink")[0].click();

function openPatientProfile(evt, patientprofileName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("patientprofile");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(patientprofileName).style.display = "block";
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

