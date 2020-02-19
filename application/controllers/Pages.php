<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function about(){
		$this->load->view('front/about.php');
	}

	public function contact(){
		$this->load->view('front/contact.php');
	}
	
	public function faq(){
		$this->load->view('front/faq.php');
	}
	
}