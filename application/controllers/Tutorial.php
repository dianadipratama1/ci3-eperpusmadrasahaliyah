<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

	function index()
	{
		$this->load->view('tutorial/tutorialview');
	}

} 
