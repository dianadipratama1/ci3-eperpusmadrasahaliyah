<?php $this->load->view('partial/header');?>
  <?php $this->load->view('kelas/kelassidebar');?>
    <?php $this->load->view('kelas/kelasbreadcrumbs');?>
              <div id="page-inner">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  Daftar Kelas
                              </div>
                              <div class="panel-body">
                                  <div class="col-lg-6" align="left">
                                      <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
                                  </div>
                                  <div class="col-lg-6" align="right">
                                      <input type="text" id="keyword" placeholder="Cari Data Kelas" onkeyup="this.value = this.value.toUpperCase()">
                                      <!-- <a id="btncari" class="btn btn-info btn-search">Cari</a> -->
                                  </div>

                                  <div class="col-lg-12">
                                      <div class="table-responsive">
                                        <div id="container">
                                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                              <thead>
                                                  <tr>
                                                      <th width="3%">No</th>
                                                      <th width="50%">Nama Kelas</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="kelas">
                                                  
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
                            <h4 class="modal-title" style="color: green;">Tambah Data Kelas</h4>
                          </div>

                          <form method="POST" class="formtambahdatakelas">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" id="idsiswainput" placeholder="idsiswa" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Kelas</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" id="namakelasinput" class="form-control" autocomplete="off" placeholder="Nama Kelas" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-success" id="btnsimpan">Simpan</button>                          
                              <button type="button" class="btn btn-danger" onclick="closemodaltambahdata();">Batal</button>
                            </div>               
                        </div>
                      </div>
                  </div>

                  <div class="modal fade" id="updatekelas" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color:orange;">Edit Data Kelas</h4>
                          </div>

                          <form method="POST" class="formeditdatakelas">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idmodal" id="idmodal" placeholder="idmodal" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Kelas</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" name="namakelasmodal" id="namakelasmodal" class="form-control namakelasmodal" autocomplete="off" placeholder="Nama Kelas" onkeyup="this.value = this.value.toUpperCase()">
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

                  <div class="modal fade" id="deletekelas" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color:red;">Apakah Anda Yakin Ingin Hapus Data Ini ?</h4>
                          </div>

                          <form method="POST" class="formeditdatakelas">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idkelashapus" id="idkelashapus" placeholder="idkelashapus" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Kelas</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" name="namakelashapus" id="namakelashapus" class="form-control namakelashapus" autocomplete="off" placeholder="Nama Kelas" readonly="true">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                              <button type="submit" id="deletedatakelas" class="btn btn-warning btn-danger btn-hapus">Ya</button>                          
                              <button type="button" id="btn-batal" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                            </div>               
                        </div>
                      </div>
                  </div>

                  <script>
                    //filterdata
                    $("#keyword").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#kelas tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    //end filterdata

                    //viewajax
                    $.ajax({
                          url: "<?php echo base_url("kelas/viewajax");?>",
                          type: "POST",
                          cache: false,
                          success: function(data){
                              //alert(data);
                              $('#kelas').html(data); 
                          }
                    });
                    //endviewajax

                    //showmodal
                    function showmodaltambahdata(){
                      $("#formtambahdata").modal();
                    }
                    //endshowmodal

                    //closemodaltambah
                    function closemodaltambahdata(){
                      $('#namakelasinput').val("");
                      $("#formtambahdata").modal('toggle');
                    }
                    //endclosemodaltambah
       
                    //fungsibuttonsimpan
                    $('#btnsimpan').on('click', function(event){
                      var namakelas = $('#namakelasinput').val();
                      if (namakelas!=""){
                        // alert(namakelas);
                        $.ajax({
                                  type  : 'POST',
                                  url   : '<?php echo base_url('Kelas/savedata');?>',
                                  cache : false,
                                  data  : {
                                            type        : 2,
                                            namakelas   : $('#namakelasinput').val()   
                                  },
                                  success : function(dataResult){
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode==404){
                                      alert('Data Sudah Ada !');
                                    }else{
                                      $.ajax({
                                                url     : "<?php echo base_url("Kelas/viewajax");?>",
                                                type    : "POST",
                                                cache   : false,
                                                success : function(data){
                                                  $('#kelas').html(data);
                                                }
                                      });
                                      alert('Data Berhasil Dismpan');
                                      $('#namakelasinput').val("");
                                    }

                                  }
                        });

                        
                      }else{
                        alert('Data Kosong Harap Isi Data Terlebih Dahulu !');
                      }
                    });
                    //endfungsibuttonsimpan
                    
                    //tampilmodaledit
                    $('#updatekelas').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('nmkelas');
                      var modal = $(this);
                      modal.find('#idmodal').val(id);
                      modal.find('#namakelasmodal').val(name);
                    });
                    //endtampilmodaledit

                    $('#btnubahdata').on('click', function(){
                      var namakelasedit = $('#namakelasmodal').val();
                      if (namakelasedit != ""){
                        // alert(namakelasedit);
                        $.ajax({
                                  url   : "<?php echo base_url("Kelas/updaterecords");?>",
                                  type  : "POST",
                                  cache : false,
                                  data  : {
                                            type      : 3,
                                            idkelas   : $('#idmodal').val(),
                                            namakelas : $('#namakelasmodal').val()
                                  },
                                  success:function(dataResult){
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode==404){
                                      alert('Data Sudah Ada / Data Masih Sama Dengan Ini & Data Tidak Diubah !');
                                      $('#updatekelas').modal('toggle');
                                    }else{
                                      if (dataResult.statusCode==200){
                                        $.ajax({
                                                  url     : "<?php echo base_url("Kelas/viewajax");?>",
                                                  type    : "POST",
                                                  cache   : false,
                                                  success : function(data){
                                                    $('#kelas').html(data);
                                                  }
                                        });
                                        alert('Update Data Berhasil !');
                                        $('#updatekelas').modal('toggle');
                                      }else{
                                        alert('Cek KOneksi Database ! Hubungi Administrator');
                                      }
                                    }
                                  }
                        });
                      }else{
                        alert('Data Kosong, Harap Di isi Terlebih Dahulu !');
                      }
                    });

                    //tampilmodalhapus
                    $('#deletekelas').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('nmkelas');
                      var modal = $(this);
                      modal.find('#idkelashapus').val(id);
                      modal.find('#namakelashapus').val(name);
                    });
                    //endtampilmodalhapus

                    //fungsionclickhapusdatakelas
                    $(document).on("click",".btn-hapus",function(){
                      //ajaxfungsihapusdata
                      $.ajax({
                                url   : "<?php echo base_url("kelas/deleterecords")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type      :   4,
                                          idkelas   :   $('#idkelashapus').val(),
                                          namakelas :   $('#namakelashapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("kelas/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#kelas').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        $('#deletekelas').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                      });
                      //endajaxfungsihapusdata
                    });
                    //endfungsionclickhapusdatakelas

                    var nmkelasinput = document.getElementById('namakelasinput');
                    nmkelasinput.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("btnsimpan").click();
                      }
                    });

                    var nmkelasupdate = document.getElementById('namakelasmodal');
                    nmkelasupdate.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("btnubahdata").click();
                      }
                    });

                    // var keyword = document.getElementById('keyword');
                    // var tombolcari = document.getElementById('btn-search');
                    // var container = document.getElementById('container');

                    // // tombolcari.addEventListener('mouseover', function(){
                    // //  alert('mantab');
                    // // });
                    // keyword.addEventListener('keyup', function(){
                    //    //buatobjekajax
                    //    var xhr = new XMLHttpRequest();
                    //    //cekkesiapanajax
                    //    xhr.onreadystatechange = function(){
                    //      if (xhr.readyState == 4 && xhr.status == 200) {
                    //        // console.log(xhr.responseText);
                    //        container.innerHTML = xhr.responseText;
                    //      }
                    //    }

                    //    xhr.open('GET','<?php //echo base_url('Kelas/searchrecords');?>?keyword='+keyword.value,true);
                    //    xhr.send();
                    // })
                  </script>

                 <!-- <script type="text/javascript" src="<?php //echo base_url('asset/js/eperpus/kelas/kelas.js');?>"></script> -->
                <?php $this->load->view('partial/footer');?>