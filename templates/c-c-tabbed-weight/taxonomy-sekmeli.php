<?php
/*
Template Name: Sekmeli Liste Şablonu
*/
get_header();
?>

<button class="tablink" onclick="openCity('London', this)" id="defaultOpen">London</button>
<button class="tablink" onclick="openCity('Paris', this)">Paris</button>
<button class="tablink" onclick="openCity('Tokyo', this)">Tokyo</button>
<button class="tablink" onclick="openCity('Oslo', this)">Oslo</button>


<p>Click on the buttons inside the tabbed menu:</p>

<div id="London" class="tabcontent">
  <h1>London</h1>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h1>Paris</h1>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h1>Tokyo</h1>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="Oslo" class="tabcontent">
  <h1>Oslo</h1>
  <p>Oslo is the capital of Norway.</p>
</div>







<script>
function openCity(cityName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  document.getElementById(cityName).style.display = "block";
  
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



<?= get_footer(); ?>
