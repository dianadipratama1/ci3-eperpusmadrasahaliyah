<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rakbuku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('rakbukumodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1'){
			$this->load->view('rakbuku/rakbukucontent');
		}else{
			echo "Access Denied";
		}
	}

	function viewajax()
	{
		$data = $this->model->tampildata();
		// print_r($data);
		// exit();
		if ($data != NULL) {
			$i = 1;
			foreach ($data as $row) {
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->lokasirak."</td>";
				// echo "<td>".$row->keterangan."</td>";
				echo "<td>
							<a class='btn btn-warning update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formupdatedata' data-id='".$row->idrak."' data-lokasirak='".$row->lokasirak."'>Edit</a>
							<a class='btn btn-danger' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->idrak."' data-lokasirak='".$row->lokasirak."'>Hapus</a>
					</td>";
				echo "</tr>";
				$i++;
			}
		}else{
			echo "<tr>";
				echo "<td colspan='3' bgcolor='red' align='center'><font color='white' >Tidak Ada Data Yang Ditampilkan</font></td>";
			echo "</tr>";
			$i++;
		}
	}

	function savedata(){
		if ($this->input->post('type')==2) {
			$lokasirak = $this->input->post('lokasirak'); 
			$cekdata = $this->model->carilokasirak($lokasirak);
			// print_r($cekdata);
			// exit();
			if ($cekdata>0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$datasimpan = $this->model->simpandata($lokasirak);
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

	function updatedata(){
		$id 	=	$this->input->post('idrak');
		$lokasirak 	=	$this->input->post('lokasirak');
		$type	=	$this->input->post('type');
		// print_r($type);
		// exit();

		if ($type == 3) {
			$cekdata = $this->model->carilokasirak($lokasirak);
			if ($cekdata > 0) {
				echo json_encode(array(
						"statusCode"=>404
				));
			}else{
				$dataupdate = $this->model->updaterecords($id,$lokasirak);
				// print_r($dataupdate);
				// exit();
				if ($dataupdate > 0) {
					echo json_encode(array(
						"statusCode"=>200
					));
				}else{
					return false;
				}
			}
		}
	}

	function deletedata(){
		if($this->input->post('type')==4)
		{
			$id 		=	$this->input->post('idrak');
			$lokasirak 	=	$this->input->post('lokasirak');
			$this->model->deleterecords($id,$lokasirak);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}
} 