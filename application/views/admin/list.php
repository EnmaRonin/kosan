 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-admin icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Admin
                                        <div class="page-title-subheading">Table Untuk Mengolah Admin.
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>            
                         <div class="row">
                            <div class="col-md-12">
                                <?php if($this->session->flashdata('result')==TRUE):?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('result');?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Data admin
                                        <div class="btn-actions-pane-right">
                                            <div class="">
                                                <a href="<?php echo base_url();?>index.php/owner/admin/form" class="mr-2 btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-plus btn-icon-wrapper"> </i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nama</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Telpon</th>
                                                <th class="text-center">Jenis Kelamin</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $no=1;foreach($admin as $user){?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $no;?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $user->nama;?></div>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $user->email;?></td>
                                                <td class="text-center"><?php if($user->tlp!=""){echo $user->tlp;}else{echo "-";}?></td>
                                                <td class="text-center"><?php if($user->jk!=""){echo $user->jk;}else{echo "-";}?></td>
                                                <td class="text-center"><?php if($user->alamat!=""){echo $user->alamat;}else{echo "-";}?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url();?>index.php/owner/admin/hapus/<?php echo $user->id;?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?');"><i class="pe-7s-trash btn-icon-wrapper"> </i></a>
                                                    <a href="<?php echo base_url();?>index.php/owner/admin/form/<?php echo $user->id;?>" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning"><i class="pe-7s-pen btn-icon-wrapper" > </i></a>
                                                    
                                                </td>
                                            </tr>
                                            <?php $no++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>