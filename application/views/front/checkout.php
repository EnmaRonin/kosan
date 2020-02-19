<div class="bradcam_area breadcam_bg">
        <h3 class="text-center">Form Pembayaran</h3>
</div>
<section class="checkout_area section-margin--small mt-5">
    <div class="container">
           
<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-5">
                    <h3>Detail Pembayaran</h3>
                    <p>
                        <?php if($this->session->userdata('level')==1){?>
                        <b>Silahkan transfer Sesuai Nominal Pesanan Ke Bank Test Dengan Nomor Rekening 08123444221 Atas Nama Admin</b>
                        <?php }else{?>
                        <b>Silahkan transfer Sesuai Nominal Pesanan Ke Bank <?php echo $bank_account[0]['nama_bank'];?> Dengan Nomor Rekening <?php echo $bank_account[0]['no_rek'];?> Atas Nama <?php echo $bank_account[0]['atas_nama'];?></b>
                        <?php }?> </p>
                    <form class="row contact_form" id="form_payment" action="<?php echo base_url();?>index.php/beranda/payment" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="" name="name" value="<?php echo $this->session->userdata('nama');?>" disabled>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="" name="name" value="<?php echo $this->session->userdata('tlp');?>" disabled>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="" name="name" value="<?php echo $this->session->userdata('alamat');?>" disabled>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="" name="name" value="<?php echo $this->session->userdata('email');?>" disabled>
                        </div>
                        
                        <div class="col-md-4 form-group">
                            <p>Pilih Jenis Pembayaran</p>
                        </div>
                        
                        <div class="col-md-8 form-group">
                            <select name="payment" class="form-control" onchange="update_harga(this.value)">
                                <option>--Pilih Sistem Pembayaran--</option>
                                <option value="<?php echo base_url();?>index.php/beranda/update_type/DP" <?php if(!empty($this->session->userdata('payment') AND $this->session->userdata('payment')=="DP")){echo "Selected";}?>>DP</option>
                                <option value="<?php echo base_url();?>index.php/beranda/update_type/FULL" <?php if(!empty($this->session->userdata('payment') AND $this->session->userdata('payment')=="FULL")){echo "Selected";}?>>FULL</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <p>Upload Bukti Pembayaran</p>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="file"  class="form-control" id="files" name="bukti_bayar" placeholder="Upload Bukti Pembayaran"/ required>
                        </div>
                        
                        
                    </form>
                </div>
                <div class="col-lg-7">
                    <div class="order_box">
                        <h2>Pesanan Kamu</h2>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Kosan</th>
                                    <th scope="col">Nomor Kamar</th>
                                    <th scope="col" class="text-center">Provinsi - Kota</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->cart->contents() as $cart){?>
                                <tr>
                                    <td class="text-left"><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $cart['id_kosan'];?>" target="__new"> <?php echo $cart['name'];?></a></td>
                                    <td class="text-center"><?php echo $cart['nomor_kamar'];?></td>
                                    <td class="text-center"><?php echo $cart['provinsi'];?> - <?php echo $cart['kota'];?></td>
                                    <td class="text-right"><?php echo "Rp ".number_format($cart['subtotal']);?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <th scope="col" colspan="3">Total</th>
                                    <td class="text-right"><strong><?php echo "Rp ".number_format($this->cart->total());?></strong></td>
                                </tr>
                            </tbody>
                            
                            
                        </table>
                        
                        
                        <div class="text-center">
                          <button class="btn btn-primary col-md-12" onclick="document.getElementById('form_payment').submit();">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <script>
      function update_harga(type){
        window.location=type;
      }
  </script>