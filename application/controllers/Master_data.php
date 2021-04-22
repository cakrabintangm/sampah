<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master_data extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
//  jika belum login redirect ke login
		if ($this->session->userdata('status')!= "admin"){
		redirect('user');}
		$this->load->model('model');
		$this->load->model('metode');
		$this->load->library('upload');
	}
	
	public function index(){
		$data = array(
			'isi' 	=> 'backend_admin/v_beranda_admin',
			'judul' => 'Beranda Admin',
			'data_jalan' => $this->model->get_all_jalan(),
			'data_tps' => $this->model->get_all_tps(),
			'data_supir' => $this->model->get_all_supir(),
		);
		$this->load->view('layout_admin',$data);
	}

/*MASTER DATA*/
	public function master_data(){
		$data = array(
			'isi' 	=> 'backend_admin/v_admin_master_data',
			'judul' => 'Master Data',
			'data_jalan' => $this->model->get_all_jalan(),
			'data_tps' => $this->model->get_all_tps(),
			'data_supir' => $this->model->get_all_supir(),
			'jalan' => $this->db->get('jalan')->result_array(),
			'tps' => $this->db->get('tps')->result_array(),
			'supir' => $this->db->get('supir')->result_array(),


		);
		$this->load->view('layout_admin',$data);
	}

	public function antar_titik(){
		$data = array(
			'isi' 	=> 'backend_admin/v_admin_master_antar_titik',
			'judul' => 'Master Data',
			'data_jalan' => $this->model->get_all_jalan(),
			'data_tps' => $this->model->get_all_tps(),
			'data_supir' => $this->model->get_all_supir(),
			'data_antik' => $this->model->getAll('antik')
		);
		$this->load->view('layout_admin',$data);
	}

	public function getDistanceMatrix() {
		$lat1 = $this->input->post("lat1");
		$lon1 = $this->input->post("lon1");
		$lat2 = $this->input->post("lat2");
		$lon2 = $this->input->post("lon2");
		$response = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1
			.",".$lon1."&destinations=".$lat2.",".$lon2."&key=AIzaSyBc1wq4NssgXxRoF1g9jhP6xWYOOA_hOx8");
		$result = json_decode($response);
		echo $result->rows[0]->elements[0]->distance->value;
	}

	public function save_masterdata(){
	}

	public function save_tps(){
		$query=$this->db->query('SELECT * FROM tps order by id_tps DESC')->result_array();
		if(count($query)>0){
			echo $id=$query[0]['id_tps']+1;
		}else{
			echo $id=2000;
		}
		$data_tps = array(
			'id_tps' => $id,
			'nm_tps' => $this->input->post('nama_tps'),
			'alamat' => $this->input->post('alamat_tps'),
			'longitude' => $this->input->post('longitude_tps'),
			'latitude' => $this->input->post('latitude_tps'),
		);
		$this->db->insert('tps',$data_tps);
		redirect('master-data/master_data');
	}
	
	public function save_jalan(){
	$query=$this->db->query('SELECT * FROM jalan order by id_jalan DESC')->result_array();
		if(count($query)>0){
			echo $id=$query[0]['id_jalan']+1;
		}else{
			echo $id=0;
		}
	$data_jalan = array(
			'id_jalan'=>$id,
			'nama'=>	$this->input->post('nama'),
			'alamat' => $this->input->post('alamat_jalan'),
			'longitude' => $this->input->post('longitude_jalan'),	
			'latitude' => $this->input->post('latitude_jalan'), 
		);
	$this->db->insert('jalan',$data_jalan);
	redirect('master-data/master_data');
	}

	public function save_supir(){

		$query=$this->db->query('SELECT * FROM supir order by id_supir DESC')->result_array();
		if(count($query)>0){
			echo $id=$query[0]['id_supir']+1;
		}else{
			echo $id=1000;
		}

	$data_supir = array(
			'id_supir'	=>$id,
			'nm_supir' => $this->input->post('nama_supir'),
			'alamat' => $this->input->post('alamat_supir'),
			'longitude' => $this->input->post('longitude_supir'),
			'latitude' => $this->input->post('latitude_supir'),
			'id_ang' => $this->input->post('jenis_angkutan'),
		);
		$this->db->insert('supir',$data_supir);
		redirect('master-data/master_data');
	}

	public function save_antar_titik(){
		$data=array(
			'titik_1'	=> $this->input->post('id1'),
			'titik_1_lat'	=> $this->input->post('lat1'),
			'titik_1_long'	=> $this->input->post('long1'),
			'titik_2'	=> $this->input->post('id2'),
			'titik_2_lat'	=> $this->input->post('lat2'),
			'titik_2_long'	=> $this->input->post('long2'),
			'jarak'		=> $this->input->post('jarak'),
			'jarak_bellmanford'		=> $this->input->post('jarak'),
			'muatan'	=> $this->input->post('muatan'),
		);
		$this->db->insert('antik',$data);
		redirect('master-data/antar_titik');
	}

	public function ubah_antar_titik(){
		$data['muatan'] = $this->input->post('muatan');
		$where['id_antik'] = $this->input->post('id_antik');
		$this->db->update('antik', $data, $where);
		redirect('master-data/antar_titik');
	}

	public function hapus_antar_titik(){
		$where['id_antik'] = $this->input->post('id_antik');
		$this->db->delete('antik', $where);
		redirect('master-data/antar_titik');
	}

	/*DATA JALAN*/

	public function edit_jalan(){
		$where['id_jalan']=$this->uri->segment(3);
		$data=array(
			'data'	=> $this->db->get_where('jalan',$where)->result_array(),
			'judul' => 'Master Data',
			'jalan' => $this->db->get('jalan')->result_array(),
			'tps' => $this->db->get('tps')->result_array(),
			'supir' => $this->db->get('supir')->result_array(),
		);
		$this->load->view('backend_admin/jalan/form_edit',$data);
	}

	public function proses_jalan(){
		$where['id_jalan']=$this->uri->segment(3);
		$data_jalan = array(
			'nama'=>	$this->input->post('nama'),
			'alamat' => $this->input->post('alamat_jalan'),
			'longitude' => $this->input->post('longitude_jalan'),	
			'latitude' => $this->input->post('latitude_jalan'), 
		);
	$this->db->update('jalan',$data_jalan,$where);
	redirect('master-data/master_data');
	}

	public function delete_jalan(){
		$where['id_jalan']=$this->uri->segment(3);

		$this->db->delete('jalan',$where);
		redirect('master-data/master_data');
	}
	/*DATA TPS*/
	public function edit_tps(){
		$where['id_tps']=$this->uri->segment(3);
		$data=array(
			'data'	=> $this->db->get_where('tps',$where)->result_array(),
			'judul' => 'Master Data',
			'jalan' => $this->db->get('jalan')->result_array(),
			'tps' => $this->db->get('tps')->result_array(),
			'supir' => $this->db->get('supir')->result_array(),
		);
		$this->load->view('backend_admin/tps/form_edit',$data);
	}
	public function proses_edit(){
		$where['id_tps']=$this->uri->segment(3);
		$data_tps = array(
			'nm_tps' => $this->input->post('nama_tps'),
			'alamat' => $this->input->post('alamat_tps'),
			'longitude' => $this->input->post('longitude_tps'),
			'latitude' => $this->input->post('latitude_tps'),
		);
		$this->db->update('tps',$data_tps,$where);
		redirect('master-data/master_data');
	}

	public function delete_tps(){
		$where['id_tps']=$this->uri->segment(3);

		$this->db->delete('tps',$where);
		redirect('master-data/master_data');
	}
	/*DATA SUPIR*/
	public function edit_supir(){
		$where['id_supir']=$this->uri->segment(3);
		$data=array(
			'data'	=> $this->db->get_where('supir',$where)->result_array(),
			'judul' => 'Master Data',
			'jalan' => $this->db->get('jalan')->result_array(),
			'tps' => $this->db->get('tps')->result_array(),
			'supir' => $this->db->get('supir')->result_array(),
		);
		$this->load->view('backend_admin/supir/form_edit',$data);
	}
	public function proses_supir(){
		$where['id_supir']=$this->uri->segment(3);
		$data_supir = array(
			'nm_supir' => $this->input->post('nama_supir'),
			'alamat' => $this->input->post('alamat_supir'),
			'longitude' => $this->input->post('longitude_supir'),
			'latitude' => $this->input->post('latitude_supir'),
			'id_ang' => $this->input->post('jenis_angkutan'),
		);
		$this->db->update('supir',$data_supir,$where);
		redirect('master-data/master_data');
	}

	public function delete_supir(){
		$where['id_supir']=$this->uri->segment(3);

		$this->db->delete('supir',$where);
		redirect('master-data/master_data');
	}

	// JALUR PENGANGKUTAN INDIVIDU

	public function jalur_pengangkutan(){
		$data = array(
			'judul' => 'Jalur Pengangkutan',
			'data_jalan' => $this->model->get_all_jalan(),
			'data_tps' => $this->model->get_all_tps(),
			'data_supir' => $this->model->get_all_supir(),
			'data_antik' => $this->db->get('antik')
		);

		$id_supir = $this->input->get('id_supir');
		if(!empty($id_supir)){
			$where['id_supir']=$id_supir;
			$supir=$this->db->from('supir')->join('angkutan','angkutan.id_ang=supir.id_ang')->where($where)->get()->row_array();

		    // INISIALISASI
		    $titik_awal = $this->terdekat($supir);
		    $muatan_maks = $supir['muatan'];
		    $AT = array();
		    $RUTE = array();

			// TITIK
			$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik UNION SELECT DISTINCT titik_2 from antik ORDER BY titik')->result_array();

		    // ANTAR TITIK
		    $antik = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak_bellmanford, muatan FROM antik GROUP BY titik_1, titik_2')->result_array();

			foreach($edge as $edg){
				$titik = $edg['titik'];
				$AT[$titik] = array();
				$RUTE[$titik] = array('distance'=>1000000000, 'muatan'=>0, 'rute'=>"");
			}

			$RUTE[$titik_awal] = array('distance'=>0, 'muatan'=>0, 'rute'=>"".$titik_awal);

			// PATH PER TITIK
			foreach($antik as $atk){
				$AT[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
												'jarak'=>$atk['jarak_bellmanford'],
												'muatan'=>$atk['muatan']);
			}

			// ANTRIAN PRIORITAS PATH
		    $pq = array();
		    foreach($edge as $edg){
		    	$titik = $edg['titik'];
				$pq[] = array('distance'=>$RUTE[$titik]['distance'],
								'from'=>$edg['titik'],
								'muatan'=>$RUTE[$titik]['muatan']);
			}
			// URUTKAN SESUAI JARAK DARI YANG TERPENDEK
			usort($pq, function($a, $b){return $a['distance']-$b['distance'];});

			// MAIN LOOP DJIKSTRA
			while(!empty($pq)){

				$top = array_shift($pq); // ambil rute paling atas dan hapus dari antrian prioritas
				$from = $top['from'];
				if($RUTE[$from]['muatan'] > $muatan_maks) break; // stop jika muatan sudah berlebih

				// LOOP SEMUA EDGE DARI PATH $from
				foreach($AT[$from] as $tjm){
					$t=$tjm['titik_2'];
					$j=$tjm['jarak'];
					$m=$tjm['muatan'];
					if(!in_array($t, array_column($pq, 'from'))) continue;

					//if($RUTE[$from]['distance']+$j >= $RUTE[$t]['distance']) continue; // skip jika jarak tidak lebih pendek
					if($RUTE[$from]['muatan']+$m > $muatan_maks) continue; // skip jika muatan sudah berlebih

	      			// info rute yang lama
					$old = array('distance'=>$RUTE[$t]['distance'],
									'from'=>$t,
									'muatan'=>$RUTE[$t]['muatan']);
	      			if (($key = array_search($old, $pq)) !== false) {
					    unset($pq[$key]); // hapus info rute yang lama
					}

					$RUTE[$t]['distance'] = $RUTE[$from]['distance']+$j; // perbarui jarak baru
					$RUTE[$t]['muatan'] = $RUTE[$from]['muatan']+$m; // perbarui muatan baru
					$RUTE[$t]['rute'] = $RUTE[$from]['rute']."-".$t; // perbarui urutan rute baru

					// tambah info rute yang baru
					$pq[] = array('distance'=>$RUTE[$t]['distance'],
									'from'=>$t,
									'muatan'=>$RUTE[$t]['muatan']);
					// urutkan kembali dari yang terpendek
					usort($pq, function($a, $b){return $a['distance']-$b['distance'];});
				}
			}

			// urutkan hasil
			uasort($RUTE, function($a, $b){
				if($a['muatan']!=$b['muatan']){
					return $a['muatan'] < $b['muatan'] ? 1 : -1; 	// berdasar muatan terbanyak yang dapat ditampung
				}else{ 												// jika muatan sama berdasar jarak terpendek
					if($a['distance']==$b['distance']) return 0;
					return $a['distance'] > $b['distance'] ? 1 : -1;
				}
			});

			$rute_terpilih = array_values($RUTE)[0];
			$data['id_supir'] = $id_supir;
			$data['distance'] = $rute_terpilih['distance'];
			$data['muatan'] = $rute_terpilih['muatan'];
			$data['ruteStr'] = array();
			$data['ruteArr'] = array();

			$rt = explode('-', $rute_terpilih['rute']);
			if(count($rt)>1){
				for ($i=0; $i < count($rt)-1; $i++) {
					$data['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[$i].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[$i].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[$i])->row()->nama_titik;

					$get_rute = $this->db->query('SELECT * FROM antik WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].')')->row_array();
					if ($get_rute) {
						$get_rute['type'] = 1;
					} else {
						$get_rute = $this->db->query('SELECT * FROM antik WHERE (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
						$get_rute['type'] = 2;
					}
					$data['ruteArr'][] = $get_rute;
				}
			}
			$data['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[count($rt)-1].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[count($rt)-1].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[count($rt)-1])->row()->nama_titik;

		}

		$this->load->view('backend_admin/v_admin_jalur_pengangkutan',$data);
	}


	// JALUR PENGANGKUTAN KELOMPOK

	public function jalur_pengangkutan2($generate=null){
		$data = array(
			'judul' => 'Jalur Pengangkutan',
			'data_jalan' => $this->model->get_all_jalan(),
			'data_tps' => $this->model->get_all_tps(),
			'data_supir' => $this->model->get_all_supir(),
			'data_antik' => $this->db->get('antik')
		);

		if(!empty($generate)){

			$data['supir'] = array();

			// reset tabel metode
			$this->db->truncate('antik_metode');
			$this->db->query('INSERT INTO antik_metode SELECT * FROM antik');

			// Loop semua supir
			$semua_supir = $this->db->from('supir')->join('angkutan','angkutan.id_ang=supir.id_ang')
				// ->where("id_supir<1013")
				->get()->result_array();

			foreach($semua_supir as $supir){

			    // INISIALISASI
			    $titik_awal = $this->terdekat($supir);
			    $muatan_maks = $supir['muatan'];
			    $AT = array();
			    $RUTE = array();

				// TITIK
				$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik_metode UNION SELECT DISTINCT titik_2 from antik_metode ORDER BY titik')->result_array();

			    // ANTAR TITIK
			    $antik = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2')->result_array();

				foreach($edge as $edg){
					$titik = $edg['titik'];
					$AT[$titik] = array();
					$RUTE[$titik] = array('distance'=>1000000000, 'muatan'=>0, 'rute'=>"");
				}

				$RUTE[$titik_awal] = array('distance'=>0, 'muatan'=>0, 'rute'=>"".$titik_awal);

				// PATH PER TITIK
				foreach($antik as $atk){
					$AT[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
													'jarak'=>$atk['jarak_bellmanford'],
													'muatan'=>$atk['muatan']);
				}

				// ANTRIAN PRIORITAS PATH
			    $pq = array();
			    foreach($edge as $edg){
			    	$titik = $edg['titik'];
					$pq[] = array('distance'=>$RUTE[$titik]['distance'],
									'from'=>$titik,
									'muatan'=>$RUTE[$titik]['muatan']);
				}
				// URUTKAN SESUAI JARAK DARI YANG TERPENDEK
				usort($pq, function($a, $b){return $a['distance']-$b['distance'];});

				$isMaxLoadMeet = false;

				// MAIN LOOP DIJKSTRA
				while(!empty($pq)){

					$top = array_shift($pq); // ambil rute paling atas dan hapus dari antrian prioritas
					$from = $top['from'];
					if($RUTE[$from]['muatan'] > $muatan_maks){
						$isMaxLoadMeet = true;
						break; // stop jika muatan sudah berlebih
					}

					$TEMP_AT = array();
					foreach($AT[$from] as $tjm){
						if($tjm['muatan'] > 0) $TEMP_AT[] = $tjm;
					}
					if(count($TEMP_AT)==0) $TEMP_AT = $AT[$from];

					// LOOP SEMUA EDGE DARI PATH $from
					// foreach($AT[$from] as $tjm){
					foreach($TEMP_AT as $tjm){
						$t=$tjm['titik_2'];
						$j=$tjm['jarak'];
						$m=$tjm['muatan'];
						if(!in_array($t, array_column($pq, 'from'))) continue; // skip jika titik telah dihapus dari antrian pq

						if($RUTE[$from]['distance']+$j >= 1000000000) continue; // skip jika jarak tidak lebih pendek  AND $m > 0
						if($RUTE[$from]['muatan']+$m > $muatan_maks){
							$isMaxLoadMeet = true;
							continue; // skip jika muatan sudah berlebih
						}

		      			// info rute yang lama
						$old = array('distance'=>$RUTE[$t]['distance'],
										'from'=>$t,
										'muatan'=>$RUTE[$t]['muatan']);
		      			if (($key = array_search($old, $pq)) !== false) {
						    unset($pq[$key]); // hapus info rute yang lama
						}

						$RUTE[$t]['distance'] = $RUTE[$from]['distance']+$j; // perbarui jarak baru
						$RUTE[$t]['muatan'] = $RUTE[$from]['muatan']+$m; // perbarui muatan baru
						$RUTE[$t]['rute'] = $RUTE[$from]['rute']."-".$t; // perbarui urutan rute baru

						// tambah info rute yang baru
						$pq[] = array('distance'=>$RUTE[$t]['distance'],
										'from'=>$t,
										'muatan'=>$RUTE[$t]['muatan']);
						// urutkan kembali dari yang terpendek
						usort($pq, function($a, $b){return $a['distance']-$b['distance'];});
					}
				}

				// urutkan hasil
				uasort($RUTE, function($a, $b){
					if($a['muatan']!=$b['muatan']){
						return $a['muatan'] < $b['muatan'] ? 1 : -1; 	// berdasar muatan terbanyak yang dapat ditampung
					}else{ 												// jika muatan sama berdasar jarak terpendek
						if($a['distance']==$b['distance']) return 0;
						return $a['distance'] > $b['distance'] ? 1 : -1;
					}
				});

				$rute_terpilih = array_values($RUTE)[0];
				$dt = array();
				$dt['supir'] = $supir;
				$dt['ruteStr'] = array();
				$dt['ruteArr'] = array();

				$rt = explode('-', $rute_terpilih['rute']);
				if(count($rt)>1){
					$dt['ruteAwal'] = $this->db->where('id_jalan', $rt[0])->get('jalan')->row_array();
					for ($i=0; $i < count($rt)-1; $i++) {
						$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[$i].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[$i].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[$i])->row_array()['nama_titik'];

						$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].')')->row_array();
						if ($get_rute) {
							$get_rute['type'] = 1;
						} else {
							$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
							$get_rute['type'] = 2;
						}
						$dt['ruteArr'][] = $get_rute;

						// kosongkan muatan rute telah dilewati
						$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);
					}
					$this->db->update_batch('antik_metode', $kosongkan, 'id_antik');
					$dt['ruteAkhir'] = $this->db->where('id_jalan', $rt[count($rt)-1])->get('jalan')->row_array();

					// rute terakhir
					$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik, longitude, latitude FROM jalan WHERE id_jalan='.$rt[count($rt)-1].' UNION SELECT nm_supir, longitude, latitude FROM supir WHERE id_supir='.$rt[count($rt)-1].' UNION SELECT nm_tps, longitude, latitude FROM tps WHERE id_tps='.$rt[count($rt)-1])->row_array()['nama_titik'];
				}

				/* n-th path searching */

				$maxIter = 0;

				while(!$isMaxLoadMeet && $maxIter<3){
				// if(false){
					$maxIter++;
					$titik_akhir = end($rt);

					$AT2 = array();
			    	$RUTE2 = array();
					// ANTAR TITIK
				    $antik2 = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2')->result_array();

					foreach($edge as $edg){
						$titik = $edg['titik'];
						$AT2[$titik] = array();
						$RUTE2[$titik] = array('distance'=>1000000000, 'muatan'=>$rute_terpilih['muatan'], 'rute'=>"");
					}

					$RUTE2[$titik_akhir] = array('distance'=>0, 'muatan'=>$rute_terpilih['muatan'], 'rute'=>"".$titik_akhir);

					// PATH PER TITIK
					foreach($antik2 as $atk){
						$AT2[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
														'jarak'=>$atk['jarak_bellmanford'],
														'muatan'=>$atk['muatan']);
					}

					// ANTRIAN PRIORITAS PATH
				    $pq2 = array();
				    foreach($edge as $edg){
				    	$titik = $edg['titik'];
						$pq2[] = array('distance'=>$RUTE2[$titik]['distance'],
										'from'=>$titik,
										'muatan'=>$RUTE2[$titik]['muatan']);
					}
					// URUTKAN SESUAI JARAK DARI YANG TERPENDEK
					usort($pq2, function($a, $b){return $a['distance']-$b['distance'];});

					while(!empty($pq2)){

						$top = array_shift($pq2); // ambil rute paling atas dan hapus dari antrian prioritas
						$from = $top['from'];
						if($RUTE2[$from]['muatan'] > $muatan_maks){
							$isMaxLoadMeet = true;
							break; // stop jika muatan sudah berlebih
						}

						$TEMP_AT = array();
						foreach($AT2[$from] as $tjm){
							if($tjm['muatan'] > 0) $TEMP_AT[] = $tjm;
						}
						if(count($TEMP_AT)==0) $TEMP_AT = $AT2[$from];

						// LOOP SEMUA EDGE DARI PATH $from
						// foreach($AT[$from] as $tjm){
						foreach($TEMP_AT as $tjm){
							$t=$tjm['titik_2'];
							$j=$tjm['jarak'];
							$m=$tjm['muatan'];
							if(count($TEMP_AT)>1 && in_array($t, $rt)) continue;
							if(!in_array($t, array_column($pq2, 'from'))) continue; // skip jika titik telah dihapus dari antrian pq
							
							if($RUTE2[$from]['distance']+$j >= 1000000000) continue; // skip jika jarak tidak lebih pendek
							if($RUTE2[$from]['muatan']+$m > $muatan_maks){
								$isMaxLoadMeet = true;
								continue; // skip jika muatan sudah berlebih
							}

			      			// info rute yang lama
							$old = array('distance'=>$RUTE2[$t]['distance'],
											'from'=>$t,
											'muatan'=>$RUTE2[$t]['muatan']);
			      			if (($key = array_search($old, $pq2)) !== false) {
							    unset($pq2[$key]); // hapus info rute yang lama
							}

							$RUTE2[$t]['distance'] = $RUTE2[$from]['distance']+$j; // perbarui jarak baru
							$RUTE2[$t]['muatan'] = $RUTE2[$from]['muatan']+$m; // perbarui muatan baru
							$RUTE2[$t]['rute'] = $RUTE2[$from]['rute']."-".$t; // perbarui urutan rute baru

							// tambah info rute yang baru
							$pq2[] = array('distance'=>$RUTE2[$t]['distance'],
											'from'=>$t,
											'muatan'=>$RUTE2[$t]['muatan']);
							// urutkan kembali dari yang terpendek
							usort($pq2, function($a, $b){return $a['distance']-$b['distance'];});
						}
					}

					// urutkan hasil
					uasort($RUTE2, function($a, $b){
						if($a['muatan']!=$b['muatan']){
							return $a['muatan'] < $b['muatan'] ? 1 : -1; 	// berdasar muatan terbanyak yang dapat ditampung
						}else{ 												// jika muatan sama berdasar jarak terpendek
							if($a['distance']==$b['distance']) return 0;
							return $a['distance'] > $b['distance'] ? 1 : -1;
						}
					});

					$rtd = $rute_terpilih['distance'];
					$rrt = $rute_terpilih['rute'];
					$rute_terpilih = array_values($RUTE2)[0];

					$rt = explode('-', $rute_terpilih['rute']);
					if(count($rt)>1){
						$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[0].' AND titik_2='.$rt[1].')')->row_array();
						if ($get_rute) {
							$get_rute['type'] = 1;
						} else {
							$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[1].' AND titik_2='.$rt[0].')')->row_array();
							$get_rute['type'] = 2;
						}
						$dt['ruteArr'][] = $get_rute;
						$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);

						for ($i=1; $i < count($rt)-1; $i++) {
							$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[$i].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[$i].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[$i])->row_array()['nama_titik'];

							$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].')')->row_array();
							if ($get_rute) {
								$get_rute['type'] = 1;
							} else {
								$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
								$get_rute['type'] = 2;
							}
							$dt['ruteArr'][] = $get_rute;

							// kosongkan muatan rute telah dilewati
							$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);
						}

						$this->db->update_batch('antik_metode', $kosongkan, 'id_antik');
						$dt['ruteAkhir'] = $this->db->where('id_jalan', $rt[count($rt)-1])->get('jalan')->row_array();

						// rute terakhir
						$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik, longitude, latitude FROM jalan WHERE id_jalan='.$rt[count($rt)-1].' UNION SELECT nm_supir, longitude, latitude FROM supir WHERE id_supir='.$rt[count($rt)-1].' UNION SELECT nm_tps, longitude, latitude FROM tps WHERE id_tps='.$rt[count($rt)-1])->row_array()['nama_titik'];
					}

					$rute_terpilih['distance'] += $rtd;
					$rute_terpilih['rute'] = $rrt."-".$rute_terpilih['rute'];
					
				}

				/* end of n-th path searching */

				$dt['distance'] = $rute_terpilih['distance'];
				$dt['muatan'] = $rute_terpilih['muatan'];
				// tps terdekat
				$dt['tps'] = $this->db->query('SELECT *, (6371 * 
					acos(
						cos(radians('.$dt['ruteAkhir']['latitude'].')) * 
						cos(radians(latitude)) * 
						cos(radians(longitude) - 
						radians('.$dt['ruteAkhir']['longitude'].')) + 
						sin(radians('.$dt['ruteAkhir']['latitude'].')) * 
						sin(radians(latitude))
					)
				) AS distance from tps HAVING distance < 10 ORDER BY distance ASC LIMIT 1')->row_array();

				$data['supir'][] = $dt;

			} // end foreach

			foreach($semua_supir as $supir){

				if($this->db->query('SELECT * FROM `antik_metode` WHERE muatan != 0')->result() == null) continue;

			    // INISIALISASI
			    $titik_awal = $this->terdekat($supir);
			    $muatan_maks = $supir['muatan'];
			    $AT = array();
			    $RUTE = array();

				// TITIK
				$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik_metode UNION SELECT DISTINCT titik_2 from antik_metode ORDER BY titik')->result_array();

			    // ANTAR TITIK
			    $antik = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2')->result_array();

				foreach($edge as $edg){
					$titik = $edg['titik'];
					$AT[$titik] = array();
					$RUTE[$titik] = array('distance'=>1000000000, 'muatan'=>0, 'rute'=>"");
				}

				$RUTE[$titik_awal] = array('distance'=>0, 'muatan'=>0, 'rute'=>"".$titik_awal);

				// PATH PER TITIK
				foreach($antik as $atk){
					$AT[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
													'jarak'=>$atk['jarak_bellmanford'],
													'muatan'=>$atk['muatan']);
				}

				// ANTRIAN PRIORITAS PATH
			    $pq = array();
			    foreach($edge as $edg){
			    	$titik = $edg['titik'];
					$pq[] = array('distance'=>$RUTE[$titik]['distance'],
									'from'=>$titik,
									'muatan'=>$RUTE[$titik]['muatan']);
				}
				// URUTKAN SESUAI JARAK DARI YANG TERPENDEK
				usort($pq, function($a, $b){return $a['distance']-$b['distance'];});

				$isMaxLoadMeet = false;

				// MAIN LOOP DIJKSTRA
				while(!empty($pq)){

					$top = array_shift($pq); // ambil rute paling atas dan hapus dari antrian prioritas
					$from = $top['from'];
					if($RUTE[$from]['muatan'] > $muatan_maks){
						$isMaxLoadMeet = true;
						break; // stop jika muatan sudah berlebih
					}

					$TEMP_AT = array();
					foreach($AT[$from] as $tjm){
						if($tjm['muatan'] > 0) $TEMP_AT[] = $tjm;
					}
					if(count($TEMP_AT)==0) $TEMP_AT = $AT[$from];

					// LOOP SEMUA EDGE DARI PATH $from
					// foreach($AT[$from] as $tjm){
					foreach($TEMP_AT as $tjm){
						$t=$tjm['titik_2'];
						$j=$tjm['jarak'];
						$m=$tjm['muatan'];
						if(!in_array($t, array_column($pq, 'from'))) continue; // skip jika titik telah dihapus dari antrian pq

						if($RUTE[$from]['distance']+$j >= 1000000000) continue; // skip jika jarak tidak lebih pendek  AND $m > 0
						if($RUTE[$from]['muatan']+$m > $muatan_maks){
							$isMaxLoadMeet = true;
							continue; // skip jika muatan sudah berlebih
						}

		      			// info rute yang lama
						$old = array('distance'=>$RUTE[$t]['distance'],
										'from'=>$t,
										'muatan'=>$RUTE[$t]['muatan']);
		      			if (($key = array_search($old, $pq)) !== false) {
						    unset($pq[$key]); // hapus info rute yang lama
						}

						$RUTE[$t]['distance'] = $RUTE[$from]['distance']+$j; // perbarui jarak baru
						$RUTE[$t]['muatan'] = $RUTE[$from]['muatan']+$m; // perbarui muatan baru
						$RUTE[$t]['rute'] = $RUTE[$from]['rute']."-".$t; // perbarui urutan rute baru

						// tambah info rute yang baru
						$pq[] = array('distance'=>$RUTE[$t]['distance'],
										'from'=>$t,
										'muatan'=>$RUTE[$t]['muatan']);
						// urutkan kembali dari yang terpendek
						usort($pq, function($a, $b){return $a['distance']-$b['distance'];});
					}
				}

				// urutkan hasil
				uasort($RUTE, function($a, $b){
					if($a['muatan']!=$b['muatan']){
						return $a['muatan'] < $b['muatan'] ? 1 : -1; 	// berdasar muatan terbanyak yang dapat ditampung
					}else{ 												// jika muatan sama berdasar jarak terpendek
						if($a['distance']==$b['distance']) return 0;
						return $a['distance'] > $b['distance'] ? 1 : -1;
					}
				});

				$rute_terpilih = array_values($RUTE)[0];
				$dt = array();
				$dt['supir'] = $supir;
				$dt['ruteStr'] = array();
				$dt['ruteArr'] = array();

				$rt = explode('-', $rute_terpilih['rute']);
				if(count($rt)>1){
					$dt['ruteAwal'] = $this->db->where('id_jalan', $rt[0])->get('jalan')->row_array();
					for ($i=0; $i < count($rt)-1; $i++) {
						$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[$i].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[$i].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[$i])->row_array()['nama_titik'];

						$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].')')->row_array();
						if ($get_rute) {
							$get_rute['type'] = 1;
						} else {
							$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
							$get_rute['type'] = 2;
						}
						$dt['ruteArr'][] = $get_rute;

						// kosongkan muatan rute telah dilewati
						$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);
					}
					$this->db->update_batch('antik_metode', $kosongkan, 'id_antik');
					$dt['ruteAkhir'] = $this->db->where('id_jalan', $rt[count($rt)-1])->get('jalan')->row_array();

					// rute terakhir
					$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik, longitude, latitude FROM jalan WHERE id_jalan='.$rt[count($rt)-1].' UNION SELECT nm_supir, longitude, latitude FROM supir WHERE id_supir='.$rt[count($rt)-1].' UNION SELECT nm_tps, longitude, latitude FROM tps WHERE id_tps='.$rt[count($rt)-1])->row_array()['nama_titik'];
				}

				/* n-th path searching */

				$maxIter = 0;

				while(!$isMaxLoadMeet && $maxIter<3){
				// if(false){
					$maxIter++;
					$titik_akhir = end($rt);

					$AT2 = array();
			    	$RUTE2 = array();
					// ANTAR TITIK
				    $antik2 = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2')->result_array();

					foreach($edge as $edg){
						$titik = $edg['titik'];
						$AT2[$titik] = array();
						$RUTE2[$titik] = array('distance'=>1000000000, 'muatan'=>$rute_terpilih['muatan'], 'rute'=>"");
					}

					$RUTE2[$titik_akhir] = array('distance'=>0, 'muatan'=>$rute_terpilih['muatan'], 'rute'=>"".$titik_akhir);

					// PATH PER TITIK
					foreach($antik2 as $atk){
						$AT2[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
														'jarak'=>$atk['jarak_bellmanford'],
														'muatan'=>$atk['muatan']);
					}

					// ANTRIAN PRIORITAS PATH
				    $pq2 = array();
				    foreach($edge as $edg){
				    	$titik = $edg['titik'];
						$pq2[] = array('distance'=>$RUTE2[$titik]['distance'],
										'from'=>$titik,
										'muatan'=>$RUTE2[$titik]['muatan']);
					}
					// URUTKAN SESUAI JARAK DARI YANG TERPENDEK
					usort($pq2, function($a, $b){return $a['distance']-$b['distance'];});

					while(!empty($pq2)){

						$top = array_shift($pq2); // ambil rute paling atas dan hapus dari antrian prioritas
						$from = $top['from'];
						if($RUTE2[$from]['muatan'] > $muatan_maks){
							$isMaxLoadMeet = true;
							break; // stop jika muatan sudah berlebih
						}

						$TEMP_AT = array();
						foreach($AT2[$from] as $tjm){
							if($tjm['muatan'] > 0) $TEMP_AT[] = $tjm;
						}
						if(count($TEMP_AT)==0) $TEMP_AT = $AT2[$from];

						// LOOP SEMUA EDGE DARI PATH $from
						// foreach($AT[$from] as $tjm){
						foreach($TEMP_AT as $tjm){
							$t=$tjm['titik_2'];
							$j=$tjm['jarak'];
							$m=$tjm['muatan'];
							if(count($TEMP_AT)>1 && in_array($t, $rt)) continue;
							if(!in_array($t, array_column($pq2, 'from'))) continue; // skip jika titik telah dihapus dari antrian pq
							
							if($RUTE2[$from]['distance']+$j >= 1000000000) continue; // skip jika jarak tidak lebih pendek
							if($RUTE2[$from]['muatan']+$m > $muatan_maks){
								$isMaxLoadMeet = true;
								continue; // skip jika muatan sudah berlebih
							}

			      			// info rute yang lama
							$old = array('distance'=>$RUTE2[$t]['distance'],
											'from'=>$t,
											'muatan'=>$RUTE2[$t]['muatan']);
			      			if (($key = array_search($old, $pq2)) !== false) {
							    unset($pq2[$key]); // hapus info rute yang lama
							}

							$RUTE2[$t]['distance'] = $RUTE2[$from]['distance']+$j; // perbarui jarak baru
							$RUTE2[$t]['muatan'] = $RUTE2[$from]['muatan']+$m; // perbarui muatan baru
							$RUTE2[$t]['rute'] = $RUTE2[$from]['rute']."-".$t; // perbarui urutan rute baru

							// tambah info rute yang baru
							$pq2[] = array('distance'=>$RUTE2[$t]['distance'],
											'from'=>$t,
											'muatan'=>$RUTE2[$t]['muatan']);
							// urutkan kembali dari yang terpendek
							usort($pq2, function($a, $b){return $a['distance']-$b['distance'];});
						}
					}

					// urutkan hasil
					uasort($RUTE2, function($a, $b){
						if($a['muatan']!=$b['muatan']){
							return $a['muatan'] < $b['muatan'] ? 1 : -1; 	// berdasar muatan terbanyak yang dapat ditampung
						}else{ 												// jika muatan sama berdasar jarak terpendek
							if($a['distance']==$b['distance']) return 0;
							return $a['distance'] > $b['distance'] ? 1 : -1;
						}
					});

					$rtd = $rute_terpilih['distance'];
					$rrt = $rute_terpilih['rute'];
					$rute_terpilih = array_values($RUTE2)[0];

					$rt = explode('-', $rute_terpilih['rute']);
					if(count($rt)>1){
						$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[0].' AND titik_2='.$rt[1].')')->row_array();
						if ($get_rute) {
							$get_rute['type'] = 1;
						} else {
							$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[1].' AND titik_2='.$rt[0].')')->row_array();
							$get_rute['type'] = 2;
						}
						$dt['ruteArr'][] = $get_rute;
						$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);

						for ($i=1; $i < count($rt)-1; $i++) {
							$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[$i].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[$i].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[$i])->row_array()['nama_titik'];

							$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].')')->row_array();
							if ($get_rute) {
								$get_rute['type'] = 1;
							} else {
								$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
								$get_rute['type'] = 2;
							}
							$dt['ruteArr'][] = $get_rute;

							// kosongkan muatan rute telah dilewati
							$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);
						}

						$this->db->update_batch('antik_metode', $kosongkan, 'id_antik');
						$dt['ruteAkhir'] = $this->db->where('id_jalan', $rt[count($rt)-1])->get('jalan')->row_array();

						// rute terakhir
						$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik, longitude, latitude FROM jalan WHERE id_jalan='.$rt[count($rt)-1].' UNION SELECT nm_supir, longitude, latitude FROM supir WHERE id_supir='.$rt[count($rt)-1].' UNION SELECT nm_tps, longitude, latitude FROM tps WHERE id_tps='.$rt[count($rt)-1])->row_array()['nama_titik'];
					}

					$rute_terpilih['distance'] += $rtd;
					$rute_terpilih['rute'] = $rrt."-".$rute_terpilih['rute'];
					
				}

				/* end of n-th path searching */

				$dt['distance'] = $rute_terpilih['distance'];
				$dt['muatan'] = $rute_terpilih['muatan'];
				// tps terdekat
				$dt['tps'] = $this->db->query('SELECT *, (6371 * 
					acos(
						cos(radians('.$dt['ruteAkhir']['latitude'].')) * 
						cos(radians(latitude)) * 
						cos(radians(longitude) - 
						radians('.$dt['ruteAkhir']['longitude'].')) + 
						sin(radians('.$dt['ruteAkhir']['latitude'].')) * 
						sin(radians(latitude))
					)
				) AS distance from tps HAVING distance < 10 ORDER BY distance ASC LIMIT 1')->row_array();

				$data['supir_ke_2'][] = $dt;

			} // end foreach

		}

		$this->load->view('backend_admin/v_admin_jalur_pengangkutan2',$data);
	}

	function terdekat($supir){
		// Simpang terdekat dari supir
		$terdekat = $this->db->query('SELECT *, (6371 * 
			acos(
				cos(radians('.$supir['latitude'].')) * 
				cos(radians(latitude)) * 
				cos(radians(longitude) - 
				radians('.$supir['longitude'].')) + 
				sin(radians('.$supir['latitude'].')) * 
				sin(radians(latitude))
			)
		) AS distance from jalan WHERE id_jalan < 7001 OR id_jalan > 7005 HAVING distance < 10 ORDER BY distance ASC LIMIT 1')->result_array();

		return $terdekat[0]['id_jalan'];
	}

	function jalur_sopir($supir){

	}
}