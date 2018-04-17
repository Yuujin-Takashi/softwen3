<?php
  if (isset($_POST['send']))  {

          $mailto = $_POST['mailto'];
          $mailfrom = $_POST['mailfrom'];
          $mailsubject = $_POST['mailsubject']; 
          $mailmsg = $_POST['mailmsg'];
	$mailsubject = stripslashes($mailsubject);
	$mailsubject = mysql_real_escape_string($mailsubject);				$mailmsg = stripslashes($mailto);	
	$mailmsg = mysql_real_escape_string($mailmsg);
    $mailmsg = wordwrap($mailmsg,70);
    $header = 'From:'. $mailfrom . "\r\n";

$mailto = filter_var($mailto, FILTER_SANITIZE_EMAIL);
$mailto = filter_var($mailto, FILTER_VALIDATE_EMAIL);
$mailfrom = filter_var($mailfrom, FILTER_SANITIZE_EMAIL);
$mailfrom = filter_var($mailfrom, FILTER_VALIDATE_EMAIL);

if($mailto == true && $mailfrom == true) { 

mail($mailto, $mailsubject, $mailmsg, $header);
echo "Email is sent!";

} else {
?>

  <script>
  alert('Invalid Email. Try Again!');
        window.location.href='record.php';
        </script>

<?php } 
  }
?>