 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-street-view icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Detail Booking Iklan
                                        <div class="page-title-subheading">Table Untuk Mengolah Data Booking Bertype Iklan.
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
                                    <div class="card-header">Detail Iklan INV: <?php echo $this->uri->segment(4);?>
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
                                                <th class="text-center">Masa Aktif</th>
                                                <th class="text-center">Payment</th>
                                                <th class="text-center">Bayar</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $no=1;foreach($booking['booking'] as $k=>$pe){ 
                                                $created_at = strtotime($pe['created_at']); 
                                                $expired_at = strtotime($pe['expired_at']); //convert date
                                            ?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $no;?></td>
                                                <td class="text-center"><a href="#" target="__new"><span class="btn btn-primary btn-sm">#<?php echo $pe['invoice'];?></span></a></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $pe['id'];?>" class="ml-auto badge badge-success"><?php echo $pe['nama'];?>
                                                        
                                                    </a>
                                                </td>
                                                <td class="text-center"><?php echo "Rp ".number_format($pe['total']);?></td>
                                                <td class="text-center"><?php echo date('d M',$created_at);?> - <?php echo date('d M Y',$expired_at);?></td>
                                                <td class="text-center">
                                                   
                                                    <button class='btn btn-sm btn-warning'><?php echo $pe['payment'];?></button>
                                                
                                                </td>
                                                <td><a target="_blank" href="<?php echo base_url();?>uploads/payment/<?php echo $booking['pembayaran'][$k]['file_url'];?>" class="btn btn-sm btn-primary">Lihat</a></td>
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
                                                    <?php $disabled="";$text="Approve";if($pe['status_booking']=='y'){$disabled="disabled"; $text="Approved";}?>
                                                    <a href="<?php echo base_url();?>index.php/owner/booking_iklan/form/<?php echo $pe['id_booking'];?>/<?php echo $booking['pembayaran'][$k]['id'];?>" class="mr-2  btn btn-outline-success <?php echo $disabled;?>"><?php echo $text;?></a>
                                                    <a href="<?php echo base_url();?>index.php/owner/booking_iklan/hapus_per_id/<?php echo $pe['id_booking'];?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?');"><i class="pe-7s-trash btn-icon-wrapper"> </i></a>


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
                    <style type="text/css">
                      a.disabled {
                        pointer-events: none;
                        cursor: default;
                      }
                    </style>