<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
	public function index()
	{
		// $this->load->view('utama/utamaview');
		$this->load->view('partial/header');
		$this->load->view('partial/sidebar');
		$this->load->view('partial/breadcrumbs');
		$this->load->view('partial/content');
		$this->load->view('partial/footer');
	}
}
