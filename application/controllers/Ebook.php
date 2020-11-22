<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('ebookmodel','model');
		// if($this->session->userdata('logged_in') !== TRUE){
		// 	redirect('Login');
		// }
	}

	function index()
	{
		// if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2'){
		// 	// $this->load->view('dashboard/dashboardcontent');
		// 	$data['namakategori'] 	= $this->model->getdatakategori();
		// 	$data['lokasirak'] 		= $this->model->getdatalokasirak();
		$this->load->view('ebook/ebookcontent');

		// }else{
		// 	echo "Access Denied";
		// }
	}

} 
