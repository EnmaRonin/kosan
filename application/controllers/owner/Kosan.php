<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kosan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(auth);
		}
	}

	public function index()
	{
		$data['halaman'] = "kontrakan/list";
		$data['kontrakan'] = $this->smartpost->getkontrakanJoin()->result();
	
		// print_r($data['barang']);die();
		$this->load->view('index',$data);
	}
	public function form(){
		
		$id=$this->uri->segment(4);
		if($id==""){
			$where = array(
				'level' => '2'
			);
			$data['halaman']="kontrakan/form";
			$data['action'] = site_url('owner/kosan/tambah');
			$data['title'] = "tambah";
			$data['fasilitas'] = $this->smartpost->get('fasilitas')->result();
			$data['user'] = $this->smartpost->cek('user',$where)->result();
			
			$this->load->view('index',$data);
		}else{
			$data['halaman']="kontrakan/form";
			$data['action'] = site_url('owner/kosan/edit/').$id;
			$data['kontrakan'] = $this->smartpost->getByid('kontrakan',$id);
			$data['fasilitas'] = $this->smartpost->get('fasilitas')->result();
			$data['title'] = "edit";
			$this->load->view('index',$data);
		}
	}

	public function tambah(){

		$files_post=[];
        $count = count($_FILES['kos_image']['name']);
    	
    	$files_post_kamar=[];
        $count_kamar = $_FILES['kamar_image']['name'];
        $post_kamar = $this->input->post('kamar');

        $kamar_id= [];

        $date      = date('Y-m-d H:i:s');
        $expdate   = date('Y-m-d H:i:s', strtotime('+1 month'));

		$this->form_validation->set_rules('nama', 'nama', 'is_unique[kosan.nama]', array(
                'is_unique'     => 'Nama Kosan Ini Sudah Terdaftar.'
        ));
		$data = array(
			"nama"	           => $this->input->post('nama'),
			"alamat"	   => $this->input->post('alamat'),
			"provinsi"	   => $this->input->post('provinsi'),
			"kecamatan"	   => $this->input->post('kecamatan'),
			"kota_kab"	   => $this->input->post('kota_kab'),
			"kode_pos"	   => $this->input->post('kode_pos'),
			"jenis"	   => $this->input->post('jenis'),
			"jam_bertemu"	   => $this->input->post('jam_bertemu'),
			"binatang"	   => $this->input->post('binatang'),
			"deskripsi"	   => $this->input->post('deskripsi'),
			"lat"	   => $this->input->post('lat'),
			"lang"	   => $this->input->post('lang'),
			"created_at"   => $date,
			"expired_at"   => $expdate
		);
		if($this->session->userdata('level')=='1'){
			$data['user_id'] = $this->session->userdata('id');
		}
		if($this->session->userdata('level')==0)	{
			$data['user_id'] = $this->input->post('user_id');
		}	

		if ($this->form_validation->run() == FALSE)
    	{
        	$where = array(
				'level' => '2'
			);
			$data['halaman']="kontrakan/form";
			$data['action'] = site_url('owner/kosan/tambah');
			$data['title'] = "tambah";
			$data['fasilitas'] = $this->smartpost->get('fasilitas')->result();
			$data['user'] = $this->smartpost->cek('user',$where)->result();
			$data['errors'] = validation_errors();
			$data['title'] = "tambah";
			$this->load->view('index',$data);
    	}else{
			$kos_id = $this->smartpost->tambah('kosan',$data);
			$kamar = $this->input->post('kamar');
			foreach($kamar as $key => $value){
				$kamar[$key]['id_kontrakan'] = $kos_id;
				$kamar[$key]['id_fasilitas'] = json_encode($value['fasilitas_id']);
				unset($kamar[$key]['fasilitas_id']);
				$this->db->insert('kamar', $kamar[$key]); //tambah_kamar
				$kamar_id[$key]=  $this->db->insert_id();
			}


			for($i=0;$i<$count;$i++){
    
		        if(!empty($_FILES['kos_image']['name'][$i])){
		          $_FILES['file']['name'] = $_FILES['kos_image']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['kos_image']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['kos_image']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['kos_image']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['kos_image']['size'][$i];
		  
		          $config['upload_path'] = './uploads/kos/'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '5000';
		          $config['file_name'] = $_FILES['kos_image']['name'][$i];
		   
		          //$this->load->library('upload',$config); 
		    	  $this->upload->initialize($config);
		          if($this->upload->do_upload('file')){
		            $uploadData = $this->upload->data();
		            $filename = $uploadData['file_name'];
		   
		            $files_post['kos_image'][$i]['file_url'] = $filename;
		            $files_post['kos_image'][$i]['kontrakan_id'] = $kos_id;
		          }
		        }
		   
		      }
			
			foreach($post_kamar as $k=>$v){
					$count_gambar = count($count_kamar[$k]);
				foreach($count_kamar[$k] as $key=>$value){
					for($i=0;$i<$count_gambar;$i++){
				      $_FILES['files']['name'] = $_FILES['kamar_image']['name'][$k][$i];
			          $_FILES['files']['type'] = $_FILES['kamar_image']['type'][$k][$i];
			          $_FILES['files']['tmp_name'] = $_FILES['kamar_image']['tmp_name'][$k][$i];
			          $_FILES['files']['error'] = $_FILES['kamar_image']['error'][$k][$i];
			          $_FILES['files']['size'] = $_FILES['kamar_image']['size'][$k][$i];
			  
			          $config['upload_path'] = './uploads/kamar/'; 
			          $config['allowed_types'] = 'jpg|jpeg|png|gif';
			          $config['max_size'] = '5000';
			          $config['encrypt_name'] = true;
			          $config['file_name'] = $_FILES['kamar_image']['name'][$k][$i];
			   
			          //$this->load->library('upload',$config); 
			    	  $this->upload->initialize($config);
			          if($this->upload->do_upload('files')){
			            $uploadData = $this->upload->data();
			            $filename = $uploadData['file_name'];
			   
			            $files_post_kamar['kamar'][$k][$i]['file_url'] = $filename;
			            $files_post_kamar['kamar'][$k][$i]['kamar_id'] = $kamar_id[$k];
			         	 }
			    	  }		
				        
					}
				}
       //  				echo "<pre>";
			 			// print_r($files_post_kamar['kamar']);
			 			// print_r($files_post['kos_image']);die();
			         	foreach($files_post_kamar['kamar'] as $key=>$value){
			         	
						$this->db->insert_batch('gallery_kamar',$value);
			         	}
			$this->db->insert_batch('gallery_kosan',$files_post['kos_image']);
			$this->session->set_flashdata('result', 'Kosan Behasil Di Tambah!!');
			redirect('owner/kosan');
    	}
	}
	
	// public function edit($id){
	// 	if($this->session->userdata('level') != "1"){
	// 			$this->session->set_flashdata('result', 'Anda Tidak Di Izinkan Untuk Mengolah Data!!');
	// 			redirect('barang');
	// 	}
	// 	$getjenis= $this->smartpost->getByid('jenis',$this->input->post('id_jenis'));
	// 	$data = array(
	// 		"nama"	           => $this->input->post('nama'),
	// 		"kode_barang"	   => $getjenis[0]['kode_jenis'].$this->input->post('kode_barang'),
	// 		"id_jenis"	   => $this->input->post('id_jenis'),
	// 		"id_pemasok"	   => $this->input->post('id_pemasok'),
	// 		"id_satuan"	   => $this->input->post('id_satuan'),
	// 		"stock"	   => $this->input->post('stock'),
	// 		"harga"	   => $this->input->post('harga'),
	// 		"tanggal"	   => $this->input->post('tanggal'),
	// 	);		
 //    	$this->smartpost->edit('barang',$data,$id);
 //    	$this->session->set_flashdata('result', 'barang Behasil Di Ubah!!');
	// 	redirect('barang');
	// }
	
	public function hapus($id){
		$this->smartpost->hapus('kosan',$id);
		$this->db->select('*')->from('kamar')->where('id_kontrakan',$id)->delete();	
		$this->db->select('*')->from('gallery_kosan')->where('kontrakan_id',$id)->delete();	
		$this->session->set_flashdata('result', 'Kosan Behasil Di Hapus!!');
		redirect('owner/kosan');
	}
	// public function cetak(){
	// 	$mpdf = new \Mpdf\Mpdf([
	// 		'mode' => 'utf-8',
 //    		'format' => [190, 236],
 //    		'orientation' => 'P'
	// 	]);
		
	// 	$data['barang'] = $this->smartpost->getbarangJoin()->result();
	// 	$namefile= 'laporan barang '.date('d-m-y').'.pdf';
	// 	$html = $this->load->view('barang/page_prints',$data,true);
	// 	$mpdf->WriteHtml($html);
	// 	$mpdf->output($namefile,'I');
	// 	exit();
	// }
}
