<?php 
    $this->load->view('partial/header');
        $this->load->view('user/usersidebar');
            $this->load->view('user/userbreadcrumbs');
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    User
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
                                                        <th>NIP</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Nama User</th>
                                                        <!-- <th>Password</th> -->
                                                        <th>Role User</th>
                                                        <th>Alamat</th>
                                                        <th>No Telp</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="user">
                                                   
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
                              <h4 class="modal-title" style="color: green;">Tambah Data User Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="iduserinput" id="iduserinput" placeholder="iduser" class="form-control" autocomplete="off" >
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
                                  <label>NIP</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="nipinput" id="nipinput" class="form-control" autocomplete="off" placeholder="NIP" value="">
                                </div>

                                <div class="col-md-2">
                                  <label>Nama Lengkap</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="nmpgwinput" id="nmpgwinput" placeholder="Nama Pegawai" class="form-control" autocomplete="off" >
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama User</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="namauserinput" id="namauserinput" placeholder="Nama User" class="form-control" autocomplete="off" >
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Password</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="Password" name="passwordinput" id="passwordinput" placeholder="Password" class="form-control" autocomplete="off" >
                                  <input type="checkbox" id="seepasswd">*Lihat Password
                                </div>
                                
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Role User</label>
                                </div>
                                    
                                <div class="col-md-4">
                                   <!--  <input type="text" name="nmortuinput" id="nmortuinput" placeholder="NAMA ORANG TUA" class="form-control" autocomplete="off" > -->
                                   <select id='selectroleuserinput' style="width: 268px; height: 35px;" onchange="pilihroleuserinput();">
                                    <option value='pilroleuser' selected="selected">--Pilih Role User--</option>
                                    <?php foreach ($roleuser as $row) {
                                      echo "<option value='".$row->roleuser."'>".$row->roleuser."</option>";
                                    }?>
                                  </select>
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Alamat</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="alamatinput" id="alamatinput" placeholder="Alamat" class="form-control" autocomplete="off">
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Telp</label><!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <input type="text" name="notelpinput" id="notelpinput" placeholder="No Telp" class="form-control" autocomplete="off">
                                </div>


                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <textarea style="width: 268px;" rows="3" id="ketinput" name="ketinput" placeholder="   Keterangan"></textarea>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <!-- <input type="text" id="tampungkelas"> -->
                                  <div id="tampunganroleuser">
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

                    <div class="modal fade" id="formeditdata" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h4 class="modal-title" style="color: orange;">Edit Data User Perpustakaan</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="iduseredit" id="iduseredit" placeholder="iduser" class="form-control" autocomplete="off" >
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
                                  <label>NIP</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="nipedit" id="nipedit" class="form-control" autocomplete="off" placeholder="NIP" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Nama Lengkap</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="nmpgwedit" id="nmpgwedit" placeholder="Nama Pegawai" class="form-control" autocomplete="off" >
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama User</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="namauseredit" id="namauseredit" placeholder="Nama User" class="form-control" autocomplete="off" >
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Password</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="Password" name="passwordedit" id="passwordedit" placeholder="Password" class="form-control" autocomplete="off" >
                                  <input type="checkbox" id="seepasswdedit">*Lihat Password
                                </div>
                                
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Role User</label>
                                </div>
                                    
                                <div class="col-md-4">
                                   <!--  <input type="text" name="nmortuinput" id="nmortuinput" placeholder="NAMA ORANG TUA" class="form-control" autocomplete="off" > -->
                                   <select id='selectroleuseredit' style="width: 268px; height: 35px;" onchange="pilihroleuseredit();">
                                    <option value='pilroleuser' value="pilroleuser" selected="selected">--Pilih Role User--</option>
                                    <?php foreach ($roleuser as $row) {
                                      echo "<option value='".$row->roleuser."'>".$row->roleuser."</option>";
                                    }?>
                                  </select>
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Alamat</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="alamatedit" id="alamatedit" placeholder="Alamat" class="form-control" autocomplete="off">
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Telp</label><!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <input type="text" name="notelpedit" id="notelpedit" placeholder="No Telp" class="form-control" autocomplete="off">
                                </div>


                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <textarea style="width: 268px;" rows="3" id="ketedit" name="ketedit" placeholder="   Keterangan"></textarea>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <!-- <input type="text" id="tampungkelas"> -->
                                  <div id="tampunganroleuseredit">
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
                                     <button type="submit" id="btnupdate" class="btn btn-warning">Update</button>
                                    <!-- <a class="btn btn-success" id="btnsimpan">Simpan</a> -->
                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
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
                              <h4 class="modal-title" style="color: red;">Apakah Anda Yakin Hapus Data Ini ?</h4>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="iduserhapus" id="iduserhapus" placeholder="iduser" class="form-control" autocomplete="off" disabled="true">
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
                                  <label>NIP</label>
                                </div>

                                <div class="col-md-4">
                                  <input type="text" name="niphapus" id="niphapus" class="form-control" autocomplete="off" placeholder="NIP" disabled="true">
                                </div>

                                <div class="col-md-2">
                                  <label>Nama Lengkap</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="nmpgwhapus" id="nmpgwhapus" placeholder="Nama Pegawai" class="form-control" autocomplete="off" disabled="true">
                                </div> 
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Nama User</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="namauserhapus" id="namauserhapus" placeholder="Nama User" class="form-control" autocomplete="off" disabled="true">
                                </div> 
                                
                                <div class="col-md-2">
                                  <label>Password</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="Password" name="passwordhapus" id="passwordhapus" placeholder="Password" class="form-control" autocomplete="off" disabled="true">
                                  <!-- <input type="checkbox" id="seepasswd">*Lihat Password -->
                                </div>
                                
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>Role User</label>
                                </div>
                                    
                                <div class="col-md-4">
                                   <!--  <input type="text" name="nmortuinput" id="nmortuinput" placeholder="NAMA ORANG TUA" class="form-control" autocomplete="off" > -->
                                   <select id='selectroleuserhapus' style="width: 268px; height: 35px;" onchange="pilihroleuserinput();" disabled="true">
                                    <option value='pilroleuser' selected="selected">--Pilih Role User--</option>
                                    <?php foreach ($roleuser as $row) {
                                      echo "<option value='".$row->roleuser."'>".$row->roleuser."</option>";
                                    }?>
                                  </select>
                                </div> 
                                    
                                <div class="col-md-2">
                                  <label>Alamat</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <input type="text" name="alamathapus" id="alamathapus" placeholder="Alamat" class="form-control" autocomplete="off" disabled="true">
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <label>No Telp</label><!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <input type="text" name="notelphapus" id="notelphapus" placeholder="No Telp" class="form-control" autocomplete="off" disabled="true">
                                </div>


                                <div class="col-md-2">
                                  <label>Keterangan</label>
                                </div>
                                    
                                <div class="col-md-4">
                                  <textarea style="width: 268px;" rows="3" id="kethapus" name="kethapus" placeholder="   KETERANGAN" disabled="true"></textarea>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                  <!-- <label>Tampung Kelas</label> -->
                                </div>
                                    
                                <div class="col-md-4">
                                  <!-- <p><font color="red"><span id="tampungkelas"></span></font></p> -->
                                  <!-- <input type="text" id="tampungkelas"> -->
                                  <div id="tampunganroleuser">
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
                                     <button type="submit" id="btnhapus" class="btn btn-warning">Ya</button>
                                    <!-- <a class="btn btn-success" id="btnsimpan">Simpan</a> -->
                                    <button type="button" onclick="closemodalhapusdata();" class="btn btn-danger">Tidak</button>
                                  </div>
                                </div>
                              </div> 
                            </div>              
                          </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $.ajax({
                            url: "<?php echo base_url("User/viewajax");?>",
                            type: "POST",
                            cache: false,
                            success: function(data){
                                //alert(data);
                                $('#user').html(data); 
                            }
                        });

                        function showmodaltambahdata() {
                            $('#formtambahdata').modal();
                        }

                        function closemodalhapusdata() {
                            $('#formhapusdata').modal('toggle');
                        }

                        function closemodaltambahdata() {
                          $('#nipinput').val("");
                          $('#nmpgwinput').val("");
                          $('#namauserinput').val("");
                          $('#passwordinput').val("");
                          $('#seepasswd').prop("checked",false);
                          $('#alamatinput').val("");
                          $('#notelpinput').val("");
                          $('#ketinput').val("");
                          $('select').each(function(){
                            $(this).val($(this).find("option[selected]").val());
                          });
                          $('#tampunganidroleuserinput').val("");
                          $('#tampunganroleuserinput').val("");
                          $('#formtambahdata').modal('toggle');
                        }

                        //filterdata
                        $("#keyword").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#user tr").filter(function() {
                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        //end filterdata

                        function pilihroleuserinput(){
                          var roleuser = $('#selectroleuserinput option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("User/getidroleuser");?>",
                                      type    : "POST",
                                      data    : {
                                                  roleuser : roleuser
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganroleuser').html(dataResult);
                                      }
                            });
                        }

                        function pilihroleuseredit(){
                          var roleuser = $('#selectroleuseredit option:selected').val();
                          // alert(tampung);
                           $.ajax({
                                      url     : "<?php echo base_url("User/getidroleuseredit");?>",
                                      type    : "POST",
                                      data    : {
                                                  roleuser : roleuser
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganroleuseredit').html(dataResult);
                                      }
                            });
                        }

                        $("#nipinput").keypress(function(data){
                          if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                            $("#pesan").html("isikan angka").show().fadeOut("slow");
                            return false;
                          } 
                        });

                        $("#notelpinput").keypress(function(data){
                          if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
                            $("#pesan").html("isikan tahun").show().fadeOut("slow");
                            return false;
                          } 
                        });

                        $('#seepasswd').click(function(){
                          if($(this).is(':checked')){
                            $('#passwordinput').attr('type','text');
                          }else{
                            $('#passwordinput').attr('type','password');
                          }
                        });

                        $('#seepasswdedit').click(function(){
                          if($(this).is(':checked')){
                            $('#passwordedit').attr('type','text');
                          }else{
                            $('#passwordedit').attr('type','password');
                          }
                        });
                        
                        $('#btnsimpan').on('click', function(){
                          var nip             = $('#nipinput').val();
                          var nmpgw           = $('#nmpgwinput').val();
                          var nmuser          = $('#namauserinput').val();
                          var passwd          = $('#passwordinput').val();
                          var selectroleuser  = $('#selectroleuserinput').val();
                          var roleuser        = $('#tampunganroleuserinput').val();
                          var idroleuser      = $('#tampunganidroleuserinput').val();
                          var alamat          = $('#alamatinput').val();
                          var notelp          = $('#notelpinput').val();
                          var keterangan      = $('#ketinput').val();
                        
                          if (nip!="" && nmpgw!="" && nmuser!="" && passwd!="" && selectroleuser!="pilroleuser" && roleuser!="" && idroleuser!="" && alamat!="" && notelp!="" && keterangan!=""){
                            // alert('okeee');
                            $.ajax({
                              url     : "<?php echo base_url("User/simpandata");?>",
                              type    : "POST",
                              data    : {
                                          type        : 2,
                                          nip         : nip,
                                          nmpgw       : nmpgw,
                                          nmuser      : nmuser,
                                          passwd      : passwd,
                                          roleuser    : roleuser,
                                          idroleuser  : idroleuser,
                                          alamat      : alamat,
                                          notelp      : notelp,
                                          keterangan  : keterangan
                                        },
                              cache   : false,
                              success : function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode==404){
                                  alert('Data Atas NIP Ini Sudah Ada !');
                                }else{
                                  $.ajax({
                                            url     : "<?php echo base_url("User/viewajax");?>",
                                            type    : "POST",
                                            cache   : false,
                                            success : function(data){
                                              $('#user').html(data);
                                            }
                                  });
                                  alert('Data Berhasil Dismpan');
                                  // $('#formtambahdata').modal('toggle');
                                  // $('#closemodaltambahdata').click();
                                  $('#nipinput').val("");
                                  $('#nmpgwinput').val("");
                                  $('#namauserinput').val("");
                                  $('#passwordinput').val("");
                                  $('#seepasswd').prop("checked",false);
                                  $('#alamatinput').val("");
                                  $('#notelpinput').val("");
                                  $('#ketinput').val("");
                                  $('select').each(function(){
                                    $(this).val($(this).find("option[selected]").val());
                                  });
                                  $('#tampunganidroleuserinput').val("");
                                  $('#tampunganroleuserinput').val("");
                                  $('#formtambahdata').modal('toggle');
                                }
                                
                              }
                            });
                          }else{
                            alert('Data Belum Lengkap Harap Lengkapi Data Terlebih Dahulu !');
                          }
                        });

                        $('#formeditdata').on('show.bs.modal', function(event){
                          var button      = $(event.relatedTarget); 
                          var id          = button.data('id');
                          var nip         = button.data('nip');
                          var nmpgw       = button.data('nmpgw');
                          var nmuser      = button.data('nmuser');
                          var passwd      = button.data('passwd');
                          var roleuser    = button.data('roleuser');
                          var alamat      = button.data('alamat');
                          var notelp      = button.data('notelp');
                          var keterangan  = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#iduseredit').val(id);
                          modal.find('#nipedit').val(nip);
                          modal.find('#nmpgwedit').val(nmpgw);
                          modal.find('#namauseredit').val(nmuser);
                          modal.find('#passwordedit').val(passwd);
                          modal.find('#selectroleuseredit').val(roleuser);
                          modal.find('#alamatedit').val(alamat);
                          modal.find('#notelpedit').val(notelp);
                          modal.find('#ketedit').val(keterangan)
                          if (modal.find('#selectroleuseredit').val()==roleuser){
                            $.ajax({
                                      url     : "<?php echo base_url("User/getidroleuseredit");?>",
                                      type    : "POST",
                                      data    : {
                                                  roleuser : roleuser
                                                },
                                      cache   : false,
                                      success : function(dataResult){
                                        $('#tampunganroleuseredit').html(dataResult);
                                      }
                            });
                          }
                        });

                        $('#btnupdate').on('click', function(event){
                          var id              = $('#iduseredit').val();
                          var nip             = $('#nipedit').val();
                          var nmpgw           = $('#nmpgwedit').val();
                          var nmuser          = $('#namauseredit').val();
                          var passwd          = $('#passwordedit').val();
                          // alert(roleuser);
                          var idroleuser      = $('#tampunganidroleuseredit').val();
                          var roleuser        = $('#tampunganroleuseredit2').val();
                          var selectroleuser  = $('#selectroleuseredit').val();
                          var alamat          = $('#alamatedit').val();
                          var notelp          = $('#notelpedit').val();
                          var keterangan      = $('#ketedit').val();

                          if (id!="" && nip!="" && nmpgw!="" && nmuser!="" && passwd!="" && selectroleuser!="pilroleuser" && idroleuser!="" && roleuser!="" && alamat!="" && notelp!="" && keterangan!=""){
                            // alert("okee");
                            // alert(roleuser);
                            $.ajax({
                                      url   : "<?php echo base_url("User/updatedata");?>",
                                      type  : "POST",
                                      data  : {
                                                type            : 3,
                                                id              : id,
                                                nip             : nip,
                                                nmpgw           : nmpgw,
                                                nmuser          : nmuser,
                                                passwd          : passwd,
                                                roleuser        : roleuser,
                                                idroleuser      : idroleuser,
                                                selectroleuser  : selectroleuser,
                                                alamat          : alamat,
                                                notelp          : notelp,
                                                keterangan      : keterangan
                                              },
                                      cache : false,
                                      success : function(dataResult){
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode==200){
                                          $.ajax({
                                                    url     : "<?php echo base_url("User/viewajax");?>",
                                                    type    : "POST",
                                                    cache   : false,
                                                    success : function(data){
                                                      $('#user').html(data);
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

                        $('#formhapusdata').on('show.bs.modal', function(event){
                          var button      = $(event.relatedTarget); 
                          var id          = button.data('id');
                          var nip         = button.data('nip');
                          var nmpgw       = button.data('nmpgw');
                          var nmuser      = button.data('nmuser');
                          var passwd      = button.data('passwd');
                          var roleuser    = button.data('roleuser');
                          var alamat      = button.data('alamat');
                          var notelp      = button.data('notelp');
                          var keterangan  = button.data('keterangan');
                          // alert(kelas);
                          var modal   = $(this);
                          modal.find('#iduserhapus').val(id);
                          modal.find('#niphapus').val(nip);
                          modal.find('#nmpgwhapus').val(nmpgw);
                          modal.find('#namauserhapus').val(nmuser);
                          modal.find('#passwordhapus').val(passwd);
                          modal.find('#selectroleuserhapus').val(roleuser);
                          modal.find('#alamathapus').val(alamat);
                          modal.find('#notelphapus').val(notelp);
                          modal.find('#kethapus').val(keterangan);
                        });

                        $('#btnhapus').on('click', function (event) {
                          $.ajax({
                            url   : "<?php echo base_url("User/hapusdata")?>",
                            type  : "POST",
                            cache : false,
                            data  : {
                                      type    :   4,
                                      iduser  :   $('#iduserhapus').val(),
                                      // lokasirak :   $('#lokasirakhapus').val()   
                            },
                            success:function(dataResult){
                              var dataResult = JSON.parse(dataResult);
                              if (dataResult.statusCode==200){
                                //callfungsiajaxview
                                $.ajax({
                                  url: "<?php echo base_url("User/viewajax");?>",
                                  type: "POST",
                                  cache: false,
                                  success: function(data){
                                    //alert(data);
                                    $('#user').html(data);
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
                <?php $this->load->view('partial/footer');?>