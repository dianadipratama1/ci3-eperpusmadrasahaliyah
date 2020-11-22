<?php 
    $this->load->view('partial/header');
        $this->load->view('peminjaman/peminjamansidebar');
            $this->load->view('peminjaman/peminjamanbreadcrumbs');
?>
                <style type="text/css">                   
                  /*contoh1*/
                  /*support google chrome*/
                  .contoh1::-webkit-input-placeholder{
                    color: red;
                  }
                   
                  /*support mozilla*/
                  .contoh1:-moz-input-placeholder{
                    color: red;
                  }
                   
                  /*support internet explorer*/
                  .contoh1:-ms-input-placeholder{
                    color: red;
                  }
                </style>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Peminjaman Buku Perpustakaan
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-6" align="left">
                                        <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
                                        <a href="#" class="btn btn-info" onclick="showmodalcaribuku()">Lihat Daftar Buku</a>
                                    </div>
                                    <div class="col-lg-6" align="right">
                                        <input type="text" id="keywordpinjam" placeholder="Search">
                                        <!-- <a href="#" class="btn btn-info">Cari</a> -->
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
<!--                                                         <th>No</th>
                                                        <th>Kode Pinjam</th>
                                                        <th style="width: 150px;">Nama Peminjam</th>
                                                        <th style="width: 150px;">Buku Dipinjam</th>
                                                        <th style="width: 100px;">Tgl Pinjam</th>
                                                        <th style="width: 100px;">Tgl Rencana Kembali</th>
                                                        <th style="width: 50;">Lama Pinjam</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th> -->
                                                        <th style="background-color: #FF8C00">No</th>
                                                        <th style="background-color: #00BFFF">Kode Pinjam</th>
                                                        <th style="width: 150px; background-color: #1E90FF;">Nama Peminjam</th>
                                                        <th style="width: 150px; background-color: #FFD700">Buku Dipinjam</th>
                                                        <th style="width: 100px; background-color: #E9967A">Tgl Pinjam</th>
                                                        <th style="width: 100px; background-color: #8FBC8F">Tgl Rencana Kembali</th>
                                                        <th style="width: 50; background-color: #F08080" >Lama Pinjam</th>
                                                        <th style="background-color: #20B2AA">Keterangan</th>
                                                        <!-- <th style="background-color: #B0E0E6">Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="peminjaman">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="modal fade" id="formtambahdata" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodaltambahdata();">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color: green;">Tambah Data Peminjaman Buku</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" name="iduserinput" id="iduserinput" placeholder="iduser" class="form-control" autocomplete="off" >
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Kode Pinjam</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" name="kodepinjaminput" style="width: 276px;" id="kodepinjaminput" class="form-control" autocomplete="off" placeholder="Kode Pinjam" disabled="true" value="<?php echo $kodepinjam;?>">
                              </div>

                              <div class="col-md-6">
                                <!-- <label>Buku Dipinjam</label> -->
                                <p><font color="red">*) Harap Isi Data Peminjaman Dengan Benar</font></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>NIS</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <!--<select id='selectnamapeminjaminput' style='width: 268px; height: 35px;' onchange="pilihnamasiswa();">
                                  <option value='pilnamapeminjam' selected="selected">--Pilih Nama Peminjam--</option>
                                  <?php foreach ($namasiswa as $row) {
                                    echo "<option value='".$row->nama."'>".$row->nama."</option>";
                                  }?>
                                </select> -->
                                <input type="text" style="width: 277px; height: 35px;" name="nisinput" id="nisinput" class="form-control" list="listdatanis" placeholder="NIS" onchange="pilihnisinput();" onkeyup="pilihnisinput();" autocomplete="off" />
                                <datalist id="listdatanis">
                                     <?php foreach ($datanis as $row) {
                                      echo "<option value='".$row->nis."'>".$row->nis."</option>";
                                    }?>
                                </datalist>
                              </div>

                              <div class="col-md-2">
                                <label>Tgl Pinjam</label>
                              </div>
                         
                              <div class="col-md-4">
                                  <input type="text" style='width: 251px; height: 35px;' id="tglpinjaminput" autocomplete="off">
                                  <span class="glyphicon-calendar glyphicon"></span>
                              </div> 
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Nama Siswa</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <div id="divtampungnamasiswabynis">
                                  <!-- <input type="text" name="lamapinjaminput" id="lamapinjaminput" placeholder="Lama Pinjam" class="form-control" autocomplete="off" disabled="true"> -->
                                </div>
                              </div>

                              <div class="col-md-2">
                                <label>Tgl Rencana Kembali</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" style='width: 251px; height: 35px;' id="tglrencanakembaliinput" autocomplete="off">
                                <span class="glyphicon-calendar glyphicon"></span>
                              </div> 
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>No Buku</label>
                              </div>
                                  
                              <div class="col-md-4">
