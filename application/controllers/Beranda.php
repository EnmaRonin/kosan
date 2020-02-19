<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {



	public function index()
	{
		
		$this->db->query('CALL update_kosan_exp');

		$data['halaman'] = "front/beranda";
		$kosan = $this->smartpost->get('kosan','9','publish')->result_array();
		if(count($kosan)==0){
			$fasilitas=[];
			$kosan=[];
		}else{
			foreach($kosan as $k=>$v){
			
			$harga_kamar_terendah[] = $this->smartpost->getHargaKamarMinHarga($v['id'])->result();
			$status_kamar[$k] = $this->smartpost->getStatusKamar($v['id'])->result();
			$kamar[] = $this->smartpost->getKamarByidKontrakan($v['id']);
			$kosan[$k]['kosan_gallery'] = $this->smartpost->getGambarByidKontrakan($v['id']);

			$kosan[$k]['harga']=$harga_kamar_terendah[$k][0]->harga;	//parsing kamar harga
			$kosan[$k]['status_kamar']=$status_kamar[$k];	//parsing kamar harga
			foreach($kamar as $key=>$value){
				$count_kamar= count($value);
				for($i=0;$i<$count_kamar;$i++){
					$id_fasilitas[$key][$i]=json_decode($value[$i]['id_fasilitas']);
					//$fasilitas[]=array_merge_recursive($id_fasilitas);
					$fasilitas['fasilitas'][$key][$i] = $this->smartpost->getFasilitasWhereIn($id_fasilitas[$key][$i]);
					
					}
				}
			}
		}
		
		$data['kosan']=$kosan;
		$data['fasilitas']=$fasilitas;
		//$data['gallery_kosan'] = $gallery_kosan;
		// echo "<pre>";
		// print_r($data['fasilitas']['fasilitas']);die();
		$this->load->view('front/index',$data);
	}

	public function kosan($id=""){
		
		if(empty($id)){
			return show_404();
		}
		$kosan = $this->smartpost->getByid('kosan',$id);
		
		foreach($kosan as $k=>$v){
			$harga_kamar_terendah[] = $this->smartpost->getHargaKamarMinHarga($v['id'])->result();
			$kosan[$k]['harga']=$harga_kamar_terendah[$k][0]->harga;	//parsing kamar harga

			$getuser=$this->smartpost->getByid('user',$v['user_id']);
			$kosan[$k]['user']=$this->smartpost->getByid('pemilik_kos',$getuser[$k]['pengguna_id']);
		}
		$kamar = $this->smartpost->getKamarByidKontrakan($id);
		$kamar_f[] = $this->smartpost->getKamarByidKontrakan($id);
		$gallery_kosan = $this->smartpost->getGambarByidKontrakan($id);
		
		foreach($kamar as $row){
			$gallery_kamar[]=$this->smartpost->getGalleryKamarByidkamar($row['id']);
		}
		
		foreach($kamar_f as $key=>$value){
			$count_kamar= count($value);
			for($i=0;$i<$count_kamar;$i++){
				$id_fasilitas=json_decode($value[$i]['id_fasilitas']);
				
				$get_fasilitas[] = $this->smartpost->getFasilitasWhereIn($id_fasilitas);
			}
		}
		
		$data['halaman']="front/kosan_single";
		$data['kosan']=$kosan;
		$data['kamar']=$kamar;
		$data['fasilitas']=$get_fasilitas;
		$data['gallery_kosan']=$gallery_kosan;
		$data['gallery_kamar']=$gallery_kamar;
		// echo "<pre>";
		// print_r($kamar);
		// die();
		$this->load->view('front/index',$data);
	}
	
	public function booking($id=""){
		
		if(empty($id)){
			redirect($_SERVER['HTTP_REFERER']); //redirect back
		}
		$kamar = $this->smartpost->getByid('kamar',$id);
		
		$kosan = $this->smartpost->getByid('kosan',$kamar[0]['id_kontrakan']);
		
		$cart = array(
			'id'  => $kamar[0]['id'], 
			'qty' => '1', 
			'price' => $kamar[0]['harga'],  
			'nomor_kamar' => $kamar[0]['nomor'],    
			'name' => $kosan[0]['nama'],  
			'alamat' => $kosan[0]['alamat'],  
			'provinsi' => $kosan[0]['provinsi'],  
			'kecamatan' => $kosan[0]['kecamatan'],  
			'kota' => $kosan[0]['kota_kab'],
			'id_kosan'  => $kosan[0]['id'], 
			'id_user'  => $kosan[0]['user_id'], 
		);
		
		$this->cart->insert($cart);
	
		$this->session->set_flashdata('result', '1 Item Berhasil Di Tambahkan Ke Keranjang!');
		redirect('beranda/mycart');
	}

	public function booking_iklan($id=""){
		
		if(empty($id)){
			redirect($_SERVER['HTTP_REFERER']); //redirect back
		}
		if($this->session->level!=="1"){
			redirect($_SERVER['HTTP_REFERER']); //redirect back
		}
		//$kamar = $this->smartpost->getByid('kamar',$id);
		
		 $kosan = $this->smartpost->getByid('kosan',$id);
		
		$cart = array(
			'id'  => $kosan[0]['id'], 
			'qty' => '1', 
			'price' => "500000",  
			'nomor_kamar' => "",    
			'name' => $kosan[0]['nama'],  
			'alamat' => $kosan[0]['alamat'],  
			'provinsi' => $kosan[0]['provinsi'],  
			'kecamatan' => $kosan[0]['kecamatan'],  
			'kota' => $kosan[0]['kota_kab'],
			'id_kosan'  => $kosan[0]['id'], 
			'id_user'  => $this->session->userdata('id'), 
		);
		
		$this->cart->insert($cart);
	
		$this->session->set_flashdata('result', '1 Item Berhasil Di Tambahkan Ke Keranjang!');
		redirect('beranda/mycart');

	}

	public function mycart(){
		
		$data['halaman']="front/mycart";
		$data['cart'] = $this->cart->contents();
		
		$this->load->view('front/index',$data);
	}
	public function hapusCart($id){		
		$cart = array(
			'rowid' => $id,
			'qty' => 0
		);
		$this->cart->update($cart);
		$this->session->set_flashdata('result', '1 item keranjang berhasil di hapus!!');
		redirect('beranda/mycart');		
	}
	 
	public function checkout(){
		if($this->session->userdata('status')!=="login"){
			redirect(auth);
		}
		$cart = $this->cart->contents();
		foreach($cart as $c){
			$bank_account = $this->smartpost->getBank($c['id_user'])->result_array();
		}
		$data['bank_account']=$bank_account;
	
		$data['halaman']="front/checkout";
		$this->load->view('front/index',$data);
	}

	public function update_type($payment){
		if($this->session->userdata('status')!=="login"){
			redirect(auth);
		}
		if($payment=="DP"){
			
			$total =$this->cart->total();
			$updated_total = ($total / 2);
			
			$data = array(
				'payment' => $payment,
			);

			$this->session->set_userdata($data);
			$_SESSION['cart_contents']['cart_total'] =$updated_total;
		
		}else if($payment=="FULL"){
			
			$total =$this->cart->total();
			$updated_total = ($total * 2);
			
			$data = array(
				'payment' => $payment,
			);
			//print_r($updated_total);die();
			$this->session->set_userdata($data);
			$_SESSION['cart_contents']['cart_total'] =$updated_total;
		}
		$this->session->set_flashdata('result', 'Total Harga Berhasil Di Update');
		redirect('beranda/checkout');

	}

	function payment(){

		if($this->session->userdata('status')!=="login"){
			redirect(auth);
		}
		
		$cart = $this->cart->contents();
		// echo "<pre>";
		// print_r($cart);
		// print_r($this->input->post('tgl_in'));die();
		$tgl = "";
		$invoice = 'INV.'.date('dmyhs');
		
		foreach($cart as $row){
			$data = array(
				'id_kamar' => $row['id'],
				'id_kontrakan' => $row['id_kosan'],
				'invoice'   => $invoice,
				'sub_total' => $this->cart->total(),
				'id_user' => $this->session->userdata('id'),
				'payment' => $this->session->userdata('payment'),
				'status' => 'p'
			);
			
			if($this->session->userdata('level')=="1"){
				$data['type'] = "iklan";
			}elseif($this->session->userdata('level')=="2"){
				$data['type'] = "kosan";
			}
			$this->smartpost->tambah('booking',$data); //Input Table Booking
		} 

		$config['upload_path']          = './uploads/payment/';
        $config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		$pembayaran = array(
			'invoice' => $invoice,
		);



		if (!$this->upload->do_upload('bukti_bayar')){
				$this->session->set_flashdata('result', 'Harap Periksa Gambar Anda!!');
				$error = array('error' => $this->upload->display_errors());
				print_r($error);die();
				redirect('beranda/checkout');
			}else{
				$upload_data = $this->upload->data();
				
				$pembayaran['file_url'] = $upload_data['file_name'];
				
				$this->smartpost->tambah('pembayaran',$pembayaran);

				$this->cart->destroy();
				
				$this->kirim_email(); //kirim Email
				
				unset($_SESSION['payment']);

				$this->session->set_flashdata('result', 'Terima Kasih MOhon Menunggu Pengecekan Status!!');
				redirect('profile');
		}
	}
	
	public function kirim_email()
    {
	  // Konfigurasi email

	  $email = $this->session->userdata('email');

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => '',  // Email gmail
            'smtp_pass'   => '',  // Password gmail
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
        $this->email->message("Hai Pembayaran Anda Berhasil Di Terima Silahkan Menunggu Untuk Di Prosess.<br><br> Klik <strong><a href='".site_url()."/profile/booking_saya' target='_blank' rel='noopener'>disini</a></strong> Untuk Melihat Status Booking.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }	
}