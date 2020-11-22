<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('anggotamodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2'){
			// $this->load->view('dashboard/dashboardcontent');		
			$data['namakelas'] = $this->model->getdatakelas();
			// $dataidkelas['idkelas'] = $this->model->caridataidkelas();
			$this->load->view('anggota/anggotacontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function viewajax()
	{
		$data = $this->model->tampildata();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->nis."</td>";
				echo "<td>".$row->nama."</td>";
				echo "<td>".$row->alamat."</td>";
				echo "<td>".$row->kelas."</td>";
				echo "<td>".$row->namaortu."</td>";
				echo "<td>".$row->nohportu."</td>";
				echo "<td>".$row->keterangan."</td>";
				echo "<td>
								<a class='btn btn-warning btn-sm update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formeditdata' data-id='".$row->idsiswa."' data-nis='".$row->nis."' data-nama='".$row->nama."' data-alamat='".$row->alamat."' data-kelas='".$row->kelas."' data-namaortu='".$row->namaortu."' data-nohportu='".$row->nohportu."' data-keterangan='".$row->keterangan."'>Edit</a>

								<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->idsiswa."' data-nis='".$row->nis."' data-nama='".$row->nama."' data-alamat='".$row->alamat."' data-kelas='".$row->kelas."' data-namaortu='".$row->namaortu."' data-nohportu='".$row->nohportu."' data-keterangan='".$row->keterangan."'>Hapus</a>
					 </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='9' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function simpandata()
	{
		$type 		= $this->input->post('type');
		$nis 		= $this->input->post('nis');
		$namasiswa 	= $this->input->post('namasiswa');
		$alamat 	= $this->input->post('alamat');
		$kelas 		= $this->input->post('kelas');
		$idkelas 	= $this->input->post('idkelas');
		$namaortu 	= $this->input->post('namaortu');
		$notelp 	= $this->input->post('notelp');
		$keterangan = $this->input->post('keterangan');
		// print_r($nis);
		// exit();
		if ($type == 2) {
			$cekdata = $this->model->getdatanis($nis);
			// print_r($cekdata);
			// exit();
			if ($cekdata > 0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$datasimpan = $this->model->saverecords($nis,$namasiswa,$alamat,$kelas,$namaortu,$notelp,$keterangan,$idkelas);
				// print_r($datasimpan);
				// exit();
				if ($datasimpan>0) {
					echo json_encode(array(
						"statusCode"=>200
					));
				}else{
					return false;
				}
			}
		}
	}

	function updatedata()
	{
		$type 		= $this->input->post('type');
		$idsiswa 	= $this->input->post('idsiswa');
		$nis 		= $this->input->post('nis');
		$namasiswa 	= $this->input->post('namasiswa');
		$alamat 	= $this->input->post('alamat');
		$kelas 		= $this->input->post('kelas');
		// print_r($kelas);
		// exit();
		$idkelas 	= $this->input->post('idkelas');
		$namaortu 	= $this->input->post('namaortu');
		$notelp 	= $this->input->post('notelp');
		$keterangan = $this->input->post('keterangan');

		// print_r($type);
		// exit();

		if ($type == 3) {
			$dataupdate = $this->model->updaterecords($idsiswa,$nis,$namasiswa,$alamat,$kelas,$namaortu,$notelp,$keterangan,$idkelas);
			if ($dataupdate > 0) {
				echo json_encode(array(
					"statusCode"=>200
				));
			}else{
				echo json_encode(array(
					"statusCode"=>404
				));
			}

		}
	}

	function getdataidkelas()
	{
		$namakelas = $this->input->post('namakelas');
		// print_r($namakelas);
		// exit();
		$dataidkelas = $this->model->caridataidkelas($namakelas);
		// print_r($dataidkelas);
		// exit();
		if (count($dataidkelas)>0) {
			foreach ($dataidkelas as $row) {
				echo "<input type='hidden' id='tampunganidkelas' value='".$row->idkelas."' readonly='true'>";
				echo "<input type='hidden' id='tampungankelas' value='".$row->namakelas."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function hapusdata()
	{
		$type = $this->input->post('type');
		$id   = $this->input->post('idsiswa');
		if ($type == 4) {
			$this->model->deleterecords($id);
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}
} 
