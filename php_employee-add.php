<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['add']))
{
        $employeefirstname = $_POST['employeefirstname'];
        $employeemiddlename = $_POST['employeemiddlename'];
        $employeelastname = $_POST['employeelastname'];
        $employeegender = $_POST['gender'];
        $employeeaddress = $_POST['employeeaddress'];
        $employeeposition = $_POST['employeeposition'];
        $employeecontactno = $_POST['employeecontactno'];
        $employeeemail = $_POST['employeeemail'];
        $employeedept = $_POST['employeedept'];
        $employeeacc = $_POST['employeeacc'];
        $employeehmo = $_POST['employeehmo'];
        $employeesss = $_POST['employeesss'];
	$employeefirstname = stripslashes($employeefirstname);
	$employeefirstname = mysql_real_escape_string($employeefirstname);
	$employeemiddlename = stripslashes($employeemiddlename);
	$employeemiddlename = mysql_real_escape_string($employeemiddlename);
	$employeelastname = stripslashes($employeelastname);
	$employeelastname = mysql_real_escape_string($employeelastname);
	$employeeaddress = stripslashes($employeeaddress);
	$employeeaddress = mysql_real_escape_string($employeeaddress);
	$employeeposition = stripslashes($employeeposition);
	$employeeposition = mysql_real_escape_string($employeeposition);
	$employeeemail = stripslashes($employeeemail);
	$employeeemail = mysql_real_escape_string($employeeemail);
	$employeedept = stripslashes($employeedept);
	$employeedept = mysql_real_escape_string($employeedept);
	$employeeacc = stripslashes($employeeacc);
	$employeeacc = mysql_real_escape_string($employeeacc);
	$employeehmo = stripslashes($employeehmo);
	$employeebdate = date("Y-m-d", strtotime($_POST['employeebdate']));
	$employeehiredate = date("Y-m-d", strtotime($_POST['employeehiredate']));

        $query = "INSERT INTO `tblemployees` (EmployeeFname, EmployeeMname, EmployeeLname, EmployeeGender, EmployeeAddress, EmployeeBdate, EmployeePosition, EmployeeContactNo, EmployeeEmail, EmployeeHireDate, EmployeeDept, EmployeeAcc, EmployeeHmoNo, EmployeeSssNo) VALUES ('$employeefirstname', '$employeemiddlename', '$employeelastname', '$employeegender', '$employeeaddress', '$employeebdate', '$employeeposition', '$employeecontactno', '$employeeemail', '$employeehiredate', '$employeedept', '$employeeacc',' $employeehmo', '$employeesss')";
        $result = mysql_query($query);
         if($result) {
?>

   <script>
  alert('Employee Added Successfully.');
        window.location.href='employee.php';
        </script>
<?php 
} 
else 
{ 
?>
  <script>
  alert('Error in Adding Employee.');
        window.location.href='employee.php';
        </script>

<?php
}
} 
?>