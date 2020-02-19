 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-home icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Data Kosan 
                                        <div class="page-title-subheading">Table Untuk Mengolah Data Kosan.
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>            
                         <div class="row">
                            <div class="col-md-12">
                                <?php if($this->session->flashdata('result')==TRUE):?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('result');?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Data Kontrakan
                                        <div class="btn-actions-pane-right">
                                            <div class="">
                                                <a href="<?php echo base_url();?>index.php/owner/Kosan/form" class="mr-2 btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-plus btn-icon-wrapper"> </i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nama Kosan</th>
                                                <th class="text-center">Nama Pemilik</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Kota</th>
                                                <th class="text-center">KodePos</th>
                                                <th class="text-center">Jenis</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $no=1;foreach($kontrakan as $pe){?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $no;?></td>
                                                <td class="text-center"><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $pe->id_kosan;?>" class="ml-auto badge badge-success" target="__new"><?php echo $pe->nama_kosan;?> &#x2750;</a></td>
                                                <td class="text-center"><a href="<?php echo base_url();?>index.php/owner/pemilik/form/<?php echo $pe->user_id;?>" class="badge badge-info" target="_new"><?php echo $pe->nama;?></a></td>
                                                <td class="text-center"><?php echo $pe->kosan_alamat;?></td>
                                                <td class="text-center"><?php echo $pe->kota_kab;?></td>
                                                <td class="text-center"><?php echo $pe->kode_pos;?></td>
                                                <td class="text-center">
                                                      <?php if($pe->jenis=="Campur"){
                                                                echo "<div class='ml-auto badge badge-warning'>Campur</div>";
                                                            }else if($pe->jenis=="Putra"){
                                                                echo "<div class='ml-auto badge badge-danger'>Putra</div>";
                                                            }else if($pe->jenis=="Putri"){
                                                                echo "<div class='ml-auto badge badge-primary'>Putri</div>";
                                                            }
                                                        ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url();?>index.php/owner/kosan/hapus/<?php echo $pe->id_kosan;?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?');"><i class="pe-7s-trash btn-icon-wrapper"> </i></a>
                                                    
                                                </td>
                                            </tr>
                                            <?php $no++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>