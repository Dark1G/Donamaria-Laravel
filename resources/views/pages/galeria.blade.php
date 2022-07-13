@extends('layouts.master')
@section('content')
<div class="container">
  <div class="container-fluid">
    <h1 class="titemp">Galeria</h1>
    <p class="lead subtit">Algumas imagens da nossa quinta.</p>
    <hr>
          
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(1)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto1.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(2)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto2.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(3)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto3.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(4)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto4.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(5)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto5.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(6)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto1.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(7)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto1.jpg">
        </a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 column">
        <a onclick="openModal();currentSlide(8)" class="hover-shadow cursor thumbnail">
          <img class="imgal" src="images/foto1.jpg">
        </a>
      </div>
    </div>

    <div id="myModal" class="modal cenatest">
      <span class="close cursor" onclick="closeModal()">&times;</span>
      <div class="modal-content">

        <div class="mySlides">
          <div class="numbertext">1 / 8</div>
          <img class="imgal" src="images/foto1.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">2 / 8</div>
          <img class="imgal" src="images/foto2.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">3 / 8</div>
          <img class="imgal" src="images/foto3.jpg">
        </div>

        <div class="mySlides">
          <div class="numbertext">4 / 8</div>
          <img class="imgal" src="images/foto4.jpg">
        </div>
                    
        <div class="mySlides">
          <div class="numbertext">5 / 8</div>
          <img class="imgal" src="images/foto5.jpg">
        </div>
                    
        <div class="mySlides">
          <div class="numbertext">6 / 8</div>
          <img class="imgal" src="images/foto1.jpg">
        </div>
                    
        <div class="mySlides">
          <div class="numbertext">7 / 8</div>
          <img class="imgal" src="images/foto1.jpg">
        </div>
                    
        <div class="mySlides">
          <div class="numbertext">8 / 8</div>
          <img class="imgal" src="images/foto1.jpg">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
          <p id="caption"></p>
        </div>


        <div class="column">
          <img class="demo cursor imgal" src="images/foto1.jpg" onclick="currentSlide(1)" alt="Nature and sunrise">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto2.jpg" onclick="currentSlide(2)" alt="Trolltunga, Norway">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto3.jpg" onclick="currentSlide(3)" alt="Mountains and fjords">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto4.jpg" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto5.jpg" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto1.jpg" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto1.jpg" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
        <div class="column">
          <img class="demo cursor imgal" src="images/foto1.jpg" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
      </div>
    </div>
    <hr class="linha">
    <hr>
  </div>
</div>
<script>
  function openModal() {
    document.getElementById('myModal').style.display = "block";
  }

  function closeModal() {
    document.getElementById('myModal').style.display = "none";
  }

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
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
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
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
</script>
@stop