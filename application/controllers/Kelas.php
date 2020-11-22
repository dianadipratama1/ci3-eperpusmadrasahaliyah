<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('kelasmodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1'){
			$this->load->view('kelas/kelascontent');
		}else{
			echo "Access Denied";
		}	
	}

	function viewajax()
	{
		$data= $this->model->tampildata();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
				foreach ($data as $row) {
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$row->namakelas."</td>";
					echo "<td>
							<a class='btn btn-warning update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#updatekelas' data-id='".$row->idkelas."' data-nmkelas='".$row->namakelas."'>Edit</a> 
							<a class='btn btn-danger' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#deletekelas' data-id='".$row->idkelas."' data-nmkelas='".$row->namakelas."'>Hapus</a></td>";
					echo "</tr>";
					$i++;
				}
		}else{
			echo "<tr><td colspan='3' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function savedata()
	{
		$type = $this->input->post('type');
		$nama =	$this->input->post('namakelas');
		// print_r($nama);
		// exit();
		if ($type == 2) {
			$cekdata = $this->model->carinamakelas($nama);
			// print_r($cekdata);
			// exit();
			if ($cekdata > 0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$datasimpan = $this->model->saverecords($nama);
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

	function updaterecords(){
		$type 	=	$this->input->post('type');
		$id 	=	$this->input->post('idkelas');
		$nama 	=	$this->input->post('namakelas');
		// print_r($nama);
		// exit();

		if ($type == 3) {
			$cekdata = $this->model->carinamakelasedit($nama);
			// print_r($cekdata);
			// exit();
			if ($cekdata > 0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$dataupdate = $this->model->updaterecords($id,$nama);
				if ($dataupdate > 0) {
					echo json_encode(array(
			 			"statusCode"=>200
		 			));
				}else{
					return false;
				}
				// print_r($dataupdate);
				// exit();
			}
		} 
	}

	function deleterecords(){
		if($this->input->post('type')==4)
		{
			$id=$this->input->post('idkelas');
			$nama=$this->input->post('namakelas');
			$this->model->deleterecords($id,$nama);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}
} 
