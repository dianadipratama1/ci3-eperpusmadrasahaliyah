<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('rolemodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{		
		if($this->session->userdata('level')==='1'){
			$this->load->view('role/rolecontent');
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
					echo "<td>".$row->roleuser."</td>";
					// echo "<td>
					// 		<a class='btn btn-warning update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#updatekelas' data-id='".$row->idkelas."' data-nmkelas='".$row->namakelas."'>Edit</a> 
					// 		<a class='btn btn-danger' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#deletekelas' data-id='".$row->idkelas."' data-nmkelas='".$row->namakelas."'>Hapus</a></td>";
					echo "</tr>";
					$i++;
				}
		}else{
			echo "<tr><td colspan='2' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

} 
