
<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                         <i class="pe-7s-pemiliks icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Form Pemilik Kos
                                        <div class="page-title-subheading">Form Untuk Menambah/Mengubah Pemilik Kos.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>         
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
                                <h5 class="card-title">Form <?php echo $title;?></h5>
                               <form method="POST" action="<?php echo $action;?>" class="needs-validation" novalidate>
                                  <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" id="inputnama" placeholder="Nama Lengkap" value="<?php echo isset($pemilik[0]['nama']) ? $pemilik[0]['nama'] : '' ;?>" required>
                                      <div class="invalid-feedback">
                                        Masukan Nama Lengkap Anda
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" name="email" id="inputemail" placeholder="Email" value="<?php echo isset($pemilik[0]['email']) ? $pemilik[0]['email'] : '';?>" required>
                                      <div class="invalid-feedback">
                                        Masukan Email Anda
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                      <input type="password" name="password" class="form-control" id="inputpassword" placeholder="<?php if($title=="edit"){echo "Kosongkan Bila Tidak Ganti";}else{echo "Password";}?>" value="" <?php if($title=="tambah"){echo "required";}?>>
                                       <div class="invalid-feedback">
                                        Masukan Password Anda
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputtlp" class="col-sm-2 col-form-label">Telepon</label>
                                    <div class="col-sm-10">
                                      <input type="number" class="form-control" name="tlp" id="inputtlp" placeholder="Telepon" value="<?php echo isset($pemilik[0]['tlp']) ? $pemilik[0]['tlp'] : '';?>">
                                      <div class="invalid-feedback">
                                        Masukan Telpon Anda
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputpassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                      <select type="text" class="form-control" name="jk" id="inputnama" placeholder="Jenis Kelamin" value="" >
                                        <option value="">--Pilih Salah Satu--</option>
                                        
                                        <option value="L" <?php if(isset($pemilik[0]['jk']) && $pemilik[0]['jk']=="L"){echo"selected";}?>>Laki-Laki</option>
                                        <option value="P" <?php if(isset($pemilik[0]['jk']) && $pemilik[0]['jk']=="P"){echo"selected";}?>>Perempuan</option>
                                        
                                      </select>
                                       <div class="invalid-feedback">
                                        Masukan Jenis Kelamin
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                    <label for="inputalamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" name="alamat" id="inputalamat"><?php echo isset($pemilik[0]['alamat']) ? $pemilik[0]['alamat'] : '';?></textarea>
                                      <div class="invalid-feedback">
                                        Masukan Alamat Anda
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                    <div class="col-sm-10 ">
                                      <a href="<?php echo base_url();?>index.php/owner/pemilik/" class="btn btn-danger">Batal</a>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                  </div>
                                </form>
            
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
                            </div>
                        </div>
                        
                    </div>