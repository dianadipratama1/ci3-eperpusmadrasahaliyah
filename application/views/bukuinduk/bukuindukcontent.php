<?php 
      $this->load->view('partial/header');
        $this->load->view('bukuinduk/bukuinduksidebar');
          $this->load->view('bukuinduk/bukuindukbreadcrumbs'); 
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Buku Induk Perpustakaan
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-6" align="left">
                                        <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
                                        <a href="<?php echo base_url("Bukuinduk/exportexcel"); ?>" class="btn btn-info" >Export Excel</a>
                                    </div>
                                    <div class="col-lg-6" align="right">
                                        <input type="text" id="keyword" placeholder="Search">
                                        <!-- <a href="#" class="btn btn-info">Cari</a> -->
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style="background-color:#00BFFF;">No</th>
                                                        <th style="background-color:#00CED1;">No Induk Buku</th>
                                                        <th style="background-color:#FFD700;">No Klasifikasi</th>
                                                        <th style="background-color:#F0E68C;">Tgl Dibukukan</th>
                                                        <th style="background-color:#7CFC00;">Judul Buku</th>
                                                        <th style="background-color:#ADD8E6;">Pengarang</th>
                                                        <th style="background-color:#FAFAD2;">Penerbit</th>
                                                        <th style="background-color:#90EE90;">Tahun Asal</th>
                                                        <th style="background-color:#87CEFA;">Jumlah Halaman</th>
                                                        <th style="background-color:#00FF00;">Ukuran Buku</th>
                                                        <th style="background-color:#FF00FF;">Jumlah Buku</th>
                                                        <th style="background-color:#FFDEAD;">Keterangan</th>
                                                        <th style="background-color:#FF4500;">Action</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="bukuinduk">
                                                   
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
                              <h4 class="modal-title" style="color: green;">Tambah Data Buku Induk Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idbukuindukinput" id="idbukuindukinput" placeholder="idbuku" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Buku Induk</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="nobukuindukinput" id="nobukuindukinput" class="form-control" autocomplete="off" placeholder="No Buku Induk" value="">
                                </div>

                                <div class="col-md-2">
                                  <label>Tanggal Dibukukan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="date" name="tgldibukukaninput" id="tgldibukukaninput" placeholder="Judul Buku" class="form-control" autocomplete="off" >
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Klasifikasi</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="noklasifikasiinput" id="noklasifikasiinput" class="form-control" autocomplete="off" placeholder="No Klasifikasi">
                                </div>

                                <div class="col-md-2">
                                  <label>Judul Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="judulbukuinput" id="judulbukuinput" placeholder="Judul Buku" class="form-control" autocomplete="off" >
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Pengarang</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="pengaranginput" id="pengaranginput" placeholder="Pengarang" class="form-control" autocomplete="off" >
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Penerbit</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="penerbitinput" id="penerbitinput" placeholder="Penerbit" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Tahun Asal</label>
                                </div>
                                    
                                <div class="col-md-4">
                                    <input type="number" name="tahunasalinput" id="tahunasalinput" placeholder="Tahun Asal" class="form-control" autocomplete="off" >
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Jumlah Halaman</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="number" name="jumlahhalamaninput" id="jumlahhalamaninput" placeholder="Jumlah Halaman" class="form-control" autocomplete="off" >
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Ukuran Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="ukuranbukuinput" id="ukuranbukuinput" placeholder="Ukuran Buku" class="form-control" autocomplete="off" >
                                </div>

                                <div class="col-md-2">
                                  <label>Jumlah Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                   <input type="number" name="jumlahbukuinput" id="jumlahbukuinput" placeholder="Jumlah Buku" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>

                                <div class="col-md-4">
                                   <textarea style="width: 268px;" rows="3" id="ketinput" name="ketinput" placeholder="   KETERANGAN"></textarea>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <div class="row">
                                  <div class="col-md-2">
                                    <p><font color="red"><span id="pesan"></span></font></p>
                                  </div>
                                  <div class="col-md-10">
                                    <button type="submit" id="btnsimpan" class="btn btn-success">Simpan</button>                          
                                    <button type="button" onclick="closemodaltambahdata();" class="btn btn-danger">Batal</button>
                                  </div>
                                </div>
                              </div> 
                            </div>              
                          </div>
                        </div>
                    </div>

                    <div class="modal fade" id="formeditdata" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodaleditdata();">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h4 class="modal-title" style="color: orange;">Edit Data Buku Induk Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idbukuindukedit" id="idbukuindukedit" placeholder="idbuku" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Induk Buku</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="noindukbukuedit" id="noindukbukuedit" class="form-control" autocomplete="off" placeholder="No Buku Induk" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Tanggal Dibukukan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="date" name="tgldibukukanedit" id="tgldibukukanedit" placeholder="Judul Buku" class="form-control" autocomplete="off" >
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Klasifikasi</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="noklasifikasiedit" id="noklasifikasiedit" class="form-control" autocomplete="off" placeholder="No Klasifikasi">
                                </div>

                                <div class="col-md-2">
                                  <label>Judul Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="judulbukuedit" id="judulbukuedit" placeholder="Judul Buku" class="form-control" autocomplete="off" >
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Pengarang</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="pengarangedit" id="pengarangedit" placeholder="Pengarang" class="form-control" autocomplete="off" >
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Penerbit</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="penerbitedit" id="penerbitedit" placeholder="Penerbit" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Tahun Asal</label>
                                </div>
                                    
                                <div class="col-md-4">
                                    <input type="number" name="tahunasaledit" id="tahunasaledit" placeholder="Tahun Asal" class="form-control" autocomplete="off" >
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Jumlah Halaman</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="number" name="jumlahhalamanedit" id="jumlahhalamanedit" placeholder="Jumlah Halaman" class="form-control" autocomplete="off" >
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Ukuran Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="ukuranbukuedit" id="ukuranbukuedit" placeholder="Ukuran Buku" class="form-control" autocomplete="off" >
                                </div>

                                <div class="col-md-2">
                                  <label>Jumlah Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                   <input type="number" name="jumlahbukuedit" id="jumlahbukuedit" placeholder="Jumlah Buku" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>

                                <div class="col-md-4">
                                   <textarea style="width: 268px;" rows="3" id="ketedit" name="ketedit" placeholder="   KETERANGAN"></textarea>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <div class="row">
                                  <div class="col-md-2">
                                    <p><font color="red"><span id="pesan"></span></font></p>
                                  </div>
                                  <div class="col-md-10">
                                    <button type="submit" id="btnupdate" class="btn btn-warning">Update</button>                          
                                    <button type="button" onclick="closemodaleditdata();" class="btn btn-danger">Batal</button>
                                  </div>
                                </div>
                              </div> 
                            </div>              
                          </div>
                      </div>
                    </div>

                    <div class="modal fade" id="formhapusdata" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h4 class="modal-title" style="color: red;">Apakah Anda Yakin Menghapus Data Ini ?</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idbukuindukhapus" id="idbukuindukhapus" placeholder="idbuku" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Induk Buku</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="noindukbukuhapus" id="noindukbukuhapus" class="form-control" autocomplete="off" placeholder="No Buku Induk" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Tanggal Dibukukan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="date" name="tgldibukukanhapus" id="tgldibukukanhapus" placeholder="Judul Buku" class="form-control" autocomplete="off" disabled="true">
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Klasifikasi</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="noklasifikasihapus" id="noklasifikasihapus" class="form-control" autocomplete="off" placeholder="No Klasifikasi" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Judul Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="judulbukuhapus" id="judulbukuhapus" placeholder="Judul Buku" class="form-control" autocomplete="off" disabled="true">
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Pengarang</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="pengaranghapus" id="pengaranghapus" placeholder="Pengarang" class="form-control" autocomplete="off" disabled="true">
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Penerbit</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="penerbithapus" id="penerbithapus" placeholder="Penerbit" class="form-control" autocomplete="off" disabled="true">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Tahun Asal</label>
                                </div>
                                    
                                <div class="col-md-4">
                                    <input type="number" name="tahunasalhapus" id="tahunasalhapus" placeholder="Tahun Asal" class="form-control" autocomplete="off" disabled="true">
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Jumlah Halaman</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="number" name="jumlahhalamanhapus" id="jumlahhalamanhapus" placeholder="Jumlah Halaman" class="form-control" autocomplete="off" disabled="true">
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Ukuran Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="ukuranbukuhapus" id="ukuranbukuhapus" placeholder="Ukuran Buku" class="form-control" autocomplete="off" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Jumlah Buku</label>
                                </div>
                                    
                                <div class="col-md-4">
                                   <input type="number" name="jumlahbukuhapus" id="jumlahbukuhapus" placeholder="Jumlah Buku" class="form-control" autocomplete="off" disabled="true">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>

                                <div class="col-md-4">
                                   <textarea style="width: 268px;" rows="3" id="kethapus" name="kethapus" placeholder="   KETERANGAN" disabled="true"></textarea>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <div class="row">
                                  <div class="col-md-2">
                                    <p><font color="red"><span id="pesan"></span></font></p>
                                  </div>
                                  <div class="col-md-10">
                                    <button type="submit" id="btnhapus" class="btn btn-danger">Ya</button>                          
                                    <button type="button" onclick="closemodalhapusdata();" class="btn btn-warning">Tidak</button>
                                  </div>
                                </div>
                              </div> 
                            </div>              
                          </div>
                      </div>
                    </div>

                    <script>
                        $.ajax({
                            url: "<?php echo base_url("Bukuinduk/viewajax");?>",
                            type: "POST",
                            cache: false,
                            success: function(data){
                                //alert(data);
                                $('#bukuinduk').html(data); 
                            }
                        });

                        //filterdata
                        $("#keyword").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#bukuinduk tr").filter(function() {
                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        //end filterdata

                        function showmodaltambahdata() {
                          $('#formtambahdata').modal('show');
                        }

                        function closemodaltambahdata() {
                          $('#nobukuindukinput').val("");
                          $('#noklasifikasiinput').val("");
                          $('#tgldibukukaninput').val("");
                          $('#judulbukuinput').val("");
                          $('#pengaranginput').val("");
                          $('#penerbitinput').val("");
                          $('#tahunasalinput').val("");
                          $('#jumlahhalamaninput').val("");
                          $('#ukuranbukuinput').val("");
                          $('#jumlahbukuinput').val("");
                          $('#ketinput').val("");
                          $('#formtambahdata').modal('toggle');
                        }

                        $('#btnsimpan').on('click', function(){
                          var nobukuinduk   = $('#nobukuindukinput').val();
                          var noklasifikasi = $('#noklasifikasiinput').val();
                          var tgldibukukan  = $('#tgldibukukaninput').val();
                          var judulbuku     = $('#judulbukuinput').val();
                          var pengarang     = $('#pengaranginput').val();
                          var penerbit      = $('#penerbitinput').val();
                          var tahunasal     = $('#tahunasalinput').val();
                          var jumlahhalaman = $('#jumlahhalamaninput').val();
                          var ukuranbuku    = $('#ukuranbukuinput').val();
                          var jumlahbuku    = $('#jumlahbukuinput').val();
                          var keterangan    = $('#ketinput').val();

                          if (nobukuinduk != "" && noklasifikasi != "" && tgldibukukan != "" && judulbuku != "" && pengarang != "" && penerbit != "" && tahunasal != "" && jumlahhalaman != "" && ukuranbuku != "" && jumlahbuku != "" && keterangan != "") {
                            // alert('OKEEE');
                            $.ajax({
                                      url     : "<?php echo base_url("Bukuinduk/simpandata");?>",
                                      type    : "POST",
                                      data    : {
                                                  type          : 2,
                                                  nobukuinduk   : nobukuinduk,
                                                  noklasifikasi : noklasifikasi,
                                                  tgldibukukan  : tgldibukukan,
                                                  judulbuku     : judulbuku,
                                                  pengarang     : pengarang,
                                                  penerbit      : penerbit,
                                                  tahunasal     : tahunasal,
                                                  jumlahhalaman : jumlahhalaman,
                                                  ukuranbuku    : ukuranbuku,
                                                  jumlahbuku    : jumlahbuku,
                                                  keterangan    : keterangan
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==404){
                                          alert('Data Atas No Buku Induk Ini Sudah Ada !');
                                        }else{
                                          $.ajax({
                                                    url     : "<?php echo base_url("Buku/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#bukuinduk').html(data);
                                                    }
                                          });
                                          alert('Data Berhasil Dismpan');
                                          // $('#formtambahdata').modal('toggle');
                                          // $('#closemodaltambahdata').click();
                                          $('#nobukuindukinput').val("");
                                          $('#noklasifikasiinput').val("");
                                          $('#tgldibukukaninput').val("");
                                          $('#judulbukuinput').val("");
                                          $('#pengaranginput').val("");
                                          $('#penerbitinput').val("");
                                          $('#tahunasalinput').val("");
                                          $('#jumlahhalamaninput').val("");
                                          $('#ukuranbukuinput').val("");
                                          $('#jumlahbukuinput').val("");
                                          $('#ketinput').val("");
                                          $('#formtambahdata').modal('toggle');
                                        }
                                        
                                      }
                            });
                          }else{
                            alert('Data Belum Lengkap, Harap Lengkapi Data terlebih Dahulu');
                          }
                        });
                        

                        $('#formeditdata').on('show.bs.modal', function (event) {
                          var button      = $(event.relatedTarget);
                          var id            = button.data('id');
                          var noindukbuku   = button.data('noindukbuku');
                          var noklasifikasi = button.data('noklasifikasi');
                          var tgldibukukan  = button.data('tgldibukukan');
                          var judulbuku     = button.data('judulbuku');
                          var pengarang     = button.data('pengarang');
                          var penerbit      = button.data('penerbit');
                          var tahunasal     = button.data('tahunasal');
                          var jumlahhalaman = button.data('jumlahhalaman');
                          var ukuranbuku    = button.data('ukuranbuku');
                          var jumlahbuku    = button.data('jumlahbuku');
                          var keterangan    = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#idbukuindukedit').val(id);
                          modal.find('#noindukbukuedit').val(noindukbuku);
                          modal.find('#noklasifikasiedit').val(noklasifikasi);
                          modal.find('#tgldibukukanedit').val(tgldibukukan);
                          modal.find('#judulbukuedit').val(judulbuku);
                          modal.find('#pengarangedit').val(pengarang);
                          modal.find('#penerbitedit').val(penerbit);
                          modal.find('#tahunasaledit').val(tahunasal);
                          modal.find('#jumlahhalamanedit').val(jumlahhalaman);
                          modal.find('#ukuranbukuedit').val(ukuranbuku);
                          modal.find('#jumlahbukuedit').val(jumlahbuku);
                          modal.find('#ketedit').val(keterangan);
                        });

                        function closemodaleditdata(){
                          $('#nobukuedit').val("");
                          $('#judulbukuedit').val("");
                          $('#pengarangedit').val("");
                          // $('#namakelas').val("--Pilih Kelas--");
                          $('#penerbitedit').val("");
                          $('#tahunterbitedit').val("");
                          $('#ketedit').val("");
                          $('select').each(function(){
                            $(this).val($(this).find("option[selected]").val());
                          });
                          $('#tampunganidkategoriedit').val("");
                          $('#tampungannamakategoriedit').val("");
                          $('#tampunganidlokasiedit').val("");
                          $('#tampungannamalokasiedit').val("");
                          $('#formeditdata').modal('toggle');
                          // $('select').each(function(){
                          //   $(this).val($(this).find("option[selected]").val());
                          // });
                        }

                        $('#btnupdate').on('click', function(event){
                          var id            = $('#idbukuindukedit').val();
                          var nobukuinduk   = $('#noindukbukuedit').val();
                          var noklasifikasi = $('#noklasifikasiedit').val();
                          var tgldibukukan  = $('#tgldibukukanedit').val();
                          var judulbuku     = $('#judulbukuedit').val();
                          var pengarang     = $('#pengarangedit').val();
                          var penerbit      = $('#penerbitedit').val();
                          var tahunasal     = $('#tahunasaledit').val();
                          var jumlahhalaman = $('#jumlahhalamanedit').val();
                          var ukuranbuku    = $('#ukuranbukuedit').val();
                          var jumlahbuku    = $('#jumlahbukuedit').val();
                          var keterangan    = $('#ketedit').val();


                          if (id!="" && nobukuinduk != "" && noklasifikasi != "" && tgldibukukan != "" && judulbuku != "" && pengarang != "" && penerbit != "" && tahunasal != "" && jumlahhalaman != "" && ukuranbuku != "" && jumlahbuku != "" && keterangan != ""){
                            // alert("okee");
                            $.ajax({
                                      url   : "<?php echo base_url("Bukuinduk/updatedata");?>",
                                      type  : "POST",
                                      data  : {
                                                  type          : 3,
                                                  id            : id,
                                                  nobukuinduk   : nobukuinduk,
                                                  noklasifikasi : noklasifikasi,
                                                  tgldibukukan  : tgldibukukan,
                                                  judulbuku     : judulbuku,
                                                  pengarang     : pengarang,
                                                  penerbit      : penerbit,
                                                  tahunasal     : tahunasal,
                                                  jumlahhalaman : jumlahhalaman,
                                                  ukuranbuku    : ukuranbuku,
                                                  jumlahbuku    : jumlahbuku,
                                                  keterangan    : keterangan
                                              },
                                      cache : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==200){
                                          $.ajax({
                                                    url     : "<?php echo base_url("Bukuinduk/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#bukuinduk').html(data);
                                                      $('#formeditdata').modal('toggle');
                                                    }
                                          });
                                          // $('#closemodaleditdata').click();
                                          alert('Data Berhasil Diupdate !');
                                        }else{
                                          alert('Data Tidak Diupdate');
                                        }                  
                                      }
                            });
                          }else{
                            alert("Data Kurang Lengkap Harap Lengkapi Data Terlebih Dahulu !");
                          }
                        });

                        $('#formhapusdata').on('show.bs.modal', function (event) {
                          var button      = $(event.relatedTarget);
                          var id            = button.data('id');
                          var noindukbuku   = button.data('noindukbuku');
                          var noklasifikasi = button.data('noklasifikasi');
                          var tgldibukukan  = button.data('tgldibukukan');
                          var judulbuku     = button.data('judulbuku');
                          var pengarang     = button.data('pengarang');
                          var penerbit      = button.data('penerbit');
                          var tahunasal     = button.data('tahunasal');
                          var jumlahhalaman = button.data('jumlahhalaman');
                          var ukuranbuku    = button.data('ukuranbuku');
                          var jumlahbuku    = button.data('jumlahbuku');
                          var keterangan    = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#idbukuindukhapus').val(id);
                          modal.find('#noindukbukuhapus').val(noindukbuku);
                          modal.find('#noklasifikasihapus').val(noklasifikasi);
                          modal.find('#tgldibukukanhapus').val(tgldibukukan);
                          modal.find('#judulbukuhapus').val(judulbuku);
                          modal.find('#pengaranghapus').val(pengarang);
                          modal.find('#penerbithapus').val(penerbit);
                          modal.find('#tahunasalhapus').val(tahunasal);
                          modal.find('#jumlahhalamanhapus').val(jumlahhalaman);
                          modal.find('#ukuranbukuhapus').val(ukuranbuku);
                          modal.find('#jumlahbukuhapus').val(jumlahbuku);
                          modal.find('#kethapus').val(keterangan);
                        });

                        $('#btnhapus').on('click', function(event){
                          $.ajax({
                                url   : "<?php echo base_url("Bukuinduk/hapusdata")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type    :   4,
                                          idbukuinduk :   $('#idbukuindukhapus').val(),
                                          // lokasirak :   $('#lokasirakhapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("Bukuinduk/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#bukuinduk').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        $('#formhapusdata').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                          });
                        });

                        function closemodalhapusdata(){
                          $('#formhapusdata').modal('toggle');
                        }

                    </script>
          <?php $this->load->view('partial/footer'); ?>