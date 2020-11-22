<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lappeminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->library('pdf');
		$this->load->model('lappeminjamanmodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2'){
			$this->load->view('lappeminjaman/lappeminjamancontent');
		}else{
			echo "Access Denied";
		}
	}

	function filterdata()
	{
		$tglawal 	= $this->input->post('tglawal');
		$tglakhir 	= $this->input->post('tglakhir');
		$datafilter = $this->model->filterdatatanggalview($tglawal,$tglakhir);
		// print_r($data);
		// exit();
		if (count($datafilter)>0) {
			$i = 1;
			foreach ($datafilter as $row) {
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->kodepinjam."</td>";
				echo "<td>".$row->namasiswa."</td>";
				echo "<td>".$row->judulbuku."</td>";
				echo "<td>".$row->tglpinjam."</td>";
				echo "<td>".$row->tglrencanakembali."</td>";
				// echo "<td>".$row->nmkategori."</td>";
				echo "<td>".$row->lamapinjam."</td>";
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
				echo "<tr><td colspan='8' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function cetakdatapinjam($tglawal,$tglakhir)
	{
		$tglawal	=	urldecode($tglawal);
		$tglakhir	=	urldecode($tglakhir);
		// define('FPDF_FONTPATH',$this->config->item('fonts_path'));
		$data	=	$this->model->getreportpinjam($tglawal,$tglakhir);
		// print_r($data);
		// exit();
		// $this->load->view('Lappeminjaman\Lappeminjamancetakpdf', $data);

		$pdf = new FPDF('L', 'mm','A4');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'Report Data Peminjaman Buku Perpustakaan',0,1,'C');
        $pdf->Cell(0,7,'MA AL MUAWANAH SIDOARJO',0,30,'C');
        $pdf->Cell(0,7,'',0,1,'C');

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(7,6,'No',1,0,'C');
        $pdf->Cell(28,6,'Kode Pinjam',1,0,'C');
        // $pdf->Cell(19,6,'NIS',1,0,'C');
        $pdf->Cell(65,6,'Nama Siswa',1,0,'C');
        // $pdf->Cell(18,6,'No Buku',1,0,'C');
        $pdf->Cell(60,6,'Judul Buku',1,0,'C');
        $pdf->Cell(20,6,'Tgl Pinjam',1,0,'C');
        $pdf->Cell(25,6,'Tgl R.Kembali',1,0,'C');
        $pdf->Cell(15,6,'Durasi',1,0,'C');
        $pdf->Cell(60,6,'Keterangan',1,0,'C');

        $pdf->SetFont('Arial','',10);
        // $barang = $this->db->get('barang')->result();
        $no=1;
        foreach ($data as $row){
            
            $pdf->Ln(6);
            $pdf->Cell(7,6,$no,1,0);
            $pdf->Cell(28,6,$row->kodepinjam,1,0);
            // $pdf->Cell(35,6,"Rp ".number_format($data->harga, 0, ".", "."),1,0);
            // $pdf->Cell(19,6,$row->nis,1,0);
            $pdf->Cell(65,6,$row->namasiswa,1,0);
            // $pdf->Cell(18,6,$row->nobuku,1,0);
            $pdf->Cell(60,6,$row->judulbuku,1,0);
            $pdf->Cell(20,6,$row->tglpinjam,1,0);
            $pdf->Cell(25,6,$row->tglrencanakembali,1,0);
            $pdf->Cell(15,6,$row->lamapinjam,1,0);
            $pdf->Cell(60,6,$row->keterangan,1,0);
            $no++;
        }
        $pdf->Output();
	}

} 
