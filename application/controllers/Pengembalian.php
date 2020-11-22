<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('pengembalianmodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2' || $this->session->userdata('level')=='3'){
			$data['kodekembali']	= $this->model->getkodekembali();
			$this->load->view('pengembalian/pengembaliancontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function viewajaxpeminjaman()
	{
		$data = $this->model->tampildatapeminjaman();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				$data 				= date_create($row->tglpinjam);
				$tglpinjam 			= date_format($data,"d-M-Y");
				$data1 				= date_create($row->tglrencanakembali);
				$tglrencanakembali 	= date_format($data1,"d-M-Y");
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->kodepinjam."</td>";
				echo "<td>".$row->namasiswa."</td>";
				echo "<td>".$row->judulbuku."</td>";
				echo "<td>".$tglpinjam."</td>";
				echo "<td>".$tglrencanakembali."</td>";
				echo "<td>".$row->lamapinjam."</td>";
				echo "<td>".$row->keterangan."</td>";
				echo "<td>							
							<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formkembalikandata' data-idpinjam='".$row->idpinjam."' data-idbuku='".$row->idbuku."' data-iduser='".$row->iduser."' data-idsiswa='".$row->idsiswa."' data-kodepinjam='".$row->kodepinjam."' data-namasiswa='".$row->namasiswa."' data-judulbuku='".$row->judulbuku."' data-tglpinjam='".$tglpinjam."' data-tglrencanakembali='".$tglrencanakembali."' data-lamapinjam='".$row->lamapinjam."' data-keterangan='".$row->keterangan."' data-nis='".$row->nis."' data-nobuku='".$row->nobuku."' data-sts='".$row->sts."'>Kembali</a>

								
					  </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='9' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Peminjaman Yang Ditampilkan</font></td></tr>";
		}
	}

	function hitunglamapinjam()
	{
		$tglrencanakembali 	= $this->input->post('startdate');
		$tglkembali 		= $this->input->post('enddate');
		// print_r($tglrencanakembali);
		// exit();
		$start 		= 	date_create($tglrencanakembali);
		$end 		=	date_create($tglkembali);
		$selisih 	= 	date_diff($start,$end);
		$total 		=	$selisih->format('%R%a');

		$hasil		=	intval(strval($total));
		// print_r($hasil);
		// exit();
		if ($hasil==0) {
			// $hasil = intval(strval($total."hari"));
			$hasil = "-";
		}else{
			$hasil = intval(strval($total))." "."hari";
		}
		echo "<input type='text' name='terlambatinput' id='terlambatinput' style='width: 276px; height: 35px;' placeholder='Terlambat' class='form-control' autocomplete='off' disabled='true' value='".$hasil."'>";
	}

	function simpandata()
	{
       	$iduser            = $this->input->post('iduser');
	    $idpinjam          = $this->input->post('idpinjam');
	    $idbuku            = $this->input->post('idbuku');
	    $idsiswa           = $this->input->post('idsiswa');
	    $sts               = $this->input->post('sts');
	    $kodekembali       = $this->input->post('kodekembali');
	    $kodepinjam        = $this->input->post('kodepinjam');
	    $nis               = $this->input->post('nis');
	    $namasiswa         = $this->input->post('namasiswa');
	    $nobuku            = $this->input->post('nobuku');
	    $judulbuku         = $this->input->post('judulbuku');
	    $valtglpinjam      = $this->input->post('tglpinjam');
			$createtglpinjam	= date_create($valtglpinjam);
			$tglpinjam			= date_format($createtglpinjam,"Y-m-d");
	    $valtglrencanakembali = $this->input->post('tglrencanakembali');
			$createtglrencanakembali	= date_create($valtglrencanakembali);
			$tglrencanakembali			= date_format($createtglrencanakembali,"Y-m-d");
	    $lamapinjam        = $this->input->post('lamapinjam');
	    $valtglkembali        = $this->input->post('tglkembali');
			$createtglkembali	= date_create($valtglkembali);
			$tglkembali			= date_format($createtglkembali,"Y-m-d");
	    $terlambat         = $this->input->post('terlambat');
	    $keterangan        = $this->input->post('keterangan');
	    $keterangankembali = $this->input->post('keterangankembali');
	    // print_r($keterangankembali);
	    // exit();

	    $datasimpan	= $this->model->simpandata($iduser,$idpinjam,$idbuku,$idsiswa,$sts,$kodekembali,$kodepinjam,$nis,$namasiswa,$nobuku,$judulbuku,$tglpinjam,$tglkembali,$tglrencanakembali,$lamapinjam,$terlambat,$keterangan,$keterangankembali);

	    // $cekkodekembali = $this->model->cekkodekembali($kodekembali);
	    // print_r($idbuku);
	    // exit();
	    if ($datasimpan==1) {
			echo json_encode(array(
				"statusCode"=>408//kode data sudah ada
			));
	    }else{
	    	if ($datasimpan==2) {
	    		echo json_encode(array(
	    			"statusCode"=>200//kode data sudah disimpan
	    		));
	    	}else{
	    		if ($datasimpan==3) {
	    			echo json_encode(array(
	    				"statusCode"=>404//kode data cek database
	    			));
	    		}
	    	}
	    }
	    // print_r($cekkodekembali);
	    // exit();
	}

	function viewajaxpengembalian()
	{
		$data = $this->model->tampildatapengembalian();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				$data 				= date_create($row->tglpinjam);
				$tglpinjam 			= date_format($data,"d-M-Y");
				$data1 				= date_create($row->tglrencanakembali);
				$tglrencanakembali 	= date_format($data1,"d-M-Y");
				$data2 				= date_create($row->tglkembali);
				$tglkembali 		= date_format($data2,"d-M-Y");
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->kodekembali."</td>";
				// echo "<td>".$row->kodepinjam."</td>";
				// echo "<td>".$row->nis."</td>";
				echo "<td>".$row->namasiswa."</td>";
				// echo "<td>".$row->nobuku."</td>";
				echo "<td>".$row->judulbuku."</td>";
				echo "<td>".$tglpinjam."</td>";
				echo "<td>".$tglrencanakembali."</td>";
				echo "<td>".$tglkembali."</td>";
				echo "<td>".$row->lamapinjam."</td>";
				echo "<td>".$row->terlambat."</td>";
				echo "<td>".$row->keterangan."</td>";
				echo "<td>".$row->keterangankembali."</td>";
				// echo "<td>							
				// 			<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formkembalikandata' data-idpinjam='".$row->idpinjam."' data-idbuku='".$row->idbuku."' data-iduser='".$row->iduser."' data-idsiswa='".$row->idsiswa."' data-kodepinjam='".$row->kodepinjam."' data-namasiswa='".$row->namasiswa."' data-judulbuku='".$row->judulbuku."' data-tglpinjam='".$tglpinjam."' data-tglrencanakembali='".$tglrencanakembali."' data-lamapinjam='".$row->lamapinjam."' data-keterangan='".$row->keterangan."' data-nis='".$row->nis."' data-nobuku='".$row->nobuku."' data-sts='".$row->sts."'>Kembali</a>

								
				// 	  </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='11' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Pengembalian Yang Ditampilkan</font></td></tr>";
		}
	}
} 
