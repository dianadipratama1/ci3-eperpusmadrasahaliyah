<?php $this->load->view('partial/header');?>
  <?php $this->load->view('kategoribuku/kategoribukusidebar');?>
    <?php $this->load->view('kategoribuku/kategoribukubreadcrumbs');?>
              <div id="page-inner">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  Daftar Kategori Buku
                              </div>
                              <div class="panel-body">
                                  <div class="col-lg-6" align="left">
                                      <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
                                  </div>
                                  <div class="col-lg-6" align="right">
                                      <input type="text" id="keyword" placeholder="Cari Data Kategori" onkeyup="this.value = this.value.toUpperCase()">
                                      <!-- <a id="btncari" class="btn btn-info btn-search">Cari</a> -->
                                  </div>

                                  <div class="col-lg-12">
                                      <div class="table-responsive">
                                        <div id="container">
                                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                              <thead>
                                                  <tr>
                                                      <th width="3%">No</th>
                                                      <th width="50%">Nama Kategori</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="kategoribuku">
                                                  
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
                            <h4 class="modal-title" style="color: green;">Tambah Data Kategori Buku</h4>
                          </div>

                          <form method="POST" class="formtambahdatakategori">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" id="idkategoribuku" placeholder="idkategoribuku" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Kategori Buku</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" id="namakategoriinput" class="form-control" autocomplete="off" placeholder="Nama Kategori Buku" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-success" id="btnsimpan">Simpan</button>                          
                              <button type="button" class="btn btn-danger" onclick="closemodaltambah();">Batal</button>
                            </div>               
                        </div>
                      </div>
                  </div>

                  <div class="modal fade" id="updatekategoribuku" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color:orange;">Edit Data Kategori Buku</h4>
                          </div>

                          <form method="POST" class="formeditdatakategori">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idkategoriedit" id="idkategoriedit" placeholder="idkategoriedit" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Kategori Buku</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" name="namakategoriedit" id="namakategoriedit" class="form-control namakategoriedit" autocomplete="off" placeholder="Nama Kategori Buku" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                              <button type="submit" id="updatedatakategori" class="btn btn-warning btn-edit">Ubah</button>                          
                              <button type="button" id="btn-batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            </div>               
                        </div>
                      </div>
                  </div>

                  <div class="modal fade" id="deletekategoribuku" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" style="color:red;">Apakah Anda Yakin Ingin Hapus Data Ini ?</h4>
                          </div>

                          <form method="POST" class="formeditdatakategori">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="idkategorihapus" id="idkategorihapus" placeholder="idkategorihapus" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Kategori</label>
                                </div>

                                <div class="col-md-8">
                                  <input type="text" name="namakategorihapus" id="namakategorihapus" class="form-control namakategorihapus" autocomplete="off" placeholder="Nama Kategori Buku" readonly="true">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                              <button type="submit" id="deletedatakategori" class="btn btn-warning btn-danger btn-hapus">Ya</button>                          
                              <button type="button" id="btn-batal" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                            </div>               
                        </div>
                      </div>
                  </div>

                  <script>
                    //filter search data table
                    $("#keyword").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#kategoribuku tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    //end filterdata

                    //viewajax
                    $.ajax({
                          url: "<?php echo base_url("Kategoribuku/viewajax");?>",
                          type: "POST",
                          cache: false,
                          success: function(data){
                              //alert(data);
                              $('#kategoribuku').html(data); 
                          }
                    });
                    //endviewajax

                    //showmodal
                    function showmodaltambahdata(){
                      $("#formtambahdata").modal();
                    }
                    //endshowmodal

                    function closemodaltambah(){
                      $('#formtambahdata').modal('toggle');
                      $('#namakategoriinput').val("");
                    }

                    //fungsibuttonsimpan
                    $('#btnsimpan').on('click', function(){
                      var nmkategori = $('#namakategoriinput').val();
                      if (nmkategori != ""){
                        // alert('oke');
                        $.ajax({
                                  url   : "<?php echo base_url("Kategoribuku/savedata");?>",
                                  type  : "POST",
                                  cache : false,
                                  data  : {
                                            type  : 2,
                                            nmkategori  : $('#namakategoriinput').val()
                                  },
                                  success: function(dataResult){
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode==404){
                                      alert('Data Sudah Ada !');
                                    }else{
                                      $.ajax({
                                                url     : "<?php echo base_url("Kategoribuku/viewajax");?>",
                                                type    : "POST",
                                                cache   : false,
                                                success : function(data){
                                                  $('#kategoribuku').html(data);
                                                }
                                      });
                                      alert('Data Berhasil Dismpan');
                                      $('#namakategoriinput').val("");
                                    }
                                  }
                        });
                      }else{
                        alert('Data Kosong, Harap Isi Data Terlebih Dahulu');
                      }
                    });
                    //endfungsibuttonsimpan

                    //fungsientersimpan
                    var nmkategoriinput = document.getElementById('namakategoriinput');
                    nmkategoriinput.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("btnsimpan").click();
                      }
                    });
                    //endfungsientersimpan

                    //tampilmodaledit
                    $('#updatekategoribuku').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('nmkategoribuku');
                      var modal = $(this);
                      modal.find('#idkategoriedit').val(id);
                      modal.find('#namakategoriedit').val(name);
                    });
                    //endtampilmodaledit

                    //fungsibuttonubahdata
                    $(document).on("click", "#updatedatakategori", function() {
                      var nmkategori = $('#namakategoriedit').val();
                      if (nmkategori != ""){
                          // alert(namakelasedit);
                          $.ajax({
                                    url   : "<?php echo base_url("Kategoribuku/updaterecords");?>",
                                    type  : "POST",
                                    cache : false,
                                    data  : {
                                              type      : 3,
                                              idkategori   : $('#idkategoriedit').val(),
                                              namakategori : $('#namakategoriedit').val()
                                    },
                                    success:function(dataResult){
                                      var dataResult = JSON.parse(dataResult);
                                      if (dataResult.statusCode==404){
                                        alert('Data Sudah Ada / Data Masih Sama Dengan Ini & Data Tidak Diubah');
                                      }else{
                                        if (dataResult.statusCode==200){
                                          $.ajax({
                                                  url     : "<?php echo base_url("Kategoribuku/viewajax");?>",
                                                  type    : "POST",
                                                  cache   : false,
                                                  success : function(data){
                                                    $('#kategoribuku').html(data);
                                                  }
                                          });
                                          alert('Update Data Berhasil !');
                                          $('#updatekategoribuku').modal('toggle');
                                        }else{
                                          alert('Cek Koneksi Database ! Atau Hubungi Adminstrator');
                                        }
                                      }
                                    }
                          });
                      }else{
                        alert('Data Kosong, Harap Di isi Terlebih Dahulu !');
                      }
                    });
                    //endfungsibuttonubahdata

                    //fungsienteredit
                    var nmkategoriupdate = document.getElementById('namakategoriedit');
                    nmkategoriupdate.addEventListener("keypress", function(event){
                      if (event.keyCode===13) {
                        event.preventDefault();
                        document.getElementById("updatedatakategori").click();
                      }
                    });
                    //endfungsientersimpan

                    //tampilmodalhapus
                    $('#deletekategoribuku').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget); 
                      var id = button.data('id');
                      var name = button.data('nmkategoribuku');
                      var modal = $(this);
                      modal.find('#idkategorihapus').val(id);
                      modal.find('#namakategorihapus').val(name);
                    });
                    //endtampilmodalhapus

                    //fungsionclickhapusdatakelas
                    $(document).on("click",".btn-hapus",function(){
                      //ajaxfungsihapusdata
                      $.ajax({
                                url   : "<?php echo base_url("Kategoribuku/deleterecords")?>",
                                type  : "POST",
                                cache : false,
                                data  : {
                                          type      :   4,
                                          idkategori   :   $('#idkategorihapus').val(),
                                          namakategori :   $('#namakategorihapus').val()   
                                },
                                success:function(dataResult){
                                  var dataResult = JSON.parse(dataResult);
                                  if (dataResult.statusCode==200){
                                    //callfungsiajaxview
                                    $.ajax({
                                      url: "<?php echo base_url("Kategoribuku/viewajax");?>",
                                      type: "POST",
                                      cache: false,
                                      success: function(data){
                                        //alert(data);
                                        $('#kategoribuku').html(data);
                                        alert("Data Berhasil Dihapus !");
                                        // $('.namakelashapus').val("");
                                        // $('.idkelashapus').val("");
                                        $('#deletekategoribuku').modal('toggle'); 
                                      }
                                    });
                                    //endcallfungsiajaxview
                                  }
                                }
                      });
                      //endajaxfungsihapusdata
                    });
                    //endfungsionclickhapusdatakelas
                  </script>
                <?php $this->load->view('partial/footer');?>