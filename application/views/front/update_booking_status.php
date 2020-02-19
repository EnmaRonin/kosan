
<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1>Approve Transaksi Iklan</h1>
<hr>
<form action="<?php echo $action;?>" method="POST">
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Sub total</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="sub_total" id="nama" value="<?php echo isset($transaksi_iklan['transaksi_iklan'][0]['sub_total']) ? $transaksi_iklan['transaksi_iklan'][0]['sub_total'] : '' ;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <select class="form-control" name="status">
        <option value="p">Proses</option>
        <option value="y">Berhasil</option>
        <option value="n">Batal</option>
      </select>
    </div>
  </div>
  
  <input type="hidden" name="id_pembayaran" value="<?php echo $transaksi_iklan['pembayaran'][0]['id'];?>">
  <hr>
  <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
  <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-sm btn-danger float-right mr-1">Batal</a>

</form>