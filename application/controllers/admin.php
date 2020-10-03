<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
//  jika belum login redirect ke login
		if ($this->session->userdata('status')!= "admin"){
		redirect('login');}
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
		redirect('admin/master_data');
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
	redirect('admin/master_data');
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
		redirect('admin/master_data');
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
			'muatan'	=> $this->input->post('muatan'),
		);
		$this->db->insert('antik',$data);
		redirect('admin/antar_titik');
	}

	public function ubah_antar_titik(){
		$data['muatan'] = $this->input->post('muatan');
		$where['id_antik'] = $this->input->post('id_antik');
		$this->db->update('antik', $data, $where);
		redirect('admin/antar_titik');
	}

	public function hapus_antar_titik(){
		$where['id_antik'] = $this->input->post('id_antik');
		$this->db->delete('antik', $where);
		redirect('admin/antar_titik');
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
	redirect('admin/master_data');
	}

	public function delete_jalan(){
		$where['id_jalan']=$this->uri->segment(3);

		$this->db->delete('jalan',$where);
		redirect('admin/master_data');
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
		redirect('admin/master_data');
	}

	public function delete_tps(){
		$where['id_tps']=$this->uri->segment(3);

		$this->db->delete('tps',$where);
		redirect('admin/master_data');
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
		redirect('admin/master_data');
	}

	public function delete_supir(){
		$where['id_supir']=$this->uri->segment(3);

		$this->db->delete('supir',$where);
		redirect('admin/master_data');
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
			$supir=$this->db->from('supir')->join('angkutan','angkutan.id_ang=supir.id_ang')->where($where)->get()->row();

			// Simpang terdekat dari supir
			$terdekat = $this->db->query('SELECT *, (6371 * 
				acos(
					cos(radians('.$supir->latitude.')) * 
					cos(radians(latitude)) * 
					cos(radians(longitude) - 
					radians('.$supir->longitude.')) + 
					sin(radians('.$supir->latitude.')) * 
					sin(radians(latitude))
				)
			) AS distance from jalan WHERE id_jalan < 7001 HAVING distance < 10 ORDER BY distance ASC LIMIT 1')->result_array();

		    // INISIALISASI
		    $titik_awal = $terdekat[0]['id_jalan'];
		    $muatan_maks = $supir->muatan;
		    $AT = array();
		    $RUTE = array();

			// TITIK
			$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik UNION SELECT DISTINCT titik_2 from antik ORDER BY titik')->result_array();

		    // ANTAR TITIK
		    $antik = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak, muatan FROM antik GROUP BY titik_1, titik_2')->result_array();

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

					if($RUTE[$from]['distance']+$j >= $RUTE[$t]['distance']) continue; // skip jika jarak tidak lebih pendek
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

					$data['ruteArr'][] = $this->db->query('SELECT * FROM antik WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].') OR (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
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
			$semua_supir = $this->db->from('supir')->join('angkutan','angkutan.id_ang=supir.id_ang')->get()->result_array();
			$titik_used_ids = array();
			foreach($semua_supir as $key => $supir){
				
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

			    // INISIALISASI
			    $titik_awal = $terdekat[0]['id_jalan'];
			    $muatan_maks = $supir['muatan'];
			    $AT = array();
			    $RUTE = array();

				// TITIK
				$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik_metode UNION SELECT DISTINCT titik_2 from antik_metode ORDER BY titik')->result_array();


			    // ANTAR TITIK
			    $antik = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik_metode GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak, muatan FROM antik_metode GROUP BY titik_1, titik_2')->result_array();
			    

				foreach($edge as $edg){
					$titik = $edg['titik'];
					$AT[$titik] = array();
					$RUTE[$titik] = array('distance'=>1000000000, 'muatan'=>0, 'rute'=>"");
				}

				$RUTE[$titik_awal] = array('distance'=>0, 'muatan'=>0, 'rute'=>"".$titik_awal);

				// PATH PER TITIK
				foreach($antik as $atk){
					if (isset($titik_used_ids) && !empty($titik_used_ids)){
						foreach($titik_used_ids as $useds){
							if($useds['from']==$atk['titik_1'] && $useds['to']==$atk['titik_2'] )
								break;
							else{
								if($useds['from']!=$atk['titik_1'] && $useds['to']!=$atk['titik_2']){
									$AT[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
													'jarak'=>$atk['jarak_bellmanford'],
													'muatan'=>$atk['muatan']);
									break;
								}
							}
						}
					}
					else{
						$AT[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
													'jarak'=>$atk['jarak_bellmanford'],
													'muatan'=>$atk['muatan']);
					}
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

				// MAIN LOOP DIJKSTRA
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

						if($RUTE[$from]['distance']+$j >= $RUTE[$t]['distance']) continue; // skip jika jarak tidak lebih pendek
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
						$titik_used_ids[] = array('from' => $from, 'to'=>$t);
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
				$dt['distance'] = $rute_terpilih['distance'];
				$dt['muatan'] = $rute_terpilih['muatan'];
				$dt['ruteStr'] = array();
				$dt['ruteArr'] = array();

				$rt = explode('-', $rute_terpilih['rute']);
				if(count($rt)>1){
					$dt['ruteAwal'] = $this->db->where('id_jalan', $rt[0])->get('jalan')->row_array();
					for ($i=0; $i < count($rt)-1; $i++) {
						$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rt[$i].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rt[$i].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rt[$i])->row_array()['nama_titik'];

						$get_rute = $this->db->query('SELECT * FROM antik_metode WHERE (titik_1='.$rt[$i].' AND titik_2='.$rt[$i+1].') OR (titik_1='.$rt[$i+1].' AND titik_2='.$rt[$i].')')->row_array();
						$dt['ruteArr'][] = $get_rute;

						// kosongkan muatan rute telah dilewati
						$kosongkan[] = array('id_antik'=>$get_rute['id_antik'], 'muatan'=>0);
					}
					$this->db->update_batch('antik_metode', $kosongkan, 'id_antik');
					$dt['ruteAkhir'] = $this->db->where('id_jalan', $rt[count($rt)-1])->get('jalan')->row_array();
				}

				// rute terakhir
				$dt['ruteStr'][] = $this->db->query('SELECT nama as nama_titik, longitude, latitude FROM jalan WHERE id_jalan='.$rt[count($rt)-1].' UNION SELECT nm_supir, longitude, latitude FROM supir WHERE id_supir='.$rt[count($rt)-1].' UNION SELECT nm_tps, longitude, latitude FROM tps WHERE id_tps='.$rt[count($rt)-1])->row_array()['nama_titik'];

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

		}

		$this->load->view('backend_admin/v_admin_jalur_pengangkutan2',$data);
	}

	function ulang(){
		
	}

}