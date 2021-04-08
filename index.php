<?php
require_once 'dbconfig.php';
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

 <!-- start: Meta -->
 <meta charset="utf-8">
 <title>Konco Kost</title> 
 <meta name="description" content="Undecimo Bootstrap Theme is incredibly powerfull and responsive template with modern and clear design. Undecimo has many great features like: awesome LayerSlider 3 ($35), FlexSlider 2, 400+ Glyphicons PRO ($59), 200+ Font Awesome Icons, Social Icons, Charts, Retina Display Support and many. If you buy now Undecimo Bootstrap Theme you save $109."/>
 <meta name="keywords" content="Bootstrap Theme, Bootstrap Template, Bootstrap, Responsive Theme, Responsive Template, Retina Display, Clear Design, Glyphicons, LayerSlider, FlexSlider, Font Awesome, Icons, Portfolio, Business, WrapBootstrap, Responsive" />
 <meta name="author" content="Łukasz Holeczek from creativeLabs"/>
 <!-- end: Meta -->
 
 <!-- start: Mobile Specific -->
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <!-- end: Mobile Specific -->
 
 <!-- start: Facebook Open Graph -->
 <meta property="og:title" content=""/>
 <meta property="og:description" content=""/>
 <meta property="og:type" content=""/>
 <meta property="og:url" content=""/>
 <meta property="og:image" content=""/>
 <!-- end: Facebook Open Graph -->

    <!-- start: CSS -->
 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
 <link href="css/style.css" rel="stylesheet" type="text/css">
 <link href="css/layerslider.css" rel="stylesheet" type="text/css">
 
 <!--[if lt IE 9 ]>
   <link href="css/styleIE.css" rel="stylesheet">
 <![endif]-->
 
 <!--[if IE 9 ]>
   <link href="css/styleIE9.css" rel="stylesheet">
 <![endif]-->
 
 <!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
 
 <!--start: Header -->
 <header>
  
  <!--start: Container -->
  <div class="container">
  
   <!--start: Navigation -->
   <div class="navbar navbar-inverse">
       <div class="navbar-inner">
             <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </a>
     <a class="brand" href="index.php"><img src="img/logo.jpg" alt="Logo Bootstrap Theme"> Konco Kost</a>
             <div class="nav-collapse collapse">
               <ul class="nav">
       <li><a href="index.php">Home<span>Start Here</span></a></li>
       <li><a href="index.php?modul=konten&file=allpage">List<span>Daftar Kost</span></a></li>         
       <li><a href="index.php?modul=maps&file=globalmaps">Map<span>Kelurahan Sumbersari</span></a></li>
       <li><a href="index.php?modul=informasi&file=about">About<span>Tentang</span></a></li>
       <li><a href="index.php?modul=member&file=login">Login<span>Masuk</span></a></li>
               </ul>
             </div>
          </div>
        </div> 
   <!--end: Navigation -->
   
  </div>
  <!--end: Container-->   
   
 </header>
 <!--end: Header-->


  <?php 
  include 'js/telo.js';

          if(!empty($_GET['modul'])) {
          include("modul/$_GET[modul]/$_GET[file].php");
          }

          if(empty($_GET['modul'])){
          include("modul/home.php");
          }
  ?>  

 <!-- start: Footer -->
 <div id="footer">
  
  <!-- start: Container -->
  <div class="container">
 
   <!-- start: Row -->
   <div class="row-fluid">

    <!-- start: About -->
    <div class="span3">
     
     <h3>Institute Information</h3>

     <p>
      <i class="icon-map-marker"></i> Kampus I : Jl. Bendungan Sigura-gura No. 2 
     </p>
     <p> 
      <i class="icon-map-marker"></i> Kampus II : Jl. Raya Karanglo Km. 2 
     </p> 
     <p> 
      <i class="icon-map-marker"></i> Malang , Jawa Timur , Indonesia 
     </p>
     <p> 
      <i class="icon-print"></i> Fax: 0341-417634 / 0341-553015
     </p>
     <p>
      <i class="icon-envelope"></i> Email: itn@itn.ac.id
     </p>
     <p>
      <i class="icon-globe"></i> Web: https://new.itn.ac.id/
     </p>
      
    </div>
    <!-- end: About -->

    <!-- start: Photo Stream -->
    <div class="span3">
     
    </div>
    <!-- end: Photo Stream -->

    <!-- start: Photo Stream -->
    <div class="span3">
     
    </div>
    <!-- end: Photo Stream -->
    
    <!-- start: Follow Us -->
    <div class="span3">
     
     <h3>Follow Us</h3>
     
     <a href="#" class="social-twitter"></a>
     <a href="#" class="social-facebook"></a>
     <a href="#" class="social-youtube"></a>
     <a href="#" class="social-instagram"></a>
     <a href="#" class="social-googleplus"></a>
 
    </div>
    <!-- end: Follow Us -->
    
   </div>
   <!-- end: Row -->
  
  </div>
  <!-- end: Container  --> 

 </div>
 <!-- end: Footer -->
 
 <!-- start: Under Footer -->
 <div id="under-footer">
  
  <!-- start: Container -->
  <div class="container">
   
   <!-- start: Row -->
   <div class="row-fluid">

    <!-- start: Under Footer Logo -->
    <div class="span2">
     <div id="under-footer-logo">
      <a class="brand" href="#">Konco Kost</a>
     </div>
    </div>
    <!-- end: Under Footer Logo -->

    <!-- start: Under Footer Copyright -->
    <div class="span8">
     
     <div id="under-footer-copyright">
      &copy; 2018, Developed By Ghid while in Malang
     </div>
     
    </div>
    <!-- end: Under Footer Copyright -->

    <!-- start: Under Footer Back To Top -->
    <div class="span2">
      
     <div id="under-footer-back-to-top">
      <a href="#"></a>
     </div>
    
    </div>
    <!-- end: Under Footer Back To Top -->
   
   </div>
   <!-- end: Row -->
   
  </div> 
  <!-- end: Container  -->
  
 </div>
 <!-- end: Under Footer --> 

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.isotope.js"></script>
<script src="js/jquery.imagesloaded.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/twitter.js"></script>
<script src="js/jquery.placeholder.min.js"></script>

<script src="js/jquery-easing-1.3.js"></script>
<script src="js/layerslider.kreaturamedia.jquery.js"></script>

<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.pie.min.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>

<script defer="defer" src="js/modernizr.js"></script>
<script defer="defer" src="js/retina.js"></script>
<script defer="defer" src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>