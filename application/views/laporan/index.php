 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph2 icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Laporan
                                        <div class="page-title-subheading">Table Untuk Cetak Laporan
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>            
                         <div class="row">
                            <div class="col-lg-5">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Booking Iklan
                                        </h5>
                                        <form action="<?php echo base_url();?>index.php/owner/laporan/booking_iklan" method="post">
                                            
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-3 col-form-label">Tanggal Awal</label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control" name="tgl1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-3 col-form-label">Tanggal Akhir </label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control" name="tgl2" required>
                                                </div>
                                                <input type="hidden" name="type" value="iklan">
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-8">
                                                  <button class="mb-2 mr-2 btn-transition btn btn-outline-primary">Cetak</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Booking Kosan
                                        </h5>
                                        <form action="<?php echo base_url();?>index.php/owner/laporan/booking_iklan" method="post">
                                            
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-3 col-form-label">Tanggal Awal</label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control" name="tgl1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control" name="tgl2" required>
                                                </div>
                                                <input type="hidden" name="type" value="kosan">
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputnama" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-8">
                                                  <button class="mb-2 mr-2 btn-transition btn btn-outline-primary">Cetak</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>