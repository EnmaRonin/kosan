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

    <?php $this->load->view($halaman);?>
    <!-- slider_area_start -->
   
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <!-- JS here -->
    <script src="<?php echo base_url();?>assets/front/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- <script src="js/vendor/jquery-1.12.4.min.js"></script> -->
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
    <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

    
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#deskripsi' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            removePlugins: ['ImageUpload','ImageToolbar']
            } )
            .then( editor => {
            window.editor = editor;
            } )
            .catch( err => {
            console.error( err.stack );
            } );
    </script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        
        function collision($div1, $div2) {
            var x1 = $div1.offset().left;
            var w1 = 40;
            var r1 = x1 + w1;
            var x2 = $div2.offset().left;
            var w2 = 40;
            var r2 = x2 + w2;

            if (r1 < x2 || x1 > r2)
                return false;
            return true;
        }
        // Fetch Url value 
        var getQueryString = function (parameter) {
            var href = window.location.href;
            var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
        // End url 
        // // slider call
        $('#slider').slider({
            range: true,
            min: 20,
            max: 200,
            step: 1,
            values: [getQueryString('minval') ? getQueryString('minval') : 20, getQueryString('maxval') ?
                getQueryString('maxval') :200
            ],

            slide: function (event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html( ui.values[0] + 'K');
                $('.ui-slider-handle:eq(1) .price-range-max').html( ui.values[1] + 'K');
                $('.price-range-both').html('<i>K' + ui.values[0] + ' - </i>K' + ui.values[1]);

                // get values of min and max
                $("#minval").val(ui.values[0]);
                $("#maxval").val(ui.values[1]);

                if (ui.values[0] == ui.values[1]) {
                    $('.price-range-both i').css('display', 'none');
                } else {
                    $('.price-range-both i').css('display', 'inline');
                }

                if (collision($('.price-range-min'), $('.price-range-max')) == true) {
                    $('.price-range-min, .price-range-max').css('opacity', '0');
                    $('.price-range-both').css('display', 'block');
                } else {
                    $('.price-range-min, .price-range-max').css('opacity', '1');
                    $('.price-range-both').css('display', 'none');
                }

            }
        });

        $('.ui-slider-range').append('<span class="price-range-both value"><i>' + $('#slider').slider('values', 0) +
            ' - </i>' + $('#slider').slider('values', 1) + '</span>');

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">' + $('#slider').slider('values', 0) +
            'k</span>');

        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">' + $('#slider').slider('values', 1) +
            'k</span>');
    </script>
</body>

</html>