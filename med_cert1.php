<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Medical Certificate</title>
<body>

<p><br></p>

<div class="w3-container form">
<form name="medcert" action="php_medcert-add1.php" method="post" enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Date Received:</label>
<input class="w3-input w3-border" type="text" name="certdate" value="<?php echo date("Y-m-d"); ?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Name:</label>
<input class="w3-input w3-border" type="text" name="certname" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Department:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT DeptName FROM `tbldept` ORDER BY DeptName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='certdept'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['DeptName']."'>".$row['DeptName']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Diagnosis:</label>
<input class="w3-input w3-border" type="text" name="certdiagnosis" placeholder="Diagnosis" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Attending Physician:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT DoctorID, DoctorName FROM `tblaffliateddoctor` ORDER BY DoctorName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='doctorid'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['DoctorID']."'>".$row['DoctorName']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Hospital / Clinic:</label>
<p></p>
<?php 
require('clinic_database/clinicdb.php');
$query2 = "SELECT HospitalID, HospitalName, HospitalAddress FROM `tblhospital` ORDER BY HospitalName";
$result2 = mysql_query($query2);

$selectOpen =  "<select name='hospitalid'>"; 
$selectClose =  "</select>";
$selectOption = ''; 

while($row = mysql_fetch_array($result2)){   

    $selectOption .="<option value = '".$row['HospitalID']."'>".$row['HospitalName']." - " .$row['HospitalAddress']."</option>"; 
}

$select =  $selectOpen.$selectOption.$selectClose;  
 
echo $select; ?>
<p></p>
<label class="w3-label">Contact Number:</label>
<input class="w3-input w3-border" type="number" name="certcontactno" placeholder="Contact Number" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Prescription:</label>
<textarea class="w3-input w3-border" type="text" name="certprescription" placeholder="Prescription" required style="margin-bottom:5px"></textarea>
<p></p>
<label class="w3-label">Remarks:</label>
<input class="w3-input w3-border" type="text" name="certremarks" placeholder="Remarks" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Clinic Notes:</label>
<textarea class="w3-input w3-border" type="text" name="certclinicnotes" placeholder="Clinic Notes . . ." required style="margin-bottom:5px"></textarea>
<p></p>
<label class="w3-label">Verified By:</label>
<input class="w3-input w3-border" type="text" name="certverifiedby" placeholder="Verified By" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Scanned Documents (PDF, Doc, Image): </label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="save" value="Save" style="margin-bottom:10px" />

</form>
</div>



</body>
</html>
