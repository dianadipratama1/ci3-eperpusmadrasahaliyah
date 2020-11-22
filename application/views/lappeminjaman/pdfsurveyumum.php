
    <?php    

		ob_start(); 

		date_default_timezone_set('Asia/Jakarta');

		class PDF extends FPDF {
		}
		
		// $pdf=new PDF_Multicellmax(); 
		$pdf->Open();
		$pdf->AliasNbPages();
		$pdf->AddPage('P','Legal');

		$pdf->Image(base_url().'image/logo1.png', 10, 5, 20, 18); 
		$pdf->SetMargins(4, 2);

		$pdf->SetXY(15,10);
		$pdf->SetFont('Times','B',10);
		$namasales='';
		$tglentry='';
		$pdf->MultiCell(180,4,'.: SURVEY KEPUASAN PELAYANAN UMUM :.',0,'C',0,1);
		foreach ($datasurvey as $rowh) {
			$tgl1=$rowh->tgl1;
			$tgl2=$rowh->tgl2;
		}
		$pdf->SetXY(15,14);
		$pdf->SetFont('Times','',8);
		$pdf->SetXY(15,26);
		$pdf->MultiCell(50,4,'Periode' ,0,'J',0,1);
		$pdf->SetXY(55,26);
		$pdf->MultiCell(50,4,':  '.date('d F Y', strtotime($tgl1)).' s/d '.date('d F Y', strtotime($tgl2)) ,0,'L',0,1);			

		$pdf->SetFont('Times','',7);
		$pdf->SetXY(15,36);
		$pdf->MultiCell(7,5,"No",'LTR','C',0,1);		
		$pdf->SetXY(22,36);
		$pdf->MultiCell(115,5,"Pertanyaan",'LT','C',0,1);
		$pdf->SetXY(137,36);
		$pdf->MultiCell(20,5,"Kurang",'LT','C',0,1);		
		$pdf->SetXY(157,36);
		$pdf->MultiCell(20,5,"Cukup",'LT','C',0,1);						
		$pdf->SetXY(177,36);
		$pdf->MultiCell(20,5,"Sangat",'LT','C',0,1);								
		$pdf->SetXY(197,36);
		$pdf->MultiCell(10,5,"Total",'LTR','C',0,1);																		

		$pdf->SetXY(15,41);
		$pdf->MultiCell(7,5,"",'LR','C',0,1);		
		$pdf->SetXY(22,41);
		$pdf->MultiCell(115,5,"",'LR','C',0,1);
		$pdf->SetXY(137,41);
		$pdf->MultiCell(10,5,"Jumlah",'LT','C',0,1);		
		$pdf->SetXY(147,41);
		$pdf->MultiCell(10,5,"%",'LT','C',0,1);				
		$pdf->SetXY(157,41);
		$pdf->MultiCell(10,5,"Jumlah",'LT','C',0,1);						
		$pdf->SetXY(167,41);
		$pdf->MultiCell(10,5,"%",'LT','C',0,1);						
		$pdf->SetXY(177,41);
		$pdf->MultiCell(10,5,"Jumlah",'LT','C',0,1);								
		$pdf->SetXY(187,41);
		$pdf->MultiCell(10,5,"%",'LTR','C',0,1);																				
		$pdf->SetXY(197,41);
		$pdf->MultiCell(10,5,"",'LR','C',0,1);																						
		$no = 0;
		$totalkm=0;
		$totalcm=0;
		$totalsm=0;
		$persenkm=0;
		$persencm=0;
		$persensm=0;
		$ratakm=0;
		$ratacm=0;
		$ratasm=0;		
		foreach ($datasurvey as $rowd) {
			$x = $pdf->setX(15);
			$y = $pdf->y;
			$no++;
		    $totalkm=$totalkm+$rowd->nilai1;
		    $totalcm=$totalcm+$rowd->nilai2;
		    $totalsm=$totalsm+$rowd->nilai3;

		    if($rowd->totalnilai<>0){
		        $ratakm=($totalkm/($rowd->totalnilai*30))*100;
		        $ratacm=($totalcm/($rowd->totalnilai*30))*100;
		        $ratasm=($totalsm/($rowd->totalnilai*30))*100;

		        $persenkm=($rowd->nilai1/$rowd->totalnilai)*100;
		        $persencm=($rowd->nilai2/$rowd->totalnilai)*100;
		        $persensm=($rowd->nilai3/$rowd->totalnilai)*100;
		    }else{
		        $ratakm=0;
		        $ratacm=0;
		        $ratasm=0;

		        $persenkm=0;
		        $persencm=0;
		        $persensm=0;
		    }  
		    $total = $rowd->totalnilai;    
			$pdf->SetXY(15,$y);
			$pdf->MultiCell(7,5,$no,'LTB','C',0,1);		
			$pdf->SetXY(22,$y);
			$pdf->MultiCell(115,5,@$rowd->keterangan,'LTB','L',0,1);
			$pdf->SetXY(137,$y);
			$pdf->MultiCell(10,5,@$rowd->nilai1,'LTB','C',0,1);		
			$pdf->SetXY(147,$y);
			$pdf->MultiCell(10,5,number_format(@$persenkm,2,'.',','),'LTB','R',0,1);				
			$pdf->SetXY(157,$y);
			$pdf->MultiCell(10,5,@$rowd->nilai2,'LTB','C',0,1);							
			$pdf->SetXY(167,$y);
			$pdf->MultiCell(10,5,number_format(@$persencm,2,'.',','),'LTB','R',0,1);
			$pdf->SetXY(177,$y);
			$pdf->MultiCell(10,5,@$rowd->nilai3,'LTB','C',0,1);			
			$pdf->SetXY(187,$y);
			$pdf->MultiCell(10,5,number_format(@$persensm,2,'.',','),'LTB','R',0,1);						
			$pdf->SetXY(197,$y);
			$pdf->MultiCell(10,5,@$rowd->totalnilai,'LTRB','R',0,1);		
		}		
		$y=$y+5;
		$pdf->SetXY(15,$y);
		$pdf->MultiCell(122,5,"RATA-RATA (%)",'LB','C',0,1);
		$pdf->SetXY(137,$y);
		$pdf->MultiCell(20,5,number_format(($totalkm/($total*10))*100,2,'.',','),'LB','C',0,1);		
		$pdf->SetXY(157,$y);
		$pdf->MultiCell(20,5,number_format(($totalkm/($total*10))*100,2,'.',','),'LB','C',0,1);						
		$pdf->SetXY(177,$y);
		$pdf->MultiCell(20,5,number_format(($totalkm/($total*10))*100,2,'.',','),'LB','C',0,1);								
		$pdf->SetXY(197,$y);
		$pdf->MultiCell(10,5,"",'LBR','C',0,1);																				

		$pdf->Output("Report Survey Kepuasan Pelayanan Umum.pdf","I");		
 	?>   
