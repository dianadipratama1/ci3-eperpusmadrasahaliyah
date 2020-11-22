<?php $this->load->view('partial/header');?>
  <?php $this->load->view('role/rolesidebar');?>
    <?php $this->load->view('role/rolebreadcrumbs');?>
              <div id="page-inner">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  Daftar Role User
                              </div>
                              <div class="panel-body">
                                  <div class="col-lg-6" align="left">
                                      <!-- <a href="#" class="btn btn-success" onclick="showmodaltambahdata()">Tambah Data</a> -->
                                  </div>
                                  <div class="col-lg-6" align="right">
                                      <input type="text" id="keyword" placeholder="Cari Data ROle" onkeyup="this.value = this.value.toUpperCase()">
                                      <!-- <a id="btncari" class="btn btn-info btn-search">Cari</a> -->
                                  </div>

                                  <div class="col-lg-12">
                                      <div class="table-responsive">
                                        <div id="container">
                                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                              <thead>
                                                  <tr>
                                                      <th width="3%">No</th>
                                                      <th width="50%">Role User</th>
                                                      <!-- <th>Action</th> -->
                                                  </tr>
                                              </thead>
                                              <tbody id="role">
                                                  
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

                  <script>
                     //filter search data table
                    $("#keyword").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#role tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    //end filterdata

                    //viewajax
                    $.ajax({
                          url: "<?php echo base_url("Role/viewajax");?>",
                          type: "POST",
                          cache: false,
                          success: function(data){
                              //alert(data);
                              $('#role').html(data); 
                          }
                    });
                    //endviewajax
                  </script>

                 <!-- <script type="text/javascript" src="<?php //echo base_url('asset/js/eperpus/kelas/kelas.js');?>"></script> -->
                <?php $this->load->view('partial/footer');?>