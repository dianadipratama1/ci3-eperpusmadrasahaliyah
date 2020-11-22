<?php 
      $this->load->view('partial/header');
        $this->load->view('buku/bukusidebar');
          $this->load->view('buku/bukubreadcrumbs'); 
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Buku Perpustakaan
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-6" align="left">
                                        <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
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
                                                        <th>No</th>
                                                        <th>No Buku</th>
                                                        <th>Judul Buku</th>
                                                        <th>Pengarang</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun</th>
                                                        <th>Kategori</th>
                                                        <th>Lokasi</th>
                                                        <th>Keterangan</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="buku">
                                                   
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
                              <h4 class="modal-title" style="color: green;">Tambah Data Buku Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idbukuinput" id="idbukuinput" placeholder="idbuku" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Buku</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="nobukuinput" id="nobukuinput" class="form-control" autocomplete="off" placeholder="No Buku" value="">
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
                                  <label>Tahun Terbit</label>
                                </div>
                                    
                                <div class="col-md-4">
                                    <input type="text" name="tahunterbitinput" id="tahunterbitinput" placeholder="Tahun Terbit" class="form-control" autocomplete="off" >
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Kategori</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <select id='selectkategoriinput' style='width: 268px; height: 35px;' onchange="pilihkategoriinput();">
                                    <option value='pilkategori' selected="selected">--Pilih Kategori--</option>
                                    <?php foreach ($namakategori as $row) {
                                      echo "<option value='".$row->nmkategori."'>".$row->nmkategori."</option>";
                                    } ?>
                                  </select>
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <textarea style="width: 268px;" rows="3" id="ketinput" name="ketinput" placeholder="   KETERANGAN"></textarea>
                                </div>

                                <div class="col-md-2">
                                  <label>Lokasi</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <select id='selectlokasiinput' style='width: 268px; height: 35px;' onchange="pilihlokasiinput();">
                                    <option value='pillokasi' selected="selected">--Pilih Lokasi--</option>
                                    <?php foreach ($lokasirak as $row) {
                                      echo "<option value='".$row->lokasirak."'>".$row->lokasirak."</option>";
                                    } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <!-- dfgdfgdfg -->
                                </div>

                                <div class="col-md-4">
                                  <div id="tampungankategori">
                                    <!-- <input type="text" id="tampungidkategori"> -->
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <!-- asas -->
                                </div>

                                <div class="col-md-4">
                                   <div id="tampunganlokasi">
                                    <!-- <input type="text" id="tampungidlokasi"> -->
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
                            <h4 class="modal-title" style="color: orange;">Edit Data Buku Perpustakaan</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" name="idbukuedit" id="idbukuedit" placeholder="idbuku" class="form-control" autocomplete="off" readonly="true">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>No Buku</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" name="nobukuedit" id="nobukuedit" class="form-control" autocomplete="off" placeholder="No Buku" disabled="true">
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
                                <label>Tahun Terbit</label>
                              </div>
                                  
                              <div class="col-md-4">
                                  <input type="text" name="tahunterbitedit" id="tahunterbitedit" placeholder="Tahun Terbit" class="form-control" autocomplete="off" >
                              </div> 
                                  
                              <div class="col-md-2">
                                <label>Kategori</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <select id='selectkategoriedit' style='width: 268px; height: 35px;' onchange="pilihkategoriedit();">
                                  <option value='pilkategori' selected="selected">--Pilih Kategori--</option>
                                  <?php foreach ($namakategori as $row) {
                                    echo "<option value='".$row->nmkategori."'>".$row->nmkategori."</option>";
                                  } ?>
                                </select>
                              </div>  
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Keterangan</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <textarea style="width: 268px;" rows="3" id="ketedit" name="ketedit" placeholder="   KETERANGAN"></textarea>
                              </div>

                              <div class="col-md-2">
                                <label>Lokasi</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <select id='selectlokasiedit' style='width: 268px; height: 35px;' onchange="pilihlokasiedit();">
                                  <option value='pillokasi' selected="selected">--Pilih Lokasi--</option>
                                  <?php foreach ($lokasirak as $row) {
                                    echo "<option value='".$row->lokasirak."'>".$row->lokasirak."</option>";
                                  } ?>
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <!-- dfgdfgdfg -->
                              </div>

                              <div class="col-md-4">
                                <div id="tampungankategoriedit">
                                  <!-- <input type="text" id="tampungidkategori"> -->
                                </div>
                              </div>

                              <div class="col-md-2">
                                <!-- asas -->
                              </div>

                              <div class="col-md-4">
                                 <div id="tampunganlokasiedit">
                                  <!-- <input type="text" id="tampungidlokasi"> -->
                                </div>
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodalhapusdata();">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color: red;">Apakah Anda Yakin Akan Hapus Data Ini ?</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" name="idbukuhapus" id="idbukuhapus" placeholder="idbuku" class="form-control" autocomplete="off" readonly="true" disabled="true">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>No Buku</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" name="nobukuhapus" id="nobukuhapus" class="form-control" autocomplete="off" placeholder="No Buku" disabled="true">
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
                                <label>Tahun Terbit</label>
                              </div>
                                  
                              <div class="col-md-4">
                                  <input type="text" name="tahunterbithapus" id="tahunterbithapus" placeholder="Tahun Terbit" class="form-control" autocomplete="off" disabled="true">
                              </div> 
                                  
                              <div class="col-md-2">
                                <label>Kategori</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <select id='selectkategorihapus' style='width: 268px; height: 35px;' onchange="pilihkategoriedit();" disabled="true">
                                  <option value='pilkategori' selected="selected">--Pilih Kategori--</option>
                                  <?php foreach ($namakategori as $row) {
                                    echo "<option value='".$row->nmkategori."'>".$row->nmkategori."</option>";
                                  } ?>
                                </select>
                              </div>  
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Keterangan</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <textarea style="width: 268px;" rows="3" id="kethapus" name="kethapus" placeholder="   KETERANGAN" disabled="true"></textarea>
                              </div>

                              <div class="col-md-2">
                                <label>Lokasi</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <select id='selectlokasihapus' style='width: 268px; height: 35px;' onchange="pilihlokasiedit();" disabled="true">
                                  <option value='pillokasi' selected="selected">--Pilih Lokasi--</option>
                                  <?php foreach ($lokasirak as $row) {
                                    echo "<option value='".$row->lokasirak."'>".$row->lokasirak."</option>";
                                  } ?>
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <!-- dfgdfgdfg -->
                              </div>

                              <div class="col-md-4">
                                <div id="tampungankategorihapus">
                                  <!-- <input type="text" id="tampungidkategori"> -->
                                </div>
                              </div>

                              <div class="col-md-2">
                                <!-- asas -->
                              </div>

                              <div class="col-md-4">
                                 <div id="tampunganlokasihapus">
                                  <!-- <input type="text" id="tampungidlokasi"> -->
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer">
                              <div class="row">
                                <div class="col-md-2">
                                  <p><font color="red"><span id="pesan"></span></font></p>
                                </div>
                                <div class="col-md-10">
                                  <button type="submit" id="btnhapus" class="btn btn-warning">Ya</button>                          
                                  <button type="button" onclick="closemodalhapusdata();" class="btn btn-danger">Tidak</button>
                                </div>
                              </div>
                            </div> 
                          </div>              
                        </div>
                      </div>
                    </div>

                    <script>
                        $.ajax({
                            url: "<?php echo base_url("Buku/viewajax");?>",
                            type: "POST",
                            cache: false,
                            success: function(data){
                                //alert(data);
                                $('#buku').html(data); 
                            }
                        });

                        function showmodaltambahdata(){
                            $("#formtambahdata").modal();
                        }

                        function closemodalhapusdata(){
                          $('#formhapusdata').modal('toggle');
                        }

                        function closemodaltambahdata(){
                          $('#formtambahdata').modal('toggle');
                          $('#nobukuinput').val("");
                          $('#judulbukuinput').val("");
                          $('#pengaranginput').val("");
                          // $('#namakelas').val("--Pilih Kelas--");
                          $('#penerbitinput').val("");
                          $('#tahunterbitinput').val("");
                          $('#ketinput').val("");
                          $('select').each(function(){
                            $(this).val($(this).find("option[selected]").val());
                          });
                          $('#tampunganidkategoriinput').val("");
                          $('#tampungannamakategoriinput').val("");
                          $('#tampunganidlokasiinput').val("");
                          $('#tampungannamalokasiinput').val("");
                          
                          // $('select').each(function(){
                          //   $(this).val($(this).find("option[selected]").val());
                          // });
                        }

                        //filterdata
                        $("#keyword").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#buku tr").filter(function() {
                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        //end filterdata

                        $("#nobukuinput").keypress(function(data){
                          if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                            $("#pesan").html("isikan angka").show().fadeOut("slow");
                            return false;
                          } 
                        });

                        $("#tahunterbitinput").keypress(function(data){
                          if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                            $("#pesan").html("isikan tahun").show().fadeOut("slow");
                            return false;
                          } 
                        });

                        function pilihkategoriinput(){
                          var namakategori = $('#selectkategoriinput option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("Buku/getidkategori");?>",
                                      type    : "POST",
                                      data    : {
                                                  namakategori : namakategori
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampungankategori').html(dataResult);
                                      }
                            });
                        }

                        function pilihlokasiinput(){
                          var namalokasi = $('#selectlokasiinput option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("Buku/getidlokasi");?>",
                                      type    : "POST",
                                      data    : {
                                                  namalokasi : namalokasi
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganlokasi').html(dataResult);
                                      }
                            });
                        }

                        $('#btnsimpan').on('click', function(){
                          var nobuku          = $('#nobukuinput').val();
                          var judulbuku       = $('#judulbukuinput').val();
                          var pengarang       = $('#pengaranginput').val();
                          var penerbit        = $('#penerbitinput').val();
                          var tahunterbit     = $('#tahunterbitinput').val();
                          var keterangan      = $('#ketinput').val();
                          var idkategori      = $('#tampunganidkategoriinput').val();
                          var nmkategori      = $('#tampungannamakategoriinput').val();
                          var idlokasi        = $('#tampunganidlokasiinput').val();
                          var nmlokasi        = $('#tampungannamalokasiinput').val();
                          var selectlokasi    = $('#selectlokasiinput').val();
                          var selectkategori  = $('#selectkategoriinput').val();

                          if (nobuku != "" && judulbuku != "" && pengarang != "" && penerbit != "" && tahunterbit != "" && keterangan != "" && idkategori != "" && nmkategori != "" && idlokasi != "" && nmlokasi != "" && selectlokasi != "pillokasi" && selectkategori != "pilkategori" ) {
                            // alert('OKEEE');
                            $.ajax({
                                      url     : "<?php echo base_url("Buku/simpandata");?>",
                                      type    : "POST",
                                      data    : {
                                                  type        : 2,
                                                  nobuku      : nobuku,
                                                  judulbuku   : judulbuku,
                                                  pengarang   : pengarang,
                                                  penerbit    : penerbit,
                                                  tahunterbit : tahunterbit,
                                                  keterangan  : keterangan,
                                                  idkategori  : idkategori,
                                                  nmkategori  : nmkategori,
                                                  idlokasi    : idlokasi,
                                                  nmlokasi    : nmlokasi
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==404){
                                          alert('Data Atas No Buku Ini Sudah Ada !');
                                        }else{
                                          $.ajax({
                                                    url     : "<?php echo base_url("Buku/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#buku').html(data);
                                                    }
                                          });
                                          alert('Data Berhasil Dismpan');
                                          // $('#formtambahdata').modal('toggle');
                                          // $('#closemodaltambahdata').click();
                                          $('#nobukuinput').val("");
                                          $('#judulbukuinput').val("");
                                          $('#pengaranginput').val("");
                                          // $('#namakelas').val("--Pilih Kelas--");
                                          $('#penerbitinput').val("");
                                          $('#tahunterbitinput').val("");
                                          $('#ketinput').val("");
                                          $('select').each(function(){
                                            $(this).val($(this).find("option[selected]").val());
                                          });
                                          $('#tampunganidkategoriinput').val("");
                                          $('#tampungannamakategoriinput').val("");
                                          $('#tampunganidlokasiinput').val("");
                                          $('#tampungannamalokasiinput').val("");
                                          $('#formtambahdata').modal('toggle');
                                        }
                                        
                                      }
                            });
                          }else{
                            alert('Data Belum Lengkap, Harap Lengkapi Data terlebih Dahulu');
                          }
                        });

                        function pilihkategoriedit(){
                          var namakategori = $('#selectkategoriedit option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("Buku/getidkategoriedit");?>",
                                      type    : "POST",
                                      data    : {
                                                  namakategori : namakategori
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampungankategoriedit').html(dataResult);
                                      }
                            });
                        }

                        function pilihlokasiedit(){
                          var namalokasi = $('#selectlokasiedit option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("Buku/getidlokasiedit");?>",
                                      type    : "POST",
                                      data    : {
                                                  namalokasi : namalokasi
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganlokasiedit').html(dataResult);
                                      }
                            });
                        }
                        

                        $('#formeditdata').on('show.bs.modal', function (event) {
                          var button      = $(event.relatedTarget); 
                          var id          = button.data('id');
                          var nobuku      = button.data('nobuku');
                          var judulbuku   = button.data('judulbuku');
                          var pengarang   = button.data('pengarang');
                          var penerbit    = button.data('penerbit');
                          var tahun       = button.data('tahun');
                          var namakategori= button.data('nmkategori');
                          var namalokasi   = button.data('lokasirak');
                          var keterangan  = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#idbukuedit').val(id);
                          modal.find('#nobukuedit').val(nobuku);
                          modal.find('#judulbukuedit').val(judulbuku);
                          modal.find('#pengarangedit').val(pengarang);
                          modal.find('#penerbitedit').val(penerbit);
                          modal.find('#tahunterbitedit').val(tahun);
                          modal.find('#ketedit').val(keterangan);
                          modal.find('#selectkategoriedit').val(namakategori);
                          if (modal.find('#selectkategoriedit').val()==namakategori){
                            $.ajax({
                                      url     : "<?php echo base_url("Buku/getidkategoriedit");?>",
                                      type    : "POST",
                                      data    : {
                                                  namakategori : namakategori
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampungankategoriedit').html(dataResult);
                                      }
                            });
                          }

                          modal.find('#selectlokasiedit').val(namalokasi);
                          if(modal.find('#selectlokasiedit').val()==namalokasi){
                            $.ajax({
                                      url   : "<?php echo base_url("Buku/getidlokasiedit");?>",
                                      type  : "POST",
                                      data  : {
                                                namalokasi : namalokasi
                                              },
                                      cache : false,
                                      success : function(dataResult){
                                        $('#tampunganlokasiedit').html(dataResult);
                                      }
                            });
                          }
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
                          var id              = $('#idbukuedit').val();
                          var nobuku          = $('#nobukuedit').val();
                          var judulbuku       = $('#judulbukuedit').val();
                          var pengarang       = $('#pengarangedit').val();
                          var penerbit        = $('#penerbitedit').val();
                          var tahun           = $('#tahunterbitedit').val();
                          var nmkategori      = $('#tampungannamakategoriedit').val();
                          var idkategori      = $('#tampunganidkategoriedit').val();
                          var nmlokasi        = $('#tampungannamalokasiedit').val();
                          var idlokasi        = $('#tampunganidlokasiedit').val();
                          var selectlokasi    = $('#selectlokasiedit').val();
                          var selectkategori  = $('#selectkategoriedit').val();
                          var keterangan      = $('#ketedit').val();

                          if (id!="" && nobuku!="" && judulbuku!="" && pengarang!="" && penerbit!="" && tahun!="" && nmkategori!="" && idkategori!="" && nmlokasi!="" && idlokasi!="" && selectlokasi!="pillokasi" && selectkategori!="pilkategori" && selectkategori!="" && selectlokasi!="" && ketedit!=""){
                            // alert("okee");
                            $.ajax({
                                      url   : "<?php echo base_url("Buku/updatedata");?>",
                                      type  : "POST",
                                      data  : {
                                                type        : 3,
                                                id          : id,
                                                nobuku      : nobuku,
                                                judulbuku   : judulbuku,
                                                pengarang   : pengarang,
                                                penerbit    : penerbit,
                                                tahun       : tahun,
                                                nmkategori  : nmkategori,
                                                idkategori  : idkategori,
                                                nmlokasi    : nmlokasi,
                                                idlokasi    : idlokasi,
                                                keterangan  : keterangan
                                              },
                                      cache : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==200){
                                          $.ajax({
                                                    url     : "<?php echo base_url("Buku/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#buku').html(data);
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
                          var id          = button.data('id');
                          var nobuku      = button.data('nobuku');
                          var judulbuku   = button.data('judulbuku');
                          var pengarang   = button.data('pengarang');
                          var penerbit    = button.data('penerbit');
                          var tahun       = button.data('tahun');
                          var namakategori= button.data('nmkategori');
                          var namalokasi   = button.data('lokasirak');
                          var keterangan  = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#idbukuhapus').val(id);
                          modal.find('#nobukuhapus').val(nobuku);
                          modal.find('#judulbukuhapus').val(judulbuku);
                          modal.find('#pengaranghapus').val(pengarang);
                          modal.find('#penerbithapus').val(penerbit);
                          modal.find('#tahunterbithapus').val(tahun);
                          modal.find('#kethapus').val(keterangan);
                          modal.find('#selectkategorihapus').val(namakategori);
                          modal.find('#selectlokasihapus').val(namalokasi);
                        });

                        $('#btnhapus').on('click', function(event){
                          $.ajax({
                                url   : "<?php echo base_url("Buku/hapusdata")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type    :   4,
                                          idbuku :   $('#idbukuhapus').val(),
                                          // lokasirak :   $('#lokasirakhapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("Buku/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#buku').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        $('#formhapusdata').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                          });
                        })

                    </script>
          <?php $this->load->view('partial/footer'); ?>