<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kosan.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="<?php echo base_url();?>assets/main.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   

<script type="text/javascript" src="<?php echo base_url();?>assets/assets/scripts/jquery.min.js"></script>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="text-center"><img src="<?php echo base_url();?>assets/logo.png" height="50" width="180" ></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <!-- <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-database"> </i>
                                Statistics
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Projects
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>
                    </ul>        
                </div> -->
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="<?php echo base_url();?>assets/assets/images/avatars/ava.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            
                                            <a href="<?php echo base_url();?>index.php/auth/logout" tabindex="0" class="dropdown-item">Logout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $this->session->userdata('nama');?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php echo "Owner";?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>        
                
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                
                                <li>
                                    <a href="<?php echo base_url();?>index.php/welcome" class="<?php if($this->uri->segment(2)=="welcome"){echo "mm-active";}?>">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Beranda
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Master Data</li>
                                
                                <li>
                                    <a href="<?php echo base_url();?>index.php/owner/kosan" class="<?php if($this->uri->segment(2)=="kosan"){echo "mm-active";}?>">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Data Kosan
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>index.php/owner/fasilitas" class="<?php if($this->uri->segment(2)=="fasilitas"){echo "mm-active";}?>">
                                        <i class="metismenu-icon fa fa-street-view"></i>
                                        Data Fasilitas
                                    </a>
                                </li>
                                
                               
                                <li class="app-sidebar__heading">Data Transaksi</li>
                                
                                <li>
                                    <a href="<?php echo base_url();?>index.php/owner/booking_iklan" class="<?php if($this->uri->segment(2)=="booking_iklan"){echo "mm-active";}?>">
                                        <i class="metismenu-icon pe-7s-cash">
                                        </i>Booking Iklan
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>index.php/owner/booking_kosan" class="<?php if($this->uri->segment(2)=="booking_kosan"){echo "mm-active";}?>">
                                        <i class="metismenu-icon pe-7s-cash">
                                        </i>Booking Kosan
                                    </a>
                                </li>


                                <li class="app-sidebar__heading">Data User</li>
                                <li>
                                    <a class="<?php if($this->uri->segment(2)=="admin"){echo "mm-active";}?>" href="<?php echo base_url();?>index.php/owner/admin">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Admin
                                    </a>
                                </li>
                                <li>
                                    <a class="<?php if($this->uri->segment(2)=="pemilik"){echo "mm-active";}?>" href="<?php echo base_url();?>index.php/owner/pemilik">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Pemilik Kos
                                    </a>
                                </li>
                                <li>
                                    <a class="<?php if($this->uri->segment(2)=="pencari"){echo "mm-active";}?>" href="<?php echo base_url();?>index.php/owner/pencari">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Pencari Kos
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">Data Laporan</li>
                                <li>
                                    <a class="<?php if($this->uri->segment(2)=="laporan"){echo "mm-active";}?>" href="<?php echo base_url();?>index.php/owner/laporan">
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>Laporan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    
                <?php $this->load->view($halaman);?>
                <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                &copy; DevIjv All Team
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                Since 2019
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="app-footer-right">
                                    
                                </div>
                            </div>
                        </div>
                    </div>   
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

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
      // ClassicEditor
      //   .create( document.querySelector( '#deskripsi_kamar' ), {
      //     // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
      //     removePlugins: ['ImageUpload','ImageToolbar']
      //   } )
      //   .then( editor => {
      //     window.editor = editor;
      //   } )
      //   .catch( err => {
      //     console.error( err.stack );
      //   } );
    </script>

