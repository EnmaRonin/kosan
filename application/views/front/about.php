<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ngekos Dong</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/front/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/slicknav.css">
   <!--  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"> -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style type="text/css">
    .tooltip-inner {
        background-color: #00D363;
        
    }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
      <header>
        <div class="header-area ">
            <div class="header-top_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-md-5 ">
                            <div class="header_left">
                                <p>Selamat Datang Di KosanBebas.com</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-7">
                            <div class="header_right d-flex">
                                    <div class="short_contact_list">
                                    <?php if($this->session->userdata('status')!=="login"){?>
                                            <ul>
                                                <li><a href="<?php echo base_url();?>index.php/auth/register"> <i class="fa fa-user"></i> Daftar</a></li>
                                                <li><a href="<?php echo base_url();?>index.php/auth/"> <i class="fa fa-user"></i> Login</a></li>
                                            </ul>
                                    <?php }else{?>
                                        <div class="dropdown" style="margin-right:10px;">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user"></i> <?php echo $this->session->userdata('email');?>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                                <a class="dropdown-item" href="<?php echo base_url();?>index.php/profile/">Profile Saya</a>
                                                
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url();?>index.php/auth/logout">Keluar</a>
                                            </div>
                                        </div>
                                    <?php }?>
                                        </div>
                                        <div class="social_media_links">
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="<?php echo base_url();?>">
                                        <img src="<?php echo base_url();?>assets/front/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="<?php if($this->uri->segment(1)=="beranda"){echo "active";}?>" href="<?php echo base_url();?>index.php/beranda">home</a></li>
                                            <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                        <li><a href="about.html">about</a></li>
                                                        <li><a href="property_details.html">property details</a></li>
                                                        <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li> -->
                                            <li><a class="<?php if($this->uri->segment(2)=="about"){echo "active";}?>" href="<?php echo base_url();?>index.php/pages/about">About Us</a></li>
                                            <!-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li> -->
                                            <li><a class="<?php if($this->uri->segment(2)=="contact"){echo "active";}?>" href="<?php echo base_url();?>index.php/pages/contact">Contact</a></li>
                                            <li><a class="<?php if($this->uri->segment(2)=="faq"){echo "active";}?>" href="<?php echo base_url();?>index.php/pages/faq">Faq</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                <div class="search_btn">
                                            <a href="<?php echo base_url();?>index.php/beranda/mycart" class="ex4">
                                                    <span class="p1 fa-stack fa-2x has-badge" data-count="<?php echo count($this->cart->contents());?>">
                                                    <!--<i class="p2 fa fa-circle fa-stack-2x"></i>-->
                                                    <i class="p3 fa fa-shopping-bag fa-stack-1x xfa-inverse" data-count="<?php echo count($this->cart->contents());?>"></i>
                                                </span>
                                            </a>
                                    </div>
                                    <?php if($this->session->userdata('level')=="1" || $this->session->userdata('status')!=="login"){?>
                                    
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="<?php echo base_url();?>index.php/kos/iklan">Pasang Iklan</a>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
         <!-- bradcam_area  -->
         <div class="bradcam_area bradcam_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>About Us</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ bradcam_area  -->
            
    <div class="about_mission">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_thumb">
                        <img src="<?php echo base_url();?>assets/front/img/about/about.png" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_text">
                        <h4>Our Mission</h4>
                        <p>While there are countless Trips out there in charity shops and car boot sales, you can also buy refurbished examples, with today replacement leatherette available in all colors. I love my Trip and use it regularly something so refreshing about its simplicity.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- accordion  -->
    <div class="accordion_area">
            <div class="container">
                <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                                <div class="faq_ask">
                                    <h3>Frequently ask</h3>
                                        <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Adieus who direct esteem <span>It esteems luckily?</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                    Who direct esteem It esteems?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    Duis consectetur feugiat auctor?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="accordion_thumb">
                            <img src="img/banner/accordion.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- accordion  -->

    <div class="counter_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_counter">
                        <h3> <span  class="counter" >200</span> <span>+</span> </h3>
                        <p>Properties for sale</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_counter">
                        <h3> <span class="counter" >300</span></h3>
                        <p>Properties for sale</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_counter">
                        <h3> <span class="counter" >15</span></h3>
                        <p>Properties for sale</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial_area  -->
    <div class="testimonial_area overlay ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                        <div class="quote">
                                            <img src="<?php echo base_url();?>assets/front/img/svg_icon/quote.svg" alt="">
                                        </div>
                                        <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                    <img src="<?php echo base_url();?>assets/front/img/case/testmonial.png" alt="">
                                            </div>
                                            <h3>Robert Thomson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                        </div>
                        <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                        <div class="quote">
                                            <img src="<?php echo base_url();?>assets/front/img/svg_icon/quote.svg" alt="">
                                        </div>
                                        <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                    <img src="<?php echo base_url();?>assets/front/img/case/testmonial.png" alt="">
                                            </div>
                                            <h3>Robert Thomson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                        </div>
                        <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                        <div class="quote">
                                            <img src="<?php echo base_url();?>assets/front/img/svg_icon/quote.svg" alt="">
                                        </div>
                                        <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                    <img src="<?php echo base_url();?>assets/front/img/case/testmonial.png" alt="">
                                            </div>
                                            <h3>Robert Thomson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


    <!-- team_area  -->
    <div class="team_area">
            <div class="container">
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="section_title mb-40 text-center">
                                    <h3>
                                            Our Agents
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="single_team">
                                    <div class="team_thumb">
                                        <img src="<?php echo base_url();?>assets/front/img/team/1.png" alt="">
                                        <div class="social_link">
                                                <ul>
                                                    <li><a href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="team_info text-center">
                                        <h3>Milani Mou</h3>
                                        <p>Business Agent</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="single_team">
                                    <div class="team_thumb">
                                        <img src="<?php echo base_url();?>assets/front/img/team/2.png" alt="">
                                        <div class="social_link">
                                                <ul>
                                                    <li><a href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="team_info text-center">
                                        <h3>Halim Yoka</h3>
                                        <p>Business Agent</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="single_team">
                                    <div class="team_thumb">
                                        <img src="<?php echo base_url();?>assets/front/img/team/3.png" alt="">
                                        <div class="social_link">
                                                <ul>
                                                    <li><a href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="team_info text-center">
                                        <h3>Dalim Karma</h3>
                                        <p>Business Agent</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="single_team">
                                    <div class="team_thumb">
                                        <img src="<?php echo base_url();?>assets/front/img/team/4.png" alt="">
                                        <div class="social_link">
                                                <ul>
                                                    <li><a href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="team_info text-center">
                                        <h3>Micky</h3>
                                        <p>Business Agent</p>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    <!-- /team_area  -->

    

    <!-- footer start -->
       <footer class="footer">
       
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="<?php echo base_url();?>assets/front/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/ajax-form.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/scrollIt.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/nice-select.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/plugins.js"></script>
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/front/js/slick.min.js"></script>
   

    
    <!--contact js-->
    <script src="<?php echo base_url();?>assets/front/js/contact.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/mail-script.js"></script>


    <script src="<?php echo base_url();?>assets/front/js/main.js"></script>
</body>

</html>