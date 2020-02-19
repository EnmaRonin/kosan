 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-street-view icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Booking Kosan 
                                        <div class="page-title-subheading">Table Untuk Mengolah Data Booking Bertype Kosan.
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
                                    <div class="card-header">Data Booking Kosan
                                        <div class="btn-actions-pane-right">
                                            <div class="">
                                                <!-- <a href="<?php echo base_url();?>index.php/owner/fasilitas/form" class="mr-2 btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-plus btn-icon-wrapper"> </i></a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Invoice</th>
                                                <th class="text-center">Kosan</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Pencari Kos</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $no=1;foreach($booking as $pe){?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $no;?></td>
                                                <td class="text-center"><a href="<?php echo base_url();?>index.php/owner/booking_kosan/detail/<?php echo $pe['invoice'];?>" target="__new"><span class="btn btn-primary btn-sm">#<?php echo $pe['invoice'];?></span></a></td>
                                                <td class="text-center"><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $pe['id'];?>" class="ml-auto badge badge-success" target="_blank"><?php echo $pe['nama_kosan'];?> &#x2750;
                                                        
                                                    </a></td>
                                                <td class="text-center"><?php echo "Rp ".number_format($pe['total']);?></td>
                                                <td class="text-center"><a href="<?php echo base_url();?>index.php/owner/pencari/form/<?php echo $pe['id_user'];?>" class="ml-auto badge badge-danger" target="_blank"><?php echo $pe['nama_user'];?> &#x2750;
                                                        
                                                    </a></td>
                                                <td class="text-center">
                                                    <?php 
                                                    if($pe['status_booking']=="p"){
                                                            echo "<button class='btn btn-sm btn-warning'>Proses</button>";
                                                    }else if($pe['status_booking']=="y"){
                                                            echo "<button class='btn btn-sm btn-success'>Berhasil</button>";
                                                    }else if($pe['status_booking']=="n"){
                                                            echo "<button class='btn btn-sm btn-danger'>Batal</button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url();?>index.php/owner/booking_kosan/hapus/<?php echo $pe['invoice'];?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?');"><i class="pe-7s-trash btn-icon-wrapper"> </i></a>
                                                   
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