<?php 

	class Smartpost extends CI_Model{

		function cek($table,$where){		
			return $this->db->get_where($table,$where);
		}
		public function cariKos($q,$jenis="",$jam_bertemu="",$binatang=""){
			echo $jenis;
			$this->db->select('*');
			$this->db->where('publish','Y');
			$this->db->like('kota_kab',$q);
			
			if(!empty($jenis)){
				$this->db->where('jenis',$jenis);
			}
			if(!empty($jam_bertemu)){
				$this->db->where('jam_bertemu',$jam_bertemu);
			}
			if(!empty($binatang)){
				$this->db->where('binatang',$binatang);
			}
			
			$this->db->or_like('kecamatan',$q);
			$this->db->or_like('provinsi',$q);
			$this->db->or_like('alamat',$q);
			
			$this->db->from('kosan');
			return $this->db->get();

		}
		public function getBank($user_id=""){
			$this->db->select('*,bank_account.id as id_bank');
			$this->db->from('bank_account');
			if(!empty($user_id)){
				$this->db->where('bank_account.user_id',$user_id);
			}
			$this->db->join('user','user.id = bank_account.user_id');
			return $this->db->get();

		}
		function getBookingGroupBy($user_id=""){

			$this->db->select('*,booking.sub_total as total,booking.status as status_booking');
			$this->db->from('booking');
			$this->db->join('pembayaran','pembayaran.invoice=booking.invoice');
			$this->db->join('kosan','kosan.id=booking.id_kontrakan');
			$this->db->join('kamar','kamar.id_kontrakan=kosan.id');

			
			if(!empty($user_id)){
				if($this->session->userdata('level')=="2"){
					$this->db->group_by('booking.invoice');
					$this->db->where('booking.id_user',$user_id);
					$this->db->where('booking.type','kosan');
				}else if($this->session->userdata('level')=="1"){
					
					$this->db->where('kosan.user_id',$user_id);
					$this->db->group_by('booking.invoice');
					if($this->uri->segment(2)=='booking_saya'){
						$this->db->where('booking.type','iklan');
					}else{
						$this->db->where('booking.type','kosan');
					}
				}
			}else if($this->session->userdata('level')=="0"){
					$this->db->select('kosan.nama as nama_kosan');
					$this->db->group_by('booking.invoice');
					if($this->uri->segment(2)=='booking_iklan'){
						$this->db->select('pemilik_kos.nama as nama_user,pemilik_kos.id as id_user');
						$this->db->where('booking.type','iklan');
						$this->db->join('user','booking.id_user=user.id');
						$this->db->join('pemilik_kos','pemilik_kos.id=user.pengguna_id');
					}else{
						$this->db->select('pencari_kos.nama as nama_user,pencari_kos.id as id_user');
						$this->db->where('booking.type','kosan');
						$this->db->join('user','booking.id_user=user.id');
						$this->db->join('pencari_kos','pencari_kos.id=user.pengguna_id');
					}
			}

			return $this->db->get()->result_array();
		}
		function getBookingByinv($inv){
			$this->db->select('*,booking.sub_total as total');
			$this->db->from('booking');
			$this->db->where('booking.invoice',$inv);
			$this->db->join('pembayaran','pembayaran.invoice=booking.invoice');
			return $this->db->get()->result_array();
		}
		function getBookingDetail($inv,$type){
			$this->db->select('*,booking.sub_total as total,booking.status as status_booking');
			if($this->session->userdata('level')==0 || $this->session->userdata('level')==2 || $this->session->userdata('level')==1 ){
				$this->db->select('booking.id as id_booking');
			}
			$this->db->from('booking');
			$this->db->where('booking.invoice',$inv);
			$this->db->where('booking.type',$type);
			//$this->db->join('pembayaran','pembayaran.invoice=booking.invoice');
			$this->db->join('kosan','kosan.id=booking.id_kontrakan');
			if($type=="kosan"){
				
			$this->db->join('kamar','kamar.id=booking.id_kamar');
			}

			return $this->db->get()->result_array();
		}

		function getdetailtrans($inv){
			$this->db->select('*,booking.sub_total as total,booking.status as status_booking,booking.id as id_booking');
			$this->db->from('booking');
			$this->db->where('booking.invoice',$inv);
			//$this->db->join('pembayaran','pembayaran.invoice=booking.invoice','right');
			$this->db->join('kosan','kosan.id=booking.id_kontrakan');
			$this->db->join('kamar','kamar.id=booking.id_kamar');
			return $this->db->get()->result_array();
		}

		public function getPembayaranByinv($inv){
			$this->db->select('*');
			$this->db->from('pembayaran');
			$this->db->where('invoice',$inv);
			return $this->db->get()->result_array();

		}

		function getdetailtrans_id($id){
			$this->db->select('*');
			$this->db->from('booking');
			$this->db->where('booking.id',$id);
			return $this->db->get()->result_array();
		}

		public function getPembayaranByid($id){
			$this->db->select('*');
			$this->db->from('pembayaran');
			$this->db->where('id',$id);
			return $this->db->get()->result_array();
		}
		function getKamarByidKontrakan($id){
			$this->db->select('*');
			$this->db->from('kamar');
			$this->db->where('id_kontrakan',$id);
			return $this->db->get()->result_array();
		}
		function getHargaKamarMinHarga($id){
			$this->db->select_min('harga');
			$this->db->where('id_kontrakan',$id);
			$this->db->from('kamar');
			return $this->db->get();
		}
		function getStatusKamar($id){
			$this->db->select('COUNT(status) as status');
			$this->db->where('id_kontrakan',$id);
			$this->db->where('status','kosong');
			$this->db->from('kamar');
			return $this->db->get();
		}
		function getGambarByidKontrakan($id){
			$this->db->select('*');
			$this->db->from('gallery_kosan');
			$this->db->where('kontrakan_id',$id);
			return $this->db->get()->result_array();
		}
		function getGalleryKamarByidkamar($id){
			$this->db->select('*');
			$this->db->from('gallery_kamar');
			$this->db->where('kamar_id',$id);
			return $this->db->get()->result_array();
		}
		function getFasilitasWhereIn($id){
			
			$this->db->select('*');
			$this->db->from('fasilitas');
			$this->db->where_in('id',$id);
			return $this->db->get()->result_array();
		}
		function getkontrakanJoin($user_id=""){
				$this->db->select('*,pemilik_kos.id as user_id,kosan.id as id_kosan,kosan.nama as nama_kosan,kosan.alamat as kosan_alamat');
				$this->db->from('kosan');

				if(!empty($user_id)){
					$this->db->where('kosan.user_id',$user_id);
				}

				$this->db->join('user', 'user.id = kosan.user_id');
				$this->db->join('pemilik_kos', 'pemilik_kos.id = user.pengguna_id');
				return $this->db->get();
		}
		function tambah_kamar($data){
			$this->db->insert_batch('kamar', $data);
			$total_affected_rows = $this->db->affected_rows();
			$first_insert_id = $this->db->insert_id();
			$last_id = ($first_insert_id + $total_affected_rows - 1);
			return $last_id;
		}
		function tambah_gallery_kamar($data){
			$query = $this->db->insert('gallery_kamar',$data);
			return $query;
		}
		// function getbarangJoinId($id){
		// 		$this->db->select('*,barang.nama as nama_barang,satuan.nama as nama_satuan,barang.id as id_barang,jenis.nama as nama_jenis,pemasok.nama as nama_pemasok');
		// 		$this->db->from('barang');
		// 		$this->db->join('jenis', 'jenis.id = barang.id_jenis');
		// 		$this->db->join('pemasok', 'pemasok.id = barang.id_pemasok');
		// 		$this->db->join('satuan', 'satuan.id = barang.id_satuan');
		// 		$this->db->where('barang.id',$id);
		// 		return $this->db->get();
		// }
		function getByid($table,$id,$level=""){
			$this->db->select('*');
			
			if(!empty($level) && $this->session->userdata('level')=="0"){

				if($this->uri->segment(2)=="pemilik"){
					$this->db->where('level','1');
					$this->db->where('pengguna_id',$id);
				}
				if($this->uri->segment(2)=="pencari"){
					$this->db->where('level','2');
					$this->db->where('pengguna_id',$id);

				}
				if($this->uri->segment(2)=="admin"){
					$this->db->where('level','0');	
					$this->db->where('pengguna_id',$id);

				}
			}else{
				$this->db->where('id',$id);
			}
			$this->db->from($table);
			return $this->db->get()->result_array();
		}

		function get($table,$limit="",$publish=""){		
			$this->db->select('*');
			$this->db->from($table);
			if(!empty($limit)){
				$this->db->limit($limit);
			}
			if(!empty($publish)){
				$this->db->where('publish','Y');
			}
			return $this->db->get();
		}

		// function getUser(){
		// 	$this->db->select('*');
		// 	$this->db->from('user')
		// 	return $this->db->get()->result();
		// }

		// function getFasilitas(){
		// 	$this->db->select('*');
		// 	$this->db->from('fasilitas')
		// 	return $this->db->get()->result();
		// }

		
		function tambah($table,$data){
			$query = $this->db->insert($table, $data);

			return $this->db->insert_id();	
		}
		function edit($table,$data,$id,$level=""){
			$this->db->where('id',$id);
			if(!empty($level)){
				$this->db->where('level',$level);
			}
			$query = $this->db->update($table, $data);
			if($query){
				return false;
			}else
				return true;
		}
		function konfirmasi($data,$inv){
			$this->db->where('no_invoice',$inv);
			$query = $this->db->update("detail_transaksi", $data);
			if($query){
				return false;
			}else
				return true;
		}
		function hapus($table,$id){
			$this->db->where('id',$id);
			$query = $this->db->delete($table);
			if($query){
				return false;
			}else
				return true;
		}
		function hapusTransaksi($table,$invoice){
			$this->db->where('no_invoice',$invoice);
			$query = $this->db->delete($table);
			if($query){
				return false;
			}else
				return true;
		}

		function hapusPengiriman($table,$invoice){
			$this->db->where('invoice',$invoice);
			$query = $this->db->delete($table);
			if($query){
				return false;
			}else
				return true;
		}
		
		function hapusPayment($table,$invoice){
			$this->db->where('no_invoice',$invoice);
			$query = $this->db->delete($table);
			if($query){
				return false;
			}else
				return true;
		}
		function getTransaksiDetailTotal($table,$invoice){
			$this->db->select('*');
			$this->db->from($table,$invoice);
			$this->db->where('no_invoice',$invoice);
			return $this->db->get();	
		}
		function getTransaksiDetail($invoice){
				$this->db->select('*,pengiriman.alamat as alamat_pelanggan,barang.nama as nama_barang,satuan.nama as nama_satuan,barang.id as id_barang,jenis.nama as nama_jenis,pemasok.nama as nama_pemasok,pelanggan.nama as nama_pelanggan');
				$this->db->from('transaksi');
				$this->db->where('transaksi.no_invoice',$invoice);
				$this->db->join('barang', 'barang.id = transaksi.id_barang');
				$this->db->join('detail_transaksi', 'detail_transaksi.no_invoice = transaksi.no_invoice');
				$this->db->join('pelanggan', 'pelanggan.id = detail_transaksi.id_pelanggan');
				$this->db->join('pengiriman', 'pengiriman.invoice = detail_transaksi.no_invoice');
				$this->db->join('jenis', 'jenis.id = barang.id_jenis');
				$this->db->join('pemasok', 'pemasok.id = barang.id_pemasok');
				$this->db->join('satuan', 'satuan.id = barang.id_satuan');
				return $this->db->get();
		}
		function laporan_booking($id){
				$this->db->select('*,kosan.nama as nama_kos,booking.status as status_booking,kosan.alamat as alamat_kos');
				$this->db->from('booking');
				//$this->db->where('transaksi.type', $type);
				$this->db->where('booking.id',$id);
				$this->db->join('kosan', 'kosan.id = booking.id_kontrakan');
				$this->db->join('kamar', 'kamar.id = booking.id_kamar');
				$this->db->join('user','user.id=booking.id_user');
				if($this->session->userdata('level')==2){
					$this->db->select('pencari_kos.nama as nama_pencari,pencari_kos.alamat as alamat_pencari');
					$this->db->where('user.level','2');
					$this->db->join('pencari_kos','pencari_kos.id=user.pengguna_id');
					
				}else{
					$this->db->select('pemilik_kos.nama as nama_pencari,pemilik_kos.alamat as alamat_pencari');

					$this->db->where('user.level','1');
					$this->db->join('pemilik_kos','pemilik_kos.id=user.pengguna_id');
				}
				return $this->db->get();
		}
		function laporan_tr_total($type,$tgl1,$tgl2){
				$this->db->select('detail_transaksi.subtotal,SUM(subtotal) AS total_sum');
				$this->db->from('detail_transaksi');
				$this->db->where('detail_transaksi.tanggal >=', $tgl1);
				$this->db->where('detail_transaksi.tanggal <=', $tgl2);
				
				// $this->db->select('SUM(pembayaran.total_harga) as total_sum');
				return $this->db->get();
		}
		function laporan_booking_tr($type,$tgl1,$tgl2){
				
				$this->db->select('*,kosan.nama as nama_kosan');
				$this->db->from('booking');
				$this->db->where('booking.created_at >=', $tgl1);
				$this->db->where('booking.created_at <=', $tgl2);
				$this->db->where('booking.type',$type);
				$this->db->where('booking.status','y');
				$this->db->join('kosan', 'kosan.id = booking.id_kontrakan');
				$this->db->join('kamar', 'kamar.id = booking.id_kamar');
				$this->db->join('user','user.id=booking.id_user');
				if($type=="kosan"){
					$this->db->select('pencari_kos.nama as nama_user');
					$this->db->where('user.level','2');
					$this->db->join('pencari_kos','pencari_kos.id=user.pengguna_id');
				}else{
					$this->db->select('pemilik_kos.nama as nama_user');
					$this->db->where('user.level','1');
					$this->db->join('pemilik_kos','pemilik_kos.id=user.pengguna_id');
				}
				
				$this->db->group_by('booking.invoice');
				return $this->db->get();
		}
		function laporan_booking_total($type,$tgl1,$tgl2){
				$this->db->select('booking.sub_total,SUM(sub_total) AS total_sum');
				$this->db->from('booking');
				$this->db->where('booking.created_at >=', $tgl1);
				$this->db->where('booking.created_at <=', $tgl2);
				$this->db->where('booking.type ',$type);
				$this->db->where('status','y');
				$this->db->group_by('invoice');
				return $this->db->get();
		}
	}