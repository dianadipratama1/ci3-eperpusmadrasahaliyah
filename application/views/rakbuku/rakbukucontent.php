<?php $this->load->view('partial/header');?>
  <?php $this->load->view('rakbuku/rakbukusidebar');?>
    <?php $this->load->view('rakbuku/rakbukubreadcrumbs');?>
              <div id="page-inner">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  Daftar Rak Buku
                              </div>
                              <div class="panel-body">
                                  <div class="col-lg-6" align="left">
                                      <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
                                  </div>
                                  <div class="col-lg-6" align="right">
                                      <input type="text" id="keyword" placeholder="Cari Data Lokasi" onkeyup="this.value = this.value.toUpperCase()">
                                      <!-- <a id="btncari" class="btn btn-info btn-search">Cari</a> -->
                                  </div>

                                  <div class="col-lg-12">
                                      <div class="table-responsive">
                                        <div id="container">
                                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                              <thead>
                                                  <tr>
                                                      <th width="3%">No</th>
                                                      <th width="20%">Lokasi Rak Buku</th>
                                                      <!-- <th width="40%">Keterangan</th> -->
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="rakbuku">
                                                  
                                              </tbody>
                                          </table>
                                        </div>
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
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color: green;">Tambah Data Lokasi Rak</h4>
                          </div>

                          <form method="POST" class="formtambahdatakategori">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" placeholder="idrakbuku" id="idrakbuku" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Lokasi Rak Buku</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" class="form-control" autocomplete="off" placeholder="Lokasi Rak Buku" id="lokasirakinput" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-success btn-simpan" id="btnsimpan">Simpan</button>                          
                              <button type="button" onclick="closemodaltambahdata();" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            </div>               
                        </div>
                      </div>
                  </div>

                  <div class="modal fade" id="formupdatedata" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" style="color:orange;">Edit Data Rak Buku</h4>
                        </div>

                        <form method="POST" class="formupdatedatarak">
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" id="idrakedit" name="idrakedit" placeholder="idrak" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <label>Lokasi Rak</label>
                              </div>

                              <div class="col-md-8">
                                <input type="text" id="lokasirakedit" name="lokasirakedit" class="form-control" autocomplete="off" placeholder="Lokasi Rak Buku" onkeyup="this.value = this.value.toUpperCase()">
                              </div>
                            </div>
                          </div>
                        </form>
                        <div class="modal-footer">
                            <button type="submit" id="btnubahdata" class="btn btn-warning">Ubah</button>                          
                            <button type="button" id="btn-batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
                          </div>               
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="formhapusdata" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" style="color:red;">Apakah Anda Yakin Akan Hapus Data Ini ?</h4>
                        </div>

                        <form method="POST" class="formhapusdatarak">
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="hidden" id="idrakhapus" name="idrakhapus" placeholder="idrak" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <label>Lokasi Rak</label>
                              </div>

                              <div class="col-md-8">
                                <input type="text" id="lokasirakhapus" name="lokasirakhapus" class="form-control" autocomplete="off" placeholder="Lokasi Rak Buku" onkeyup="this.value = this.value.toUpperCase()" readonly="true">
                              </div>
                            </div>
                          </div>
                        </form>
                        <div class="modal-footer">
                            <button type="submit" id="btnhapusdata" class="btn btn-danger">Ya</button>                          
                            <button type="button" id="btn-batal" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                          </div>               
                      </div>
                    </div>
                  </div>

                  <script>
                    $.ajax({
                              url   : "<?php echo base_url("Rakbuku/viewajax");?>",
                              type  : "POST",
                              cache : false,
                              success:function (data) {
                                $('#rakbuku').html(data);
                              }
                    });

                    //filter search data table
                    $("#keyword").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#rakbuku tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    //end filterdata

                    function showmodaltambahdata(){
                      $("#formtambahdata").modal();
                    }

                    function closemodaltambahdata(){
                      $("#formtambahdata").modal('toggle');
                      $('#lokasirakinput').val("");
                    }

                    //fungsibuttonsimpan
                    $("#btnsimpan").on('click', function(){
                      var lokasirak = $('#lokasirakinput').val();
                      if (lokasirak!=""){
                        //fungsisimpandata
                        $.ajax({
                          type: 'POST',
                          url: "<?php echo base_url("Rakbuku/savedata")?>",
                          cache: false,
                          data:{
                                type      : 2,
                                idrak   : $('#idrakbuku').val(),
                                lokasirak : $('#lokasirakinput').val(),
                          },
                          success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode==200){
                              alert('Data Berhasil Disimpan');
                              $('#lokasirakinput').val("");
                              $.ajax({
                                                url   : "<?php echo base_url("Rakbuku/viewajax");?>",
                                                type  : "POST",
                                                cache : false,
                                                success:function (data) {
                                                  $('#rakbuku').html(data);
                                                }
                              });
                            }else{
                              if (dataResult.statusCode==404){
                                alert('Data Sudah Ada !');
                              }else{
                                alert('Cek Koneksi Database ! Atau Hubungi Administrator');
                              }
                            }
                          }
                        });
                        //endfungsisimpandata
                      }else{
                        alert('Harap Isi Data Terlebih Dahulu !!');
                      }
                    });
                    //endfungsibuttonsimpan

                    //fungsientersimpan
                    var lokasirak = document.getElementById('lokasirakinput');
                    lokasirak.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("btnsimpan").click();
                      }
                    });
                    //endfungsientersimpan
                    
                    //tampilmodaledit
                    $('#formupdatedata').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('lokasirak');
                      var modal = $(this);
                      modal.find('#idrakedit').val(id);
                      modal.find('#lokasirakedit').val(name);
                    });
                    //endtampilmodaledit

                    $('#btnubahdata').on('click', function (event) {
                      var lokasirak = $('#lokasirakedit').val();
                      if (lokasirak != ""){
                          // alert(namakelasedit);
                          $.ajax({
                                    url   : "<?php echo base_url("Rakbuku/updatedata");?>",
                                    type  : "POST",
                                    cache : false,
                                    data  : {
                                              type       : 3,
                                              idrak      : $('#idrakedit').val(),
                                              lokasirak  : $('#lokasirakedit').val()
                                    },
                                    success:function(dataResult){
                                      var dataResult = JSON.parse(dataResult);
                                      if (dataResult.statusCode==404){
                                        alert('Data Sudah Ada / Data Masih Sama Dengan Ini & Data Tidak Diubah');
                                      }else{
                                        if (dataResult.statusCode==200){
                                          $.ajax({
                                                  url     : "<?php echo base_url("Rakbuku/viewajax");?>",
                                                  type    : "POST",
                                                  cache   : false,
                                                  success : function(data){
                                                    $('#rakbuku').html(data);
                                                  }
                                          });
                                          alert('Update Data Berhasil !');
                                          $('#formupdatedata').modal('toggle');
                                        }else{
                                          alert('Cek Koneksi Database ! Atau Hubungi Adminstrator');
                                        }
                                      }
                                    }
                          });
                      }else{
                        alert('Data Kosong, Harap Di isi Terlebih Dahulu !');
                      }
                    })

                     //tampilmodalhapus
                    $('#formhapusdata').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('lokasirak');
                      var modal = $(this);
                      modal.find('#idrakhapus').val(id);
                      modal.find('#lokasirakhapus').val(name);
                    });
                    //endtampilmodalhapus

                    $('#btnhapusdata').on('click', function(event){
                      //ajaxfungsihapusdata
                      $.ajax({
                                url   : "<?php echo base_url("Rakbuku/deletedata")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type      :   4,
                                          idrak     :   $('#idrakhapus').val(),
                                          lokasirak :   $('#lokasirakhapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("Rakbuku/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#rakbuku').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        $('#formhapusdata').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                      });
                      //endajaxfungsihapusdata
                    });


                  </script>
                <?php $this->load->view('partial/footer');?>