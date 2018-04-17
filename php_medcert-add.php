<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['save']))
{    
        date_default_timezone_set("Asia/Manila");
        $certdate = $_POST['certdate'];
        $certtime = date("H:i", time());
        $certname = $_POST['certname'];
        $certdept = $_POST['certdept'];
         $certdiagnosis = $_POST['certdiagnosis'];
         $certphysician = $_POST['doctorid'];
         $certhospital = $_POST['hospitalid'];
         $certcontactno = $_POST['certcontactno'];
         $certprescription = $_POST['certprescription'];
         $certremarks = $_POST['certremarks'];
         $certclinicnotes = $_POST['certclinicnotes'];
         $certverifiedby = $_POST['certverifiedby'];
	$certname = stripslashes($certname);
	$certname = mysql_real_escape_string($certname);
	$certdept = stripslashes($certdept);
	$certdept = mysql_real_escape_string($certdept);
	$certdiagnosis = stripslashes($certdiagnosis);
	$certdiagnosis = mysql_real_escape_string($certdiagnosis);
	$certprescription = stripslashes($certprescription);
	$certprescription = mysql_real_escape_string($certprescription);
	$certremarks = stripslashes($certremarks);
	$certremarks = mysql_real_escape_string($certremarks);
	$certclinicnotes = stripslashes($certclinicnotes);
	$certclinicnotes = mysql_real_escape_string($certclinicnotes);
	$certverifiedby = stripslashes($certverifiedby);
	$certverifiedby = mysql_real_escape_string($certverifiedby);

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $folder = "cert_files/";
 
 $new_size = $file_size/1024;  
 $new_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = "INSERT INTO `tblmedcert` (CertDate, CertTime, CertName, CertDept, CertDiagnosis, CertPhysician, CertHospital, CertContactNo, CertPrescription, CertRemarks, CertClinicNotes, CertVerifiedBy, CertScannedDocs) VALUES ('$certdate', '$certtime', '$certname', '$certdept', '$certdiagnosis', '$certphysician', '$certhospital', '$certcontactno', '$certprescription', '$certremarks', '$certclinicnotes', '$certverifiedby', '$final_file')";

  mysql_query($sql);
  ?>
   <script>
  alert('Medical Certificate Added Successfully.');
        window.location.href='med_cert.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Error in Adding Medical Certificate');
        window.location.href='med_cert.php';
        </script>
  <?php
 }
}
?>