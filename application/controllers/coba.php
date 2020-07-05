<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {
	
	public function bellmanford(){
		$edge = $this->db->get('antik')->result_array();
		foreach($edge as $antik){
			
			$tujuan = $antik['titik_2'];
			$jarak = $antik['jarak'];
			$awal = $antik['titik_1'];
			// tambah
			if(empty($s[$awal])){
				$s[$awal] = 0;
			}
			$hasil[$antik['id_antik']] = $antik['jarak'] + $s[$awal];
			if(empty($s[$tujuan])){
				$s[$tujuan] = 0;
			}
			if($hasil[$antik['id_antik']] < $s[$tujuan]){
				$s[$tujuan] = $hasil[$antik['id_antik']];
			}
		}
		print_r(array("hasil")); print_r($hasil);
		print_r(array("s")); print_r($s);

		// hasil
		$data = array();
		foreach($edge as $antik){
			$jarak = $antik['jarak'];
			$awal = $s[$antik['titik_1']];
			$akhir = $s[$antik['titik_2']];
			$reweight = $jarak + $awal - $akhir;
			$data[] = array(
				'id_antik'=>$antik['id_antik'],
				'jarak_bellmanford' => $reweight
			);
		}
		$this->db->update_batch('antik', $data, 'id_antik');
		print_r(array("BOBOT ULANG")); print_r($data);
	}

	public function dijkstra(){

	    // INISIALISASI
	    $titik_awal = 7002;
	    $muatan_maks = 4;
	    $AT = array();
	    $RUTE = array();
		print_r(array("INISIALISASI"));
	    print_r(array("TITIK AWAL"=>$titik_awal, "MUATAN MAKS"=>$muatan_maks));

		// TITIK
		$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik WHERE id_antik>=1000 AND id_antik<=1006 UNION SELECT DISTINCT titik_2 from antik WHERE id_antik>=1000 AND id_antik<=1006')->result_array();
	    print_r(array("EDGE")); print_r($edge);

	    // ANTAR TITIK
	    $antik = $this->db->query('SELECT titik_1, titik_2, jarak, muatan FROM antik WHERE id_antik>=1000 AND id_antik<=1006 GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak, muatan FROM antik WHERE id_antik>=1000 AND id_antik<=1006 GROUP BY titik_1, titik_2')->result_array();
	    print_r(array("ANTAR TITIK")); print_r($antik);

		foreach($edge as $edg){
			$titik = $edg['titik'];
			$AT[$titik] = array();
			$RUTE[$titik] = array('distance'=>1000000000, 'muatan'=>0, 'rute'=>"");
		}
		$RUTE[$titik_awal] = array('distance'=>0, 'muatan'=>0, 'rute'=>"".$titik_awal);

		// PATH PER TITIK
		foreach($antik as $atk){
			$AT[$atk['titik_1']][] = array('titik_2'=>$atk['titik_2'],
											'jarak'=>$atk['jarak'],
											'muatan'=>$atk['muatan']);
		}
		print_r(array("AT")); print_r($AT);

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
			print_r(array("PQ")); print_r($pq);

			$top = array_shift($pq); // ambil rute paling atas dan hapus dari antrian prioritas
			print_r(array("TOP")); print_r($top);
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

				print_r(array("RUTE BEFORE")); print_r($RUTE[$t]);
				$RUTE[$t]['distance'] = $RUTE[$from]['distance']+$j; // perbarui jarak baru
				$RUTE[$t]['muatan'] = $RUTE[$from]['muatan']+$m; // perbarui muatan baru
				$RUTE[$t]['rute'] = $RUTE[$from]['rute']."-".$t; // perbarui urutan rute baru
				print_r(array("RUTE AFTER")); print_r($RUTE[$t]);

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
		print_r(array("HASIL AKHIR")); print_r($RUTE);

	}

	public function johnson($id_supir=1012){

		$where['id_supir'] = $id_supir;
		$supir=$this->db->from('supir')->join('angkutan','angkutan.id_ang=supir.id_ang')->where($where)->get()->row();
		print_r($supir);

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
		) AS distance from jalan WHERE id_jalan < 7001 HAVING distance < 10 ORDER BY distance ASC LIMIT 5')->result_array();
		print_r(array("TITIK TERDEKAT"));
		print_r($terdekat);

	    // INISIALISASI
	    $titik_awal = $terdekat[0]['id_jalan'];
	    $muatan_maks = $supir->muatan;
	    $AT = array();
	    $RUTE = array();
		print_r(array("INISIALISASI"));
	    print_r(array("TITIK AWAL"=>$titik_awal, "MUATAN MAKS"=>$muatan_maks));

		// TITIK
		$edge = $this->db->query('SELECT DISTINCT titik_1 AS titik from antik UNION SELECT DISTINCT titik_2 from antik ORDER BY titik')->result_array();
	    print_r(array("EDGE")); print_r($edge);

	    // ANTAR TITIK
	    $antik = $this->db->query('SELECT titik_1, titik_2, jarak_bellmanford, muatan FROM antik GROUP BY titik_1, titik_2 UNION SELECT titik_2, titik_1, jarak, muatan FROM antik GROUP BY titik_1, titik_2')->result_array();
	    print_r(array("ANTAR TITIK")); print_r($antik);

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
		print_r(array("AT")); print_r($AT);

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
			print_r(array("PQ")); print_r($pq);

			$top = array_shift($pq); // ambil rute paling atas dan hapus dari antrian prioritas
			print_r(array("TOP")); print_r($top);
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

				print_r(array("RUTE BEFORE")); print_r($RUTE[$t]);
				$RUTE[$t]['distance'] = $RUTE[$from]['distance']+$j; // perbarui jarak baru
				$RUTE[$t]['muatan'] = $RUTE[$from]['muatan']+$m; // perbarui muatan baru
				$RUTE[$t]['rute'] = $RUTE[$from]['rute']."-".$t; // perbarui urutan rute baru
				print_r(array("RUTE AFTER")); print_r($RUTE[$t]);

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
		print_r(array("HASIL AKHIR")); print_r($RUTE);

	}

	public function try(){
		$rute=array();
		$simpang=array();
		$muatan=array();
		$jarak=array();

	
		$supir['titik_1']=1002;
		$where['id_supir']=1002;
		$this->db->join('angkutan','angkutan.id_ang=supir.id_ang');
		$angkutan=$this->db->get_where('supir',$where)->result_array();
		
		$maximalmuatan=$angkutan[0]['muatan'];
		

		$check=$this->db->get_where('antik',$supir)->result_array();
		$totalsimpang=count($check)-1;	

		#simpan ke array
		array_push($simpang, $totalsimpang);
		array_push($rute, $check[0]['id_antik']);	
		array_push($muatan,$check[0]['muatan']);
		array_push($jarak,$check[0]['jarak']);
		
		$awalan=$check[0]['titik_2'];
		
		$a=0;
		$selesai=0;
		while (1) {	

				$yangdicheck['titik_1']= $awalan;
				$check=$this->db->get_where('antik',$yangdicheck)->result_array();
				echo "total simpang : ";
				//echo $totalsimpang=count($check)-1; echo "<br><br>";
				$awalan=$check[0]['titik_2'];
				$totalsimpang=count($check)-1;
				
				#
				$jsimpang=count($simpang);

				if($a != 1){
					 $simpang[$jsimpang]=$totalsimpang;
					 $a=0;
				}
				#
				$jrute=count($rute);
				$rute[$jrute]=$check[0]['id_antik'];
				#
				$jmuatan=count($muatan);
				$muatan[$jmuatan]=$check[0]['muatan'];
				#
				$jjarak=count($jarak);
				$jarak[$jjarak]=$check[0]['jarak'];

				if(array_sum($muatan)>$maximalmuatan){

							$rutefinal	=implode(" - ",$rute);
							$jarakfinal	=array_sum($jarak);
							$muatanfinal=array_sum($muatan);
							//print_r($simpang);
							#simpan

							$data=array(
								'jarak'		=>$jarakfinal,
								'id_supir'	=>$where['id_supir'],
								'rute'		=>$rutefinal,
								'muatan'	=>$muatanfinal,
							);
							//$this->db->insert('rute',$data);

							if(array_sum($simpang)==0){	#tidak ada simpang
								break;
							}else{						#ada simpang
								$j=$j=count($rute)-1;
								for ($i=$j-1; $i >= 0; $i--) { 
									
									unset($simpang[$i]);
									unset($rute[$i]);
									unset($muatan[$i]);
									unset($jarak[$i]);

									if($simpang[$i]==0){
										unset($simpang[$i]);
										unset($rute[$i]);
										unset($muatan[$i]);
										unset($jarak[$i]);
									}else{
										
									}
								}
							}
				}
		}
	}

}
