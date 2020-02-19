<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

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
		$data['halaman'] = "pemilik/list";
		$data['pemilik'] = $this->smartpost->get('pemilik_kos')->result();
		$this->load->view('index',$data);
	}

	public function form(){
		$id=$this->uri->segment(4);
		if($id==""){
			$data['halaman']="pemilik/form";
			$data['action'] = site_url('owner/pemilik/tambah');
			$data['title'] = "tambah";
			$this->load->view('index',$data);
		}else{
			$data['halaman']="pemilik/form";
			$data['action'] = site_url('owner/pemilik/edit/').$id;
			$data['pemilik'] = $this->smartpost->getByid('pemilik_kos',$id);
			$data['title'] = "edit";
			$this->load->view('index',$data);
		}
	}

	public function tambah(){
		
		$this->form_validation->set_rules('nama', 'Nama', 'is_unique[pemilik_kos.nama]', array(
                'is_unique'     => 'Nama Lengkap Ini Sudah Terdaftar.'
        ));
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[pemilik_kos.email]',array(
                'is_unique'     => 'Email Ini Sudah Terdaftar.'
        ));
		$data = array(
			"nama"	   => $this->input->post('nama'),
			"password" => md5($this->input->post('password')),
			"jk" => $this->input->post('jk'),
			"tlp" => $this->input->post('tlp'),
			"alamat" => $this->input->post('alamat'),
			"email"    => $this->input->post('email')
		);		
		// $cek_name = $this->smartpost->cek("user",array('name'=>$data['name']))->num_rows();
		// $cek_email = $this->smartpost->cek("user",array('email'=>$data['email']))->num_rows();
		if ($this->form_validation->run() == FALSE)
    	{
        	$data['halaman']="pemilik/form";
			$data['action'] = site_url('owner/pemilik/tambah');
			$data['errors'] = validation_errors();
			$data['title'] = "tambah";
			$this->load->view('index',$data);
    	}else{
			$pengguna_id = $this->smartpost->tambah('pemilik_kos',$data);
			$users = array(
				"pengguna_id" => $pengguna_id,
				"level" => '1',
				"premium" => 'N',
			);
			$this->smartpost->tambah('user',$users);
			$this->session->set_flashdata('result', 'Pemilik Kos Behasil Di Tambah!!');
			redirect('owner/pemilik');
    	}
	}
	public function edit($id){
		
		$data = array(
			"nama"	   => $this->input->post('nama'),
			"jk" => $this->input->post('jk'),
			"tlp" => $this->input->post('tlp'),
			"alamat" => $this->input->post('alamat'),
			"email"    => $this->input->post('email')
		);		
    		if(empty($this->input->post('password'))){
    			$this->smartpost->edit('pemilik_kos',$data,$id);	
    		}else{
    			$data['password']=md5($this->input->post('password'));
    			$this->smartpost->edit('pemilik_kos',$data,$id);	
    		}
			$this->session->set_flashdata('result', 'Pemilik Kos Behasil Di Ubah!!');
			redirect('owner/pemilik');
    	
	}
	public function hapus($id){
			$pengguna_id= $this->smartpost->getByid('user',$id,'1');
				
			$this->smartpost->hapus('pemilik_kos',$id);	
			$this->smartpost->hapus('user',$pengguna_id[0]['id']);
			$this->session->set_flashdata('result', 'pemilik kos Behasil Di Hapus!!');
			redirect('owner/pemilik');
	}

	
}
