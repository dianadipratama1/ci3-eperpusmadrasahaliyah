<link rel="shortcut icon" href="<?=base_url()."icons/vub.ico"?>">
<link href="<?=base_url()."css/menu.css"?>" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" href="<?=base_url()."css/bootstrap/css2/bootstrap.min.css"?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<script type="text/javascript" src="<?=base_url()."js/archive.js"?>"></script>
<script type="text/javascript" src="<?=base_url()."js/style.js"?>"></script> 
<!--- selesai -->
<script src="<?=base_url()."css/bootstrap/js/jquery.min.js"?>"></script>
<script src="<?=base_url()."css/bootstrap/js2/bootstrap.min.js"?>"></script>
<script src="<?=base_url()."css/bootstrap/js2/date_time.js"?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()."css/style-autocompletex.css"?>" />

<?php 
  echo $xajax_js;
?>
<style type="text/css">
  .table th {
     text-align:center !important;
     vertical-align: middle !important;
  }
</style>
<head>
    <meta charset="utf-8" />
    <title>Report Survey Kepuasan Pelayanan Umum </title>
</head>

<!-- <body bgcolor="#666666"  > -->
<body class="page-header-fixed">

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="<?php echo base_url(); ?>image/logovub.png" alt="logo" />
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="surveyumum"><i class="glyphicon glyphicon-file"></i> Entry</a></li>
        <li class="active"><a href="reportsurveyumum"><i class="glyphicon glyphicon-stats"></i> Report</a></li>
        <li><button onclick="location.href='<?=base_url()."index.php/umum/menuumum"?>'" class="btn btn-danger navbar-btn"><i class="glyphicon glyphicon-log-out"></i> Keluar</button></li>
      </ul>
    </div>
  </nav>

<div class="container-fluid" style="margin-top:70px">
  <div class="row">

    <div class="col-sm-3 col-lg-12" style="width: 100%;">

      <!-- /.row --> 
      <div class="panel panel-primary">
        <div class="panel-heading">
          <i class="glyphicon glyphicon-list"></i><strong> REPORT SURVEY KEPUASAN PELAYANAN UMUM</strong>
          <li style="float: right; padding-right: 10px;">
              <i class="glyphicon glyphicon-calendar"></i>
              <span id="date_time"></span>
              <script type="text/javascript">window.onload = date_time('date_time');</script>
          </li>
        </div>
        <div class="panel-body">
          <form class="form-horizontal">
            
<!--             <div class="form-group">
              <label class="col-sm-2 control-label">Departemen</label>
              <div class="col-sm-4">
                <select id="dept" name="dept" class="form-control input-sm" >   
                  <option value='-'>Pilih Dept</option>
                  <?php 
                    foreach ($dept as $row) {
                      echo "<option value='".$row->DEPTID."' >".$row->DEPTID." - ".$row->NAMA."</option>";
                    }
                  ?>
                </select>
              </div>
            </div> -->
            <div class="form-group">
              <label class="col-sm-2 control-label">Periode</label>
              <div class="col-sm-4">
                <div class="input-group date">
                  <input type="text" id="tgl1" name='tgl1' class="form-control input-sm" /><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="text" id="tgl2" name='tgl2' class="form-control input-sm" /><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>
<!--             <div class="form-group">
              <label class="col-sm-2 control-label">Jenis BA</label>
              <div class="col-sm-3">
                <div class="input-group date">
                  <select id="jenisba" name="jenisba" class="form-control input-sm">   
                    <option value='-'>Pilih Jenis BA</option>
                    <option value='BA Surat Jalan Rusak'>BA Surat Jalan Rusak</option>
                    <option value='BA Keterlambatan Pelaporan'>BA Keterlambatan Pelaporan</option>
                    <option value='BA Perubahan Data Order Penjualan (OPJ)'>BA Perubahan Data Order Penjualan (OPJ)</option>
                    <option value='BA Opname Lapangan'>BA Opname Lapangan</option>
                    <option value='BA Produk Dialihkan'>BA Produk Dialihkan</option>
                    <option value='BA Penggunaan Produk Internal'>BA Penggunaan Produk Internal</option>
                    <option value='BA Gendos Dalam Molen'>BA Gendos Dalam Molen</option>
                    <option value='BA Produk Terbuang'>BA Produk Terbuang</option>
                    <option value='BA Komplain Pelanggan'>BA Komplain Pelanggan</option>
                    <option value='BA Komplain Pelanggan sudah ada Pembayaran'>BA Komplain Pelanggan sudah ada Pembayaran</option>
                  </select>
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" id="cari" class="btn btn-sm btn-info" onclick="getreportsurvey()" ><i class="glyphicon glyphicon-search"></i> Cari</button>
                <button type="button" id="cetak" class="btn btn-sm btn-danger" onClick="" disabled><i class="glyphicon glyphicon-file"></i> Cetak</button> 
                <button type="button" id="grafik" class="btn btn-sm btn-danger" onClick="" disabled><i class="glyphicon glyphicon-file"></i> Grafik</button>                 
              </div>
            </div>

            <div class="col-sm-12">
              <div class="table-responsive"> 
                <table class="table table-sm table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Pertanyaan</th>
                      <th colspan="2">Kurang Memuaskan</th>
                      <th colspan="2">Cukup Memuaskan</th> 
                      <th colspan="2">Sangat Memuaskan</th> 
                      <th rowspan="2">Jumlah</th> 
                    </tr>
                    <tr>
                      <th>Jumlah</th>
                      <th>%</th>
                      <th>Jumlah</th>
                      <th>%</th>
                      <th>Jumlah</th>
                      <th>%</th>
                    </tr>                    
                  </thead>
                  <tbody id="datasurvey">
                  </tbody>
                </table>
              </div>
            </div>

          </form>
          
        </div>
      </div>
    </div>
  </div>

