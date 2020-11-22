<?php 
    $this->load->view('partial/header');
        $this->load->view('lappeminjaman/lappeminjamansidebar');
            $this->load->view('lappeminjaman/lappeminjamanbreadcrumbs');
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List Data Buku Dipinjam
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12" align="left">
                                      <label>Pilih Tanggal Awal</label>   <input type="date" id="tglawal" style="width: 170px;">
                                      <label>Pilih Tanggal Akhir</label>   <input type="date" id="tglakhir" style="width: 170px;">
                                      <a class="btn btn-info" onclick="" id="caridata">Cari Data</a>
                                      <a class="btn btn-success" id="cetakpdf">Cetak PDF</a>
                                    </div>
                                    <br/><br><br>
                                    <div class="col-lg-12"></div><div class="col-lg-12"></div>

                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                    <tr>
                                                        <th style="background-color: #FF8C00">No</th>
                                                        <th style="background-color: #00BFFF">Kode Pinjam</th>
                                                        <th style="width: 150px; background-color: #1E90FF;">Nama Peminjam</th>
                                                        <th style="width: 150px; background-color: #FFD700">Buku Dipinjam</th>
                                                        <th style="width: 100px; background-color: #E9967A">Tgl Pinjam</th>
                                                        <th style="width: 100px; background-color: #8FBC8F">Tgl Rencana Kembali</th>
                                                        <th style="width: 50; background-color: #F08080" >Lama Pinjam</th>
                                                        <th style="background-color: #20B2AA">Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="divlappeminjaman">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="divoutputpdf"></div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <script type="text/javascript">
                      $('#caridata').on('click', function(){
                        var tglawal  = $('#tglawal').val();
                        var tglakhir  = $('#tglakhir').val();
                        // console.log(tgl1);
                        // console.log(tgl2);

                        if (tglawal>tglakhir){
                          alert("Harap Pilih Tanggal Dengan Benar");
                        }else{
                          if (tglawal!="" && tglakhir!=""){
                            $.ajax({
                                      url : "<?php echo base_url('Lappeminjaman/filterdata');?>",
                                      type  : "POST",
                                      data : {
                                                tglawal : tglawal,
                                                tglakhir : tglakhir
                                      },
                                      cache : false,
                                      success : function (dataResult) {
                                        // var dataResult = JSON.parse(dataResult);
                                        $('#divlappeminjaman').html(dataResult);
                                      }
                            });

                            $('#cetakpdf').attr("onclick","window.open('<?=base_url()?>Lappeminjaman/cetakdatapinjam/"+tglawal+"/"+tglakhir+"/"+"','CETAK REPORT PEMINJAMAN BUKU PERPUSTAKAAN','width=900','height=900')");
                          }else{
                            alert("Harap Isi Tanggal Terlebih Dahulu");
                          }
                        }
                      });
                    </script>
                <?php $this->load->view('partial/footer');?>