<div class="bradcam_area breadcam_bg">
        <h3 class="text-center">Keranjang Saya</h3>
</div>

<div class="container mt-5">
<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
    
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Kosan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Provinsi - Kota</th>
                            <th scope="col">Nomor Kamar</th>
                            <th scope="col" class="text-right">Harga Bulanan</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                <?php if(count($cart)==0){?>
                    <tr>
                    <td colspan="6" class="text-center">Data Keranjang Masih Kosong</td>
                    </tr>
                <?php }?>
                
                <?php foreach($cart as $row){?>
                        <tr>
                            <td><a  href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $row['id_kosan'];?>" class="ml-auto badge badge-success" target="__new"><?php echo $row['name'];?></a></td>
                            <td><?php echo $row['alamat'];?></td>
                            <td><?php echo $row['provinsi'];?> - <?php echo $row['kota'];?></td>
                            <td><?php if(!empty($row['nomor_kamar'])){echo $row['nomor_kamar'];}else{ echo "--";}?></td>
                            <td class="text-right"><?php echo "Rp ".number_format($row['price']);?></td>
                            <td class="text-right"><a href="<?php echo base_url();?>index.php/beranda/hapusCart/<?php echo $row['rowid'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo "Rp ".number_format($this->cart->total());?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-5 ">
            <div class="row">
                <?php if($this->session->level!=="1"){?>
                <div class="col-sm-12 col-md-6">
                    <a class="btn btn-block btn-danger" href="<?php echo base_url();?>index.php/beranda/kosan">Cari Kosan Lagi!!</a>
                </div>
                <?php }?>
                <div class="col-sm-12 col-md-6">
                    <a href="<?php echo base_url();?>index.php/beranda/checkout" class="btn btn-block btn-primary text-uppercase">Bayar</a>
                </div>
            </div>
        </div>
    </div>
</div>