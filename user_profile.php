<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Profile</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<body>

<?php require('head1.html'); ?>

<p style="margin-bottom:35px"></p>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">

<!-- Profile -->

<div class="w3-card-2 w3-round w3-white">
 <div class="w3-container">
<h4 class="w3-center"><b>My Profile</b></h4>

<?php
require('clinic_database/clinicdb.php');

$query1 = "SELECT DISTINCT `StaffPic` FROM `tblclinicstaff`, `users` WHERE tblclinicstaff.StaffEmail = '$mail'";
$result1 = mysql_query($query1);
while($row1 = mysql_fetch_array($result1))
{  ?>

<p class="w3-center"><img src="profile/<?php echo $row1["StaffPic"]; ?>" class="w3-circle w3-hover-opacity" onclick="document.getElementById('id01').style.display='block'" style="height:200px;width:200px" alt="Avatar"></p>

<?php } ?>

<p class="w3-center" onclick="document.getElementById('id01').style.display='block'">Upload Profile Picture</p>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-8">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-closebtn">&times;</span>
      <h2><i class="fa fa-upload fa-fw w3-text-theme"></i> Upload Profile Picture</h2>
    </header>
<p><br/></p>
    <div class="w3-container form">
<form name="add_picture" action="php_profilepic-upload.php" method="post" enctype="multipart/form-data" class="w3-justify" style="margin-bottom:50px">
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="email" placeholder="sample@email.com" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Picture:</label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<input class="w3-btn w3-ripple w3-hover-green" type="submit" name="upload" value="Upload" style="width:50%;margin-bottom:10px" />
</form>
    </div>
  </div>
</div>

<hr/>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT StaffFname, StaffLname, StaffAddress, StaffContactNo, StaffBdate FROM `tblclinicstaff`, `users` WHERE tblclinicstaff.StaffEmail = '$mail'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>

<p class="w3-center"><i class="fa fa-pencil fa-fw w3-text-theme"></i><?php echo $row["StaffFname"]. " " .$row["StaffLname"]; ?></p>
<p class="w3-center"><i class="fa fa-home fa-fw w3-text-theme"></i><?php echo  $row["StaffAddress"]; ?></p>
<p class="w3-center"><i class="fa fa-mobile-phone fa-fw w3-text-theme"></i><?php echo  $row["StaffContactNo"]; ?></p>
<p class="w3-center"><i class="fa fa-birthday-cake fa-fw w3-text-theme"></i><?php echo $row["StaffBdate"]; ?></p>

<?php } ?>

        </div>
      </div>
      <br/>
<!-- /Profile -->      

</div>
    <div class="w3-col m7">

<div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
<div class="w3-container w3-padding">

<h3 style="w3-center"><i class="fa fa-edit"></i> Edit Profile:</h3>
<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['update']))
{
        $staffemail = $_POST['staffemail'];
        $staffaddress = $_POST['staffaddress'];
        $staffcontact = $_POST['staffcontact'];

          $query2 = "UPDATE `tblclinicstaff` SET `StaffAddress` = '$staffaddress', `StaffContactNo` = '$staffcontact' WHERE `tblclinicstaff`.`StaffEmail` = '$staffemail'";

            $result2 = mysql_query($query2);
            
           if($result2) {

?>
  <script>
  alert('Profile Updated Successfully.');
        window.location.href='user_profile.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Updating Profile.');
        window.location.href='user_profile.php';
        </script>

<?php }
 }
?>
<form name="staff" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="staffemail" placeholder="sample@email.com" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Address:</label>
<textarea class="w3-input w3-border" type="text" name="staffaddress" placeholder="Address" required style="margin-bottom:5px"></textarea>
<p></p>
<label class="w3-label">Contact No. :</label>
<input class="w3-input w3-border" type="number" name="staffcontact" placeholder="Contact No." required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-btn" type="submit" name="update" value="Update" style="margin-bottom:10px" />

</form>

            </div>
          </div>
        </div>
      </div>
</div>

 <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p><i class="fa fa-calendar-o"></i>  <b>Today is </b></p>
<?php echo date("m-d-y"); ?>
          <p><i class="fa fa-clock-o"></i>  <b>Time</b></p>
<?php 
date_default_timezone_set("Asia/Manila");
echo date("H:i", time()); ?>
<p></p>
        </div>
      </div>
      <br>

  <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>






<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}
</script>

<script>
var x = document.getElementById("myDropnav");
function w3_open() {
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
function w3_close() {
    x.className = x.className.replace(" w3-show", "");
}
</script>




<?php require('foot.html'); ?>

</body>
</html>
