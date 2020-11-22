<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('dashboardmodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		//Allowing akses to superadmin only
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2' || $this->session->userdata('level')=='3'){
			// $this->load->view('dashboard/dashboardcontent');
			$data['totalanggota'] 			= $this->model->jumlahdataanggota();
			$data['totalbuku'] 				= $this->model->jumlahdatabuku();
			$data['totaluser'] 				= $this->model->jumlahdatauser();
			$data['totalrak'] 				= $this->model->jumlahdatarak();
			$data['totalpeminjaman'] 		= $this->model->jumlahdatapeminjaman();
			$data['totalpengembalian'] 		= $this->model->jumlahdatapengembalian();
			$data['totalkelas'] 			= $this->model->jumlahdatakelas();
			$this->load->view('dashboard/dashboardcontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function superadmin()
	{
		//Allowing akses to superadmin only
		if($this->session->userdata('level')==='1'){
			// $this->load->view('dashboard/dashboardcontent');
			$data['totalanggota'] 			= $this->model->jumlahdataanggota();
			$data['totalbuku'] 				= $this->model->jumlahdatabuku();
			$data['totaluser'] 				= $this->model->jumlahdatauser();
			$data['totalrak'] 				= $this->model->jumlahdatarak();
			$data['totalpeminjaman'] 		= $this->model->jumlahdatapeminjaman();
			$data['totalpengembalian'] 		= $this->model->jumlahdatapengembalian();
			$data['totalkelas'] 			= $this->model->jumlahdatakelas();
			$this->load->view('dashboard/dashboardcontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function admin(){
		//Allowing akses to staff only
		if($this->session->userdata('level')==='2'){
			$data['totalanggota'] 			= $this->model->jumlahdataanggota();
			$data['totalbuku'] 				= $this->model->jumlahdatabuku();
			$data['totaluser'] 				= $this->model->jumlahdatauser();
			$data['totalrak'] 				= $this->model->jumlahdatarak();
			$data['totalpeminjaman'] 		= $this->model->jumlahdatapeminjaman();
			$data['totalpengembalian'] 		= $this->model->jumlahdatapengembalian();
			$data['totalkelas'] 			= $this->model->jumlahdatakelas();
			$this->load->view('dashboard/dashboardcontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function user(){
		//Allowing akses to author only
		if($this->session->userdata('level')==='3'){
			$data['totalanggota'] 			= $this->model->jumlahdataanggota();
			$data['totalbuku'] 				= $this->model->jumlahdatabuku();
			$data['totaluser'] 				= $this->model->jumlahdatauser();
			$data['totalrak'] 				= $this->model->jumlahdatarak();
			$data['totalpeminjaman'] 		= $this->model->jumlahdatapeminjaman();
			$data['totalpengembalian'] 		= $this->model->jumlahdatapengembalian();
		  	$data['totalkelas'] 			= $this->model->jumlahdatakelas();
		  	$this->load->view('dashboard/dashboardcontent',$data);
		}else{
			echo "Access Denied";
		}
	}
}
