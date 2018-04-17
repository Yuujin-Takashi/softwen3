<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Department</title>
<style>
.department {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Department</h2>
  </header>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openDepartment(event, 'Show_Department')">Show Department</a></li>   
<li><a href="#" class="tablink" onclick="openDepartment(event, 'Add_Department')">Add Department</a></li>
  </ul>

<div id="Show_Department" class="w3-container department">
   <h3>Show Department</h3>   

<!-- Department Table -->

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Department Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Department Number</th>
  <th>Department Name</th>
  <th>Department Description</th>
  <th></th>
  <th></th>
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
       <td><a href="php_dept-update.php?deptid=<?php echo $row['DeptID']; ?>&deptname=<?php echo $row['DeptName']; ?>&deptdesc=<?php echo $row['DeptDesc']; ?>">Update</a></td>
       <td><a href="php_dept-delete.php?deptid=<?php echo $row['DeptID']; ?>">Delete</a></td>
        </tr>

<?php 
}
?>

</table>

<!-- /Department Table -->

  </div>


   <!-- Add Department-->

  <div id="Add_Department" class="w3-container department">
   <h2>Add Department</h2>

<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['add']))
{
        $deptname = $_POST['deptname'];
        $deptdescription = $_POST['deptdescription'];
	$deptname = stripslashes($deptname);
	$deptname = mysql_real_escape_string($deptname);
	$deptdescription = stripslashes($deptdescription);
	$deptdescription = mysql_real_escape_string($deptdescription);

        $query1 = "INSERT INTO `tbldept` (DeptName, DeptDesc) VALUES ('$deptname', '$deptdescription')";
        $result1 = mysql_query($query1);
        if($result1) {

?>

  <script>
  alert('Department Added Successfully.');
        window.location.href='department.php';
        </script>
 <?php } else { ?>

  <script>
  alert('Error in Adding Department.');
        window.location.href='department.php';
        </script>

<?php
}
 }
?>
<div class="w3-container form">
<form name="department" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Name</label>
<input class="w3-input w3-border" type="text" name="deptname" placeholder="Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Description</label>
<input class="w3-input w3-border" type="text" name="deptdescription" placeholder="Description" required style="margin-bottom:5px"/>
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />

</form>
</div>

  </div>

  <div class="w3-container w3-light-grey w3-padding">
  </div>

</div>


<script>
document.getElementsByClassName("tablink")[0].click();

function openDepartment(evt, departmentName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("department");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(departmentName).style.display = "block";
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

