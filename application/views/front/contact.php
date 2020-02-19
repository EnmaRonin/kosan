<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us</title>
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
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
                                    <h3>Contact Us</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Contact Kami</h2>
                    </div>
                    <div class="col-lg-8">
                        Jika Ada Pertanyaan Kepada Kita Harap Hubungi Disini <a class="btn btn-sm btn-success" target="_new" href="https://wa.me/6287623746372">Whatsapp</a> Atau Hubungi Ke Nomor <span class="btn btn-sm btn-primary">0251974221</span> Via Telepon
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+62 0251974221</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
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
        <script src="<?php echo base_url();?>assets/front/js/gijgo.min.js"></script>
    
        <!--contact js-->
        <script src="<?php echo base_url();?>assets/front/js/contact.js"></script>
        <script src="<?php echo base_url();?>assets/front/js/jquery.ajaxchimp.min.js"></script>
        <script src="<?php echo base_url();?>assets/front/js/jquery.form.js"></script>
        <script src="<?php echo base_url();?>assets/front/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>assets/front/js/mail-script.js"></script>
    
        <script src="<?php echo base_url();?>assets/front/js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
            });
            $('#datepicker2').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
    
            });
        </script>
    </body>
    
    </html>