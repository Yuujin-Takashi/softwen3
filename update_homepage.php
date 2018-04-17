<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Homepage</title>
<style>
.picture {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Edit Homepage</h2>
  </header>
 
  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openPicture(event, 'Show_Picture')">Show Picture(s)</a></li>
<li><a href="#" class="tablink" onclick="openPicture(event, 'Add_Picture')">Add Picture</a></li>
   <li><a href="#" class="tablink" onclick="openPicture(event, 'Update_Picture')">Update Picture</a></li>
   <li><a href="#" class="tablink" onclick="openPicture(event, 'Delete_Picture')">Delete Picture</a></li>
  </ul>

<div id="Show_Picture" class="w3-container picture">
   <h3>Show Picture(s)</h3>
<p><br/></p>
  <div class="w3-row-padding">
    <div class="w3-container w3-margin-bottom">

<table>
<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblhomeimg`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
  <div class="w3-third w3-row-padding">
<img src="img/<?php echo $row["ImageFile"]; ?>" alt="Event" style="width:100%" class="w3-hover-opacity">
<p></p>
<label class="w3-label-black"><?php echo $row["ImageID"]. " ". $row["ImageName"]; ?></label>

</div>

<?php } ?>
</table>
</div>
</div>
</div>


<div id="Add_Picture" class="w3-container picture">
   <h3>Add Picture</h3>
<div class="w3-container form">
<form name="add_picture" action="php_updatehome-add.php" method="post" enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Picture Name</label>
<input class="w3-input w3-border" type="text" name="imagename" placeholder="Picture Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Picture Description</label>
<input class="w3-input w3-border" type="text" name="imagedescription" placeholder="Picture Description" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Event Picture</label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />
<p></p>
<!-- clearfields -->

</form>
</div>
</div>

<div id="Update_Picture" class="w3-container picture">
   <h3>Update Picture</h3>
<div class="w3-container form">
<form name="update_picture" action="php_updatehome-update.php" method="post" enctype="multipart/form-data" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Picture Number</label>
<input class="w3-input w3-border" type="number" name="imageid" placeholder="Picture Number" required style="margin-bottom:5px" />
<label class="w3-label">Picture Name</label>
<input class="w3-input w3-border" type="text" name="imagename" placeholder="Picture Name" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Picture Description</label>
<input class="w3-input w3-border" type="text" name="imagedescription" placeholder="Picture Description" required style="margin-bottom:5px" />
<p></p>
<label class="w3-label">Event Picture</label>
<p></p>
<input type="file" name="file" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="update" value="Update" style="margin-bottom:10px" />
<p></p>
<!-- clearfields -->

</form>
</div>
</div>

<div id="Delete_Picture" class="w3-container picture">
   <h3>Delete Picture</h3>

<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['delete']))
{
            $imageid = $_POST['imageid'];       

            $query3 = "DELETE FROM `tblhomeimg` WHERE `tblhomeimg`.`ImageID` = $imageid";


            $result3 = mysql_query($query3);
            
           if($result3) { 
?>

   <script>
  alert('Photo Deleted Successfully.');
        window.location.href='update_homepage.php';
        </script>

 <?php } else { ?>

  <script>
  alert('Error in Deleting Photo.');
        window.location.href='update_homepage.php';
        </script>

<?php   }
 }
?>

<div class="w3-container form">
<form name="delete_picture" action="" method="post" enctype="image" class="w3-left" style="margin-bottom:50px">
<label class="w3-label">Picture Number</label>
<input class="w3-input w3-border" type="number" name="imageid" placeholder="Picture Number" required style="margin-bottom:5px" />
<p></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="delete" value="Delete" style="margin-bottom:10px" />
<p></p>
<!-- clearfields -->

</form>
</div>
</div>

 <div class="w3-container w3-light-grey w3-padding">
  </div>
 </div>
</div>


<script>
document.getElementsByClassName("tablink")[0].click();

function openPicture(evt, pictureName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("picture");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(pictureName).style.display = "block";
  evt.currentTarget.className += " w3-light-grey";
}
</script>

<?php require('foot.html'); ?>

</body>
</html>

