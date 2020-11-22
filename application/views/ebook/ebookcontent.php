<?php 
      $this->load->view('partial/header');
        $this->load->view('ebook/ebooksidebar');
          $this->load->view('ebook/ebookbreadcrumbs'); 
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Ebook Perpustakaan
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-6" align="left">
                                        <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a>
                                    </div>
                                    <div class="col-lg-6" align="right">
                                        <input type="text" id="keyword" placeholder="Search">
                                        <!-- <a href="#" class="btn btn-info">Cari</a> -->
                                    </div>

                                    <br />
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Cover Ebook</th>
                                                        <th>Judul Ebook</th>
                                                        <th>Action</th>
                                                        <!-- <th>Action</th>  -->
                                                    </tr>
                                                </thead>
                                                <tbody id="ebooklist">
                                                   
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

                    <form id="submitformebook">
                      <div class="modal fade" id="formtambahdata" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodaltambahdata();">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title" style="color: green;">Tambah Data Ebook</h4>
                                </div>

                                <form id="uploadebookperpus">

                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label>Judul Buku</label>
                                    </div>

                                    <div class="col-md-9">
                                      <input type="text" name="judulbukuinput" id="judulbukuinput" class="form-control" autocomplete="off" placeholder="Judul Buku" value="">
                                    </div>

                                    <div class="col-md-3">
                                      <label>Cover Book<font color="red"> *JPG</font></label>
                                    </div>
                                        
                                    <div class="col-md-9">
                                      <input type="file" accept="image/*" onchange="loadFile(event)" name="coverfileinput" id="coverfileinput" placeholder="File Ebook" class="form-control" autocomplete="off" >
                                      <img id="output" height="150" width="150">
                                    </div> 

                                    <div class="col-md-3">
                                      <label>File Ebook<font color="red"> *PDF</font></label>
                                    </div>
                                        
                                    <div class="col-md-9">
                                      <input type="file" accept="pdf" name="ebookfileinput" id="ebookfileinput" placeholder="File Ebook" class="form-control" autocomplete="off" >
                                    </div> 
                                  </div>

                                  <div class="modal-footer">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <p><font color="red"><span id="pesan"></span></font></p>
                                      </div>
                                      <div class="col-md-10">
                                        <button type="submit" id="btnupload" class="btn btn-success" value="simpan">Upload</button>                          
                                        <button type="button" onclick="closemodaltambahdata();" class="btn btn-danger">Batal</button>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
                                </div>              
                              </div>
                            </div>
                      </div>
                    </form>

                    <script>
                        $.ajax({
                            url: "<?php echo base_url("Ebookperpus/viewajax");?>",
                            type: "POST",
                            cache: false,
                            success: function(data){
                                alert(data);
                                $('#ebooklist').html(data); 
                            }
                        });

                        var loadFile = function(event) {
                          var output = document.getElementById('output');
                          output.src = URL.createObjectURL(event.target.files[0]);
                        };

                        function showmodaltambahdata(){
                            $("#formtambahdata").modal();
                        }

                        function clearmodaltambahdata(event) {
                          $('#judulbukuinput').val("");
                          $('#ebookfileinput').val("");
                          $('#coverfileinput').val("");
                          URL.revokeObjectURL(output.src);
                          output.src='';
                        }


                        function closemodaltambahdata(){
                          clearmodaltambahdata();
                          $('#formtambahdata').modal('toggle');
                        }

                        //filterdata
                        $("#keyword").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#ebooklist tr").filter(function() {
                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        //end filterdata

                        $("#submitformebook").on('submit',(function(e) {
                          var judulbukuinput  = document.getElementById('judulbukuinput').value;
                          var ebookfileinput  = document.getElementById('ebookfileinput').value;
                          var coverfileinput  = document.getElementById('coverfileinput').value;

                            e.preventDefault();
                            $.ajax({
                              url: "<?php echo base_url().'Ebookperpus/uploadebook/"+window.btoa(judulbukuinput)+"/"+window.btoa(coverfileinput)+"/"+window.btoa(ebookfileinput)+"'?>",
                              type: "POST",
                              data:  new FormData(this),
                              contentType: false,
                              cache: false,
                              processData:false,
                              success: function(data){
                                        var ret = new String(data);
                                        if (ret.substring(2,7)=="Gagal") {
                                          // $("#loading").hide();
                                          // $("#btnsimpan").show();
                                          // $("#btnsimpan").attr('disabled',true);
                                          alert(ret);
                                          // kosong();
                                        } 
                                        else {
                                          alert(data);
                                          clearmodaltambahdata();
                                          // $("#loading").hide();
                                          // $("#btnsimpan").show();
                                          // $("#btnsimpan").attr('disabled',false);
                                          // kosong();
                                        }
                                      }       
                            });
                        }));

                    </script>
          <?php $this->load->view('partial/footer'); ?>