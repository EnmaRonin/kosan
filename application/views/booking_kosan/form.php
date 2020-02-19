
<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                         <i class="fa fa-street-view icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Form Approve Booking Kosan
                                        <div class="page-title-subheading">Form Untuk MengApprove Booking Kosan.
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
                                <h5 class="card-title">Form Approve</h5>
                               <form method="POST" action="<?php echo $action;?>" class="needs-validation" novalidate enctype="multipart/form-data">
                                  <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Sub Total</label>
                                    <div class="col-sm-10">
                                       <input type="text" class="form-control" name="sub_total" id="nama" value="<?php echo isset($transaksi_iklan['transaksi_iklan'][0]['sub_total']) ? $transaksi_iklan['transaksi_iklan'][0]['sub_total'] : '' ;?>" required>
                                      <div class="invalid-feedback">
                                        Sub Total
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                       <select class="form-control" name="status">
                                          <option value="p">Proses</option>
                                          <option value="y">Berhasil</option>
                                          <option value="n">Batal</option>
                                        </select>
                                      <div class="invalid-feedback">
                                        Masukan Status
                                      </div>
                                    </div>
                                    
                                  </div>   
                                  <div class="form-group row">
                                    <div class="col-sm-10 ">
                                      <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-danger">Batal</a>
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