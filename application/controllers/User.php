<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('usermodel','model');
		$this->load->library('encryption');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2'){
			$data['roleuser'] = $this->model->getdataroleuser();
			$this->load->view('user/usercontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function viewajax()
	{
		$data = $this->model->tampildata();
		// print_r($data);
		// exit();
		// $hashpasswd = $this->encryption->decrypt($data['passwd']);
		// print_r($hashpasswd);
		// exit();

		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				// $hashpasswd = $this->encryption->decrypt($row->passwd);
				// print_r($hashpasswd);
				// exit();
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->nip."</td>";
				echo "<td>".$row->nmpgw."</td>";
				echo "<td>".$row->nmuser."</td>";
				// echo "<td>".$row->passwd."</td>";
				echo "<td>".$row->roleuser."</td>";
				echo "<td>".$row->alamat."</td>";
				echo "<td>".$row->notelp."</td>";
				echo "<td>".$row->keterangan."</td>";
				echo "<td>
								<a class='btn btn-warning btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formeditdata' data-id='".$row->iduser."' data-nip='".$row->nip."' data-nmpgw='".$row->nmpgw."' data-nmuser='".$row->nmuser."' data-passwd='".$row->passwd."' data-roleuser='".$row->roleuser."' data-alamat='".$row->alamat."' data-notelp='".$row->notelp."' data-keterangan='".$row->keterangan."'>Edit</a>

								<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->iduser."' data-nip='".$row->nip."' data-nmpgw='".$row->nmpgw."' data-nmuser='".$row->nmuser."' data-passwd='".$row->passwd."' data-roleuser='".$row->roleuser."' data-alamat='".$row->alamat."' data-notelp='".$row->notelp."' data-keterangan='".$row->keterangan."'>Hapus</a>

								
					 </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='10' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function getidroleuser()
	{
		$roleuser = $this->input->post('roleuser');
		// print_r($namakelas);
		// exit();
		$dataidroleuser = $this->model->caridataidroleuser($roleuser);
		// print_r($dataidlokasi);
		// exit();
		if (count($dataidroleuser)>0) {
			foreach ($dataidroleuser as $row) {
				echo "<input type='hidden' id='tampunganidroleuserinput' value='".$row->idroleuser."' readonly='true'>";
				echo "<input type='hidden' id='tampunganroleuserinput' value='".$row->roleuser."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function getidroleuseredit()
	{
		$roleuser = $this->input->post('roleuser');
		// print_r($namakelas);
		// exit();
		$dataidroleuser = $this->model->caridataidroleuser($roleuser);
		// print_r($dataidlokasi);
		// exit();
		if (count($dataidroleuser)>0) {
			foreach ($dataidroleuser as $row) {
				echo "<input type='hidden' id='tampunganidroleuseredit' value='".$row->idroleuser."' readonly='true'>";
				echo "<input type='hidden' id='tampunganroleuseredit2' value='".$row->roleuser."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function simpandata()
	{
		$this->load->library('encryption');

		$type 		= $this->input->post('type');
		$nip		= $this->input->post('nip');
		$nmpgw		= $this->input->post('nmpgw');
		$nmuser 	= $this->input->post('nmuser');
		$passwd 	= $this->input->post('passwd');
		// $hashpasswd = MD5($passwd);
		$hashpasswd = $this->encryption->encrypt($passwd);

		// $decrypt = $this->encryption->decrypt($hashpasswd);
		// print_r($hashpasswd);
		// var_dump($decrypt);
		// exit();
		$idroleuser	= $this->input->post('idroleuser');
		$roleuser	= $this->input->post('roleuser');
		$alamat		= $this->input->post('alamat');
		$notelp 	= $this->input->post('notelp');
		$keterangan = $this->input->post('keterangan');
		// print_r($nis);
		// exit();
		if ($type == 2) {
			$cekdata = $this->model->getdatanip($nip);
			// print_r($cekdata);
			// exit();
			if ($cekdata > 0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$datasimpan = $this->model->saverecords($nip,$nmpgw,$nmuser,$passwd,$alamat,$notelp,$keterangan,$idroleuser,$roleuser);
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
		$id 		= $this->input->post('id');
        $nip    	= $this->input->post('nip');
        $nmpgw    	= $this->input->post('nmpgw');
        $nmuser    	= $this->input->post('nmuser');
        $passwd 	= $this->input->post('passwd');
        $idroleuser = $this->input->post('idroleuser');
        $roleuser 	= $this->input->post('roleuser');
        $alamat 	= $this->input->post('alamat');
        $notelp 	= $this->input->post('notelp');
        $keterangan = $this->input->post('keterangan');
		// print_r($keterangan);
		// exit();

		if ($type == 3){
			$dataupdate = $this->model->updaterecords($id,$nip,$nmpgw,$nmuser,$passwd,$idroleuser,$roleuser,$alamat,$notelp,$keterangan);
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

	function hapusdata()
	{
		$type = $this->input->post('type');
		$id   = $this->input->post('iduser');
		if ($type == 4) {
			$this->model->deleterecords($id);
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}
} 
