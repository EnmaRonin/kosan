<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$data['halaman'] = "laporan/index";
		$this->load->view('index',$data);
	}
	
	public function booking_iklan(){
		
		$type=$this->input->post('type');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');

		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
    		'format' => [190, 236],
    		'orientation' => 'L'
		]);

		
		$data['transaksi'] = $this->smartpost->laporan_booking_tr($type,$tgl1,$tgl2)->result_array();
		// echo "<pre>";
		// print_r($data['transaksi']);die();
		$data['transaksi_total'] = $this->smartpost->laporan_booking_total($type,$tgl1,$tgl2)->result_array();
		if(count($data['transaksi_total'])==0){
			$data['transaksi_total'] = 0;
		}
		$namefile= 'laporan Transaksi Booking '.$type.' '.date('d-m-y').'.pdf';
		// echo "<pre>";
		// print_r($data);die();
		$html = $this->load->view('report',$data,true);
		$mpdf->WriteHtml($html);
		$mpdf->output($namefile,'I');
		exit();
	}
	
	// public function transaksi(){
	// 	$type='penjualan';
	// 	$tgl1=$this->input->post('tgl1');
	// 	$tgl2=$this->input->post('tgl2');

	// 	$mpdf = new \Mpdf\Mpdf([
	// 		'mode' => 'utf-8',
 //    		'format' => [190, 236],
 //    		'orientation' => 'P'
	// 	]);

	// 	$data['transaksi'] = $this->smartpost->laporan_tr($type,$tgl1,$tgl2)->result_array();
	// 	$data['transaksi_total'] = $this->smartpost->laporan_tr_total($type,$tgl1,$tgl2)->result_array();
	// 	$namefile= 'laporan Transaksi '.$type.' '.date('d-m-y').'.pdf';
	// 	$html = $this->load->view('report',$data,true);
	// 	$mpdf->WriteHtml($html);
	// 	$mpdf->output($namefile,'I');
	// 	exit();
	// }
}
