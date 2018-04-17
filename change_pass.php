<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Change Password</title>
<body>
<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Change Password</h2>
  </header>
<p></p>
<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['update']))
{
            $username = $_POST['username'];
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];            

            $query2 = "UPDATE `users` SET `password` = '".md5($newpassword)."' WHERE `username` = '$username' AND `password` = '".md5($oldpassword)."'";

            $result2 = mysql_query($query2);
            
           if($result2) {	
?>
  
<script>
  alert('Changed Password Successfully.');
        window.location.href='change_pass.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Changing Password.');
        window.location.href='change_pass.php';
        </script>

<?php
}
 }
?>

<div class="w3-container form">
<form name="category" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Username</label>
<input class="w3-input w3-border" type="text" name="username" placeholder="Username" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Old Password</label>
<input class="w3-input w3-border" type="password" name="oldpassword" placeholder="Old Password" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">New Password</label>
<input class="w3-input w3-border" type="password" name="newpassword" placeholder="New Password" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Change Password" style="margin-bottom:10px" />
<p><br/></p>
</form>
</div>

  </div>

<?php require('foot.html'); ?>

</body>
</html>

