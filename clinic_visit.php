<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Clinic Visit</title>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Clinic Visit</h2>
  </header>
<p><br></p>

<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['add']))
{
date_default_timezone_set("Asia/Manila");
        $visitdate = date("Y-m-d", strtotime($_POST['visitdate']));
        $visittime = date("H:i", strtotime($_POST['visittime']));
        $visitpatientid = $_POST['employeeid'];
        $visitpatientname = $_POST['visitpatientname'];
        $visitdept = $_POST['visitdept'];
        $visitacc = $_POST['visitacc'];
        $visitchiefcomplaint = $_POST['visitchiefcomplaint'];
        $visitmedicine = $_POST['visitmedicine'];
        $visitremarks = $_POST['visitremarks'];
	$visitpatientname = stripslashes($visitpatientname);
	$visitpatientname = mysql_real_escape_string($visitpatientname);
	$visitdept = stripslashes($visitdept);
	$visitdept = mysql_real_escape_string($visitdept);
	$visitacc = stripslashes($visitacc);
	$visitacc = mysql_real_escape_string($visitacc);
	$visitchiefcomplaint = stripslashes($visitchiefcomplaint);
	$visitchiefcomplaint = mysql_real_escape_string($visitchiefcomplaint);
	$visitmedicine = stripslashes($visitmedicine);
	$visitmedicine = mysql_real_escape_string($visitmedicine);
	$visitremarks = stripslashes($visitremarks);
	$visitremarks = mysql_real_escape_string($visitremarks);

$query1 = "INSERT INTO `tblclinicvisit` (VisitDate, VisitTime, VisitPatientID, VisitPatientName, VisitDept, VisitAcc, VisitChiefComplaint, VisitMedicine, VisitRemarks) VALUES ('$visitdate', '$visittime', '$visitpatientid', '$visitpatientname', '$visitdept', '$visitacc', '$visitchiefcomplaint', '$visitmedicine', '$visitremarks')";

$result1 = mysql_query($query1);
if(result1) {
?>

<script>
  alert('Record Saved Successfully.');
        window.location.href='clinic_visit.php';
        </script>

<?php } else { ?>

  <script>
  alert('Error in Saving Record.');
        window.location.href='clinic_visit.php';
        </script>

<?php
}
}
?>

<div class="w3-container form">
<form name="clinicvisit" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Date:</label>
<input class="w3-input w3-border" type="text" name="visitdate" placeholder="Format: YYYY-MM-DD" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Time:</label>
<input class="w3-input w3-border" type="text" name="visittime" placeholder="Format: Hrs:Mins" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Patient Number:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT EmployeeID, EmployeeFname, EmployeeLname FROM `tblemployees` ORDER BY EmployeeFname, EmployeeLname";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='employeeid'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['EmployeeID']."'>".$row['EmployeeID']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Name:</label>
<input class="w3-input w3-border" type="text" name="visitpatientname" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Department:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT DeptName FROM `tbldept` ORDER BY DeptName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='visitdept'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['DeptName']."'>".$row['DeptName']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Account:</label>
<input class="w3-input w3-border" type="text" name="visitacc" placeholder="Account" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Chief Complaint:</label>
<textarea class="w3-input w3-border" type="text" name="visitchiefcomplaint" placeholder="Chief Complaint . . ." required style="margin-bottom:5px"></textarea>
<p></p>
<label class="w3-label">Medicine:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT SupplyID, SupplyName FROM `tblsupply` ORDER BY SupplyName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='visitmedicine'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['SupplyID']."'>".$row['SupplyName']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Remarks:</label>
<input class="w3-input w3-border" type="text" name="visitremarks" placeholder="Remarks" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Save" style="margin-bottom:10px" />
<p><br></p>
<button class="w3-btn w3-ripple w3-hover-teal" onclick = "myFunction()" name="printfile"><i class="fa fa-print"></i> Print to File</button>
<button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-ripple w3-hover-teal" name="sendmail"><i class="fa fa-envelope-o"></i> Send to Email</button>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-4">

    <header class="w3-container w3-padding w3-teal">
<span onclick="document.getElementById('id01').style.display='none'" class="w3-right w3-xlarge w3-closebtn"><i class="fa fa-remove"></i></span>
      <h2>Send Mail</h2>
    </header>

    <div class="w3-container">
      <form name="visit" action="php_visit-email.php" method="post">
        <br/>
        <label>To:</label>
        <input class="w3-input w3-border w3-hover-border-black" type="email" name="mailto">
        <br/>
        <label>From:</label>
        <input class="w3-input w3-border w3-hover-border-black" type="email" name="mailfrom">
        <br/>        
        <label>Subject:</label>
        <input class="w3-input w3-border w3-hover-border-black" type="text" name="mailsubject">
        <br/>        
        <label>Message:</label>
        <textarea class="w3-input w3-border w3-hover-border-black" type="text" style="height:100px" name="mailmsg" placeholder="Write your message ..."></textarea>
        <br/>
<input onclick="document.getElementById('id01').style.display='none'" class="w3-btn w3-left" type="submit" name="send" value="Send" style="margin-bottom:10px">
<a onclick="document.getElementById('id01').style.display='none'" class="w3-btn w3-right">Cancel</a>
        <br/>
      </form>  
      <br/>
    </div>

  </div>
</div>

</form>
</div>

</form>
</div>


</div>

<script>
function myFunction() {
    window.print();
}
</script>

<?php require('foot.html'); ?>

</body>
</html>
