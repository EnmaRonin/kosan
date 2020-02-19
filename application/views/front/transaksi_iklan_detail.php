<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1><a href="<?php echo base_url();?>index.php/profile/transaksi_iklan">&#xab;</a> Transaksi Iklan <?php echo $this->uri->segment(3);?></h1>
<hr>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Kosan</th>
      <th scope="col">Nomor Kamar</th>
      <th scope="col">Payment</th>
      <th scope="col">Total Booking</th>
      <th scope="col">Harga</th>
      <th scope="col">Status</th>
      <th scope="col">Bayar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1;foreach($transaksi_iklan['transaksi_iklan'] as $k=>$b){?>
    <tr>
      <td><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $b['id_kontrakan'];?>" target="__new"><?php echo $b['nama'];?></a></td>
      <td><?php echo $b['nomor'];?></td>
      <td><button class="btn btn-sm btn-warning"><?php echo $b['payment'];?></button></td>
      <td><?php echo "Rp ".number_format($b['total']);?></td>
      <td><?php echo "Rp ".number_format($b['harga']);?></td>
      <td><?php 
                if($b['status_booking']=="p"){
                        echo "<button class='btn btn-sm btn-warning'>Proses</button>";
                }else if($b['status_booking']=="y"){
                        echo "<button class='btn btn-sm btn-success'>Berhasil</button>";
                }else if($b['status_booking']=="n"){
                        echo "<button class='btn btn-sm btn-danger'>Batal</button>";
                }
                ?></td>
    <td><a href="<?php echo base_url();?>uploads/payment/<?php echo $transaksi_iklan['pembayaran'][$k]['file_url'];?>" class="btn btn-sm btn-primary" target="__new">Lihat</a></td>
    <?php $disabled="";$text="Approve";if($b['status_booking']=='y'){$disabled="disabled"; $text="Approved";}?>
    <td><a href="<?php echo base_url();?>index.php/profile/update_status_trans/<?php echo $b['id_booking'];?>/<?php echo $transaksi_iklan['pembayaran'][$k]['id'];?>" class="btn btn-sm btn-success <?php echo $disabled;?>"><?php echo $text;?></a></td>
    </tr>
    
  <?php $no++;}?>
  </tbody>
</table>
<style type="text/css">
  a.disabled {
    pointer-events: none;
    cursor: default;
  }
</style>