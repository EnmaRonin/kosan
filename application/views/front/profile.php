<div class="bradcam_area breadcam_bg">
        <h3 class="text-center">Profile Saya</h3>
</div>

<section class="checkout_area section-margin--small" style="background-color:#f1f1f1;">
    <div class="row profile">
		<div class="col-md-2">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo base_url();?>assets/user.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $this->session->nama;?>
					</div>
					<div class="profile-usertitle-job">
						<?php if($this->session->level=="1"){
                            echo "Pemilik Kosan";
                        }else if($this->session->level=="2"){
                            echo "Pencari Kosan";
                        }?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<!-- <button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button> -->
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="list-group list-group-flush">
                    <a href="<?php echo base_url();?>index.php/profile" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user"></i> Profile</a>
                    <?php if($this->session->level=="2"){?>
                        <a href="<?php echo base_url();?>index.php/profile/booking_saya" class="list-group-item list-group-item-action bg-light"><i class="fa fa-cart-arrow-down"></i> Pesanan Saya</a>
                    <?php }else{?>
                    	<a style="margin-right:5px;" href="<?php echo base_url();?>index.php/profile/bank_account" class="list-group-item list-group-item-action bg-light"><img height="15" width="20" src="<?php echo base_url();?>assets/front/donate-solid.svg"/> Akun Bank</a>
                        <a style="margin-right:5px;" href="<?php echo base_url();?>index.php/profile/iklan_saya" class="list-group-item list-group-item-action bg-light"><img height="15" width="20" src="<?php echo base_url();?>assets/front/ad-solid.svg"/> Iklan Saya</a>
                        <a style="margin-right:5px;" href="<?php echo base_url();?>index.php/profile/booking_saya" class="list-group-item list-group-item-action bg-light"><img height="15" width="20" src="<?php echo base_url();?>assets/front/ad-solid.svg"/> Pembayaran Iklan</a>
                        <a style="margin-right:5px;" href="<?php echo base_url();?>index.php/profile/transaksi_iklan" class="list-group-item list-group-item-action bg-light"><img height="15" width="20" src="<?php echo base_url();?>assets/front/ad-solid.svg"/> Pembayaran Kos</a>
                    <?php }?>
                    <a href="<?php echo base_url();?>index.php/auth/logout" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out"></i> Keluar</a>
                        
                </div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-10">
            <div class="profile-content">
			   <?php $this->load->view($user_content);?>
            </div>
		</div>
</div>
</section>