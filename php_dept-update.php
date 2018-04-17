<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Department</title>
<style>
.dept {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Department</h2>
  </header>

<?php
if(isset($_GET['deptid']))
{
        $deptid = $_GET['deptid'];
        $deptname = $_GET['deptname'];
        $deptdesc = $_GET['deptdesc'];
}
?>

<div class="w3-container form">
<form name="department" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Name</label>
<input class="w3-input w3-border" type="text" name="deptname1" value="<?=$deptname?>" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Description</label>
<input class="w3-input w3-border" type="text" name="deptdesc1" value="<?=$deptdesc?>" required style="margin-bottom:5px"/>
<p></p>

<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />

</form>
</div>

</div>


<?php
require('clinic_database/clinicdb.php');
if(isset($_POST['update'])) {

        $deptname1 = $_POST['deptname1'];
        $deptdesc1 = $_POST['deptdesc1'];

$query2 = "UPDATE `tbldept` SET `DeptName` = '$deptname1', `DeptDesc` = '$deptdesc1' WHERE `tbldept`.`DeptID` = '$deptid'";
  
      $result2 = mysql_query($query2);
        if($result2) {

?>

  <script>
  alert('Department Updated Successfully.');
        window.location.href='department.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Updating Department.');
        window.location.href='department.php';
        </script>

<?php
}
 }
?>
<?php require('foot.html'); ?>
</body>
</html>