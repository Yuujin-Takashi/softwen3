<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Employees</title>
<style>
.employees {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Employees</h2>
  </header>

<?php
if(isset($_GET['employeeid']))
{
        $employeeid = $_GET['employeeid'];
        $employeefname = $_GET['employeefname'];
        $employeemname = $_GET['employeemname'];
        $employeelname = $_GET['employeelname'];
        $employeeaddress = $_GET['employeeaddress'];
        $employeeposition = $_GET['employeeposition'];
        $employeecontactno = $_GET['employeecontactno'];
        $employeeemail = $_GET['employeeemail'];
        $employeedept = $_GET['employeedept'];
        $employeeacc = $_GET['employeeacc'];
        $employeehmo = $_GET['employeehmo'];
        $employeesss = $_GET['employeesss'];
	$employeebdate = date("Y-m-d", strtotime($_GET['employeebdate']));
	$employeehiredate = date("Y-m-d", strtotime($_GET['employeehiredate']));
}
?>

<div class="w3-container form">
<form name="patientprofile" action="" method="post"  class="w3-left" style="margin-bottom:50px">

<label class="w3-label">First Name:</label>
<input class="w3-input w3-border" type="text" name="employeefirstname" value="<?=$employeefname?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Middle Name:</label>
<input class="w3-input w3-border" type="text" name="employeemiddlename" value="<?=$employeemname?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Last Name:</label>
<input class="w3-input w3-border" type="text" name="employeelastname" value="<?=$employeelname?>"  required style="margin-bottom:5px" />
<p></p>
<input class="w3-radio" type="radio" name="gender" value="Male">
<label>Male</label>
<p></p>
<input class="w3-radio" type="radio" name="gender" value="Female">
<label>Female</label>
<p></p>
<label class="w3-label">Address:</label>
<input class="w3-input w3-border" type="text" name="employeeaddress1" value="<?=$employeeaddress?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Birthdate:</label>
<input class="w3-input w3-border" type="text" name="employeebdate1" value="<?=$employeebdate?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Position:</label>
<input class="w3-input w3-border" type="text" name="employeeposition1" value="<?=$employeeposition?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="employeecontactno1" value="<?=$employeecontactno?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="employeeemail1" value="<?=$employeeemail?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Hire Date:</label>
<input class="w3-input w3-border" type="text" name="employeehiredate1" value="<?=$employeehiredate?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Department:</label>
<input class="w3-input w3-border" type="text" name="employeedept1" value="<?=$employeedept?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Account:</label>
<input class="w3-input w3-border" type="text" name="employeeacc1" value="<?=$employeeacc?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">HMO Number:</label>
<input class="w3-input w3-border" type="number" name="employeehmo1" value="<?=$employeehmo?>"  required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">SSS Number:</label>
<input class="w3-input w3-border" type="number" name="employeesss1" value="<?=$employeesss?>"  required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />

</form>
</div>

</div>


<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['update']))
{
        $employeefirstname = $_POST['employeefirstname'];
        $employeemiddlename = $_POST['employeemiddlename'];
        $employeelastname = $_POST['employeelastname'];
        $employeegender = $_POST['gender'];
        $employeeaddress1 = $_POST['employeeaddress1'];
        $employeeposition1 = $_POST['employeeposition1'];
        $employeecontactno1 = $_POST['employeecontactno1'];
        $employeeemail1 = $_POST['employeeemail1'];
        $employeedept1 = $_POST['employeedept1'];
        $employeeacc1 = $_POST['employeeacc1'];
        $employeehmo1 = $_POST['employeehmo1'];
        $employeesss1 = $_POST['employeesss1'];
	$employeebdate1 = date("Y-m-d", strtotime($_POST['employeebdate1']));
	$employeehiredate1 = date("Y-m-d", strtotime($_POST['employeehiredate1']));
	


        $query = "UPDATE `tblemployees` SET `EmployeeFname` = '$employeefirstname', `EmployeeMname` = '$employeemiddlename', `EmployeeLname` = '$employeelastname', `EmployeeGender` = '$employeegender', `EmployeeAddress` = '$employeeaddress1', `EmployeeBdate` = '$employeebdate1', `EmployeePosition` = '$employeeposition1', `EmployeeContactNo` = '$employeecontactno1', `EmployeeEmail` = '$employeeemail1', `EmployeeHireDate` = '$employeehiredate1', `EmployeeDept` = '$employeedept1',  `EmployeeAcc` = '$employeeacc1',  `EmployeeHmoNo` = '$employeehmo1',  `EmployeeSssNo` = '$employeesss1' WHERE `tblemployees`.`EmployeeID` = $employeeid";
         $result = mysql_query($query);
         if($result) {
?>

   <script>
  alert('Employee Updated Successfully.');
        window.location.href='employee.php';
        </script>
<?php 
} 
else 
{ 
?>
  <script>
  alert('Error in Updating Employee.');
        window.location.href='employee.php';
        </script>

<?php
}
} 
?>
<?php require('foot.html'); ?>
</body>
</html>