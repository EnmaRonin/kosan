<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php foreach($gallery_kosan as $k=>$v){?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $k;?>" class="<?php if($k==0){echo "active";}?>"></li>
  <?php }?>
    </ol>
  <div class="carousel-inner">
  <div class="carousel-caption d-none d-md-block">
    <h1 style="color:white;"><?php echo $kosan[0]['nama'];?></h1>
    
    <p style="color:white;"><?php echo $kosan[0]['provinsi'];?> - <?php echo $kosan[0]['kota_kab'];?></p>
  </div>
  <?php foreach($gallery_kosan as $k=>$v){?>
    <div class="carousel-item <?php if($k==0){echo "active";}?>">
      <img class="d-block w-100" style="width:100%; height: 600px; background-size: cover;"  src="<?php echo base_url();?>uploads/kos/<?php echo $v['file_url'];?>" alt="First slide">
    </div>
  <?php }?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<section class="second listingDetail ng-scope" ng-controller="ListingDetailController">
    <div class="container contentAllCK">
        <div class="row">
            <div class="col-md-12 col-md-offset-1 listing-wrapper">
                                
                <div>
                    <div class="detailBreadcrumb">
                        <p style="font-size:12px;">
                            <a href="<php echo base_url();?>index.php/beranda/cari-kos/">Kos</a> <i class="fa fa-angle-double-right" aria-hidden="true" style="padding:0 5px;"></i> <a href="<php echo base_url();?>index.php/beranda/cari-kos/<?php echo $kosan[0]['provinsi'];?>"><?php echo $kosan[0]['provinsi'];?></a> <i class="fa fa-angle-double-right" aria-hidden="true" style="padding:0 5px;"></i> <a href="<php echo base_url();?>index.php/beranda/cari-kos/<?php echo $kosan[0]['provinsi'];?>/<?php echo $kosan[0]['kota_kab'];?>"><?php echo $kosan[0]['kota_kab'];?></a>
                        </p>
                    </div>
                </div>
                <h1 class="listingTitle"><?php echo $kosan[0]['nama'];?></h1>
                <hr>
            </div>
            <div class="col-md-8">
                <button class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i> Whasapp</button>
                <button class="btn btn-info btn-sm" style="background-color: rgb(59, 89, 152);"><i class="fa fa-facebook"></i> Facebook</button>
                <button class="btn btn-success btn-sm"><i class="fab fa-line"></i> Line</button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-pinterest"></i> Pinterest</button>
                <button class="btn btn-info btn-sm"><i class="fa fa-twitter"></i> Twitter</button>
            </div>
            <div class="col-md-3">
                <div class="wrapper-priceDetailTop float-right">
                        <p class="text-center"><!-- <span>Mulai dari : </span> --><?php echo "Rp ".number_format($kosan[0]['harga']);?> / bulan</p>
                </div>
            </div>
            <div class="col-md-5">
                    <p><strong>Lokasi Kos</strong></p>
                    <div style="margin-bottom:20px;">
                        <div class="table-responsive">
                          <table class="table borderless listingDetailLokasinJenis">
                            <tbody>
                                <tr>
                                    <td >Provinsi</td>
                                    <td >:</td>
                                    <td ><?php echo $kosan[0]['provinsi'];?></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td><?php echo $kosan[0]['kota_kab'];?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td><?php echo $kosan[0]['kecamatan'];?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $kosan[0]['alamat'];?></td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        
                    </div>
                    
                    <p><strong>Tipe Kos</strong></p>
                    <div>
                        <div style="margin-bottom:20px;">
                            <div class="table-responsive">
                                <table class="table borderless listingDetailLokasinJenis">
                                    <tbody>
                                        <tr>
                                            <td class="">Jenis Kos</td>
                                            <td class="">:</td>
                                            <td class=""><?php echo $kosan[0]['jenis'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="">Umur Bangunan</td>
                                            <td class="">:</td>
                                            <td class=""><?php echo $kosan[0]['umur_bangunan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jam Bertamu</td>
                                            <td>:</td>
                                            <td><?php echo $kosan[0]['jam_bertemu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Pelihara Binatang</td>
                                            <td>:</td>
                                            <td><?php if($kosan[0]['binatang']=="N"){echo"Tidak";}else{echo"Boleh";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="call-kos-top">
                        <a href="https://wa.me/<?php echo $kosan[0]['user'][0]['tlp'];?>" target="_new" class="btn btn-primary" style="margin-top:5px; width: 100%; padding: 8px;"><i class="fa fa-phone-square" aria-hidden="true"></i> Hubungi Kos</a>
                    </div>
                </div>
                <div class="col-md-6">
                <div id="kosan" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php foreach($gallery_kosan as $k=>$v){?>
                        <li data-target="#kosan" data-slide-to="<?php echo $k;?>" class="<?php if($k==0){echo "active";}?>"></li>
                    <?php }?>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:white;"><?php echo $kosan[0]['nama'];?></h1>
                    
                        <p style="color:white;"><?php echo $kosan[0]['provinsi'];?> - <?php echo $kosan[0]['kota_kab'];?></p>
                    </div>
                    <?php foreach($gallery_kosan as $k=>$v){?>
                        <div class="carousel-item <?php if($k==0){echo "active";}?>">
                        <img class="d-block w-100" style="width:100%; height: 400px; background-size: cover;"  src="<?php echo base_url();?>uploads/kos/<?php echo $v['file_url'];?>" alt="<?php echo $kosan[0]['nama'];?>">
                        </div>
                    <?php }?>
                    </div>
                    <a class="carousel-control-prev" style="" href="#kosan" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" style="" href="#kosan" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
                    
        </div>
        <div class="row">
        <div class="col-md-6 ">
                    <p style="margin-top:20px;"><strong>Deskripsi</strong></p>
                    <div class="col-md-12"><?php print_r($kosan[0]['deskripsi']);?></div>
        </div>
        <div class="col-md-6 ">

            <div id="map" style="width: 600px; height: 400px;     z-index: 14;"></div>
        </div>
        </div>
    </div>
 </div>
 <hr>
</section>
<?php $no=1;foreach($kamar as $k_kamar=>$v_kamar){?>
<section class="first listingDetail" style="padding-bottom: 20px;">
<div class="container">
    <div class="col-md-12 col-md-offset-1 listing-wrapper" style="margin-bottom: 20px;">
        <div class="roomDetailTop">
            <div class="row">
                <div class="col-md-6">
                    <div id="kamar_<?php echo $k_kamar;?>" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            <?php foreach($gallery_kamar[$k_kamar] as $k=>$v){?>
                                <li data-target="#kamar_<?php echo $k_kamar;?>" data-slide-to="k_<?php echo $k;?>" class="<?php if($k==0){echo "active";}?>"></li>
                            <?php }?>
                                </ol>
                            <div class="carousel-inner">
                            <?php foreach($gallery_kamar[$k_kamar] as $k=>$v){?>
                                <div class="carousel-item <?php if($k==0){echo "active";}?>">
                                <img class="d-block w-100" style="width:100%; height: 400px; background-size: cover;"  src="<?php echo base_url();?>uploads/kamar/<?php echo $v['file_url'];?>" alt="First slide">
                                </div>
                            <?php }?>
                            </div>
                            <a class="carousel-control-prev"  href="#kamar_<?php echo $k_kamar;?>" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next"  href="#kamar_<?php echo $k_kamar;?>" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div> 
                </div>
                <div class="col-md-6">
                        <div class="wrapper-description">
                            <p class="title">Kamar <?php echo $no;?></p>
                            <div>
                                <p class="<?php if($v_kamar['status']=="kosong"){echo "statusDetailAdaKosong";}else{echo "statusDetailterisi";}?>"><?php echo $v_kamar['status'];?></p>
                            <div class="clear"></div>
                            </div>
                            <?php 
                                $satuan_u_k = explode(" ",$v_kamar['u_kamar']);
                              
                                $satuan_l_kamar = explode(" ",$v_kamar['l_kamar']);
                            ?>
                            <?php print_r($v_kamar['deskripsi_kamar']);?>                            
                            <div style="margin-bottom: 25px;">
                                <div class="dataListing dataLeft">Nomor Kamar</div>
                                <div class="dataListing dataRight"><?php echo $v_kamar['nomor'];?></div>
                                <div class="clear"></div>
                                <div class="dataListing dataLeft">Ukuran Kamar</div>
                                <div class="dataListing dataRight"><?php echo $satuan_u_k[0]." ".$satuan_u_k[1]." ".$satuan_u_k[2]."<sup>".$satuan_u_k[3]."</sup>";?></div>
                                <div class="clear"></div>
                                <div class="dataListing dataLeft">Luas Kamar</div>
                                <div class="dataListing dataRight"><?php echo $satuan_l_kamar[0]." ".$satuan_l_kamar[1]." ".$satuan_l_kamar[2]."<sup>".$satuan_l_kamar[3]."</sup>";?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="room-facility-wrapper">

                            </div><!-- /.row -->
                        </div>
                    
            </div>
            <div class="clear"></div>
            <div class="mt-2">
            <h3 class="fasilitas-kamar">Fasilitas Kamar</h3>
            <div class="row">
                <?php foreach($fasilitas[$k_kamar] as $f){?>
                
                <div class="col-md-2 mt-1" style="<?php if(count($f)=="2"){echo "margin-right:120px;";}else{echo"margin-right:80px;";}?>">
                <button style="width:230px;" class="btn btn-transparent btn-lg"><img height="40" width="45" src="<?php echo base_url();?>uploads/icons/<?php echo $f['icon'];?>" class="float-left"><?php echo $f['fasilitas'];?></button>                  
                </div>
                
                <?php } ?>
                </div>  
                    <div class="clear"></div>
                </div>
                </div>
                
        </div>
        
    </div>
    <div class="roomDetailBottom">
        <div class="row">
                	<div class="room-price  col-md-6">
                        <a class="text-white" href="<?php echo base_url();?>index.php/beranda/booking/<?php echo $v_kamar['id'];?>">
                            <p><i class="fa fa-shopping-cart fa-1x"></i> <?php echo "Rp ".number_format($v_kamar['harga']);?> / bulan</p>
                        </a>
                    </div>
                    
                    <div class="room-price last col-md-6">
                        <a class="text-white" href="<?php echo base_url();?>index.php/beranda/booking/<?php echo $v_kamar['id'];?>">
                            <p><i class="fa fa-shopping-cart fa-1x"></i> <?php echo "Rp ".number_format($v_kamar['harga']*12);?> / tahun</p>
                        </a>
                    </div>        
                    
            </div>
        </div>
                <div class="clear"></div>
</div>
</section>
<?php $no++;} ?>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<script>
        var map = L.map('map').setView([<?php echo $kosan[0]['lat'];?>, <?php echo $kosan[0]['lang'];?>], 8);
                  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',{

                        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox.streets',
                        accessToken: 'pk.eyJ1IjoiamVwZXdzeWtlcyIsImEiOiJjazZhZTFpb3AwbmdtM2xxanVoN2Q4dmo3In0.4ORIedGxekwZWTO-9GOfKw'
                    }).addTo(map);
         var marker = L.marker([<?php echo $kosan[0]['lat'];?>, <?php echo $kosan[0]['lang'];?>]).addTo(map);
         var popup = marker.bindPopup('<b class="text-uppercase"><?php echo $kosan[0]['nama'];?>!</b><br /><?php echo $kosan[0]['kota_kab'];?> - <?php echo $kosan[0]['provinsi'];?>.<br><b><a href="https://www.openstreetmap.org/?mlat=<?php echo $kosan[0]['lat'];?>&mlon=<?php echo $kosan[0]['lang'];?>#map=14/<?php echo $kosan[0]['lat'];?>/<?php echo $kosan[0]['lang'];?>" target="_new">Cari ALamat</a></b>');

</script>