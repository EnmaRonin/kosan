
<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1><?php echo $title;?> Akun Bank</h1>
<hr>
<form action="<?php echo $action;?>" method="POST">
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Bank</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama_bank" id="nama" value="<?php echo isset($bank[0]['nama_bank']) ? $bank[0]['nama_bank'] : '' ;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Atas Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="atas_nama" value="<?php echo isset($bank[0]['atas_nama']) ? $bank[0]['atas_nama'] : '' ;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No Rekening</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="no_rek" value="<?php echo isset($bank[0]['no_rek']) ? $bank[0]['no_rek'] : '' ;?>">
    </div>
  </div>
  
  <hr>
  <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
  <a href="<?php echo base_url();?>index.php/profile/bank_account" class="btn btn-sm btn-danger float-right mr-1">Batal</a>

</form>