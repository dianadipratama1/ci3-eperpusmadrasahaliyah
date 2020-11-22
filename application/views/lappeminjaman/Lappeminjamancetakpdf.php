<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
      <!-- FUSION CHARTS -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library School</title>
    <link rel="shortcut icon" href="<?php echo base_url('asset/image/logoalmuawanah.png');?>"/>
  </head>
  <body>
  <?php
    $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR BARANG',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(100,6,'Nama Barang',1,0,'C');
        $pdf->Cell(35,6,'Harga',1,0,'C');
        $pdf->Cell(15,6,'Stok',1,1,'C');

        $pdf->SetFont('Arial','',10);
        // $barang = $this->db->get('peminjaman')->result();
        $no=0;
        foreach ($datapinjam as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(100,6,$data->nama_barang,1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->harga, 0, ".", "."),1,0);
            $pdf->Cell(15,6,$data->stok,1,1);
            $no++;
        }
        $pdf->Output();
  }
  ?>   
</body>
</html>