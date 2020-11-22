<?php 
      $this->load->view('partial/header');
        $this->load->view('anggota/anggotasidebar');
          $this->load->view('anggota/anggotabreadcrumbs'); 
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Anggota Perpustakaan
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
                                                        <th>Nis</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Kelas</th>
                                                        <th>Nama Ortu</th>
                                                        <th>No Telp Ortu</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="anggota">
                                                   
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
                              <h4 class="modal-title" style="color: green;">Tambah Data Anggota Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idsiswainput" id="idsiswainput" placeholder="idsiswa" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <!-- <div class="col-md-2">
                                  <label>Kode Anggota</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="kodeanggotainput" id="kodeanggotainput" class="form-control" autocomplete="off" placeholder="KODE ANGGOTA" value="">
                                </div> -->

                                <div class="col-md-2">
                                  <label>NIS</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="nisinput" id="nisinput" class="form-control" autocomplete="off" placeholder="NIS" value="">
                                </div>

                                <div class="col-md-2">
                                  <label>Kelas</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <input type="text" name="kelasinput" id="kelasinput" placeholder="KELAS" class="form-control" autocomplete="off" > -->
                                  <select id='namakelas' style='width: 268px; height: 35px;' onchange="pilihkelasinput();">
                                    <option value='pilkelas' selected="selected">--Pilih Kelas--</option>
                                    <?php foreach ($namakelas as $row) {
                                      echo "<option value='".$row->namakelas."'>".$row->namakelas."</option>";
                                    } ?>
                                  </select>
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama Siswa</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="namasiswainput" id="namasiswainput" placeholder="NAMA SISWA" class="form-control" autocomplete="off" >
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Alamat</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="alamatinput" id="alamatinput" placeholder="ALAMAT" class="form-control" autocomplete="off" >
                                </div>
                                
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama Orang Tua</label>
                                </div>
                                    
                                <div class="col-md-4">
                                    <input type="text" name="nmortuinput" id="nmortuinput" placeholder="NAMA ORANG TUA" class="form-control" autocomplete="off" >
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>No Telp Ortu</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="notelpinput" id="notelpinput" placeholder="NO TELP" class="form-control" autocomplete="off">
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
                                  <!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <!-- <input type="text" id="tampungkelas"> -->
                                  <div id="tampungan">
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
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h4 class="modal-title" style="color: orange;">Edit Data Anggota Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idsiswaedit" id="idsiswaedit" placeholder="idsiswa" class="form-control" autocomplete="off" >
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>NIS</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="nisedit" id="nisedit" class="form-control" autocomplete="off" placeholder="NIS" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Kelas</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <input type="text" name="kelasinput" id="kelasinput" placeholder="KELAS" class="form-control" autocomplete="off" > -->
                                  <select id='selectnamakelasedit' style="width: 268px; height: 35px;" onchange="pilihkelasedit();">
                                    <option value='pilkelas' selected="selected">--Pilih Kelas--</option>
                                    <?php foreach ($namakelas as $row) {
                                      echo "<option value='".$row->namakelas."'>".$row->namakelas."</option>";
                                    }?>
                                  </select>
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama Siswa</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="namasiswaedit" id="namasiswaedit" placeholder="NAMA SISWA" class="form-control" autocomplete="off" >
                                </div>

                                <div class="col-md-2">
                                  <label>Alamat</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="alamatedit" id="alamatedit" placeholder="ALAMAT" class="form-control" autocomplete="off" >
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama Orang Tua</label>
                                </div>
                                    
                                <div class="col-md-4">
                                    <input type="text" name="nmortuedit" id="nmortuedit" placeholder="NAMA ORANG TUA" class="form-control" autocomplete="off" >
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>No Telp Ortu</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="notelpedit" id="notelpedit" placeholder="NO TELP" class="form-control" autocomplete="off">
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
                                  <!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <!-- <input type="text" id="tampungkelas"> -->
                                  <div id="tampunganedit">
                                    <!-- <input type="text" id="tampungidkelas"> -->
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="row">
                                  <div class="col-md-2">
                                    <p><font color="red"><span id="pesanedit"></span></font></p>
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
                            <h4 class="modal-title" style="color: red;">Apakah Anda Yakin Akan Hapus Data Ini ?</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" name="idsiswahapus" id="idsiswahapus" placeholder="idsiswa" class="form-control" autocomplete="off" >
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>NIS</label>
                              </div>

                              <div class="col-md-4">
                                <input type="text" name="nishapus" id="nishapus" class="form-control" autocomplete="off" placeholder="NIS" disabled="true">
                              </div>

                              <div class="col-md-2">
                                <label>Kelas</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <!-- <input type="text" name="kelasinput" id="kelasinput" placeholder="KELAS" class="form-control" autocomplete="off" > -->
                                <select id='selectnamakelashapus' style="width: 268px; height: 35px;" disabled="true">
                                  <option value='pilkelas' selected="selected">--Pilih Kelas--</option>
                                  <?php foreach ($namakelas as $row) {
                                    echo "<option value='".$row->namakelas."'>".$row->namakelas."</option>";
                                  }?>
                                </select>
                              </div>  
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Nama Siswa</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="namasiswahapus" id="namasiswahapus" placeholder="NAMA SISWA" class="form-control" autocomplete="off" disabled="true">
                              </div>

                              <div class="col-md-2">
                                <label>Alamat</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="alamathapus" id="alamathapus" placeholder="ALAMAT" class="form-control" autocomplete="off" disabled="true">
                              </div>  
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <label>Nama Orang Tua</label>
                              </div>
                                  
                              <div class="col-md-4">
                                  <input type="text" name="nmortuhapus" id="nmortuhapus" placeholder="NAMA ORANG TUA" class="form-control" autocomplete="off" disabled="true">
                              </div> 
                                  
                              <div class="col-md-2">
                                <label>No Telp Ortu</label>
                              </div>
                                  
                              <div class="col-md-4">
                                <input type="text" name="notelphapus" id="notelphapus" placeholder="NO TELP" class="form-control" autocomplete="off" disabled="true">
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
                                <!-- <label>Tampung Kelas</label> -->
                              </div>
                                  
                              <div class="col-md-4">
                                <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                <!-- <input type="text" id="tampungkelas"> -->
                                <div id="tampunganedit">
                                  <!-- <input type="text" id="tampungidkelas"> -->
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="row">
                                <div class="col-md-2">
                                  <p><font color="red"><span id="pesanedit"></span></font></p>
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
                            url: "<?php echo base_url("Anggota/viewajax");?>",
                            type: "POST",
                            cache: false,
                            success: function(data){
                                //alert(data);
                                $('#anggota').html(data); 
                            }
                        });

                        function showmodaltambahdata(){
                            $("#formtambahdata").modal();
                        }

                        function closemodalhapusdata(){
                            $("#formhapusdata").modal('toggle');
                        }

                        //filterdata
                        $("#keyword").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#anggota tr").filter(function() {
                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        //end filterdata

                        function closemodaltambahdata(){
                          $('#nisinput').val("");
                          $('#namasiswainput').val("");
                          $('#alamatinput').val("");
                          // $('#namakelas').val("--Pilih Kelas--");
                          $('#nmortuinput').val("");
                          $('#notelpinput').val("");
                          $('#ketinput').val("");
                          $('select').each(function(){
                            $(this).val($(this).find("option[selected]").val());
                          });
                          $('#formtambahdata').modal('toggle');
                        }

                        function closemodaleditdata(){
                          $('#nisedit').val("");
                          $('#namasiswaedit').val("");
                          $('#alamatedit').val("");
                          // $('#namakelas').val("--Pilih Kelas--");
                          $('#nmortuedit').val("");
                          $('#notelpedit').val("");
                          $('#ketedit').val("");
                          $('select').each(function(){
                            $(this).val($(this).find("option[selected]").val());
                          });
                          $('#formeditdata').modal('toggle');
                        }

                        $("#nisinput").keypress(function(data){
                          if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                            $("#pesan").html("isikan angka").show().fadeOut("slow");
                            return false;
                          } 
                        });

                        $("#notelpinput").keypress(function(data){
                          if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                            $("#pesan").html("isikan angka").show().fadeOut("slow");
                            return false;
                          } 
                        });

                        function pilihkelasinput(){
                          var namakelas = $('#namakelas option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("Anggota/getdataidkelas");?>",
                                      type    : "POST",
                                      data    : {
                                                  namakelas : namakelas
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampungan').html(dataResult);
                                      }
                            });
                        }

                        function pilihkelasedit(){
                          var namakelas = $('#selectnamakelasedit option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("Anggota/getdataidkelas");?>",
                                      type    : "POST",
                                      data    : {
                                                  namakelas : namakelas
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganedit').html(dataResult);
                                      }
                            });
                        }

                        $('#formeditdata').on('show.bs.modal', function (event) {
                          var button      = $(event.relatedTarget); 
                          var id          = button.data('id');
                          var nis         = button.data('nis');
                          var nama        = button.data('nama');
                          var alamat      = button.data('alamat');
                          var namakelas   = button.data('kelas');
                          var namaortu    = button.data('namaortu');
                          var nohportu    = button.data('nohportu');
                          var keterangan  = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#idsiswaedit').val(id);
                          modal.find('#nisedit').val(nis);
                          modal.find('#namasiswaedit').val(nama);
                          modal.find('#alamatedit').val(alamat);
                          modal.find('#nmortuedit').val(namaortu);
                          modal.find('#notelpedit').val(nohportu);
                          modal.find('#ketedit').val(keterangan);
                          modal.find('#selectnamakelasedit').val(namakelas);
                          if (modal.find('#selectnamakelasedit').val()==namakelas){
                            $.ajax({
                                      url     : "<?php echo base_url("Anggota/getdataidkelas");?>",
                                      type    : "POST",
                                      data    : {
                                                  namakelas : namakelas
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganedit').html(dataResult);
                                      }
                            });
                          }
                        });

                        $('#btnupdate').on('click', function(event){
                          var idsiswa     =   $('#idsiswaedit').val();
                          var nis         =   $('#nisedit').val();
                          var namasiswa   =   $('#namasiswaedit').val();
                          var alamat      =   $('#alamatedit').val();
                          var namaortu    =   $('#nmortuedit').val();
                          var notelp      =   $('#notelpedit').val();
                          var keterangan  =   $('#ketedit').val();
                          var kelas       =   $('#tampungankelas').val();
                          // alert(kelas);
                          var idkelas     =   $('#tampunganidkelas').val();

                          if(idsiswa!="" && nis!="" && namasiswa!="" && alamat!="" && namaortu!="" && notelp!="" && keterangan!="" && kelas!="" & idkelas!=""){
                            // $("#btnsimpan").attr("disabled", "disabled");
                            $.ajax({
                                      url     : "<?php echo base_url("Anggota/updatedata");?>",
                                      type    : "POST",
                                      data    : {
                                                  type      : 3,
                                                  idsiswa   : idsiswa,
                                                  nis       : nis,
                                                  namasiswa : namasiswa,
                                                  alamat    : alamat,
                                                  namaortu  : namaortu,
                                                  keterangan: keterangan,
                                                  kelas     : kelas,
                                                  notelp    : notelp,
                                                  idkelas   : idkelas
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==200){
                                          $.ajax({
                                                    url     : "<?php echo base_url("Anggota/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#anggota').html(data);
                                                    }
                                          });
                                          // $('#closemodaleditdata').click();
                                          alert('Data Berhasil Diupdate !');
                                          $('#formeditdata').modal('toggle');
                                        }else{
                                          alert('Data Tidak Diupdate');
                                        }                                        
                                      }
                            });
                          }
                          else{
                            alert('Data Belum Lengkap Harap Lengkapi Data Terlebih Dahulu !');
                          }
                        });

                        $('#btnsimpan').on('click', function(event){
                          var nis         =   $('#nisinput').val();
                          var namasiswa   =   $('#namasiswainput').val();
                          var alamat      =   $('#alamatinput').val();
                          var namaortu    =   $('#nmortuinput').val();
                          var notelp      =   $('#notelpinput').val();
                          var keterangan  =   $('#ketinput').val();
                          var kelas       =   $('#tampungankelas').val();
                          var idkelas     =   $('#tampunganidkelas').val();
                          // alert(idkelas);
                          // event.preventDefault(event);

                          if(nis!="" && namasiswa!="" && alamat!="" && namaortu!="" && notelp!="" && keterangan!="" && kelas!="" & idkelas!=""){
                            // $("#btnsimpan").attr("disabled", "disabled");
                            $.ajax({
                                      url     : "<?php echo base_url("Anggota/simpandata");?>",
                                      type    : "POST",
                                      data    : {
                                                  type      : 2,
                                                  nis       : nis,
                                                  namasiswa : namasiswa,
                                                  alamat    : alamat,
                                                  namaortu  : namaortu,
                                                  keterangan: keterangan,
                                                  kelas     : kelas,
                                                  notelp    : notelp,
                                                  idkelas   : idkelas
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==404){
                                          alert('Data Atas NIS Ini Sudah Ada !');
                                        }else{
                                          $.ajax({
                                                    url     : "<?php echo base_url("Anggota/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#anggota').html(data);
                                                    }
                                          });
                                          $('#nisinput').val("");
                                          $('#namasiswainput').val("");
                                          $('#alamatinput').val("");
                                          // $('#namakelas').val("--Pilih Kelas--");
                                          $('#nmortuinput').val("");
                                          $('#notelpinput').val("");
                                          $('#ketinput').val("");
                                          $('select').each(function(){
                                            $(this).val($(this).find("option[selected]").val());
                                          });
                                          $('#tampunganidkelas').val("");
                                          $('#tampungankelas').val("");
                                          alert('Data Berhasil Dismpan');
                                          // $('#formtambahdata').modal('toggle');
                                          // $('#closemodaltambahdata').click();
                                          $('#formtambahdata').modal('toggle');
                                        }
                                        
                                      }
                            });
                          }
                          else{
                            alert('Data Belum Lengkap Harap Lengkapi Data Terlebih Dahulu !');
                          }
                          // alert(keterangan);
                        });

                        $('#formhapusdata').on('show.bs.modal', function(event){
                          var button      = $(event.relatedTarget); 
                          var id          = button.data('id');
                          var nis         = button.data('nis');
                          var nama        = button.data('nama');
                          var alamat      = button.data('alamat');
                          var namakelas   = button.data('kelas');
                          var namaortu    = button.data('namaortu');
                          var nohportu    = button.data('nohportu');
                          var keterangan  = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#idsiswahapus').val(id);
                          modal.find('#nishapus').val(nis);
                          modal.find('#namasiswahapus').val(nama);
                          modal.find('#alamathapus').val(alamat);
                          modal.find('#nmortuhapus').val(namaortu);
                          modal.find('#notelphapus').val(nohportu);
                          modal.find('#kethapus').val(keterangan);
                          modal.find('#selectnamakelashapus').val(namakelas);
                        });

                        $('#btnhapus').on('click', function(event){
                          $.ajax({
                                url   : "<?php echo base_url("Anggota/hapusdata")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type    :   4,
                                          idsiswa :   $('#idsiswahapus').val(),
                                          // lokasirak :   $('#lokasirakhapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("Anggota/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#anggota').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        $('#formhapusdata').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                          });
                        });
                    </script>
          <?php $this->load->view('partial/footer'); ?>