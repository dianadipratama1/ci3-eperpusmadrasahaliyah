<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoribuku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('kategoribukumodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1'){
			$this->load->view('kategoribuku/kategoribukucontent');
		}else{
			echo "Access Denied";
		}
	}

	function viewajax(){
		$data= $this->model->tampildata();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
				foreach ($data as $row) {
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$row->nmkategori."</td>";
					echo "<td>
							<a class='btn btn-warning update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#updatekategoribuku' data-id='".$row->idkategoribuku."' data-nmkategoribuku='".$row->nmkategori."'>Edit</a> 
							<a class='btn btn-danger' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#deletekategoribuku' data-id='".$row->idkategoribuku."' data-nmkategoribuku='".$row->nmkategori."'>Hapus</a></td>";
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
		$nama = $this->input->post('nmkategori');

		if ($type == 2) {
			$cekdata = $this->model->carinamakategori($nama);
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
		// if ($this->input->post('type')==2) {
		// 	$nama = $this->input->post('namakategori');
		// 	$this->model->saverecords($nama); 
		// 	$cekdata = $this->model->carinamakategori($nama);
		// 	if (count($cekdata)<=1) {
		// 		echo json_encode(array(
		// 			"statusCode"=>200
		// 		));
		// 	}else{
		// 		echo json_encode(array(
		// 			"statusCode"=>404
		// 		));
		// 	}	
		// }
	}

	function updaterecords()
	{
		$id 	=	$this->input->post('idkategori');
		$nama 	=	$this->input->post('namakategori');
		// print_r($nama);
		// exit();
		$type	=	$this->input->post('type');

		if ($type == 3) {
			$cekdata = $this->model->carinamakategoriedit($nama);
			if ($cekdata > 0) {
				echo json_encode(array(
						"statusCode"=>404
				));
			}else{
				$dataupdate = $this->model->updaterecords($id,$nama);
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
		// if($this->input->post('type')==3)
		// {
		// 	$id 	=	$this->input->post('idkategori');
		// 	$nama 	=	$this->input->post('nmkategori');
		// 	$this ->model->updaterecords($id,$nama);
		// 	$cekdata = $this->model->carinamakategori($nama);
		// 	// $cek = count($cekdata)<=1;
		// 	// print_r($cek);
		// 	// exit();
		// 	if (count($cekdata)<=1) {
		// 		echo json_encode(array(
		// 			"statusCode"=>200
		// 		));
		// 	}else{
		// 		echo json_encode(array(
		// 			"statusCode"=>404
		// 		));
		// 	}
		// } 
	}

	function deleterecords()
	{
		if($this->input->post('type')==4)
		{
			$id=$this->input->post('idkategori');
			$nama=$this->input->post('namakategori');
			$this->model->deleterecords($id,$nama);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}
}
