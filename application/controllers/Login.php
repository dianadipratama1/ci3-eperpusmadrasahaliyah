<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('loginmodel','model');
	}

	function index()
	{
		$this->load->view('login/loginview');
	}

	
    function auth(){
        $username = $this->input->post('username',TRUE);
        // $password = md5($this->input->post('password',TRUE));
        // print_r($username);
        // exit();
        $password = $this->input->post('password',TRUE);
        // print_r($password);
        // exit();
        $validate = $this->model->validate($username,$password);
        // print_r($validate);
        // exit();
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $nama  = $data['nmuser'];
            $level = $data['idroleuser'];
            $sesdata = array(
                'nama'      => $nama,
                'username'  => $username,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for superadmin
            if($level === '1'){
                redirect('Dashboard/superadmin');

            // access login for admin
            }elseif($level === '2'){
                redirect('Dashboard/admin');

            // access login for user
            }else{
                redirect('Dashboard/user');
            }
        }else{
            echo $this->session->set_flashdata('msg','Username Atau Password Salah Atau Belum Terdaftar');
            redirect('Login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
