<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('bukumodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2'){
			// $this->load->view('dashboard/dashboardcontent');
			$data['namakategori'] 	= $this->model->getdatakategori();
			$data['lokasirak'] 		= $this->model->getdatalokasirak();
			$this->load->view('buku/bukucontent',$data);
		}else{
			echo "Access Denied";
		}
	}

	function viewajax()
	{
		$data = $this->model->tampildata();
		// print_r($data);
		// exit();
		if (count($data)>0) {
			$i = 1;
			foreach ($data as $row) {
				$dt = $row->sts;
				if ($dt>1) {
					$sts = "<a class='btn btn-info btn-sm' disabled='true'>Dipinjam</a>";
				}else{
					$sts = "<a class='btn btn-success btn-sm' disabled='true'>Tersedia</a>";
				}
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->nobuku."</td>";
				echo "<td>".$row->judulbuku."</td>";
				echo "<td>".$row->pengarang."</td>";
				echo "<td>".$row->penerbit."</td>";
				echo "<td>".$row->tahun."</td>";
				echo "<td>".$row->nmkategori."</td>";
				echo "<td>".$row->lokasirak."</td>";
				echo "<td>".$row->keterangan."</td>";
				echo "<td>".$sts."</td>";
				echo "<td>
								<a class='btn btn-warning btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formeditdata' data-id='".$row->idbuku."' data-nobuku='".$row->nobuku."' data-judulbuku='".$row->judulbuku."' data-pengarang='".$row->pengarang."' data-penerbit='".$row->penerbit."' data-tahun='".$row->tahun."' data-nmkategori='".$row->nmkategori."' data-lokasirak='".$row->lokasirak."' data-keterangan='".$row->keterangan."'>Edit</a>

								<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->idbuku."' data-nobuku='".$row->nobuku."' data-judulbuku='".$row->judulbuku."' data-pengarang='".$row->pengarang."' data-penerbit='".$row->penerbit."' data-tahun='".$row->tahun."' data-nmkategori='".$row->nmkategori."' data-lokasirak='".$row->lokasirak."' data-keterangan='".$row->keterangan."'>Hapus</a>

								
					 </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='9' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function getidkategoriedit()
	{
		$namakategori = $this->input->post('namakategori');
		// print_r($namakelas);
		// exit();
		$dataidkategori = $this->model->caridataidkategori($namakategori);
		// print_r($dataidkelas);
		// exit();
		if (count($dataidkategori)>0) {
			foreach ($dataidkategori as $row) {
				echo "<input type='hidden' id='tampunganidkategoriedit' value='".$row->idkategoribuku."' readonly='true'>";
				echo "<input type='hidden' id='tampungannamakategoriedit' value='".$row->nmkategori."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidedit' value=''>";
		}
	}

	function getidlokasiedit()
	{
		$namalokasi = $this->input->post('namalokasi');
		// print_r($namakelas);
		// exit();
		$dataidlokasi = $this->model->caridataidlokasi($namalokasi);
		// print_r($dataidlokasi);
		// exit();
		if (count($dataidlokasi)>0) {
			foreach ($dataidlokasi as $row) {
				echo "<input type='hidden' id='tampunganidlokasiedit' value='".$row->idrak."' readonly='true'>";
				echo "<input type='hidden' id='tampungannamalokasiedit' value='".$row->lokasirak."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}


	function getidkategori()
	{
		$namakategori = $this->input->post('namakategori');
		// print_r($namakelas);
		// exit();
		$dataidkategori = $this->model->caridataidkategori($namakategori);
		// print_r($dataidkelas);
		// exit();
		if (count($dataidkategori)>0) {
			foreach ($dataidkategori as $row) {
				echo "<input type='hidden' id='tampunganidkategoriinput' value='".$row->idkategoribuku."' readonly='true'>";
				echo "<input type='hidden' id='tampungannamakategoriinput' value='".$row->nmkategori."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function getidlokasi()
	{
		$namalokasi = $this->input->post('namalokasi');
		// print_r($namakelas);
		// exit();
		$dataidlokasi = $this->model->caridataidlokasi($namalokasi);
		// print_r($dataidlokasi);
		// exit();
		if (count($dataidlokasi)>0) {
			foreach ($dataidlokasi as $row) {
				echo "<input type='hidden' id='tampunganidlokasiinput' value='".$row->idrak."' readonly='true'>";
				echo "<input type='hidden' id='tampungannamalokasiinput' value='".$row->lokasirak."' readonly='true'>";
			}
		}else{
			echo "<input type='hidden' id='tampunganidkelas' value=''>";
		}
	}

	function simpandata(){
		$type 		= $this->input->post('type');
		$nobuku		= $this->input->post('nobuku');
		$judulbuku 	= $this->input->post('judulbuku');
		$pengarang 	= $this->input->post('pengarang');
		$penerbit 	= $this->input->post('penerbit');
		$tahun 		= $this->input->post('tahunterbit');
		$idkategori	= $this->input->post('idkategori');
		$nmkategori	= $this->input->post('nmkategori');
		$idlokasi	= $this->input->post('idlokasi');
		$namalokasi = $this->input->post('nmlokasi');
		$keterangan = $this->input->post('keterangan');
		// print_r($nis);
		// exit();
		if ($type == 2) {
			$cekdata = $this->model->getdatanobuku($nobuku);
			// print_r($cekdata);
			// exit();
			if ($cekdata > 0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$datasimpan = $this->model->saverecords($nobuku,$judulbuku,$pengarang,$penerbit,$tahun,$idkategori,$nmkategori,$idlokasi,$namalokasi,$keterangan);
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

	function updatedata(){
		$type 		= $this->input->post('type');
		$idbuku 	= $this->input->post('id');
		$nobuku		= $this->input->post('nobuku');
		$judulbuku 	= $this->input->post('judulbuku');
		$pengarang 	= $this->input->post('pengarang');
		$penerbit 	= $this->input->post('penerbit');
		$tahun 		= $this->input->post('tahun');
		$idkategori	= $this->input->post('idkategori');
		$nmkategori	= $this->input->post('nmkategori');
		$idlokasi	= $this->input->post('idlokasi');
		$namalokasi = $this->input->post('nmlokasi');
		$keterangan = $this->input->post('keterangan');
		// print_r($keterangan);
		// exit();

		if ($type == 3) {
			$dataupdate = $this->model->updaterecords($idbuku,$nobuku,$judulbuku,$pengarang,$penerbit,$tahun,$idkategori,$nmkategori,$idlokasi,$namalokasi,$keterangan);
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
		$id   = $this->input->post('idbuku');
		if ($type == 4) {
			$this->model->deleterecords($id);
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}

} 
