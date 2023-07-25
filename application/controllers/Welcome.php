<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data_rekrutmen = json_decode($this->data_rekrutmen());
		$data_atribut = json_decode($this->data_atribut());
		
		$no=1;

		// die(var_dump($data_atribut[0]->id_pendaftar));
		foreach ($data_rekrutmen as $key) {
			for ($i=0; $i <count($key); $i++) {
				$data['no'][] = $no;
				$data['nama'][] = $key[$i]->nama;
				$data['nip'][] = $key[$i]->nip;
				$data['satuan_kerja'][] = $key[$i]->satuan_kerja;
				$data['posisi_yang_dipilih'][] = $key[$i]->posisi_yang_dipilih;
				$data['bahasa'][] = $key[$i]->bahasa_pemrograman_yang_dikuasai;
				$data['framework'][] = $key[$i]->framework_bahasa_pemrograman_yang_dikuasai;
				$data['db'][] = $key[$i]->database_yang_dikuasai;
				$data['tool'][] = $key[$i]->tools_yang_dikuasai;
				$data['mobile'][] = $key[$i]->pernah_membuat_mobile_apps;
				if($key[$i]->id == $data_atribut[i]->id_pendaftar){

				}
				$no++;
			}
			
		}
		$this->load->view('test',$data);
	}

	private function data_rekrutmen()
	{
		$url = "http://103.226.55.159/json/data_rekrutmen.json";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		return $resp;
	}
	
	private function data_atribut()
	{
		$url = "http://103.226.55.159/json/data_attribut.json";
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
		$resp = curl_exec($curl);
		curl_close($curl);
		return $resp;
	}
}
