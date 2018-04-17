<!DOCTYPE html>
<html>
<body>
<?php
require('clinic_database/clinicdb.php');
 if($_GET['categoryid'] != "")
{
    $categoryid = $_GET['categoryid'];       

            $query3 = "DELETE FROM `tblcategory` WHERE `tblcategory`.`CategoryID` = $categoryid;";
            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

   <script>
  alert('Category Deleted Successfully.');
        window.location.href='category.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Deleting Category.');
        window.location.href='category.php';
        </script>

<?php
}
 }
?>

</body>
</html>