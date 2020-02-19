<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1>Iklan Kosan Saya</h1>
<hr>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kosan</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kota</th>
      <th scope="col">kodePos</th>
      <th scope="col">Masa Aktif</th>
      <th scope="col">Jenis</th>
      <th scope="col">Publish</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1;foreach($kosan as $b){ $created_at = strtotime($b['created_at']); $expired_at = strtotime($b['expired_at']); //convert date?>

    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $b['id_kosan'];?>" target="__new" data-toggle="tooltip" title="Klik Untuk Melihat Detail"><span class="ml-auto badge badge-primary">#<?php echo $b['nama_kosan'];?></span></a></td>
      <td><?php echo $b['alamat'];?></td>
      <td><?php echo $b['kota_kab'];?> - <?php echo $b['provinsi'];?></td>
      <td><?php echo $b['kode_pos'];?></td>
      <td><?php echo date('d M',$created_at);?> - <?php echo date('d M Y',$expired_at);?></td>
      <td class="text-center">
                                                      <?php if($b['jenis']=="Campur"){
                                                                echo "<div class='ml-auto badge badge-warning'>Campur</div>";
                                                            }else if($b['jenis']=="Putra"){
                                                                echo "<div class='ml-auto badge badge-danger'>Putra</div>";
                                                            }else if($b['jenis']=="Putri"){
                                                                echo "<div class='ml-auto badge badge-primary'>Putri</div>";
                                                            }
                                                        ?>
                                                </td>
      <td><?php 
                if($b['publish']=="Y"){
                        echo "<button data-toggle='tooltip' title='Iklan Anda Di Ditampilkan' class='btn btn-sm btn-success'>Ya</button>";
                }else if($b['publish']=="N"){
                        echo "<button data-toggle='tooltip' title='Iklan Anda Tidak Di Tampilkan' class='btn btn-sm btn-danger'>Tidak</button>";
                }
                ?></td>
      <td>
        <a class='btn btn-sm btn-warning' href="<?php echo base_url();?>index.php/beranda/booking_iklan/<?php echo $b['id_kosan'];?>" target="__new">Perpanjang</a>
      </td>
    </tr>
  <?php $no++;}?>
  </tbody>
</table>