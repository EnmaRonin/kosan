
<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                         <i class="fa fa-street-view icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Form Fasilitas
                                        <div class="page-title-subheading">Form Untuk Menambah/Mengubah Fasilitas .
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
                               <form method="POST" action="<?php echo $action;?>" class="needs-validation" novalidate enctype="multipart/form-data">
                                  <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Fasilitas</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="fasilitas" id="inputnama" placeholder="Nama Fasilitas" value="<?php echo isset($fasilitas[0]['fasilitas']) ? $fasilitas[0]['fasilitas'] : '' ;?>" required>
                                      <div class="invalid-feedback">
                                        Masukan Nama Fasilitas
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                      <input type="file" class="form-control-file" name="icon" id="inputnama" <?php if($title=="tambah"){echo "required";}?>>
                                      <div class="invalid-feedback">
                                        Masukan Icon
                                      </div>
                                      <?php if(!empty($fasilitas[0]['icon'])){?>
                                        <img style="margin-top: 10px;" height="150" width="200" src="<?php echo base_url();?>/uploads/icons/<?php echo $fasilitas[0]['icon'];?>" class="">
                                        <p class="text-danger">*Kosongkan Bila tidak di ganti*</p>
                                      <?php }?>
                                    </div>
                                    
                                  </div>   
                                  <div class="form-group row">
                                    <div class="col-sm-10 ">
                                      <a href="<?php echo base_url();?>index.php/owner/fasilitas" class="btn btn-danger">Batal</a>
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