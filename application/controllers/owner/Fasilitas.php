<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

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
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "0"){
			redirect(auth);
		}
	}

	public function index()
	{
		$data['halaman'] = "fasilitas/list";
		$data['fasilitas'] = $this->smartpost->get('fasilitas')->result();
		
		$this->load->view('index',$data);
	}
	public function form(){
		
		$id=$this->uri->segment(4);
		if($id==""){
			$data['halaman']="fasilitas/form";
			$data['action'] = site_url('owner/fasilitas/tambah');
			$data['title'] = "tambah";
			
			$this->load->view('index',$data);
		}else{
			$data['halaman']="fasilitas/form";
			$data['action'] = site_url('owner/fasilitas/edit/').$id;
			$data['fasilitas'] = $this->smartpost->getByid('fasilitas',$id);
			$data['title'] = "edit";
			$this->load->view('index',$data);
		}
	}

	public function tambah(){
		 
		$config['upload_path']          = './uploads/icons/';
        $config['allowed_types']        = 'gif|jpg|png';
         
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'is_unique[fasilitas.fasilitas]', array(
                'is_unique'     => 'Fasilitas Ini Sudah Terdaftar.'
        ));
		$data = array(
			"fasilitas"	       => $this->input->post('fasilitas'),
		);		
		if ($this->form_validation->run() == FALSE)
    	{
        	$data['halaman']="fasilitas/form";
			$data['action'] = site_url('owner/fasilitas/tambah');
			$data['errors'] = validation_errors();
			$data['title'] = "tambah";
			$this->load->view('index',$data);
    	}else{
    		if (!$this->upload->do_upload('icon')){
				$this->session->set_flashdata('result', 'Harap Periksa Gambar Anda!!');
				$error = array('error' => $this->upload->display_errors());
				redirect('owner/fasilitas');
			}else{
				$upload_data = $this->upload->data();
				$data['icon'] = $upload_data['file_name'];
				$this->smartpost->tambah('fasilitas',$data);
				$this->session->set_flashdata('result', 'Fasilitas Behasil Di Tambah!!');
				redirect('owner/fasilitas');	
			}
    	}
	}
	public function edit($id){
		$config['upload_path']          = './uploads/icons/';
        $config['allowed_types']        = 'gif|jpg|png';
         
		$this->load->library('upload', $config);
		$data = array(
			"fasilitas"	       => $this->input->post('fasilitas'),
		);
		if (!$this->upload->do_upload('icon')){
				$this->session->set_flashdata('result', 'Fasilitas Berhasil Di Update!!');
				$error = array('error' => $this->upload->display_errors());
				$this->smartpost->edit('fasilitas',$data,$id); 
				redirect('owner/fasilitas');
			}else{
				$upload_data = $this->upload->data();
				$data['icon'] = $upload_data['file_name'];
				//$this->smartpost->tambah('barang',$data);
    			$this->smartpost->edit('fasilitas',$data,$id);
				$this->session->set_flashdata('result', 'Fasilitas Berhasil Di Update!!');
				redirect('owner/fasilitas');
		}				
    	$this->smartpost->edit('fasilitas',$data,$id);
    	$this->session->set_flashdata('result', 'Fasilitas Behasil Di Ubah!!');
		redirect('owner/fasilitas');
	}
	public function hapus($id){
		
			$this->smartpost->hapus('fasilitas',$id);	
			$this->session->set_flashdata('result', 'fasilitas Behasil Di Hapus!!');
			redirect('owner/fasilitas');
	}
}
