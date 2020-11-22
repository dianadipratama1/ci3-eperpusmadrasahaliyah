<?php 
function getreportsurvey($tanggal1,$tanggal2){
  $data1=null;
  $nom=0;

  $xtg1=date_format(date_create($tanggal1),'Y-m-d');
  $xtg2=date_format(date_create($tanggal2),'Y-m-d');

  $dbb = $this->load->database('fb1',true);  

  $item=array( 
                  '1' => 'p1',
                  '2' => 'p2',
                  '3' => 'p3',
                  '4' => 'p4',
                  '5' => 'p5',
                  '6' => 'p6',
                  '7' => 'p7',
                  '8' => 'p8'
              );

    $data=null;

    $sql="SELECT `COLUMN_NAME` as pertanyaan FROM `INFORMATION_SCHEMA`.`COLUMNS` 
          WHERE `TABLE_SCHEMA`='datavis' AND `TABLE_NAME`='surveyumum' 
          and (`COLUMN_NAME`='".$item[1]."' or `COLUMN_NAME`='".$item[2]."' or `COLUMN_NAME`='".$item[3]."'
            or `COLUMN_NAME`='".$item[4]."' or `COLUMN_NAME`='".$item[5]."' or `COLUMN_NAME`='".$item[6]."'
            or `COLUMN_NAME`='".$item[7]."' or `COLUMN_NAME`='".$item[8]."')";
    $query = $dbb->query($sql);
    foreach ($query->result() as $key=>$row)
    {
      $data[] = $row;

      if($row->pertanyaan=='p1'){
        $kettanya='Bagaimana menurut anda pelayanan umum ditempat anda bekerja ?';
      }

      if($row->pertanyaan=='p2'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam membersihkan tempat anda bekerja ?';
      }

      if($row->pertanyaan=='p3'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam pengiriman dokumen untuk/ oleh pihak eksternal ?';
      }

      if($row->pertanyaan=='p4'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam pelayanan kendaraan ?';
      }

      if($row->pertanyaan=='p5'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam penerimaan tamu ?';
      }

      if($row->pertanyaan=='p6'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam penerimaan telepon baik untuk/ oleh pihak eksternal ?';
      }

      if($row->pertanyaan=='p7'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam pengamanan tempat anda bekerja ?';
      }

      if($row->pertanyaan=='p8'){
        $kettanya='Bagaimana menurut anda pelayanan umum dalam pengelolaan dokumen arsip ?';
      }

      $data[$key]->{'keterangan'} = $kettanya;
      $data[$key]->{'tgl1'} = $xtg1;
      $data[$key]->{'tgl2'} = $xtg2;

      $totnilai=0;
      for ($j=1; $j < 4; $j++)
      { 
        $sql1 = "select count(".$row->pertanyaan.") as jum from surveyumum where ".$row->pertanyaan."='".$j."' and tgl between '".$xtg1."' and '".$xtg2."'";        
        // $sql1 = $sql1.$caridept1.$carijabatan.$cariusia.$carijenis;
        $query = $dbb->query($sql1);
        foreach ($query->result() as $row1)
        {   
            $data[$key]->{'nilai'.$j} = $row1->jum;
            $totnilai = $totnilai+$row1->jum;
        }        
        $data[$key]->{'totalnilai'} = $totnilai;
      }      
    }
    return $data;              
}