<!--                            select id='selectnamapeminjaminput' style='width: 268px; height: 35px;' onchange="pilihnamasiswa();">
                                  <option value='pilnamapeminjam' selected="selected">--Pilih Nama Peminjam--</option>
                                  <?php foreach ($namasiswa as $row) {
                                    echo "<option value='".$row->nama."'>".$row->nama."</option>";
                                  }?>
                                </select> -->
                                <input type="text" style="width: 277px; height: 35px;" name="nobukuinput" id="nobukuinput" class="form-control" list="listdatabuku" placeholder="NO BUKU" onchange="pilihnobukuinput();" onkeyup="pilihnobukuinput();" autocomplete="off" />
                                <datalist id="listdatabuku">
                                   <?php foreach ($databuku as $row) {
                                    echo "<option value='".$row->nobuku."'>".$row->nobuku."</option>";
                                  }?>
                                </datalist>
                              </div>

                              <div class="col-md-2">
                                <label>Lama Pinjam</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <div id="tampunglamapinjam">
                                  <!-- <input type="text" name="lamapinjaminput" id="lamapinjaminput" placeholder="Lama Pinjam" class="form-control" autocomplete="off" disabled="true"> -->
                                </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Judul Buku</label>
                              </div>
                                
                                <!-- <div id="divtampungjudulbukubynobuku"> -->
                                  <div class="col-md-4">
    <!--                                 <select id='selectjudulbukuinput' style='width: 268px; height: 35px;' onchange="pilihbukuinput();">
                                      <option value='piljudulbuku' selected="selected">--Pilih Judul Buku--</option>
                                      <?php foreach ($judulbuku as $row) {
                                        echo "<option value='".$row->judulbuku."'>".$row->judulbuku."</option>";
                                      } ?>
                                    </select> -->
                                    <div id="divtampungjudulbukubynobuku"></div>
                                  </div>

                                  <div class="col-md-2">
                                    <label>Keterangan</label>
                                  </div>
                                      
                                  <div class="col-md-4">
                                    <div id="divtampungketbuku"></div>
                                    <!-- <textarea style="width: 268px;" rows="3" id="ketinput" name="ketinput" placeholder="   Keterangan"></textarea> -->
                                  </div>
                              <!-- </div> -->
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <!-- <label>Tampung Kelas</label> -->
                              </div>
                                  
                              <div class="col-md-4">
                                <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                <!-- <input type="text" id="tampungkelas"> -->
                                <div id="divtampungnamasiswa">
                                  <!-- <input type="text" id="tampungidkelas"> -->
                                </div>
                                <div id="divtampungjudulbuku">
                                  <!-- <input type="text" id="tampungidkelas"> -->
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer">
                              <div class="row">
                                <div class="col-md-2">
                                  <p><font color="red"><span id="pesan"></span></font></p>
                                </div>
                                <div class="col-md-10">
                                   <button type="submit" id="btnsimpan" class="btn btn-success">Simpan</button>
                                  <!-- <a class="btn btn-success" id="btnsimpan">Simpan</a> -->
                                  <button type="button" onclick="closemodaltambahdata();" class="btn btn-danger">Batal</button>
                                </div>
                              </div>
                            </div> 
                          </div>              
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="formcaribuku" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color: #00BFFF;">Data Buku Yang Tersedia Di Perpustakaan</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <input type="text" id="keywordbuku" placeholder="Search">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                 <!-- <div class="col-lg-12"> -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th style="background-color: #00FFFF">No</th>
                                                    <th style="background-color: #7FFFD4">No Buku</th>
                                                    <th style="background-color: #FFE4C4">Judul Buku</th>
                                                    <!-- <th>Pengarang</th> -->
                                                    <!-- <th>Penerbit</th> -->
                                                    <!-- <th>Tahun</th> -->
                                                    <th style="background-color: #DEB887">Kategori</th>
                                                    <th style="background-color: #FF7F50">Lokasi</th>
                                                    <th style="background-color: #FD7690">Keterangan</th>
                                                    <!-- <th>Action</th> -->
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="buku">
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                <!-- </div> -->
                              </div>
                            </div>
                          </div>              
                        </div>
                      </div>
                    </div>

                    <script type="text/javascript">
                      $.ajax({
                                url: "<?php echo base_url("Peminjaman/viewajaxpeminjaman");?>",
                                type: "POST",
                                cache: false,
                                success: function(data){
                                    //alert(data);
                                    $('#peminjaman').html(data); 
                                }
                      });


                      function showmodaltambahdata(event) {
                        $('#formtambahdata').modal('show');
                      }

                      function closemodaltambahdata(event){
                        // $('#kodepinjaminput').val("");
                        $('#nisinput').val("");
                        $('#namasiswainput').val("");
                        $('#idsiswainput').val("");
                        $('#nobukuinput').val("");
                        $('#judulbukuinput').val("");
                        $('#idbukuinput').val("");
                        $('#tglpinjaminput').val("");
                        $('#tglrencanakembaliinput').val("");
                        $('#lamapinjaminput').val("");
                        $('#ketinput').val("");
                        $('#formtambahdata').modal('toggle');
                      }

                      function showmodalcaribuku(event) {
                        $('#formcaribuku').modal('show');
                        $.ajax({
                            url: "<?php echo base_url("Peminjaman/viewajaxbuku");?>",
                            type: "POST",
                            cache: false,
                            success: function(data){
                                //alert(data);
                                $('#buku').html(data); 
                            }
                        });
                      }

                      $("#keywordbuku").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#buku tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });

                      $("#keywordpinjam").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#peminjaman tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });

                      $("#tglpinjaminput").keypress(function(data){
                        if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                          $("#pesan").html("Isikan Data Tanggal").show().fadeOut("slow");
                          return false;
                        } 
                      });

                      $("#tglrencanakembaliinput").keypress(function(data){
                        if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                          $("#pesan").html("Isikan Data Tanggal").show().fadeOut("slow");
                          return false;
                        } 
                      });

                      // membuat datepicker
                      $( "#tglpinjaminput" ).datepicker({
                        dateFormat      : "dd-MM-yy",
                        // maxDate: "-0d", 
                        minDate         : new Date,
                        changeMonth     : true,
                        changeYear      : true,
                        showButtonPanel : true
                      });

                      $( "#tglrencanakembaliinput" ).datepicker({
                        dateFormat: "dd-MM-yy" ,
                        // maxDate: "1826.25d", 
                        minDate: new Date,
                        onSelect: function() {
                          return $(this).trigger('change');
                        },
                        changeMonth : true,
                        changeYear : true,
                        showButtonPanel: true
                      });

                      //onchange input datepicker
                      $("#tglrencanakembaliinput").on("change",function (e){
                        var startdate = $('#tglpinjaminput').val();
                        var enddate   = $('#tglrencanakembaliinput').val();
                        $.ajax({
                                  url     : "<?php echo base_url("Peminjaman/hitunglamapinjam");?>",
                                  type    : "POST",
                                  data    :{
                                              startdate : startdate,
                                              enddate   : enddate
                                           },
                                  cache   : false,
                                  success : function(data){
                                    //alert(data);
                                    $('#tampunglamapinjam').html(data); 
                                  }
                        });
                      });

                      function pilihnamasiswa(){
                        var namasiswa = $('#selectnamapeminjaminput option:selected').val();
                        // alert(tampung);
                         $.ajax({
                                    url     : "<?php echo base_url("Peminjaman/getnamasiswa");?>",
                                    type    : "POST",
                                    data    : {
                                                namasiswa : namasiswa
                                              },
                                    cache   : false,
                                    success : function(dataResult){
                                      $('#divtampungnamasiswa').html(dataResult);
                                    }
                          });
                        }

                        function pilihbukuinput(){
                          var judulbuku = $('#selectjudulbukuinput option:selected').val();
                        // alert(tampung);
                          $.ajax({
                                    url     : "<?php echo base_url("Peminjaman/getjudulbuku");?>",
                                    type    : "POST",
                                    data    : {
                                                judulbuku : judulbuku
                                              },
                                    cache   : false,
                                    success : function(dataResult){
                                      $('#divtampungjudulbuku').html(dataResult);
                                    }
                          });
                        }

                        function pilihnisinput() {
                          var nis = $('#nisinput').val();
                          if (nis!=""){
                            $.ajax({
                                      url : "<?php echo base_url("Peminjaman/getnamabynis");?>",
                                      type : "POST",
                                      data : {
                                                nis : nis
                                      },
                                      cache : false,
                                      success : function(dataResult) {
                                        $('#divtampungnamasiswabynis').html(dataResult);
                                      }
                            });  
                          }else{
                            alert('Data NIS Belum Di Isi');
                          } 
                        }


                        function pilihnobukuinput() {
                          var nobuku = $('#nobukuinput').val();
                          if (nobuku!=""){
                            $.ajax({
                                      url : "<?php echo base_url("Peminjaman/getjudulbukubynobuku");?>",
                                      type : "POST",
                                      data : {
                                                nobuku : nobuku
                                      },
                                      cache : false,
                                      success : function(dataResult) {
                                        $('#divtampungjudulbukubynobuku').html(dataResult);
                                        // $('#divtampungketbuku').html(dataResult);

                                        $.ajax({
                                                  url : "<?php echo base_url("Peminjaman/getketbuku");?>",
                                                  type : "POST",
                                                  data : {
                                                            nobuku : nobuku
                                                  },
                                                  cache : false,
                                                  success : function(dataResult) {
                                                    $('#divtampungketbuku').html(dataResult);
                                                    // $('#divtampungketbuku').html(dataResult);
                                                  }
                                        });
                                      }
                            });  
                          }else{
                            alert('Data No Buku Belum Di Isi');
                          } 
                        }

                        $('#btnsimpan').on('click', function (e) {
                          var kodepinjam        = $('#kodepinjaminput').val();
                          var nis               = $('#nisinput').val();
                          var namasiswa         = $('#namasiswainput').val();
                          var idsiswa           = $('#idsiswainput').val();
                          var nobuku            = $('#nobukuinput').val();
                          var judulbuku         = $('#judulbukuinput').val();
                          var idbuku            = $('#idbukuinput').val();
                          var tglpinjam         = $('#tglpinjaminput').val();
                          var tglrencanakembali = $('#tglrencanakembaliinput').val();
                          var lamapinjam        = $('#lamapinjaminput').val();
                          var keterangan        = $('#ketinput').val();

                          if (kodepinjam!="" && nis!="" && namasiswa!="" && idsiswa!="" && nobuku!="" && judulbuku!="" && idbuku!="" && tglpinjam!="" && tglrencanakembali!="" && lamapinjam!="" && keterangan!="") {
                            $.ajax({
                                      url     :   "<?php echo base_url("Peminjaman/simpandata");?>",
                                      type    :   "POST",
                                      data    :{
                                                  type                : 2,
                                                  kodepinjam          : kodepinjam,
                                                  nis                 : nis,
                                                  namasiswa           : namasiswa,
                                                  idsiswa             : idsiswa,
                                                  nobuku              : nobuku,
                                                  judulbuku           : judulbuku,
                                                  idbuku              : idbuku,
                                                  tglpinjam           : tglpinjam,
                                                  tglrencanakembali   : tglrencanakembali,
                                                  lamapinjam          : lamapinjam,
                                                  keterangan          : keterangan,
                                                  sts                 : 1
                                               },
                                      cache   :   false,
                                      success :   function (dataResult) {
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult==404){
                                          return false;
                                        }else{
                                          if (dataResult==405){
                                            alert('Kode Pinjam Ini Sudah Ada !');
                                          }else{
                                            if (dataResult==406){
                                              alert('Data Tidak Disimpan, Cek Koneksi Database');
                                            }else{
                                              // alert('Data Tidak Disimpan, Cek Koneksi Database');
                                              alert('Data Peminjaman SUdah Disimpan !');
                                              $.ajax({
                                                        url: "<?php echo base_url("Peminjaman/viewajaxpeminjaman");?>",
                                                        type: "POST",
                                                        cache: false,
                                                        success: function(data){
                                                            //alert(data);
                                                            $('#peminjaman').html(data); 
                                                        }
                                              });
                                              $('#kodepinjaminput').val("");
                                              $('#nisinput').val("");
                                              $('#namasiswainput').val("");
                                              $('#idsiswainput').val("");
                                              $('#nobukuinput').val("");
                                              $('#judulbukuinput').val("");
                                              $('#idbukuinput').val("");
                                              $('#tglpinjaminput').val("");
                                              $('#tglrencanakembaliinput').val("");
                                              $('#lamapinjaminput').val("");
                                              $('#ketinput').val("");
                                              $('#formtambahdata').modal('toggle');
                                              location.reload();
                                            }
                                          }
                                        }
                                      }
                            });
                          }else{
                            alert("Data Yang Dimasukkan Belum Lengkap ! Harap Lengkapi Data Terlebih Dahulu");
                          }
                        })
                    </script>
                <?php $this->load->view('partial/footer');?>