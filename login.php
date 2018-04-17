<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Log In</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<body>

<!-- Navigation -->
<nav class="w3-top">
  <ul class="w3-navbar w3-black">
    <li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
    <li><a href="index_about.php">About</a></li>
  </ul>
</nav>
<!-- /Navigation -->
<p style="margin-bottom:35px"></p>
<!-- Log in -->

<?php
require('clinic_database/clinicdb.php');

    if (isset($_POST['username'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$email= stripslashes($email);
		$email = mysql_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);

        $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '".md5($password)."' AND `email` = '$email' HAVING `Role` = '$role'";
		$result = mysql_query($query);
		$nums = mysql_num_rows($result);
		$rows = mysql_fetch_array($result);
        if($nums > 0){
			session_start();
		 if ($rows['Role'] == "Admin"){
		$_SESSION['username'] = $rows['username'];
		$_SESSION['email'] = $rows['email'];
                        header("Location: admin.php");
		exit();
                        }
                        elseif ($rows['Role'] == "User") {
		$_SESSION['username'] = $rows['username'];
		$_SESSION['email'] = $rows['email'];
                        header("Location: admin1.php");	
		exit();
                        }
                             }

        else{
?> 
              
  <script>
  alert('Username, password or role is incorrect.');
        window.location.href='login.php';
        </script>
<?php exit();  }
    }
?>

<section class="w3-container w3-center w3-content" style="max-width:600px">
<div class="form">
<h1 class="w3-justify">Log In</h1>
<form action="" method="post" name="login" class="w3-justify" style="margin-bottom:20px">
<label class="w3-label">Username:</label>
<input class="w3-input w3-border" type="text" name="username" placeholder="Username" required />
<br/>
<label class="w3-label">Email:</label>
<input class="w3-input w3-border" type="email" name="email" placeholder="Email" required />
<br/>
<label class="w3-label">Password:</label>
<input class="w3-input w3-border" type="password" name="password" placeholder="Password" required />
<br/>
<label class="w3-label">Role:</label>
<br/>
<input class="w3-radio" type="radio" name="role" value="Admin">
<label class="w3-text-grey">Admin</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input class="w3-radio" type="radio" name="role" value="User">
<label class="w3-text-grey">User</label>
<br/>
<p></p>
<input class="w3-input w3-hover-teal" name="submit" type="submit" value="Login" />
<input class="w3-input w3-hover-teal" name="reset" type="reset" value="Reset"/>
</form>
<br/><br/><br/>
</div>
</section>


<!-- /Log in -->

<?php require('foot.html'); ?>

</body>
</html>