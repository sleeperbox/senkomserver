<!DOCTYPE html>
<html>
    <head>
        @include('template.head_home')
         <link rel="stylesheet" href="{{url('https://www.w3schools.com/w3css/4/w3.css')}}">
    </head>
    <body>
  <header id="header" style="background: #222; opacity:0.8">
    <div class="container-fluid">
  
      <div id="logo" class="pull-left">
        <!--<h1><a href="#intro" class="scrollto">Senkom Polri</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="{{url('public/web/img/logosenkom.png')}}" width="40" alt="" title="" /></a>
      </div>
  
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="./#intro">Home</a></li>
          <li><a href="./#berita">Berita</a></li>
          <li class="menu-active"><a href="#">Pemantauan</a></li>
          <li><a href="./#galeri">Galeri</a></li>
          <li class="menu-has-children"><a href="./#tentang">Tentang Senkom</a>
            <ul>
              <li><a href="./#visimisi">Visi &amp; Misi</a></li>
              <li><a href="./#kontak">Kontak</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->   


<main id="main" style="">

    <section id="pemantauan" class="section-bg wow fadeInUp">
        <div class="row about-cols">
            
            <div class="col-md-7 wow fadeInUp offset-1 text-left" id="berita">
               <h3 style="color:bisque">Pemantauan Berita <small class="badge badge-pill badge-warning">Live <i class="fa fa-wifi"></i></small></h3>
                <div id="show"></div>
            </div>
                
            <div class="col-md-3 wow fadeInUp">
                <div style="margin-top:62px">
                    <!-- slider -->

                            <div class="col-lg-12 col-md-6 col-xs-6">
                              <div class="w3-content w3-display-container" style="max-width:700px">
                              @foreach($photo as $poto)
                                          <?php 
                                            if($poto->slider1 == "tampil"){
                                          ?>

                                <img class="mySlides" src="public/images/{{ $poto->image }}" style="width:100%">
                               
                                <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%; display: none">
                                    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                                    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                                    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                                    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                                    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                                </div>
                                 <?php } ?>
                                 @endforeach
                            </div>
                          </div>
                            <!-- slider 1 end -->
                            <br/>
                            <!-- slider 2 start -->
                          <div class="col-lg-12 col-md-6 col-xs-6">
                          
                            <div class="slideshow_wrapper" style="max-width:700px">
                              <div class="slideshow">
                                  @foreach($photo as $poto)
                                          <?php 
                                            if($poto->slider2 == "tampil"){
                                          ?>
                                <div class="slide_one slide">
                                  <img src="public/images/{{ $poto->image }}" style="width:100%">
                                </div>
                                
                               <?php } ?>
                                 @endforeach
                                 
                              </div>
                            </div>
                          </div>

                      </div>
                            <!-- slider 2 end -->
                            
                    <!-- slider end-->
                </div>
            </div>
        </div>
    </section>


</main>

  <!--==========================
Footer
============================-->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row"  id="kontak">
  
          <div class="col-lg-4 col-md-4 footer-info">
            <h3>Senkom</h3>
            <p>Senkom Mitra Polri adalah salah satu organisasi masyarakat sadar kamtibmas yang didirikan oleh anggota Mitra Kamtibmas Mabes Polri, pada hari Kamis tanggal 1 Januari 2004 di Jakarta.</p>
          </div>
  
           <div class="col-lg-4 col-md-4 footer-contact">
            <h4>Kontak</h4>
            <p>
              JL. Dr. Djunjunan, No. 150, Sukawarna, Sukajadi, Sukagalih, Sukajadi, Kota Bandung, Jawa Barat 40164
            </p>
  
            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
  
          </div>
  
          <div class="col-lg-4 col-md-4 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Polri</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Basarnas</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Kemenkeu</a></li>
            </ul>
          </div>
  
        </div>
      </div>
    </div>
  
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Senkom</strong>. All Rights Reserved
      </div>
      <div class="credits">
  </div>
  </div>
  </footer><!-- #footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
</body>
  <!-- JavaScript Libraries -->
  <script src="{{url('public/web/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/web/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{url('public/web/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('public/web/lib/easing/easing.min.js')}}"></script>
  <script src="{{url('public/web/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{url('public/web/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{url('public/web/lib/wow/wow.min.js')}}"></script>
  <script src="{{url('public/web/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{url('public/web/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{url('public/web/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('public/web/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('public/web/lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{url('public/web/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{url('public/web/contactform/contactform.js')}}"></script>
  
  <!-- Template Main Javascript File -->
  <script src="{{url('public/web/js/main.js')}}"></script>

<script type="text/javascript">

  function show(){
    var x = document.getElementById("pass2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    } 
  }
  $(document).ready(function() {
      setInterval(function () {
        $('#show').load('{{ url('/data') }}')
      }, 500);
    });

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500);    
}

</script>

<style>
    #main, #pemantauan{
    background: url(https://www.pixelstalk.net/wp-content/uploads/2016/05/Colorful-Gradient-Wallpaper-HD.jpg) center top no-repeat fixed;
    background-size: cover;
    padding: 60px 0 40px 0;
    position: relative;
    }

.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}


 
.slideshow_wrapper {
  width:285px;
  height:260px;
  overflow: hidden;
   
}
 
.slideshow {
  width:1500px;
  height:280px;
  margin: 0 0 0 -1000px;
 position: relative;
  -webkit-animation-name: slide_animation;
  -webkit-animation-duration:3s;
  -webkit-animation-iteration-count:infinite;
  -webkit-animation-direction:alternate;
   -webkit-animation-play-state: running;
}
 
.slide {
  
  width:500px;
  height: 270px;
  position:relative;
  float:left;
  overflow:hidden;
  
}
 
.slideshow img{
  width:270px; height:270px;
}
 
@-webkit-keyframes slide_animation {
  
  0% {left:0px;}
  10% {left:500px;}
  20% {left:500px;}
  30% {left:500px;}
  40% {left:500px;}
  50% {left:500px;}
  60% {left:500px;}
  70% {left:1000px;}
  80% {left:1000px;}
  90% {left:1000px;}
  100% {left:1000px;}
  
  
}

</style>
</body>
</html>