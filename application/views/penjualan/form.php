

<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                         <i class="pe-7s-cart icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Form Transaksi Penjualan
                                        <div class="page-title-subheading">Form Untuk Menambah/Mengubah Transaksi Penjualan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
						
                          <?php if($this->session->flashdata('result')==TRUE):?>
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <?php echo $this->session->flashdata('result');?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <?php endif; ?>
                        <div class="row">
                          <div class="col-md-6">        
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <?php if(isset($errors)){ ?>
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <?php echo $errors;?>
                                      </div>
                                    <?php } ?>
                                   
                                    <h5 class="card-title">Form <?php echo $title;?> Transaksi Penjualan</h5>
                                   <form method="POST" action="<?php echo base_url();?>index.php/penjualan/addCart" class="needs-validation" novalidate>
                                     
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Invoice</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="" id="inputnama" placeholder="" value="<?php if(!empty($this->session->userdata('invoice'))){echo $this->session->userdata('invoice');}else{?><?php echo isset($pembelian[0]['invoice']) ? $pembelian[0]['invoice'] : 'INV.000'.$last_id.'' ;}?>
                                          " disabled>
                                          <input type="hidden" name="invoice" value="<?php if(!empty($this->session->userdata('invoice'))){echo $this->session->userdata('invoice');}else{?><?php echo isset($pembelian[0]['invoice']) ? $pembelian[0]['invoice'] : 'INV.000'.$last_id.'' ;}?>
                                          ">
                                          <div class="invalid-feedback">
                                            Invoice
                                          </div>
                                        </div>
                                      </div>
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Nama Barang</label>
                                        <div class="col-sm-7">
                                          <select class="form-control js-example-basic-single" name="id_barang" onchange="getDetail(this.value);" required>
                                            <option value="">--Pilih Salah Satu--</option>
                                            <?php foreach($_barang as $br):?>
                                              <option 
                                                <?php 
                                                  if(!empty($pembelian[0]['id_barang'])){
                                                     if($pembelian[0]['id_barang']==$br->id){
                                                       echo "selected";
                                                    }else{"";}
                                                  }else{}?> value="<?php echo $br->id;?>"><?php echo $br->nama;?></option>
                                            <?php endforeach;?>
                                          </select>
                                          <input type="hidden" id="detail_nama_barang" name="nama_barang" value="">
                                          <input type="hidden" class="detail_pelanggan form-control" name="">
                                          <input type="hidden" class="detail_id_pelanggan form-control" name="id_pelanggan">
                                          <input type="hidden" class="detail_stock_gudang form-control" name="stock_gudang">
                                          <div class="invalid-feedback">
                                            Masukan Nama Barang
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Nama pelanggan</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $this->session->userdata('nama');?>" id="inputnama" required>
                                          <div class="invalid-feedback">
                                            Masukan Nama Pelanggan
                                          </div>
                                        </div>
                                      </div>
									  							  
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Quantity</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="stock" id="inputnama" placeholder="Quantity Barang" value="<?php echo isset($barang[0]['stock']) ? $barang[0]['stock'] : '' ;?>" required>
                                          <div class="invalid-feedback">
                                            Masukan Stock Barang
                                          </div>
                                        </div>
                                      </div>
                                        
                                          <input type="hidden" name="harga" class="form-control detail_harga" id="">
                                      <div class="position-relative row form-group">
                                        <div class="col-sm-8 ">
                                          <a href="<?php echo base_url();?>index.php/penjualan/clear" onclick="return confirm('Apa Kamu Yakin Ingin Keluar Data Di Keranjang Akan Terhapus!!!');"  class="btn btn-danger">Batal</a>
                                          <button type="submit" class="btn btn-primary">Masukan Ke Keranjang</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                           <div class="col-md-6">        
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <?php if(isset($errors)){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $errors;?>
                                    </div>
                                    <?php } ?>
                                    <h5 class="card-title">Detail Barang</h5>
                                   <form >
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Kode Barang</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="detail_kode" disabled="">
                                          <div class="invalid-feedback">
                                            Masukan Kode Barang
                                          </div>
                                        </div>
                                      </div>
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Satuan Barang</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="detail_satuan" disabled="">
                                          <div class="invalid-feedback">
                                            Masukan Kode Barang
                                          </div>
                                        </div>
                                      </div>
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Kategori Barang</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control"  id="detail_jenis" disabled>
                                          <div class="invalid-feedback">
                                            Masukan Kode Barang
                                          </div>
                                          
                                        </div>
                                      </div>
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Stock Gudang</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="detail_stock" disabled>
                                          <div class="invalid-feedback">
                                            Masukan Stock Barang
                                          </div>
                                        </div>
                                      </div>
                                       <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Harga Jual</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control detail_harga" id="" disabled>
                                          <div class="invalid-feedback">
                                            Masukan Harga Barang
                                          </div>
                                        </div>
                                     
                                    </form>
                
                                    <script>
                                        function getDetail(id) {

                                           $.ajax({
                                              url : "<?php echo site_url('penjualan/getBarang/');?>"+id,
                                              method : "POST",
                                              data : {id: id},
                                              async : true,
                                              dataType: "json",
                                              success: function(data){

                                                  $('#detail_golongan').val(data[0].nama_golongan);
                                                  $('#detail_jenis').val(data[0].nama_jenis);
                                                  $('#detail_stock').val(data[0].stock);
                                                  $('.detail_stock_gudang').val(data[0].stock);
                                                  $('.detail_harga').val(data[0].harga);
                                                  $('#detail_satuan').val(data[0].nama_satuan);
                                                  $('#detail_kode').val(data[0].kode_barang);
                                                  $('#detail_pelanggan').val(data[0].nama_pelanggan);
                                                  $('.detail_pelanggan').val(data[0].nama_pelanggan);
                                                  $('.detail_id_pelanggan').val(data[0].id_pelanggan);
                                                  $('#detail_nama_barang').val(data[0].nama_barang);
                                              }
                                          });  
                                        }
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
                                </div>
                            </div>
                          </div>
                        </div>
                    <div class="col-md-12">
                     <div class="main-card mb-3 card">
                                    <div class="card-header">Data Keranjang Pembelian
                                       
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">No Invoice</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Nama Pelanggan</th>
                                                <th class="text-center">Total Harga</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php if(count($this->cart->contents())=="0"){?>
                                              <tr>
                                                <td colspan="8" class="text-center">Data Keranjang Masih Kosong</td>
                                              </tr>
                                            <?php } ?>
                                            
                                            <?php $no=1;foreach($this->cart->contents() as $tr){?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $no;?></td>
                                                <td class="text-center"><?php echo $tr['name'];?></td>
                                                <td class="text-center"><?php echo $tr['invoice'];?></td>
                                                <td class="text-center"><?php echo $tr['tgl'];?></td>
                                                <td class="text-center"><?php echo $tr['qty'];?></td>
                                                <td class="text-center"><?php echo $tr['nama_pelanggan'];?></td>
                                                <td class="text-center"><?php echo "Rp ".number_format($tr['price']);?></td>
                                                <td class="text-center"><?php echo "Rp ".number_format($tr['subtotal']);?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url();?>index.php/penjualan/hapusCart/<?php echo $tr['rowid'];?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Cart Ini?');"><i class="pe-7s-trash btn-icon-wrapper"> </i></a>
                                                </td>
                                            </tr>
                                            <?php $no++;}?>

                                            <tr>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>

                                              <td class="text-center"><h5>Total Pembayaran :</h5> </td>
                                              <td class="text-center"><h6><b><?php echo "Rp ".number_format($this->cart->total());?></b></h6></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                     </div>
                     <?php if(count($this->cart->contents())>"0"){?>
                      <div class="col-md-6 float-right">        
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <?php if(isset($errors)){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $errors;?>
                                    </div>
                                    <?php } ?>
                                    <h5 class="card-title">Pembayaran Dan Pengiriman</h5>
                                   <form method="POST" action="<?php echo base_url();?>index.php/penjualan/simpan" enctype="multipart/form-data">
                                    <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">No Surat Jalan</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="no_sj" id="inputnama" value="<?php echo 'NOSJ.1111'.$last_id.'' ;?>">
                                          <div class="invalid-feedback">
                                            Masukan Nama
                                          </div>
                                        </div>
                                      </div>
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="nama" id="inputnama" value="<?php echo $this->session->userdata('nama');?>">
                                          <div class="invalid-feedback">
                                            Masukan Nama
                                          </div>
                                        </div>
                                      </div>

                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="alamat" id="inputnama">
                                          <div class="invalid-feedback">
                                            Masukan Alamat
                                          </div>
                                        </div>
                                      </div>    
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                                        <div class="col-sm-8">
                                          <input  type="text" class="bil form-control" name="jumlah_bayar" id="" required>
                                          <div class="invalid-feedback">
                                            Masukan Jumlah Bayar
                                          </div>
                                        </div>
                                      </div>
                                      <div class="position-relative row form-group">
                                        <label for="inputnama" class="col-sm-4 col-form-label">Bukti Bayar</label>
                                        <div class="col-sm-8">
                                          <input  type="file" class="form-control" name="pembayaran" id="" required>
                                          <div class="invalid-feedback">
                                            Upload Bukti Bayar
                                          </div>
                                        </div>
                                      </div>
                                          <input type="hidden" class="form-control kembalian" name="total_kembalian">
                                          <input type="hidden" class="form-control invoice" name="invoice">
                                          
                                    <input type="hidden" value="<?php echo $this->cart->total();?>" name="total_harga" class="total_harga">
                                    <input type="hidden" value="<?php echo $this->session->userdata('invoice');?>" name="invoice">
                                 <div class="position-relative row form-group">
                                        <div class="col-sm-8 ">
                                          <a href="<?php echo base_url();?>index.php/penjualan/clear" onclick="return confirm('Apa Kamu Yakin Ingin Keluar Data Di Keranjang Akan Terhapus!!!');" class="btn btn-danger">Batal</a>
                                          <button type="submit" class="btn btn-primary simpan_transaksi">Simpan</button>
                                        </div>
                                  </div>
                                  </form>
                            </div>
                      </div>
                    <?php } ?> 
                    <script type="text/javascript">
					
                    </script>
                  </div>
                    </div>
                    </div>