<script type="text/javascript" src="<?php echo base_url();?>/assets/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>assets/select2.min.js"></script>
<script type="text/javascript">
    
        var ctx = document.getElementById("bar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Data Booking Iklan", "Data Booking Kosan", "Data User", " Data Kosan Publish",'Data Kosan Non Publish'],
                datasets: [{
                    label: '# NGEKOS_DONG',
                    data: [
                    <?php echo $this->db->select('*')->from('booking')->where('status','y')->where('type','iklan')->where('created_at',date('Y-m-d'))->get()->num_rows();?>,
                    <?php echo $this->db->select('*')->from('booking')->where('status','y')->where('type','kosan')->where('created_at',date('Y-m-d'))->get()->num_rows();?>,
                    <?php echo $this->db->select('*')->from('user')->where('created_at',date('Y-m-d'))->get()->num_rows();?>,
                    <?php echo $this->db->select('*')->from('kosan')->where('publish','Y')->where('created_at',date('Y-m-d'))->get()->num_rows();?>,
                    <?php echo $this->db->select('*')->from('kosan')->where('publish','N')->where('created_at',date('Y-m-d'))->get()->num_rows();?>,
                    ],
                    backgroundColor: [
                    'rgba(255, 11, 23)',
                    'rgba(229, 255, 11)',
                    'rgba(26, 255, 11)',
                    'rgba(24, 134, 108)',
                    'rgba(24, 124, 103)'
                    ],
                    borderColor: [
                    'rgba(255, 11, 23)',
                    'rgba(229, 255, 11)',
                    'rgba(26, 255, 11)',
                    'rgba(24, 134, 108)0'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    
</script>

<script type="text/javascript">
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    $(document).ready(function() {
        $(".bil").keyup(function(){
						$(".simpan_transaksi").prop("disabled", true);
						$( "p.uang" ).removeClass( "d-none" );
						var bil1 =$(".total_harga").val();
						var bil2 =$(".bil").val();
						var hasil = bil2 - bil1;
						if(hasil >= 0){
							$(".simpan_transaksi").prop("disabled", false);
							$( "p.uang" ).addClass( "d-none" );
						}
						$('.kembalian').val("Rp "+ formatNumber(hasil));
					});

        $(".detail").click(function(){
            var invoice =  $(this).attr('id');
            
            $.ajax({
                url : "<?php echo site_url('pembelian/detail/');?>"+invoice,
                method : "POST",
                data : {invoice: invoice},
                async : true,
                dataType: "html",
                success: function(data){
                    $('.detail_transaksi').html(data);                      
                }   
            });
        });

        $(".detail_penjualan").click(function(){
            var invoice =  $(this).attr('id');
            
            $.ajax({
                url : "<?php echo site_url('penjualan/detail/');?>"+invoice,
                method : "POST",
                data : {invoice: invoice},
                async : true,
                dataType: "html",
                success: function(data){
                    $('.detail_transaksi').html(data);                      
                }   
            });
        });
        $('.js-example-basic-single').select2();
    });
</script>
			<script type="text/javascript">
    
    $(document).ready(function() {
        

        $(".detail").click(function(){
            var invoice =  $(this).attr('id');
            
            $.ajax({
                url : "<?php echo site_url('pembelian/detail/');?>"+invoice,
                method : "POST",
                data : {invoice: invoice},
                async : true,
                dataType: "html",
                success: function(data){
                    $('.detail_transaksi').html(data);                      
                }   
            });
        });

        $(".detail_penjualan").click(function(){
            var invoice =  $(this).attr('id');
            
            $.ajax({
                url : "<?php echo site_url('penjualan/detail/');?>"+invoice,
                method : "POST",
                data : {invoice: invoice},
                async : true,
                dataType: "html",
                success: function(data){
                    $('.detail_transaksi').html(data);                      
                }   
            });
        });
        $('.js-example-basic-single').select2();
    });
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-datepicker.es.min.js"></script>

<div class="modal fade" id="gantipassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    <form method="POST" action="<?php echo base_url();?>index.php/owner/gantipassword" class="needs-validation" >
                        <div class="form-group row">
                            <label for="inputnama" class="col-sm-2 col-form-label">Password Lama</label>
                            <div class="col-sm-10">
                                    <input type="password" class="form-control" name="old_password" id="inputnama" placeholder="Password Lama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputnama" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="inputnama" placeholder="Password Lama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputnama" class="col-sm-2 col-form-label">Password Confirmasi</label>
                            <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmasi" id="inputnama" placeholder="Password Confirmasi" required>
                            </div>
                        </div>    
                    </form>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.forms[0].submit();">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Data Transaksi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body detail_transaksi">
                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

</body>
</html>
