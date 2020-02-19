<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$data['halaman'] = "users/list";
		$data['users'] = $this->smartpost->get('user')->result();
		$this->load->view('index',$data);
	}

	public function form(){
		$id=$this->uri->segment(4);
		if($id==""){
			$data['halaman']="users/form";
			$data['action'] = site_url('owner/users/tambah');
			$data['title'] = "tambah";
			$this->load->view('index',$data);
		}else{
			$data['halaman']="users/form";
			$data['action'] = site_url('owner/users/edit/').$id;
			$data['user'] = $this->smartpost->getByid('user',$id);
			$data['title'] = "edit";
			$this->load->view('index',$data);
		}
	}

	public function tambah(){
		
		$this->form_validation->set_rules('nama', 'Nama', 'is_unique[user.nama]', array(
                'is_unique'     => 'Nama Lengkap Ini Sudah Terdaftar.'
        ));
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[user.email]',array(
                'is_unique'     => 'Email Ini Sudah Terdaftar.'
        ));
		$data = array(
			"nama"	   => $this->input->post('nama'),
			"password" => md5($this->input->post('password')),
			"jk" => $this->input->post('jk'),
			"tlp" => $this->input->post('tlp'),
			"alamat" => $this->input->post('alamat'),
			"email"    => $this->input->post('email'),
			"level"    => $this->input->post('level'),
		);		
		// $cek_name = $this->smartpost->cek("user",array('name'=>$data['name']))->num_rows();
		// $cek_email = $this->smartpost->cek("user",array('email'=>$data['email']))->num_rows();
		if ($this->form_validation->run() == FALSE)
    	{
        	$data['halaman']="users/form";
			$data['action'] = site_url('owner/users/tambah');
			$data['errors'] = validation_errors();
			$data['title'] = "tambah";
			$this->load->view('index',$data);
    	}else{
			$this->smartpost->tambah('user',$data);
			$this->session->set_flashdata('result', 'User Behasil Di Tambah!!');
			redirect('owner/users');
    	}
	}
	public function edit($id){
		
		$data = array(
			"nama"	   => $this->input->post('nama'),
			"jk" => $this->input->post('jk'),
			"tlp" => $this->input->post('tlp'),
			"alamat" => $this->input->post('alamat'),
			"email"    => $this->input->post('email'),
			"level"    => $this->input->post('level'),
		);		
    		if(empty($this->input->post('password'))){
    			$this->smartpost->edit('user',$data,$id);	
    		}else{
    			$data['password']=md5($this->input->post('password'));
    			$this->smartpost->edit('user',$data,$id);	
    		}
			$this->session->set_flashdata('result', 'User Behasil Di Ubah!!');
			redirect('owner/users');
    	
	}
	public function hapus($id){

			$this->smartpost->hapus('user',$id);	
			$this->session->set_flashdata('result', 'User Behasil Di Hapus!!');
			redirect('owner/users');
	}

	
}
