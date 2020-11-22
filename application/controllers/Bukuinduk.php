<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukuinduk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url'); 
		// $this->load->database();
		$this->load->model('bukuindukmodel','model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('Login');
		}
	}

	function index()
	{
		if($this->session->userdata('level')==='1' || $this->session->userdata('level')=='2'){
			$this->load->view('bukuinduk/bukuindukcontent');
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
				// $dt = $row->sts;
				// if ($dt>1) {
				// 	$sts = "<a class='btn btn-info btn-sm' disabled='true'>Dipinjam</a>";
				// }else{
				// 	$sts = "<a class='btn btn-success btn-sm' disabled='true'>Tersedia</a>";
				// }
				// $tgldibukukan = $row->tgldibukukan;

				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row->noindukbuku."</td>";
				echo "<td>".$row->noklasifikasi."</td>";
				echo "<td>".$row->tgldibukukan."</td>";
				echo "<td>".$row->judulbuku."</td>";
				echo "<td>".$row->pengarang."</td>";
				echo "<td>".$row->penerbit."</td>";
				echo "<td>".$row->tahunasal."</td>";
				echo "<td>".$row->jmlhalaman."</td>";
				echo "<td>".$row->ukuranbuku."</td>";
				echo "<td>".$row->jmlbuku."</td>";
				echo "<td>".$row->keterangan."</td>";
				// echo "<td>".$sts."</td>";
				echo "<td>
								<a class='btn btn-warning btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formeditdata' data-id='".$row->idbukuinduk."' data-noindukbuku='".$row->noindukbuku."' data-noklasifikasi='".$row->noklasifikasi."' data-tgldibukukan='".$row->tgldibukukan."' data-judulbuku='".$row->judulbuku."' data-pengarang='".$row->pengarang."' data-penerbit='".$row->penerbit."' data-tahunasal='".$row->tahunasal."' data-jumlahhalaman='".$row->jmlhalaman."' data-ukuranbuku='".$row->ukuranbuku."' data-jumlahbuku='".$row->jmlbuku."' data-keterangan='".$row->keterangan."'>Edit</a>

								<a class='btn btn-danger btn-sm' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formhapusdata' data-id='".$row->idbukuinduk."' data-noindukbuku='".$row->noindukbuku."' data-noklasifikasi='".$row->noklasifikasi."' data-tgldibukukan='".$row->tgldibukukan."' data-judulbuku='".$row->judulbuku."' data-pengarang='".$row->pengarang."' data-penerbit='".$row->penerbit."' data-tahunasal='".$row->tahunasal."' data-jumlahhalaman='".$row->jmlhalaman."' data-ukuranbuku='".$row->ukuranbuku."' data-jumlahbuku='".$row->jmlbuku."' data-keterangan='".$row->keterangan."'>Hapus</a>

								
					 </td>";
								// echo "<td><input value='".$row->keterangan."'></td>";
				echo "</tr>";
				$i++;
			}
		}else{
				echo "<tr><td colspan='11' bgcolor='red' align='center'><font color='white'>Tidak Ada Data Yang Ditampilkan</font></td></tr>";
		}
	}

	function exportexcel()
	{
		// Load plugin PHPExcel nya
	    include APPPATH.'third_party\PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	   	$excel->getProperties()->setCreator('MA AL Muawanah')
	    					   ->setLastModifiedBy('MA AL Muawanah')
	                		   ->setTitle("Data Buku Induk")
	                		   ->setSubject("Perpustakaan")
	                 		   ->setDescription("Laporan Semua Data Buku Induk")
	                 		   ->setKeywords("Data Buku Induk");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
						      'font' 		=> array('bold' => true), // Set font nya jadi bold
						      'alignment' 	=> array(
												        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
												        'vertical' 	=> PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
						      						),
						      'borders' 	=> array(
												        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
												        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
												        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
												        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
													)
	    				  );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
						      'alignment' 	=>  array(
												        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
												      ),
						      'borders' 	=>  array(
												        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
												        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
												        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
												        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
							      					)
	    			      );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BUKU INDUK PERPUSTAKAAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->setActiveSheetIndex(0)->setCellValue('A2', "REFERENSI MADRASAH ALIYAH AL-MU'AWANAH");
	    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->mergeCells('A2:E2');
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B4', "NO INDUK BUKU"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C4', "NO KLASIFIKASI"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D4', "TGL DIBUKUKAN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E4', "JUDUL BUKU"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('F4', "PENGARANG"); // Set kolom F3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('G4', "PENERBIT"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('H4', "TAHUN ASAL"); // Set kolom G3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('I4', "JUMLAH HALAMAN"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('J4', "UKURAN BUKU"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('K4', "JUMLAH BUKU"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('L4', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $bukuinduk 	= $this->model->tampildata();
	    $no 	= 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($bukuinduk as $data)
	    { // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->noindukbuku);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->noklasifikasi);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tgldibukukan);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->judulbuku);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->pengarang);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->penerbit);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tahunasal);
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->jmlhalaman);
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->ukuranbuku);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->jmlbuku);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->keterangan);

	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(40); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Laporan Data Buku Induk");
	    $excel->setActiveSheetIndex(0);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data-Buku-Induk.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');
	}

	function simpandata()
	{
		$type 			= $this->input->post('type');
        $nobukuinduk   	= $this->input->post('nobukuinduk');
	    $noklasifikasi 	= $this->input->post('noklasifikasi');
	    $tgldibukukan  	= $this->input->post('tgldibukukan');
	    $judulbuku     	= $this->input->post('judulbuku');
	    $pengarang     	= $this->input->post('pengarang');
	    $penerbit      	= $this->input->post('penerbit');
	    $tahunasal     	= $this->input->post('tahunasal');
	    $jumlahhalaman 	= $this->input->post('jumlahhalaman');
	    $ukuranbuku    	= $this->input->post('ukuranbuku');
	    $jumlahbuku    	= $this->input->post('jumlahbuku');
	    $keterangan    	= $this->input->post('keterangan');

		if ($type == 2) {
			$cekdata = $this->model->getdatanobukuinduk($nobukuinduk);
			// print_r($cekdata);
			// exit();
			if ($cekdata > 0) {
				echo json_encode(array(
					"statusCode"=>404
				));
			}else{
				$datasimpan = $this->model->saverecords($nobukuinduk,$noklasifikasi,$tgldibukukan,$judulbuku,$pengarang,$penerbit,$tahunasal,$jumlahhalaman,$ukuranbuku,$jumlahbuku,$keterangan);
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

	function updatedata()
	{
		$idbukuinduk	= $this->input->post('id');
		$type 			= $this->input->post('type');
        $nobukuinduk   	= $this->input->post('nobukuinduk');
	    $noklasifikasi 	= $this->input->post('noklasifikasi');
	    $tgldibukukan  	= $this->input->post('tgldibukukan');
	    $judulbuku     	= $this->input->post('judulbuku');
	    $pengarang     	= $this->input->post('pengarang');
	    $penerbit      	= $this->input->post('penerbit');
	    $tahunasal     	= $this->input->post('tahunasal');
	    $jumlahhalaman 	= $this->input->post('jumlahhalaman');
	    $ukuranbuku    	= $this->input->post('ukuranbuku');
	    $jumlahbuku    	= $this->input->post('jumlahbuku');
	    $keterangan    	= $this->input->post('keterangan');
		if ($type == 3) {
			$dataupdate = $this->model->updaterecords($idbukuinduk,$nobukuinduk,$noklasifikasi,$tgldibukukan,$judulbuku,$pengarang,$penerbit,$tahunasal,$jumlahhalaman,$ukuranbuku,$jumlahbuku,$keterangan);
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
		$id   = $this->input->post('idbukuinduk');
		if ($type == 4) {
			$this->model->deleterecords($id);
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}
}