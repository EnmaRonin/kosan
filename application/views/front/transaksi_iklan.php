<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1>Transaksi Iklan</h1>
<hr>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Invoice</th>
      <th scope="col">Kosan</th>
      <th scope="col">Total Booking</th>
      <th scope="col">Harga</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1;foreach($transaksi_iklan as $b){?>
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><a href="<?php echo base_url();?>index.php/profile/detail_transaksi/<?php echo $b['invoice'];?>"><span class="btn btn-primary">#<?php echo $b['invoice'];?></span></a></td>
      <td><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $b['id_kontrakan'];?>" target="__new"><?php echo $b['nama'];?></a></td>
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
    </tr>
  <?php $no++;}?>
  </tbody>
</table>