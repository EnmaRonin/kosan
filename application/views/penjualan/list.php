 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-cart icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Data Transaksi Penjualan
                                        <div class="page-title-subheading">Table Untuk Mengolah Transaksi Penjualan.
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
                                    <div class="card-header">Data Transaksi Penjualan
                                        <div class="btn-actions-pane-right">
                                            <div class="">
                                                <a href="<?php echo base_url();?>index.php/penjualan/form" class="mr-2 btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-plus btn-icon-wrapper"> </i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">No Invoice</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1;foreach($penjualan as $tr){?>
                                                <tr>
                                                    <td class="text-center text-muted"><?php echo $no;?></td>
                                                    <td class="text-center"><button class="detail_penjualan btn btn-primary btn-sm" data-toggle="modal" id="<?php echo $tr->no_invoice;?>" data-target=".bd-example-modal-xl"><?php echo $tr->no_invoice;?></button></td>
                                                    <td class="text-center <?php if($tr->status=='Menunggu'){echo 'text-danger';}else{echo 'text-success';}?>"><?php echo $tr->status;?></td>
                                                    <td class="text-center"><?php echo $tr->tgl;?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url();?>index.php/penjualan/hapusTransaksi/<?php echo $tr->no_invoice;?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?');"><i class="pe-7s-trash btn-icon-wrapper"> </i></a>
                                                        <!-- <a href="<?php echo base_url();?>index.php/penjualan/form/<?php echo $tr->invoice;?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning"><i class="pe-7s-pen btn-icon-wrapper" > </i></a> -->
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
		
                    