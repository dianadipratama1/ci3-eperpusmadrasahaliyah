<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('peminjamanmodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2' || $this->session->userdata('level')=='3'){
			$data['datanis'] 	= $this->model->getdatanis();
			$data['databuku'] 	= $this->model->getdatanobuku();
			$data['judulbuku'] 	= $this->model->getdatabuku();
			$data['kodepinjam']	= $this->model->getkodepinjam();
			$this->load->view('peminjaman/peminjamancontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function viewajaxbuku()
	{
		$data = $this->model->tampildatabuku();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->nobuku."</td>";
				echo "<td>".$row->judulbuku."</td>";
				// echo "<td>".$row->pengarang."</td>";
				// echo "<td>".$row->penerbit."</td>";
				// echo "<td>".$row->tahun."</td>";
				echo "<td>".$row->nmkategori."</td>";
				echo "<td>".$row->lokasirak."</td>";
				echo "<td>".$row->keterangan."</td>";
				// echo "<td>
				// 				<a class='btn btn-warning btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formeditdata' data-id='".$row->idbuku."' data-nobuku='".$row->nobuku."' data-judulbuku='".$row->judulbuku."' data-pengarang='".$row->pengarang."' data-penerbit='".$row->penerbit."' data-tahun='".$row->tahun."' data-nmkategori='".$row->nmkategori."' data-lokasirak='".$row->lokasirak."' data-keterangan='".$row->keterangan."'>Edit</a>

				// 				<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->idbuku."' data-nobuku='".$row->nobuku."' data-judulbuku='".$row->judulbuku."' data-pengarang='".$row->pengarang."' data-penerbit='".$row->penerbit."' data-tahun='".$row->tahun."' data-nmkategori='".$row->nmkategori."' data-lokasirak='".$row->lokasirak."' data-keterangan='".$row->keterangan."'>Hapus</a>

								
				// 	 </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='9' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
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
				$data1 		= date_create($row->tglpinjam);
				$tglpinjam 	= date_format($data1,"d-M-y");
				// print($tglpinjam);
				$data2 = date_create($row->tglrencanakembali);
				$tglrencanakembali = date_format($data2,"d-M-y");
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->kodepinjam."</td>";
				echo "<td>".$row->namasiswa."</td>";
				echo "<td>".$row->judulbuku."</td>";
				echo "<td>".$tglpinjam."</td>";
				echo "<td>".$tglrencanakembali."</td>";
				echo "<td>".$row->lamapinjam."</td>";
				echo "<td>".$row->keterangan."</td>";
				// // echo "<td>".$row->keterangan."</td>";
				// echo "<td>							
				// 			<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->idpinjam."' data-kodepinjam='".$row->kodepinjam."' data-namapeminjam='".$row->namapeminjam."' data-namabuku='".$row->namabuku."' data-tglpinjam='".$row->tglpinjam."' data-tglrencanakembali='".$row->tglrencanakembali."' data-lamapinjam='".$row->lamapinjam."' data-keterangan='".$row->keterangan."'>Kembali</a>

								
				// 	 </td>";
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
		$tglpinjam = $this->input->post('startdate');
		$tglrencanakembali = $this->input->post('enddate');
		// print_r($tglrencanakembali);
		// exit();
		$start 		= 	date_create($tglpinjam);
		$end 		=	date_create($tglrencanakembali);
		$selisih 	= 	date_diff($start,$end);
		$total 		=	$selisih->format('%R%a');

		$hasil		=	intval(strval($total));
		if ($hasil<0) {
			$hasil = intval(strval($total));
		}else{
			$hasil = intval(strval($total+1));
		}
		echo "<input type='text' name='lamapinjaminput' id='lamapinjaminput' style='width: 276px; height: 35px;' placeholder='Lama Pinjam' class='form-control' autocomplete='off' disabled='true' value='".$hasil." hari'>";
	}

	function getnamasiswa()
	{
		$namasiswa = $this->input->post('namasiswa');
		// print_r($namakelas);
		// exit();
		$dataidsiswa = $this->model->carinamasiswa($namasiswa);
		// print_r($dataidkelas);
		// exit();
		if (count($dataidsiswa)>0) {
			foreach ($dataidsiswa as $row) {
				echo "<input type='hidden' id='tampunganidsiswainput' value='".$row->idsiswa."' readonly='true'>";
				echo "<input type='hidden' id='tampungannamasiswainput' value='".$row->nama."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function getjudulbuku()
	{
		$judulbuku = $this->input->post('judulbuku');
		// print_r($namakelas);
		// exit();
		$dataidbuku = $this->model->carijudulbuku($judulbuku);
		// print_r($dataidkelas);
		// exit();
		if (count($dataidbuku)>0) {
			foreach ($dataidbuku as $row) {
				echo "<input type='hidden' id='tampunganidbukuinput' value='".$row->idbuku."' readonly='true'>";
				echo "<input type='hidden' id='tampunganjudulbukuinput' value='".$row->judulbuku."' readonly='true'>";
				// echo "<textarea style='width: 268px;'' rows='3' id='ketinput' name='ketinput' value='".$row->keterangan."' placeholder='   Keterangan'S></textarea>";			
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function getketbuku()
	{
		$nobuku = $this->input->post('nobuku');
		// print_r($namakelas);
		// exit();
		$databuku = $this->model->cariketbuku($nobuku);
		// print_r($dataidkelas);
		// exit();
		if (count($databuku)>0) {
			foreach ($databuku as $row) {
				// echo "<input type='hidden' name='idbukuinput' id='idbukuinput' placeholder='ID BUKU' class='form-control' autocomplete='off' disabled='true' value='".$row->idbuku."'>";
				// echo "<input type='text' style='width: 276px; height: 35px;'' name='judulbukuinput' id='judulbukuinput' placeholder='JUDUL BUKU' class='form-control' autocomplete='off' disabled='true' value='".$row->judulbuku."'>";
				echo "<textarea type='text' style='width: 268px; name='ketinput' rows='3' id='ketinput' placeholder='ID SISWA' class='form-control' autocomplete='off' disabled='true'>".$row->keterangan."</textarea>";
			}
		}else{
			echo "<input type='text' style='width: 276px; height: 35px;' name='ketinput' id='ketinput' class='contoh1' placeholder='Keterangan Buku Atas No Buku ini Belum Ada' class='form-control' autocomplete='off' disabled='true' value=''>";
		}
	}

	function getnamabynis()
	{
		$nis = $this->input->post('nis');
		// print_r($namakelas);
		// exit();
		$datasiswa = $this->model->getnamabynis($nis);
		// print_r($dataidkelas);
		// exit();
		if (count($datasiswa)>0) {
			foreach ($datasiswa as $row) {
				echo "<input type='hidden' name='idsiswainput' id='idsiswainput' placeholder='ID SISWA' class='form-control' autocomplete='off' disabled='true' value='".$row->idsiswa."'>";
				echo "<input type='text' style='width: 276px; height: 35px;'' name='namasiswainput' id='namasiswainput' placeholder='ID SISWA' class='form-control' autocomplete='off' disabled='true' value='".$row->nama."'>";
			}
		}else{
			echo "<input type='text' style='width: 276px; height: 35px;' name='namasiswainput' id='namasiswainput' class='contoh1' placeholder='Nama Siswa Atas NIS ini Belum Ada' class='form-control' autocomplete='off' disabled='true' value=''>";
		}
	}

	function getjudulbukubynobuku()
	{
		$nobuku = $this->input->post('nobuku');
		// print_r($namakelas);
		// exit();
		$databuku = $this->model->getjudulbukubynobuku($nobuku);
		// print_r($dataidkelas);
		// exit();
		if (count($databuku)>0) {
			foreach ($databuku as $row) {
				echo "<input type='hidden' name='idbukuinput' id='idbukuinput' placeholder='ID BUKU' class='form-control' autocomplete='off' disabled='true' value='".$row->idbuku."'>";
				echo "<input type='text' style='width: 276px; height: 35px;'' name='judulbukuinput' id='judulbukuinput' placeholder='JUDUL BUKU' class='form-control' autocomplete='off' disabled='true' value='".$row->judulbuku."'>";
			}
		}else{
			echo "<input type='text' style='width: 276px; height: 35px;' name='namasiswainput' id='namasiswainput' class='contoh1' placeholder='Judul Buku Atas No Buku ini Belum Ada' class='form-control' autocomplete='off' disabled='true' value=''>";
		}
	}

	function simpandata()
	{
		$type 				= $this->input->post('type');
		$kodepinjam 		= $this->input->post('kodepinjam');
		$nis 				= $this->input->post('nis');
		$idsiswa 			= $this->input->post('idsiswa');
		$namasiswa 			= $this->input->post('namasiswa');
		$nobuku 			= $this->input->post('nobuku');
		$judulbuku 			= $this->input->post('judulbuku');
		$idbuku 			= $this->input->post('idbuku');
		$valtglpinjam 			= $this->input->post('tglpinjam');
			$createtglpinjam	= date_create($valtglpinjam);
			$tglpinjam			= date_format($createtglpinjam,"Y-m-d");
		// print_r($tglpinjam);
		// exit();
		$valtglrencanakembali 			= $this->input->post('tglrencanakembali');
			$createtglrencanakembali	= date_create($valtglrencanakembali);
			$tglrencanakembali			= date_format($createtglrencanakembali,"Y-m-d");
		// print_r($tglrencanakembali);
		// exit();
		$lamapinjam 	= $this->input->post('lamapinjam');
		$keterangan 	= $this->input->post('keterangan');
		$sts 			= $this->input->post('sts');

		if ($type==2) {
			$cekkodepinjam 	= $this->model->cekkodepinjam($kodepinjam);
			// print_r($cekkodepinjam);
			// exit();
			if ($cekkodepinjam>0) {
				echo json_encode(array(
					"statusCode"=>405
				));
			}else{
				$datapinjam = $this->model->simpandata($kodepinjam,$nis,$idsiswa,$namasiswa,$nobuku,$judulbuku,$idbuku,$tglpinjam,$tglrencanakembali,$lamapinjam,$keterangan,$sts);
				if ($datapinjam>0) {
					echo json_encode(array(
						"statusCode"=>200
					));
				}else{
					echo json_encode(array(
						"statusCode"=>406
					));
				}
			}
		}else{
			echo json_encode(array(
				"statusCode"=>404
			));
		}
	}

} 
