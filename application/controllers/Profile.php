<?php 

    class Profile Extends CI_Controller{
        
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(auth);
        }
        
    }

    public function index(){
        $data['halaman']="front/profile";
        $data['user_content']="front/user_profile";
        $this->load->view('front/index',$data);
    }

    
    public function update_profile($id){
        		
		$data = array(
			"nama"	   => $this->input->post('nama'),
			"jk" => $this->input->post('jk'),
			"tlp" => $this->input->post('tlp'),
			"alamat" => $this->input->post('alamat'),
			"email"    => $this->input->post('email'),
		);		
    		if(empty($this->input->post('password'))){
    			if($this->session->userdata('level')==1)
                    $this->smartpost->edit('pemilik_kos',$data,$id);
                if($this->session->userdata('level')==2)
                    $this->smartpost->edit('pencari_kos',$data,$id);
                
    		}else{
    			$data['password']=md5($this->input->post('password'));
    			if($this->session->userdata('level')==1)
                    $this->smartpost->edit('pemilik_kos',$data,$id);
                if($this->session->userdata('level')==2)
                    $this->smartpost->edit('pencari_kos',$data,$id);	
    		}
            $this->session->set_flashdata('result', 'Profile Behasil Di Ubah!!');
            $this->session->set_userdata($data);
			redirect('profile');
    	
    }
    
    public function booking_saya(){
        $user_id=$this->session->id;
        
        $data['halaman']="front/profile";
        $data['user_content']="front/booking_saya";
        $data['booking'] =$this->smartpost->getbookingGroupBy($user_id);
        
        $this->load->view('front/index',$data);
    }

    public function detail_booking($inv){
        $getBookingData=$this->smartpost->getBookingByinv($inv);
        
        $data['halaman']="front/profile";
        $data['user_content']="front/booking_saya_detail";

        if($this->session->userdata('level')==1){
            $data['booking'] =$this->smartpost->getBookingDetail($inv,"iklan");
        }else{
            $data['booking'] =$this->smartpost->getBookingDetail($inv,"kosan");

        }
        // echo "<pre>";
        // print_r($data['booking']);die();

        $data['count_booking']=count($data['booking']);
        $this->load->view('front/index',$data);
    }

    public function lunas($inv){
        $inv_baru = 'INV.'.date('dmyhs');
        $getBookingData=$this->smartpost->getBookingByinv($inv);
        
        $data = array(
            'id_kamar' => $getBookingData[0]['id_kamar'],            
            'id_kontrakan' => $getBookingData[0]['id_kontrakan'],            
            'invoice' => $inv,            
            'sub_total' => $getBookingData[0]['total'],            
            'id_user' => $getBookingData[0]['id_user'],            
            'payment' => "FULL",            
            'status' => "p",            
        );
        if($this->session->userdata('level')=="1"){
            $data['type'] = "iklan";
        }elseif($this->session->userdata('level')=="2"){
            $data['type'] = "kosan";
        }
        $this->smartpost->tambah('booking',$data);

        $config['upload_path']          = './uploads/payment/';
        $config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        $pembayaran = array(
			'invoice' => $inv,
        );

        if (!$this->upload->do_upload('bukti_bayar')){
            $this->session->set_flashdata('result', 'Harap Periksa Gambar Anda!!');
            
            $error = array('error' => $this->upload->display_errors());
            
            print_r($error);die();
            
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $upload_data = $this->upload->data();
            
            $pembayaran['file_url'] = $upload_data['file_name'];
            
            $this->smartpost->tambah('pembayaran',$pembayaran);

            $this->cart->destroy();
            
            $this->kirim_email(); //kirim Email
            
            $this->session->set_flashdata('result', 'Terima Kasih MOhon Menunggu Pengecekan Status!!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function kirim_email($email="")
    {
	  // Konfigurasi email
      if(empty($email)){
        
	  $email = $this->session->userdata('email');
      }

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'aekon83@gmail.com',  // Email gmail
            'smtp_pass'   => 'admin123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@masrud.com', 'Ngekos.com');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('Notifikasi Pembayaran');

        // Subject email
        $this->email->subject('Notifikasi Pembayaran');

        // Isi email
        $this->email->message("Hai Telah Melunasi Pembayaran<br><br> Klik <strong><a href='".site_url()."/profile/booking_saya' target='_blank' rel='noopener'>disini</a></strong> Untuk Melihat Status Booking.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function iklan_saya(){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        $data['halaman']="front/profile";
        $data['user_content']="front/iklan_saya";
        $data['kosan'] = $this->smartpost->getkontrakanJoin($this->session->userdata('id'))->result_array();
        // echo "<pre>";
        // print_r($data['kontrakan']);die();
        $this->load->view('front/index',$data);
    }

    public function bank_account(){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        $data['halaman']="front/profile";
        $data['user_content']="front/bank_account";
        $data['bank_account'] = $this->smartpost->getBank($this->session->userdata('id'))->result_array();
        $this->load->view('front/index',$data);   
    }

    public function form($id=""){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        if(empty($id)){
            $data['halaman']="front/profile";
            $data['user_content']="front/form_bank";
            $data['title']="Tambah";
            $data['action']=site_url('profile/tambah_bank');
        }else{
            $data['halaman']="front/profile";
            $data['user_content']="front/form_bank";
            $data['bank'] = $this->smartpost->getByid('bank_account',$id);
            $data['title']="Update";
            $data['action']=site_url('profile/update_bank/').$id;
        }
        
        $this->load->view('front/index',$data);   
    }
    public function tambah_bank(){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        $data=array(
            'nama_bank' => $this->input->post('nama_bank'),
            'atas_nama' => $this->input->post('atas_nama'),
            'no_rek'    => $this->input->post('no_rek'),
            'user_id'   => $this->session->userdata('id')
        );

        $this->smartpost->tambah('bank_account',$data);

        $this->session->set_flashdata('result', 'Data Bank Berhasil Di Tambah!!');
        redirect('profile/bank_account');
    }

    public function update_bank($id){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        if(empty($id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data=array(
            'nama_bank' =>$this->input->post('nama_bank'),
            'atas_nama' =>$this->input->post('atas_nama'),
            'no_rek'    =>$this->input->post('no_rek'),
            //'user_id'    =>$this->session->userdata('id'),
        );
        $this->smartpost->edit('bank_account',$data,$id);

        $this->session->set_flashdata('result', 'Data Bank Berhasil Di di Update!!');
        redirect('profile/bank_account');
    }

    public function hapus_bank($id){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        if(empty($id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->smartpost->hapus('bank_account',$id);

        $this->session->set_flashdata('result', 'Data Bank Berhasil Di di Update!!');
        redirect('profile/bank_account');
    }

    public function transaksi_iklan(){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }

        $user_id=$this->session->id;
        $data['halaman']="front/profile";
        $data['user_content']="front/transaksi_iklan";
        $data['transaksi_iklan'] =$this->smartpost->getbookingGroupBy($user_id);
        //print_r($data['booking']);die();
        $this->load->view('front/index',$data);   
    }
    public function detail_transaksi($inv=""){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        if(empty($inv)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $user_id=$this->session->id;
        $data['halaman']="front/profile";
        $data['user_content']="front/transaksi_iklan_detail";
        $tr['transaksi_iklan'] =$this->smartpost->getdetailtrans($inv);

        foreach($tr['transaksi_iklan'] as $k=>$v){
            $tr['pembayaran'] = $this->smartpost->getPembayaranByinv($v['invoice']);
            //$tr['id_pembayaran'][$k] = $this->smartpost->getPembayaran($v[$k]['invoice']);
        }
        
        $data['transaksi_iklan']=$tr;
        
        $this->load->view('front/index',$data);   
    }
    
    public function update_status_trans($id_booking="",$id_pembayaran=""){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        if(empty($id_booking) || empty($id_pembayaran)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $user_id=$this->session->id;
        $data['halaman']="front/profile";
        $data['user_content']="front/update_booking_status";
        $data['action']=site_url('profile/approve/'.$id_booking.'/'.$id_pembayaran);
        $tr['transaksi_iklan'] =$this->smartpost->getdetailtrans_id($id_booking);

        foreach($tr['transaksi_iklan'] as $k=>$v){
            $tr['pembayaran'] = $this->smartpost->getPembayaranById($id_pembayaran);
            //$tr['id_pembayaran'][$k] = $this->smartpost->getPembayaran($v[$k]['invoice']);
        }
        
        $data['transaksi_iklan']=$tr;
        // echo "<pre>";
        // print_r($data['transaksi_iklan']);die();
        $this->load->view('front/index',$data);   
    }

    public function approve($id_booking="",$id_pembayaran=""){
        if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "1"){
            redirect(auth);
        }
        if(empty($id_booking) || empty($id_pembayaran)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $getBooking = $this->smartpost->getByid('booking',$id_booking);
        
        $booking = array('status' => $this->input->post('status'));

        $this->smartpost->edit('booking',$booking,$id_booking); //update status booking

        $pembayaran = array('sub_total' => $this->input->post('sub_total'));

        $this->smartpost->edit('pembayaran',$pembayaran,$id_pembayaran); //update stub total pembayaran

        $kamar = array('status' => 'terisi');

        $this->smartpost->edit('kamar',$kamar,$getBooking[0]['id_kamar']);

        $this->session->set_flashdata('result', 'Data Transaksi Berhasil Di Approve');
        
        $getUser = $this->smartpost->getByid('user',$getBooking[0]['id_user']);

        $getUserEmail = $this->smartpost->getByid('pencari_kos',$getBooking[0]['pengguna_id']);
        
        $this->kirim_email($getUserEmail[0]['email']);

        redirect('profile/detail_transaksi/'.$getBooking[0]['invoice']);
    }

     public function cetak_booking_detail($id){
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [200, 250],
            'orientation' => 'P'
        ]);

        $data['booking'] = $this->smartpost->laporan_booking($id)->result();
        // echo "<pre>";
        // print_r($data['booking']);die();
        if($this->session->userdata('level')==1){
            $data['booking'][0]->harga=500000;
        }
        $namefile= $data['booking'][0]->invoice.'_'.$data['booking'][0]->payment.'_.pdf';
        $html = $this->load->view('page_prints',$data,true);
        $mpdf->WriteHtml($html);
        $mpdf->output($namefile,'I');
        exit();
    }
    
}