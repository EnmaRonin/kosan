<?php 

class Booking_iklan Extends CI_Controller{
        
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('level') != "0"){
			redirect(auth);
        }
    }
    
    public function index(){

        $data['halaman']="booking_iklan/list";
        $data['booking'] =$this->smartpost->getbookingGroupBy();
        // echo "<pre>";
        // print_r($data['booking']);die();
        $this->load->view('index',$data);
    }

    public function detail($inv){
    	$getBookingData=$this->smartpost->getBookingByinv($inv);
        
        $data['halaman']="booking_iklan/detail";

        $bo['booking'] =$this->smartpost->getBookingDetail($inv,"iklan");
      	
        // echo "<pre>";
        // print_r($bo['booking']);die();

        foreach($bo['booking'] as $k=>$v){
            $bo['pembayaran'] = $this->smartpost->getPembayaranByinv($v['invoice']);
            //$tr['id_pembayaran'][$k] = $this->smartpost->getPembayaran($v[$k]['invoice']);
        }

        $data['booking'] =$bo;
        $data['count_booking']=count($data['booking']);
        $this->load->view('index',$data);
    }
   	public function form($id_booking="",$id_pembayaran=""){

        if(empty($id_booking) || empty($id_pembayaran)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $user_id=$this->session->id;
        $data['halaman']="booking_iklan/form";
        $data['action']=site_url('owner/booking_iklan/approve/'.$id_booking.'/'.$id_pembayaran);
        $tr['transaksi_iklan'] =$this->smartpost->getdetailtrans_id($id_booking);

        foreach($tr['transaksi_iklan'] as $k=>$v){
            $tr['pembayaran'] = $this->smartpost->getPembayaranById($id_pembayaran);
            //$tr['id_pembayaran'][$k] = $this->smartpost->getPembayaran($v[$k]['invoice']);
        }
        
        $data['transaksi_iklan']=$tr;
        // echo "<pre>";
        // print_r($data['transaksi_iklan']);die();
        $this->load->view('index',$data);
   	}
    public function approve($id_booking="",$id_pembayaran=""){
        
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

        $kosan = array(
            'created_at' => date('Y-m-d H:i:s'),
            'expired_at' => date('Y-m-d H:i:s', strtotime('+1 month')),
            'publish' => 'Y',
        );

        $this->smartpost->edit('kosan',$kosan,$getBooking[0]['id_kontrakan']); //update perpanjang kontrakan

        $this->session->set_flashdata('result', 'Data Transaksi Berhasil Di Approve');
        
        $getUser = $this->smartpost->getByid('user',$getBooking[0]['id_user']);

        $getUserEmail = $this->smartpost->getByid('pemilik_kos',$getUser[0]['pengguna_id']);
        
        $user=array('premium'=>'Y');

        $this->smartpost->edit('user',$user,$getBooking[0]['id_user'],'1'); //update User For Order By

        $this->kirim_email($getUserEmail[0]['email']); //kirim Email

        redirect('owner/booking_iklan/detail/'.$getBooking[0]['invoice']);
        
    }

    public function hapus($inv){

        $this->db->select('*')->from('booking')->where('invoice',$inv)->delete(); 
        $this->db->select('*')->from('pembayaran')->where('invoice',$inv)->delete(); 
        $this->session->set_flashdata('result', 'Kosan Behasil Di Hapus!!');
        redirect('owner/booking_iklan');
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
        $this->email->message("Hai Telah Melunasi Pembayaran<br><br> Klik <strong><a href='".site_url()."/profile/booking_saya' target='_blank' rel='noopener'>disini</a></strong> Untuk Melihat Status Booking.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

}
