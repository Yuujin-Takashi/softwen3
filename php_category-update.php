<?php
require('clinic_database/clinicdb.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Category</title>
<style>
.category{display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Update Category</h2>
  </header>

<?php
if(isset($_GET['categoryid']))
{
            $categoryid = $_GET['categoryid'];
            $categoryname = $_GET['categoryname'];
            $categorydesc = $_GET['categorydesc'];       
}
?>

<div class="w3-container form">
<form name="category" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Category Name</label>
<input class="w3-input w3-border" type="text" name="categoryname1" value="<?=$categoryname?>" required style="margin-bottom:5px" />
<p><br/></p>
<label class="w3-label">Category Description</label>
<input class="w3-input w3-border" type="text" name="categorydesc1" value="<?=$categorydesc?>" required style="margin-bottom:5px"/>
<p><br/></p>

<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />

</form>
</div>

</div>


<?php
if(isset($_POST['update'])) {
require('clinic_database/clinicdb.php');

            $categoryname1 = $_POST['categoryname1'];
            $categorydesc1 = $_POST['categorydesc1'];            

            $query2 = "UPDATE `tblcategory` SET `CategoryName` = '$categoryname1', `CategoryDesc` = '$categorydesc1' WHERE `tblcategory`.`CategoryID` = $categoryid";

            $result2 = mysql_query($query2);
            
if($result2) {	
?>

 <script>
  alert('Category Updated Successfully.');
        window.location.href='category.php';
        </script>
<?php } else {
?>

 <script>
  alert('Error in Updating Category.');
        window.location.href='category.php';
        </script>

<?php } 
} ?>

<?php require('foot.html'); ?>
</body>
</html>