<?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
<h1>Bank Account</h1>
<hr>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Bank</th>
      <th scope="col">Atas Nama</th>
      <th scope="col">Rekening</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($bank_account)==0){?>
      <tr >
        <td colspan="5" class="text-center">Data Masih Kosong Tambah <a href="<?php echo base_url();?>index.php/profile/form" class="btn btn-primary btn-sm">Disini</a>
        </td>
        </tr>
    <?php }?>
  <?php $no=1;foreach($bank_account as $b){?>
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><?php echo $b['nama_bank'];?></td>
      <td><?php echo $b['atas_nama'];?></td>
      <td><?php echo $b['no_rek'];?></td>
      <td>
        <a href="<?php echo base_url();?>index.php/profile/form/<?php echo $b['id_bank'];?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a> 
        <a href="<?php echo base_url();?>index.php/profile/hapus_bank/<?php echo $b['id_bank'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?');"><i class="fa fa-trash"></i>Hapus</a>
      </td>
    </tr>
  <?php $no++;}?>
  </tbody>
</table>