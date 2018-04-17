<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<title>Home - Admin</title>
<body>

<?php require('head.html');  ?>
<p style="margin-bottom:5px"></p>

<!-- Add something for home -->

<h1 class="w3-center w3-wide"><b>EVENTS</b></h1>

<div class="slideshow-container">

<?php
require('clinic_database/clinicdb.php');

$query = "SELECT * FROM `tblhomeimg`";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{  ?>

  <div class="mySlides w3-center">
 <img src="img/<?php echo $row["ImageFile"]; ?>" style="height:600px;width:450px" alt="Event Photo">
</div>

<?php } ?>

<a class="prev" onclick="plusSlides(-1)"><</a>
<a class="next" onclick="plusSlides(1)">></a>

</div>
<br/>


<br/>
<br/>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php require('foot.html'); ?>

</body>
</html>

