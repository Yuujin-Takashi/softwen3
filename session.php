<?php
require('clinic_database/clinicdb.php');

        session_cache_expire( 20 );
setcookie("CookieName", "CookieValue", time() + (10 * 365 * 24 * 60 * 60));
session_start();

        $inactive = 3600;

        if(isset($_SESSION['start']) ) {
        	$ses_duration = time() - $_SESSION['start'];
        	if($ses_duration > $inactive){
        		header("Location: logout.php");
		exit();
        	}
        }
        $_SESSION['start'] = time();

if((isset($_SESSION['username'])) || (isset($_SESSION['email'])))
{
$mail = $_SESSION['email'];
$query2 = "SELECT `email` FROM `users` WHERE `email` = '$mail'";
$result2= mysql_query($query2, $connection);
$row2= mysql_fetch_assoc($result2);
$mail_session =$row2['email'];

$user_check = $_SESSION['username'];
$query = "SELECT `username` FROM `users` WHERE `username` = '$user_check'";
$result = mysql_query($query, $connection);
$row = mysql_fetch_assoc($result);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); 
header('Location: index.php'); 
exit();
}
}
?>