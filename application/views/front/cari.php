<div class="slider_area">
            <div class="single_slider single_slider2  d-flex align-items-center property_bg overlay2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="property_wrap">
                                        <div class="slider_text text-center justify-content-center">
                                                <h3>Cari Kosan Mu Sekarang !!!</h3>
                                            </div>
                                            <div class="property_form">
                                                <form action="<?php echo base_url();?>index.php/kos/cari" method="GET">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="form_wrap d-flex">
                                                                <div class="input-group has-search">
                                                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                                                    <input type="text" name="q" class="form-control" placeholder="Ketikan Lokasi Atau Nama Kos" style="z-index: 0;" value="<?php echo $this->input->get('q');?>">
                                                                    <div class="input-group-append">
                                                                      <button class="btn btn-secondary" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                      </button>
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>


    <div class="popular_property plus_padding">
        
        <div class="container">
            <?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-40 text-center">
                        <h4>Di Temukan <?php echo $count_kosan;?> Kosan di <?php echo $this->input->get('q');?></h4>
                    </div>
                </div>
            </div>
                <form action="<?php echo base_url();?>index.php/kos/cari?q=<?php echo $this->input->get('q');?>" method="POST">
                    <input type="hidden" name="q" value="<?php echo $this->input->get('q');?>">
                    <div class="row mb-40">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <select class="form-control" name="jenis" onchange="this.form.submit();">
                                <option value="">Jenis Kosan</option>
                                <option value="Campur">Campur</option>
                                <option value="Putra">Putra</option>
                                <option value="Putri">Putri</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <select class="form-control" name="jam_bertemu" onchange="this.form.submit();">
                                <option value="">Jam Bertemu</option>
                                <option value="Bebas">Bebas</option>
                                <option value="Dibatasi">Di Batasi</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <select class="form-control" name="binatang" onchange="this.form.submit();">
                                <option value="">Peliharaan Binatang</option>
                                <option value="Y">Boleh</option>
                                <option value="N">Tidak</option>
                            </select>
                        </div>
                    </div>
                </form>
            <div class="row">
            <?php foreach($kosan as $key_kosan=>$value_kosan){?>

                <div class="col-xl-4 col-md-6 col-lg-4">
                

                        <div class="single_property">
                            <a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $value_kosan['id'];?>">
                            <div class="property_thumb">
                            <?php if($value_kosan['status_kamar'][0]->status=="0"){?>
                                <div class="property_tag red">
                                        Kamar Penuh!             
                                </div>
                            <?php }else{?>
                                <div class="property_tag">
                                        Ada Kamar Kosong!             
                                </div>
                            <?php }?>
                                <img src="<?php echo base_url();?>uploads/kos/<?php echo $kosan[$key_kosan]['kosan_gallery'][0]['file_url'];?>" alt="">
                            </div>
                        </a>
                        <div class="property_content">
                            <div class="main_pro">
                                    
                                      <div class="row justify-content-between">
                                        <div class="col-8">
                                        
                                            <a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $value_kosan['id'];?>"><?php echo $value_kosan['nama'];?>
                                                
                                            </a>
                                        
                                        </div>
                                        <div class="col-4 text-center" data-toggle="tooltip" title="Kosan <?php echo $value_kosan['jenis'];?>">
                                            <?php 
                                            $bg="";
                                            $icon="";
                                            if($value_kosan['jenis']=="Campur"){
                                                $bg="primary";
                                                $icon="<i class='fa fa-male'></i>|<i class='fa fa-female'></i>";
                                            }else if($value_kosan['jenis']=="Putra"){
                                                $bg="success";
                                                $icon="<i class='fa fa-male'></i>";
                                            }else if($value_kosan['jenis']=="Putri"){
                                                $bg="danger";
                                                $icon="<i class='fa fa-female'></i>";

                                            }
                                            ?>
                                          <span class="badge badge-<?php echo $bg;?>">
                                            <?php echo $icon." ".$value_kosan['jenis'];?>    
                                          </span>
                                        </div>
                                      </div>
                                    <div class="mark_pro">
                                        <img src="<?php echo base_url();?>assets/front/img/svg_icon/location.svg" alt="">
                                        <span><?php echo $value_kosan['kota_kab'];?> - <?php echo $value_kosan['provinsi'];?></span>
                                    </div>
                                    <div class="mark_pro">
                                        <img src="<?php echo base_url();?>assets/front/img/svg_icon/location.svg" alt="">
                                        <span><?php echo $value_kosan['alamat'];?> - <?php echo $value_kosan['kode_pos'];?></span>
                                    </div>
                                    <span class="amount">Mulai Dari <strong><?php echo "Rp ".number_format($value_kosan['harga']);?></strong></span>
                            </div>
                        </div>
                        <div class="footer_pro">
                                <ul>
                                    
                                    <?php 
                                        $count_fa = count($fasilitas['fasilitas'][$key_kosan]);
                                        foreach($fasilitas['fasilitas'][$key_kosan] as $kf=>$vf){
                                            if(count($vf)==count($vf)){
                                                foreach($fasilitas['fasilitas'][$key_kosan][$kf] as $row){
                                                  ?>
                                                  <li class="d-inline">
                                                        <div class="single_info_doc">
                                                            <img data-toggle="tooltip" title="<?php echo $row['fasilitas'];?>" height="23" width="22" src="<?php echo base_url();?>uploads/icons/<?php echo $row['icon'];?>">
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                  <?php   
                                                }    
                                            }
                                    ?>
                                <?php }?>
                                </ul>
                            </div>
                    </div>
                    
                </div>
                
            <?php }?>    
            </div>
           <!--  <div class="row">
                <div class="col-xl-12">
                    <div class="more_property_btn text-center">
                        <a href="#" class="boxed-btn3-line">More Properties</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>