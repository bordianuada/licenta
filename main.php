<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emada Dent</title>
    <?php 
    include('header.php');
    ?>
</head>

<body>

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <img src="img6.jpg" style="width:100%">
    <div class="text">Rezultate garantate</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <img src="img7.jpg" style="width:100%">
    <div class="text">Tehnici noi si imbunatatite</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="img8.jpg" style="width:100%">
    <div class="text">Mediu primitor</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="img9.jpg" style="width:100%">
    <div class="text">Aparatura de ultima generatie</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="img10.jpg" style="width:100%">
    <div class="text">Consultanta gratuita</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>


<div style="background-color: lightblue; font-size: 20px;">
<h1 style="background-color: darkblue; color: lightblue;">Despre Clinică </h1>
<p>
EmadaDent s-a înfiintat în anul 2008 în scopul de a oferi o alternativa cu caracter medical la serviciile stomatologice deja existente.
Interesul constant al echipei pentru perfectionare medicala a impus participarea medicilor nostri la stadii de pregatire sustinute in Romania, cat si in strainatate.

Echipa este formata din medici bine pregatiti in cadrul mai multor stagii derulate atat in tara cat si in strainatate, avand competente distincte care acopera toata aria tratamentelor stomatologice. Dotarile clinicii sunt dintre cele mai complexe, provenienta aparaturii fiind din tari cu renume in domeniu:Germania, Japonia, Italia.
Suntem o echipa de medici cu specializari care acopera toate ramurile stomatologiei moderne si ne straduim ca beneficiarul muncii noastre, PACIENTUL sa primesca un plan de tratament complet, complex, dar mai ales personalizat.
</p>
</div>

<style>
* {box-sizing:border-box}


/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
</style>

<script>

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
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
<?php 
    
    include('footer.php')
?>
</body>
</html>