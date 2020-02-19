<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1>Detail Booking Saya</h1>
<hr>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Invoice</th>
      <th scope="col">Kosan</th>
      <th scope="col">Nomor Kamar</th>
      <th scope="col">Total</th>
      <th scope="col">Payment</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1;foreach($booking as $b){?>
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><a href="<?php echo base_url();?>index.php/profile/cetak_booking_detail/<?php echo $b['id_booking'];?>" data-toggle="tooltip" data-original-title="Klik Untuk Cetak" target="_new"><span class="btn btn-primary btn-sm">#<?php echo $b['invoice'];?></span></a></td>
      <td><a href="<?php echo base_url();?>index.php/beranda/kosan/<?php echo $b['id_kontrakan'];?>" target="__new"><?php echo $b['nama'];?></a></td>
      <td><?php if($this->session->level=="1"){echo "--";}else{echo $b['nomor'];}?></td>
      <td><?php echo "Rp ".number_format($b['total']);?></td>
      
      <td><button class="btn btn-sm btn-warning"><?php echo $b['payment'];?></button></td>
      <td><?php echo $b['created_at'];?></td>
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

<?php if($count_booking!=2){?>
<hr>
<h2>Form Pelunasan</h2>
<hr>
<form method="POST" novalidate="novalidate" action="<?php echo base_url();?>index.php/profile/lunas/<?php echo $this->uri->segment(3);?>" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="nama" class="col-sm-3 col-form-label">Upload Bukti Bayar</label>
    <div class="col-sm-5">
      <input type="file" name="bukti_bayar" class="form-control" id="nama" require="required">
    </div>
    <input type="submit" class="btn btn-success" value="Update">
  </div>
</form>
<?php }?>
<script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>