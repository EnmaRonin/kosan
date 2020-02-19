<div class="main-card mb-3 card">
                                    <div class="card-header">Data Transaksi Penjualan <?php echo $penjualan[0]->tgl;?>
                                        <div class="btn-actions-pane-right">
                                            <div class="">
                                                
                                                <a href="<?php echo base_url();?>index.php/penjualan/cetak/<?php echo $penjualan[0]->no_invoice;?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-print btn-icon-wrapper"> </i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">No Invoice</th>
                                                <th class="text-center">Kode Barang</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">Satuan Barang</th>
                                                <th class="text-center">Kategori Barang</th>
                                                <th class="text-center">Nama Pelanggan</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Total Quantity</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Sub Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1;foreach($penjualan as $tr){?>
                                                <tr>
                                                    <td class="text-center text-muted"><?php echo $no;?></td>
                                                    <td class="text-center"><?php echo $tr->no_invoice;?></td>
                                                    <td class="text-center"><?php echo $tr->kode_barang;?></td>
                                                    <td class="text-center"><?php echo $tr->nama_barang;?></td>
                                                    <td class="text-center"><?php echo $tr->nama_satuan;?></td>
                                                    <td class="text-center"><?php echo $tr->nama_jenis;?></td>
                                                    <td class="text-center"><?php echo $tr->nama_pelanggan;?></td>
                                                    <td class="text-center"><?php echo $tr->alamat_pelanggan;?></td>
                                                    <td class="text-center"><?php echo $tr->qty;?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($tr->harga);?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($tr->harga*$tr->qty);?></td>
                                                </tr>         
                                            <?php $no++;}?>
                                           <tr>
                                                    
                                                    <td colspan="9" class="text-right"><h5>Total Harga :</h5> </td>
                                                    <td colspan="2" class="text-right"><h6><b><?php echo "Rp ".number_format($total[0]['subtotal']);?></b></h6></td>
                                            </tr>
                                            <tr>
                                                    
                                                    <td colspan="9" class="text-right"><h5>Total bayar :</h5> </td>
                                                    <td colspan="2" class="text-right"><h6><b><?php echo "Rp ".number_format($total[0]['total_bayar']);?></b></h6></td>
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                        <?php if($this->session->userdata('level')=="0"){?>
                                        <div class="col-md-3">
                                        <form method="POST" action="<?php echo base_url();?>index.php/penjualan/konfirmasi/<?php echo $this->uri->segment(3);?>">
                                              <div class="position-relative row form-group">
                                                    <label for="inputnama" class="col-sm-4 col-form-label">Status :</label>
                                        <div class="col-sm-7">
                                                <select class="form-control js-example-basic-single" name="status" onchange="this.form.submit()">
                                                    <option value="Menunggu">Menunggu</option>
                                                    <option value="Sedang Di Kirim">Sedang Di Kirim</option>
                                                    <option value="Terkonfirmasi">Terkonfirmasi</option>
                                                    <option value="Terkirim">Terkirim</option>
                                                    </select>    
                                                </form>
                                            </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                   
                                </div>