<script src="<?=base_url()."css/bootstrap/datepicker/js/bootstrap-datepicker.js"?>"></script>
<link rel="stylesheet" href="<?=base_url()."css/bootstrap/datepicker/css/datepicker.min.css"?>">

  <script type="text/javascript">
    function showMyPayroll(){
    //must be present because auto suggest will callback this function
    }

    function getreportsurvey(){
      if (document.getElementById('tgl1').value=='' || document.getElementById('tgl2').value=='') {
        alert('Periode Belum di Pilih'); $('#tgl2').focus(); $('#tgl1').focus(); 
      } else {
        xajax_getreportsurvey(document.getElementById('tgl1').value,document.getElementById('tgl2').value);
      }
    }

    function hapusmoulding(noindex,dept,tgl1,tgl2){
      var x = confirm("Yakin Hapus SP2M ini ?");
      if (x)      
        xajax_hapusmoulding(noindex,dept,tgl1,tgl2);
      else
        return false;      
    }

    function viewdetailba(noba){
      xajax_viewdetailba(noba);
    }

    function kosong(){
      document.getElementById('dept').value='';
      document.getElementById('noba').value='';
      document.getElementById('jenisba').value='';
      $('#tglentry').datepicker('update', new Date());
    }

    function hapusbatidaksesuai(noba){
      var x = confirm("Yakin Hapus BA Nomor : "+noba+" ?");
      if (x)
        xajax_hapusbatidaksesuai(noba,document.getElementById('dept').value,document.getElementById('tgl1').value,document.getElementById('tgl2').value,document.getElementById('jenisba').value);
      else
        return false;
    }

    function isNumberKey(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
          return false;
      return true;
    }    

    function simpanba(){
      var x = confirm("Yakin sudah selesai input BA ?");
      if (x)
        xajax_simpanba();
      else
        return false;
    }

    // When the document is ready
    $(document).ready(function () {
      $("#cari").click(function(){
        var tgl1 = document.getElementById('tgl1').value;
        var tgl2 = document.getElementById('tgl2').value;
        $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/sdm1/cetaksurveyumum/"+tgl1+"/"+tgl2+"/"+"','CETAK SURVEY KEPUASAN PELAYANAN UMUM PUSAT', 'width=900, height=900')");
        $("#grafik").attr("onClick", "window.open('<?=base_url()?>index.php/sdm1/grafiksurveyumum/"+tgl1+"/"+tgl2+"/"+"','GRAFIK SURVEY KEPUASAN PELAYANAN UMUM PUSAT', 'width=900, height=900')");        
      });

      $("input[type=text]").keyup(function(){
        $(this).val( $(this).val().toUpperCase() );
      }); 
      
      $('#tgl1').datepicker({
        format: "dd MM yyyy",
        immediateUpdates: true,
        todayHighlight: true,
        orientation: "top",
      }).on('changeDate', function(e){
        $(this).datepicker('hide');
      }); 

      $('#tgl2').datepicker({
        format: "dd MM yyyy",
        immediateUpdates: true,
        todayHighlight: true,
        orientation: "top",
      }).on('changeDate', function(e){
        $(this).datepicker('hide');
      }); 

      $('#tgl1').datepicker('update', new Date());
      $('#tgl2').datepicker('update', new Date());

      $('[data-toggle="tooltip"]').tooltip();

    });

  </script>

</body>
</html>

