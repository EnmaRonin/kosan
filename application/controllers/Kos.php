<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos extends CI_Controller {
    function test_date(){
        $date      = date('Y-m-d H:i:s');
        $expdate   = date('Y-m-d H:i:s', strtotime('+1 week'));
        echo $date."<br>";
        echo $expdate;
    }
    public function iklan(){
        if($this->session->userdata('status')!=="login" || $this->session->userdata('level')!=="1"){
            redirect(auth);
        }
        $data['halaman']="front/pasang_iklan";
        $data['action'] = site_url('kos/tambah');
		$data['title'] = "tambah";
        $data['fasilitas'] = $this->smartpost->get('fasilitas')->result();
        $this->load->view('front/index',$data);
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
			"expired_at"   => $expdate,
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
            $data['halaman']="front/pasang_iklan";
            $data['action'] = site_url('kos/tambah');
            $data['title'] = "tambah";
            $data['fasilitas'] = $this->smartpost->get('fasilitas')->result();
			$data['errors'] = validation_errors();
            $this->load->view('front/index',$data);
			
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
			
        				
			         	foreach($files_post_kamar['kamar'] as $key=>$value){
			         	
						$this->db->insert_batch('gallery_kamar',$value);
			         	}
			$this->db->insert_batch('gallery_kosan',$files_post['kos_image']);
			$this->session->set_flashdata('result', 'Kosan Behasil Di Tambah!!');
			redirect('profile/iklan_saya');
    	}
	}

	public function cari(){
		$q=$this->input->get('q');
		if(empty($q)){
			return redirect('beranda');
		}
		$kosan=$this->smartpost->cariKos($q,$this->input->post('jenis'),$this->input->post('jam_bertemu'),$this->input->post('binatang'))->result_array();
		if(count($kosan)==0){
			$fasilitas=[];
			$kosan=[];
			$this->session->set_flashdata('result', 'Maaf Data Yang Anda Cari Tidak Di Temukan');
			redirect($_SERVER['HTTP_REFERER']); 
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
		$data['halaman']='front/cari';
		$data['count_kosan']=count($kosan);
		$data['kosan']=$kosan;
		$data['fasilitas']=$fasilitas;
		$this->load->view('front/index',$data);
	}
}
