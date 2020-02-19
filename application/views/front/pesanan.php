<div class="bradcam_area breadcam_bg">
        <h3>Pesanan Saya</h3>
</div>
<section class="section-margin--small mt-5 mb-5">
    <div class="container">
    	<?php if($this->session->flashdata('result')==TRUE):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
 							<?php echo $this->session->flashdata('result');?>
 							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
				<?php endif; ?>
      <div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12">
        	<h4>Data Pesanan Anda</h4>
        	<hr/>
          <table class="tabel table-bordered table-striped col-12">
          	<thead>
          		<tr>
          			<th scope="col" class="text-center">#</th>
          			<th scope="col" class="text-center">Inovice</th>
          			<th scope="col" class="text-center">Gedung</th>
          			<th scope="col" class="text-center">Paket</th>
          			<th scope="col" class="text-center">Type Pembayaran</th>
          			<th scope="col" class="text-center">Tanggal</th>
          			<th scope="col" class="text-center">Total</th>
          			<th scope="col" class="text-center">Status</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php if(count($transaksi)=="0"){?>
                                              <tr>
                                                <td colspan="5" class="text-center">Data Pesanan Anda Masih Kosong</td>
                                              </tr>
                          <?php } ?>
          		<?php $no=1;foreach($transaksi as $row){?>
          		<tr>
          			<td class="text-center"><?php echo $no;?></td>
          			<td class="text-center"><a href="<?php echo base_url();?>index.php/pesanan/detail/<?php echo $row->inv;?>"><?php echo $row->inv;?></a></td>
          			<td class="text-center"><?php echo $row->nama;?></td>
          			<td class="text-center"><?php echo $row->nama_paket;?></td>
          			<td class="text-center"><?php echo $row->type;?></td>
          			<td class="text-center"><?php echo $row->tgl_in;?></td>
          			<td class="text-center"><?php echo "Rp ".number_format($row->sub_total);?></td>
          			<td class="text-center"><?php if($row->status=="p"){echo "<button class='btn btn-sm btn-warning'>Proses</div>";}else if($row->status=="y"){echo "<button class='btn btn-sm btn-success'>Pesanan Berhasil</div>";}else if($row->status=="n"){echo "<button class='btn btn-sm btn-danger'>Pesanan Di Tolak</div>";}?></td>
          		</tr>
          		<?php $no++;}?>
          	</tbody>
		  </table>
		  <hr>
		<h4>Info Kontak Admin : 0812xxxxxxxxx</h4>
		</div>
      </div>
    </div>
  </section>
