<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Category</title>
<style>
.category {display:none}
</style>
<body>

<?php require('head.html'); ?>

 <div class="w3-card-4">
  <header class="w3-container w3-teal"> 
   <h2>Category</h2>
  </header>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
<li><a href="#" class="tablink" onclick="openCategory(event, 'Show_Category')">Show Category</a></li>   
<li><a href="#" class="tablink" onclick="openCategory(event, 'Add_Category')">Add Category</a></li>
  </ul>

<div id="Show_Category" class="w3-container category">
   <h3>Show Category</h3>   

<!-- Category Table -->

<input type="text" class="w3-input w3-border" id="myInput" onkeyup="myFunction()" placeholder="Search Category Name..." title="Type search entry.">
<br/>
<table class="w3-table w3-striped w3-border w3-hoverable" id = "myTable" style="margin-bottom:50px">
<thead>
<tr class="w3-teal">
  <th>Category Number</th>
  <th>Category Name</th>
  <th>Category Description</th>
  <th></th>
  <th></th>
</tr>
</thead>

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT DISTINCT * FROM `tblcategory`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>
        <tr>
        <td><?php echo $row["CategoryID"]; ?></td>
        <td><?php echo $row["CategoryName"]; ?></td>
        <td><?php echo $row["CategoryDesc"]; ?></td>
        <td><a href="php_category-update.php?categoryid=<?php echo $row['CategoryID']; ?>&categoryname=<?php echo $row['CategoryName']; ?>&categorydesc=<?php echo $row['CategoryDesc']; ?>">Update</a></td>
        <td><a href="php_category-delete.php?categoryid=<?php echo $row['CategoryID']; ?>">Delete</a></td>
        </tr>

<?php 
}
?>

</table>

<!-- /Category Table -->


  </div>


   <!-- Add Category-->

  <div id="Add_Category" class="w3-container category">
   <h2>Add Category</h2>

<?php
require('clinic_database/clinicdb.php');
 if(isset($_POST['add']))
{
        $categoryname = $_POST['categoryname'];
        $categorydescription = $_POST['categorydescription'];
	$categoryname = stripslashes($categoryname);
	$categoryname = mysql_real_escape_string($categoryname);
	$categorydescription = stripslashes($categorydescription);
	$categorydescription = mysql_real_escape_string($categorydescription);

        $query1 = "INSERT INTO `tblcategory` (CategoryName, CategoryDesc) VALUES ('$categoryname', '$categorydescription')";
        $result1 = mysql_query($query1);
        if($result1) {

?>

  <script>
  alert('Category Added Successfully.');
        window.location.href='category.php';
        </script>

 <?php }else { ?>

  <script>
  alert('Error in Adding Category.');
        window.location.href='category.php';
        </script>

<?php
}
 }
?>
<div class="w3-container form">
<form name="category" action="" method="post" class="w3-left" style="margin-bottom:50px">

<label class="w3-label">Category Name</label>
<input class="w3-input w3-border" type="text" name="categoryname" placeholder="Category Name" required style="margin-bottom:5px" />
<p><br/></p>
<label class="w3-label">Category Description</label>
<input class="w3-input w3-border" type="text" name="categorydescription" placeholder="Category Description" required style="margin-bottom:5px" />
<p><br/></p>
<input class="w3-input w3-ripple w3-hover-green" type="submit" name="add" value="Add" style="margin-bottom:10px" />

</form>
</div>

  </div>


  <div class="w3-container w3-light-grey w3-padding">
  </div>

</div>


<script>
document.getElementsByClassName("tablink")[0].click();

function openCategory(evt, categoryName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("category");
  for (i = 0; i < x.length; i++) 
{
    x[i].style.display = "none";
}
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) 
{
     tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");	
  } 
 document.getElementById(categoryName).style.display = "block";
  evt.currentTarget.className += " w3-light-grey";
}
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<?php require('foot.html'); ?>


</body>
</html>

