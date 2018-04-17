<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<body>
<?php require('head.html'); ?>
<p style="margin-bottom:35px"></p>
<!-- Register -->

<?php
require('clinic_database/clinicdb.php');
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$email = stripslashes($email);
		$email = mysql_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
		
        $query = "INSERT INTO `users` (username, password, email, Role) VALUES ('$username', '".md5($password)."', '$email', '$role')";
        $result = mysql_query($query);
        if($result){
?>

   <script>
  alert('Registered Successfully.');
        window.location.href='registration.php';
        </script>

      <?php  } else { ?>

  <script>
  alert('Error in Registration.');
        window.location.href='registration.php';
        </script>

<?php
    }
}
?>
<section class="w3-container w3-justify w3-content" style="max-width:300px">
<div class="form">
<h1 class="w3-justify">Register</h1>
<form name="registration" action="" method="post" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Username</label>
<input class="w3-input w3-border" type="text" name="username" placeholder="Username" required style="margin-bottom:5px" />
<br/>
<label class="w3-label">Email</label>
<input class="w3-input w3-border" type="email" name="email" placeholder="Email" required style="margin-bottom:5px" />
<br/>
<label class="w3-label">Password</label>
<input class="w3-input w3-border" type="password" name="password" placeholder="Password" required style="margin-bottom:5px" />
<input class="w3-radio" type="radio" name="role" value="Admin">
<label class="w3-text-grey">Admin</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input class="w3-radio" type="radio" name="role" value="User">
<label class="w3-text-grey">User</label>
<br/>
<br/>
<input class="w3-input" type="submit" name="submit" value="Register" style="margin-bottom:10px" />
</form>
</div>
</section>
<!-- /Register -->


<?php require('foot.html'); ?>
</body>
</html>





