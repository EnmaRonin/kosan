<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "0"){
			redirect('auth/logout');
		}
	}

	public function index()
	{

		$data['halaman'] = "beranda";
		$this->load->view('index',$data);
	}
}