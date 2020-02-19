
<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1>Profile Saya</h1>
<hr>
<form action="<?php echo base_url();?>index.php/profile/update_profile/<?php echo $this->session->id;?>" method="POST">
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $this->session->nama;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="<?php echo $this->session->email;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Tlp</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="tlp" value="<?php echo $this->session->tlp;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
      <select class="form-control" name="jk">
        <option value="l" <?php if($this->session->jk=="l"){echo "selected";}?>>Laki-Laki</option>
        <option value="p" <?php if($this->session->jk=="p"){echo "selected";}?>>Perempuan</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="alamat"><?php echo $this->session->alamat;?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
      <span class="text-danger font-italic" style="font-size:12px;">*Kosong Kan Bila Tidak Di Ganti*</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Ulangi Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password_c" id="inputPassword" placeholder="Ulangi Password">
      <span class="text-danger font-italic" style="font-size:12px;">*Kosong Kan Bila Tidak Di Ganti*</span>
    </div>
  </div>
  <hr>
  <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
</form>