<?php 
    $this->load->view('partial/header');
        $this->load->view('pengembalian/pengembaliansidebar');
            $this->load->view('pengembalian/pengembalianbreadcrumbs');
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List Data Buku Dipinjam
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-6" align="left">
                                       <a class="btn btn-info" onclick="showlisdatapengembalian();">List Data Pengembalian</a>
                                    </div>
                                    <div class="col-lg-6" align="right">
                                        <input type="text" id="keywordpinjam" placeholder="Search">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style="background-color: #FF8C00">No</th>
                                                        <th style="background-color: #00BFFF">Kode Pinjam</th>
                                                        <th style="width: 150px; background-color: #1E90FF;">Nama Peminjam</th>
                                                        <th style="width: 150px; background-color: #FFD700">Buku Dipinjam</th>
                                                        <th style="width: 100px; background-color: #E9967A">Tgl Pinjam</th>
                                                        <th style="width: 100px; background-color: #8FBC8F">Tgl Rencana Kembali</th>
                                                        <th style="width: 50; background-color: #F08080" >Lama Pinjam</th>
                                                        <th style="background-color: #20B2AA">Keterangan</th>
                                                        <th style="background-color: #B0E0E6">Action</th>
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

                    <div class="modal fade" id="formkembalikandata" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodaltambahdata();">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color: red;">Yakin Buku Yang Dipinjam Sudah Kembali ?</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" name="iduserinput" id="iduserinput" placeholder="iduser" class="form-control" autocomplete="off" >
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Kode Kembali</label>
                              </div>

                              <div class="col-md-4">
                                <input type="hidden" name="idpinjaminput" style="width: 276px;" id="idpinjaminput" class="form-control" placeholder="ID Pinjam" disabled="true">
                                <input type="hidden" name="idbukuinput" style="width: 276px;" id="idbukuinput" class="form-control" placeholder="ID Buku" disabled="true">
                                <!-- <input type="text" name="iduserinput" style="width: 276px;" id="iduserinput" class="form-control" placeholder="ID User" disabled="true"> -->
                                <input type="hidden" name="idsiswainput" style="width: 276px;" id="idsiswainput" class="form-control" placeholder="ID Siswa" disabled="true">
                                <input type="hidden" name="stsinput" style="width: 276px;" id="stsinput" class="form-control" placeholder="sts" disabled="true">
                                <input type="text" name="kodekembaliinput" style="width: 276px;" id="kodekembaliinput" class="form-control" placeholder="Kode Kembali" value="<?php echo $kodekembali;?>" disabled="true">
                              </div>

                              <div class="col-md-2">
                                <label>Kode Pinjam</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" name="kodepinjainput" style="width: 276px;" id="kodepinjainput" class="form-control" placeholder="Kode Pinjam" disabled="true">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>NIS</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" style="width: 277px; height: 35px;" name="nisinput" id="nisinput" class="form-control" placeholder="NIS" disabled="true" />
                              </div>

                              <div class="col-md-2">
                                <label>Tgl Pinjam</label>
                              </div>
                         
                              <div class="col-md-4">
                                  <input type="text" style='width: 251px; height: 35px;' id="tglpinjaminput" autocomplete="off" disabled="true">
                                  <span class="glyphicon-calendar glyphicon"></span>
                              </div> 
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Nama Siswa</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="namasiswainput" style="width: 276px;" id="namasiswainput" class="form-control" placeholder="Nama Siswa" disabled="true">
                              </div>

                              <div class="col-md-2">
                                <label>Tgl Rencana Kembali</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" style='width: 251px; height: 35px;' id="tglrencanakembaliinput" disabled="true">
                                <span class="glyphicon-calendar glyphicon"></span>
                              </div> 
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>No Buku</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="nobukuinput" style="width: 276px;" id="nobukuinput" class="form-control" placeholder="No Buku" disabled="true">
                              </div>

                              <div class="col-md-2">
                                <label>Lama Pinjam</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="lamapinjaminput" style="width: 276px;" id="lamapinjaminput" class="form-control" placeholder="Lama Pinjam" disabled="true">
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Judul Buku</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="judulbukuinput" style="width: 276px;" id="judulbukuinput" class="form-control" placeholder="Judul Buku" disabled="true">
                              </div>

                              <div class="col-md-2">
                                <label>Tgl Dikembalikan</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" style='width: 251px; height: 35px;' id="tglkembaliinput" autocomplete="off">
                                <span class="glyphicon-calendar glyphicon"></span>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Keterangan Waktu Pinjam</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <textarea style="width: 268px;" rows="3" id="ketinput" name="ketinput" placeholder="   Keterangan" disabled="true"></textarea>
                              </div>

                              <div class="col-md-2">
                                <label>Terlambat</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <div id="tampungterlambat">
                                  <!-- <input type="text" name="terlambatinput" style="width: 276px;" id="terlambatinput" class="form-control" placeholder="Terlambat" disabled="true"> -->
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Keterangan Waktu Kembali</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <textarea style="width: 268px;" rows="3" id="ketkembaliinput" name="ketkembaliinput" placeholder="   Keterangan Waktu Kembali"></textarea>
                                <font color="red">(*)Centang Jika Kondisi Sama Dengan Waktu Pinjam(*)</font>
                                <input type="checkbox" id="cekkondisisamapinjam">
                              </div>
                            </div>

                            <div class="modal-footer">
                              <div class="row">
                                <div class="col-md-2">
                                  <p><font color="red"><span id="pesan"></span></font></p>
                                </div>
                                <div class="col-md-10">
                                   <button type="submit" id="btnsimpan" class="btn btn-success">Ya</button>
                                  <!-- <a class="btn btn-success" id="btnsimpan">Simpan</a> -->
                                  <button type="button" onclick="closemodaltambahdata();" class="btn btn-danger">Tidak</button>
                                </div>
                              </div>
                            </div> 
                          </div>              
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="formlistpengembalian" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color: #00BFFF;">List Data Pengembalian</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <input type="text" id="keywordkembali" placeholder="Search">
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
                                                    <th style="background-color: #7FFFD4">Kode Kembali</th>
                                                    <!-- <th style="background-color: #7FFFD4">Kode Pinjam</th> -->
                                                    <!-- <th style="background-color: #7FFFD4">NIS</th> -->
                                                    <th style="background-color: #7FFFD4">Nama Siswa</th>
                                                    <!-- <th style="background-color: #FFE4C4">No Buku</th> -->
                                                    <th style="background-color: #7FFFD4">Judul Buku</th>
                                                    <th style="background-color: #7FFFD4">Tgl Pinjam</th>
                                                    <th style="background-color: #7FFFD4">Tgl Rencana Kembali</th>
                                                    <th style="background-color: #7FFFD4">Tgl Kembali</th>
                                                    <th style="background-color: #7FFFD4">Lama Pinjam</th>
                                                    <th style="background-color: #7FFFD4">Terlambat</th>
                                                    <!-- <th>Pengarang</th> -->
                                                    <!-- <th>Penerbit</th> -->
                                                    <!-- <th>Tahun</th> -->
                                                    <th style="background-color: #DEB887">Keterangan</th>
                                                    <th style="background-color: #FF7F50">Keterangan Kembali</th>
                                                    <!-- <th style="background-color: #FD7690">Keterangan</th> -->
                                                    <!-- <th>Action</th> -->
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="pengembalian">
                                               
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
                      function showlisdatapengembalian(event) {
                        $('#formlistpengembalian').modal('show');
                        $.ajax({
                                  url: "<?php echo base_url("Pengembalian/viewajaxpengembalian");?>",
                                  type: "POST",
                                  cache: false,
                                  success: function(data){
                                      //alert(data);
                                      $('#pengembalian').html(data); 
                                  }
                        });
                      }

                      $.ajax({
                                url: "<?php echo base_url("Pengembalian/viewajaxpeminjaman");?>",
                                type: "POST",
                                cache: false,
                                success: function(data){
                                    //alert(data);
                                    $('#peminjaman').html(data); 
                                }
                      });

                      $("#keywordpinjam").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#peminjaman tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });

                      $("#keywordkembali").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#pengembalian tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });

                      $('#formkembalikandata').on('show.bs.modal', function (event) {
                        var button            = $(event.relatedTarget); 
                        var idpinjam          = button.data('idpinjam');
                        var idsiswa           = button.data('idsiswa');
                        var idbuku            = button.data('idbuku');
                        var kodepinjam        = button.data('kodepinjam');
                        var nis               = button.data('nis');
                        var namasiswa         = button.data('namasiswa');
                        var nobuku            = button.data('nobuku');
                        var judulbuku         = button.data('judulbuku');
                        var tglpinjam         = button.data('tglpinjam');
                        var tglrencanakembali = button.data('tglrencanakembali');
                        var lamapinjam        = button.data('lamapinjam');
                        var keterangan        = button.data('keterangan');
                        var sts               = button.data('sts');
                        // alert(kelas);
                        var modal   = $(this);
                        modal.find('#idpinjaminput').val(idpinjam);
                        modal.find('#idsiswainput').val(idsiswa);
                        modal.find('#idbukuinput').val(idbuku);
                        modal.find('#kodepinjainput').val(kodepinjam);
                        modal.find('#nisinput').val(nis);
                        modal.find('#namasiswainput').val(namasiswa);
                        modal.find('#nobukuinput').val(nobuku);
                        modal.find('#judulbukuinput').val(judulbuku);
                        modal.find('#tglpinjaminput').val(tglpinjam);
                        modal.find('#tglrencanakembaliinput').val(tglrencanakembali);
                        modal.find('#lamapinjaminput').val(lamapinjam);
                        modal.find('#ketinput').val(keterangan);
                        modal.find('#judulbukuinput').val(judulbuku);
                        modal.find('#stsinput').val(sts);
                      });

                      $( "#tglkembaliinput" ).datepicker({
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

                      $("#tglkembaliinput").on("change",function (e){
                        var startdate = $('#tglrencanakembaliinput').val();
                        var enddate   = $('#tglkembaliinput').val();
                        $.ajax({
                                  url     : "<?php echo base_url("Pengembalian/hitunglamapinjam");?>",
                                  type    : "POST",
                                  data    :{
                                              startdate : startdate,
                                              enddate   : enddate
                                           },
                                  cache   : false,
                                  success : function(data){
                                    //alert(data);
                                    $('#tampungterlambat').html(data); 
                                  }
                        });
                      });

                      $('#btnsimpan').on('click',function(e) {
                        // var iduser             = $('#iduserinput').val();
                        var idpinjam           = $('#idpinjaminput').val();
                        var idbuku             = $('#idbukuinput').val();
                        var idsiswa            = $('#idsiswainput').val();
                        var sts                = $('#stsinput').val();
                        var kodekembali        = $('#kodekembaliinput').val();
                        var kodepinjam         = $('#kodepinjainput').val();
                        var nis                = $('#nisinput').val();
                        var namasiswa          = $('#namasiswainput').val();
                        var nobuku             = $('#nobukuinput').val();
                        var judulbuku          = $('#judulbukuinput').val();
                        var tglpinjam          = $('#tglpinjaminput').val();
                        var tglrencanakembali  = $('#tglrencanakembaliinput').val();
                        var lamapinjam         = $('#lamapinjaminput').val();
                        var tglkembali         = $('#tglkembaliinput').val();
                        var terlambat          = $('#terlambatinput').val();
                        var keterangan         = $('#ketinput').val();
                        var keterangankembali  = $('#ketkembaliinput').val();

                        if (idpinjam!="" && idbuku!="" && idsiswa!="" && sts!="" && kodekembali!="" && kodepinjam!="" && nis!="" && namasiswa!="" && nobuku!="" && judulbuku!="" && tglpinjam!="" && tglrencanakembali!="" && lamapinjam!="" && tglkembali!="" && terlambat!="" && keterangan!="" && keterangankembali!=""){
                          $.ajax({
                                    url     :   "<?php echo base_url("Pengembalian/simpandata");?>",
                                    type    :   "POST",
                                    data    :{
                                                // iduser            : iduser,
                                                idpinjam          : idpinjam,
                                                idbuku            : idbuku,
                                                idsiswa           : idsiswa,
                                                sts               : sts,
                                                kodekembali       : kodekembali,
                                                kodepinjam        : kodepinjam,
                                                nis               : nis,
                                                namasiswa         : namasiswa,
                                                nobuku            : nobuku,
                                                judulbuku         : judulbuku,
                                                tglpinjam         : tglpinjam,
                                                tglrencanakembali : tglrencanakembali,
                                                lamapinjam        : lamapinjam,
                                                tglkembali        : tglkembali,
                                                terlambat         : terlambat,
                                                keterangan        : keterangan,
                                                keterangankembali : keterangankembali
                                    },
                                    cache   :   false,
                                    success : function (dataResult) {
                                      // alert(idbuku);
                                      var dataResult = JSON.parse(dataResult);
                                      if (dataResult.statusCode==200){
                                        alert('Data Pengembalian Sudah Disimpan');
                                        location.reload();
                                      }else if(dataResult.statusCode==408){
                                        alert('Data Kode Kembali Sudah Ada');
                                      }else{
                                        alert('Koneksi Gagal !');
                                      }
                                    }

                          });
                        }else{
                          alert('Data Belum Lengkap, Harap Isi Data Terlebih Dahulu !');
                        }
                      });

                      function closemodaltambahdata(e) {
                        location.reload();
                      }

                      $('#cekkondisisamapinjam').click(function(){
                        var kondisipinjam   = $('#ketinput').val();
                        if($(this).is(':checked')){
                          // $('#passwordinput').attr('type','text');
                          $('#ketkembaliinput').val(decodeURIComponent(kondisipinjam));
                          $('#ketkembaliinput').attr('disabled',true);
                        }else{
                          $('#ketkembaliinput').val(decodeURIComponent(""));
                          $('#ketkembaliinput').attr('disabled',false);
                        }
                      });
                    </script>
                <?php $this->load->view('partial/footer');?>