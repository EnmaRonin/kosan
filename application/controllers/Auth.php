<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		$data['halaman']="login";
		$this->load->view('front/index',$data);
	}

	function register(){
		$table="";
		if($this->input->post('level')==1){
			$table= 'pemilik_kos';
		}else{
			$table= 'pencari_kos';
		}

 
		$this->form_validation->set_rules('tlp', 'Nomor Telepon', 'numeric|max_length[14]|min_length[11]', array(
                'numeric'     => 'Nomor Yang Anda Masukan Tidak Valid.',
                'max_length'     => 'Nomor Yang Anda Masukan Lebih Dari 14 Karakter.',
                'min_length'     => 'Nomor Yang Anda Masukan Kurang Dari 11 Karakter.'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique['.$table.'.nama]', array(
                'is_unique'     => 'Nama Ini Sudah Terdaftar.',
                'required'     => 'Nama Harus Di Isi.'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique['.$table.'.email]', array(
                'is_unique'     => 'Email Ini Sudah Terdaftar.',
                'required'     => 'Email Ini Harus Di Isi.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
                'min_length'     => 'Password Minimal harus 8 karakter.',
                'required'     => 'Password Harus Di Isi.'
        ));
        $this->form_validation->set_rules('c_password', 'Password Konfirmasi', 'required|matches[password]', array(
                'matches'     => 'Password Anda Tidak Sama.',
                'required'     => 'Password Konfirmasi Harus Di Isi'
        ));
        $field= array(
        	"nama"	           => $this->input->post('nama'),
			"password"	   => md5($this->input->post('password')),
			"email"	   => $this->input->post('email'),
			"tlp"	   => $this->hp($this->input->post('tlp')),
			"jk"	   => $this->input->post('jk'),
			"alamat"	   => $this->input->post('alamat'),
        );

        
		if(empty($_POST)){
			$data['halaman']="register";
			$this->load->view('front/index',$data);
		}else{
				
			if ($this->form_validation->run() == FALSE)
	    	{
	        	$data['halaman']="register";
				$data['errors'] = validation_errors();
				$this->load->view('front/index',$data);
			}else{
        		

				$pengguna_id = $this->smartpost->tambah($table,$field);
					
					$data = array(
						"premium"  => 'N',
						"pengguna_id" => $pengguna_id,	
						"level"	   => $this->input->post('level'),
					);
				$user_id=$this->smartpost->tambah('user',$data);
				$this->kirim_email($this->input->post('email'),$user_id);
				$this->session->set_flashdata('result', 'Pendaftaran Berhasil Silahkan Periksa Email Anda Untuk Verifikasi!!');
				redirect('auth');
			}
		}
	}
	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		
		$admin = $this->smartpost->cek('admin',$where)->num_rows();
		
		$pencari = $this->smartpost->cek('pencari_kos',$where)->num_rows();

		$pemilik = $this->smartpost->cek('pemilik_kos',$where)->num_rows();


		if($admin == 0 && $pencari == 0 && $pemilik == 0){
			$this->session->set_flashdata('result', 'Email Atau Password Salah!!');
			redirect('auth');	
 		}else{
			if($admin > 0){
				

				$where = array(
					'email' => $email,
					'verify' =>'Y',
					'password' => md5($password)
				); 
								
				$getAdmin = $this->smartpost->cek('admin',$where)->result();
				
				if(count($getAdmin)==0){
					$this->session->set_flashdata('result', 'Email Anda Belum Terverifikasi!!');
					redirect('auth');
				}

				$where_user = array(
					'level' => '0',
					'pengguna_id' => $getAdmin[0]->id
				);

				$getUser = $this->smartpost->cek('user',$where_user)->result();
				
				$getUser_count = $this->smartpost->cek('user',$where_user)->num_rows();
				
				if($getUser_count==0){
					$this->session->set_flashdata('result', 'Email Anda Belum Terdaftar!!');
					redirect('auth');
				}

				$data_session = array(
						'id' => $getUser[0]->id,
						'nama' => $getAdmin[0]->nama,
						'email' => $getAdmin[0]->email,
						'alamat' => $getAdmin[0]->alamat,
						'tlp' => $getAdmin[0]->tlp,
						'jk' => $getAdmin[0]->jk,
						'level' => $getUser[0]->level,
						'status' => "login"
				);
				$this->session->set_userdata($data_session);
				return redirect('owner/home');
			}

			if($pencari > 0){
				

				$where = array(
					'email' => $email,
					'verify' =>'Y',
					'password' => md5($password)
				); 
				
				$getPencari = $this->smartpost->cek('pencari_kos',$where)->result();
				
				if(count($getPencari)==0){
					$this->session->set_flashdata('result', 'Email Anda Belum Terverifikasi!!');
					redirect('auth');
				}

				$where_user = array(
					'level' => '2',
					'pengguna_id' => $getPencari[0]->id
				);

				$getUser = $this->smartpost->cek('user',$where_user)->result();
				$getUser_count = $this->smartpost->cek('user',$where_user)->num_rows();
				
				if($getUser_count==0){
					$this->session->set_flashdata('result', 'Email Anda Belum Terdaftar!!');
					redirect('auth');
				}
					$data_session = array(
						'id' => $getUser[0]->id,
						'nama' => $getPencari[0]->nama,
						'email' => $getPencari[0]->email,
						'alamat' => $getPencari[0]->alamat,
						'tlp' => $getPencari[0]->tlp,
						'jk' => $getPencari[0]->jk,
						'level' => $getUser[0]->level,
						'status' => "login"
					);
				$this->session->set_userdata($data_session);
				return redirect('beranda');
			}
			if($pemilik > 0){
				
				$where = array(
					'email' => $email,
					'verify' =>'Y',
					'password' => md5($password)
				); 
				
				$getPemilik = $this->smartpost->cek('pemilik_kos',$where)->result();
				
				if(count($getPemilik)==0){
					$this->session->set_flashdata('result', 'Email Anda Belum Terverifikasi!!');
					redirect('auth');
				}

				$where_user = array(
					'level' => '1',
					'pengguna_id' => $getPemilik[0]->id
				);

				$getUser = $this->smartpost->cek('user',$where_user)->result();
				$getUser_count = $this->smartpost->cek('user',$where_user)->num_rows();
				
				if($getUser_count==0){
					$this->session->set_flashdata('result', 'Email Anda Belum Terdaftar!!');
					redirect('auth');
				}
					$data_session = array(
						'id' => $getUser[0]->id,
						'nama' => $getPemilik[0]->nama,
						'email' => $getPemilik[0]->email,
						'alamat' => $getPemilik[0]->alamat,
						'tlp' => $getPemilik[0]->tlp,
						'jk' => $getPemilik[0]->jk,
						'level' => $getUser[0]->level,
						'status' => "login"
					);
				$this->session->set_userdata($data_session);
				return redirect('beranda');
			}
		}
	}
	

	function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

	 public function kirim_email($email="",$user_id="")
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

        // // Lampiran email, isi dengan url/path file
       //$this->email->attach('Notifikasi Verifikasi Akun Electronic Kos Now');

        // Subject email
        $this->email->subject('Notifikasi Verifikasi Akun <Electronic Kos Now>');

        // Isi email
        $this->email->message("Hai Terima Kasih Telah Registrasi Silahkan <br><br> Klik <strong><a href='".site_url()."/auth/update_verify/".$user_id."' target='_blank' rel='noopener'>disini</a></strong> Untuk Verifikasi Akun.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function hp($nohp="") {
    	if(empty($nohp)){
    		return false;
    	}
     // kadang ada penulisan no hp 0811 239 345
     $nohp = str_replace(" ","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace("(","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace(")","",$nohp);
     // kadang ada penulisan no hp 0811.239.345
     $nohp = str_replace(".","",$nohp);
 
     // cek apakah no hp mengandung karakter + dan 0-9
     if(!preg_match('/[^+0-9]/',trim($nohp))){
         // cek apakah no hp karakter 1-3 adalah +62
         if(substr(trim($nohp), 0, 3)=='62'){
             $hp = trim($nohp);
         }
         // cek apakah no hp karakter 1 adalah 0
         elseif(substr(trim($nohp), 0, 1)=='0'){
             $hp = '62'.substr(trim($nohp), 1);
         }
     }
     return $hp;
 	}

 	public function update_verify($id){
        
        $data = array(
            "verify"     => 'Y'
        );      
        $getPengguna = $this->smartpost->getByid('user',$id);
        
        if($getPengguna[0]['level']==1){
       	 	$this->smartpost->edit('pemilik_kos',$data,$getPengguna[0]['pengguna_id']); 
        }

        if($getPengguna[0]['level']==2){
       	 	$this->smartpost->edit('pencari_kos',$data,$getPengguna[0]['pengguna_id']); 
        }
        
        if($getPengguna[0]['level']==0){
       	 	$this->smartpost->edit('admin',$data,$getPengguna[0]['pengguna_id']); 
        }

        $this->session->set_flashdata('result', 'Akun Berhasil Di Verifikasi Silahkan Login!!');
        //$this->session->set_userdata($data);
        redirect('auth');
        
    }

}