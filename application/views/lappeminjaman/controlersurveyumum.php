<?php
  function reportsurveyumum(){  
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    if(!$pageWasRefreshed) {
      $this->vis_model->hitcount('UMUM','REPORT SURVEY KEPUASAN PELAYANAN UMUM');
    }    
    $this->xajax->register(XAJAX_FUNCTION, array('getreportsurvey',&$this,'getreportsurvey'));
    $this->xajax->processRequest();
    $data['dept'] = $this->sdm_model->getDeptSDM1();    
    $data['xajax_js'] = $this->xajax->getJavascript();
    $this->load->view('sdm\reportsurveyumum',$data);   
  }

function getreportsurvey($tanggal1,$tanggal2){  
  $style = "odd";
  $objResponse = new xajaxResponse();
  $html = '';
  $print = '';
  $c=0;
  $nom=0;
  $totalkm=0;
  $totalcm=0;
  $totalsm=0;
  $persenkm=0;
  $persencm=0;
  $persensm=0;
  $ratakm=0;
  $ratacm=0;
  $ratasm=0;
  $no=0;  
  $data = $this->sdm1_model->getreportsurvey($tanggal1,$tanggal2);  
  if($data<>0)
  {
    foreach($data as $row)
    {
      $totalkm=$totalkm+$row->nilai1;
      $totalcm=$totalcm+$row->nilai2;
      $totalsm=$totalsm+$row->nilai3;

      if($row->totalnilai<>0){
        $ratakm=($totalkm/($row->totalnilai*30))*100;
        $ratacm=($totalcm/($row->totalnilai*30))*100;
        $ratasm=($totalsm/($row->totalnilai*30))*100;

        $persenkm=($row->nilai1/$row->totalnilai)*100;
        $persencm=($row->nilai2/$row->totalnilai)*100;
        $persensm=($row->nilai3/$row->totalnilai)*100;

      }else{
        $ratakm=0;
        $ratacm=0;
        $ratasm=0;

        $persenkm=0;
        $persencm=0;
        $persensm=0;
      }  
      $total = $row->totalnilai;    
        $no++;
        $html = $html."<tr class='".$style."' bgcolor=#D2FDFF >
                      <td  class='left' align='center'><b>".$no."</td>
                      <td class='left' >".$row->keterangan."</td>
                      <td class='left' align='center'>".$row->nilai1."</td>
                      <td class='left' align='right'>".number_format($persenkm,2,'.',',')."</td>
                      <td class='left' align='center'>".$row->nilai2."</td>
                      <td class='left' align='right'>".number_format($persencm,2,'.',',')."</td>
                      <td class='left' align='center'>".$row->nilai3."</td>
                      <td class='left' align='right'>".number_format($persensm,2,'.',',')."</td>
                      <td class='left' align='center'>".$row->totalnilai."</td></tr>";
    }
    $objResponse->Assign("cetak","disabled",false);
    $objResponse->Assign("grafik","disabled",false);
  }else{
    $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
  } 
  $html = $html."<tr class='".$style."'><td  bgcolor=#3399FF  class='left' align='center' colspan='2'><b>RATA-RATA (%)</td><td  bgcolor=#3399FF  class='left' align='center' colspan=2><b>".number_format(($totalkm/($total*10))*100,2,'.',',')."%</td><td  bgcolor=#3399FF  class='left' align='center' colspan=2><b>".number_format(($totalcm/($total*10))*100,2,'.',',')."%</td><td  bgcolor=#3399FF  class='left' align='center' colspan=2><b>".number_format(($totalsm/($total*10))*100,2,'.',',')."%</td><td  bgcolor=#3399FF  class='left' align='right'>".''."</td></tr>";                                   
  $objResponse->Assign("datasurvey","innerHTML", $html);
  return $objResponse;
}

function cetaksurveyumum($tanggal1,$tanggal2){
  $tanggal1 = urldecode($tanggal1);
  $tanggal2 = urldecode($tanggal2);       
  define('FPDF_FONTPATH',$this->config->item('fonts_path'));
  $data['datasurvey'] = $this->sdm1_model->getreportsurvey($tanggal1,$tanggal2); 
  $this->load->view('sdm\cetaksurveyumum', $data);
}