<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebookperpus extends CI_Controller {

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

	// function do_upload()
	// {
	// 	// $judulbuku = $this->input->post('judulbukuinput');
	// 	// print_r($judulbuku);
	// 	// exit();
	// 	$config['upload_path']          = './asset/ebookfile';
	// 	$config['allowed_types']        = 'pdf|PDF';
	// 	$config['max_size']             = '400000000';
	// 	$config['overwrite']			= TRUE;
	// 	$error 							= null;
	// 	$filekosong 					= 0;
	// 	$config['max_width']            = 1024;
	// 	$config['max_height']           = 768;
	// 	$config['encrypt_name']			= TRUE;
	// 	// if (!empty($_FILES['upfile1']['name'])) {
	// 	// 	if ($_FILES['upfile1']['type']!='application/pdf' and $_FILES['upfile1']['type']!='pdf') {
	// 	// 		$error = $eror.'Type File Dokumen Salah (Harus PDF).';
	// 	// 	}
	// 	// }else{
	// 	// 	$filekosong = 1;
	// 	// }

	// 	if ($error==null and $filekosong!=1 and !empty($_FILES['ebookfileinput']['name'])) {
	// 		if (!empty($_FILES['ebookfileinput']['name'])) {
	// 			$namafile1	=	'tes'.'.pdf';
	// 			$config['file_name']	=	$namafile1;	
	// 		}
	// 	}

	// 	$this->load->library('upload', $config);
	// 		if ($this->upload->do_upload('file'))
	// 		{
	//             $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
 
 //            	$judul= $this->input->post('judulbukuinput');
 //            	// print_r($judul);
 //            	// exit(); //get judul image
 //            	$image= $data['upload_data']['file_name']; //set file name ke variable image
             
 //            	$result= $this->model->simpanebook($judul,$image); //kirim value ke model m_upload
 //            	echo json_decode($result);
	// 		// 	$error = array('error' => $this->upload->display_errors());
	// 		// 	// $data = array('upload_data' => $this->upload->data());
	// 	 //  		//       $judul= $this->input->post('judul');
	// 	 //  		//       $image= $data['upload_data']['file_name']; 
	// 	 //  		//       $result= $this->model->simpanebook($judul,$image);
	// 	 //  		//       echo json_decode($result);
	// 		// }else{
	// 		// 	$data 	= array('upload_data' => $this->upload->data());
	// 		}
	// }

	function viewajax()
	{
		$data = $this->model->tampildata();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td></td>";
				echo "<td>".$row->judulebook."</td>";
				echo "<td>
							<a href='asset/tes/".$row->ebookfile."' target='_blank' class='btn btn-info btn-sm'>SHOW</a>
							<a href='' class='btn btn-danger btn-sm'>HAPUS</a>
					  </td>";//.$row->ebookfile."</td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='9' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function uploadebook($judulbukuinput,$ebookfileinput){	
		$this->load->library('upload');

		$judulbukuinput = base64_decode($judulbukuinput);
		$ebookfileinput = base64_decode($ebookfileinput);
		// print_r($ebookfileinput);
		// exit();

	    $config['upload_path'] = './asset/tes/';
	    $config['allowed_types'] = 'pdf|PDF';
	    $config['max_size'] = '400000000';
	    $config['overwrite'] = TRUE;

	    $error = null;
	    $filekosong = 0;

    	if(!empty($_FILES['ebookfileinput']['name'])){
				if ($_FILES['ebookfileinput']['type']!='application/pdf' and $_FILES['ebookfileinput']['type']!='pdf') {
					$error = $error.'Type File Dokumen Analisa Benefit Salah (Harus PDF).';
				} 
    	} else {
    		$filekosong = 1;
    	}

	    if ($error==null and $filekosong!=1 and !empty($_FILES['ebookfileinput']['name'])) {
		    $namafile1 = '';
	    	if(!empty($_FILES['ebookfileinput']['name'])){
				$data1 = $this->model->caridata();
				$data2 = $data1+1;	

				$namafile1 = 'FILEEBOOK'.$data2.'.pdf';
				$config['file_name'] = $namafile1;

	    		$this->upload->initialize($config);
	    		if(!$this->upload->do_upload('ebookfileinput')){
	    			$error = array('error' => $this->upload->display_errors());
	    		} else {
	    			$data = array('upload_data' => $this->upload->data());
	    		}
	    	}

	   		if ($error==null) {
    			$simpanebook = $this->model->simpanebook($judulbukuinput,$namafile1);	
    			// $simpanrkapinvestasi = $this->akuntansi4_model->simpanrkapinvestasi($tahun,$dept,$noref,$tipe);	    			
			    if ($simpanebook>0) {
			    	echo "Sukses ! Dokumen Berhasil Di Simpan";
			    } else {
			    	echo "Gagal";
			    }
			} else {
				echo "Gagal ".implode(',', $error);
			}
		} else {
			if ($filekosong==1) {
				echo "Gagal Belum Ada File yang Di Pilih";
			} else {
				echo "Gagal ".$error;
			}
		}
	}
}