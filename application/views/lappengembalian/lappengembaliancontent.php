<?php 
    $this->load->view('partial/header');
        $this->load->view('lappengembalian/lappengembaliansidebar');
            $this->load->view('lappengembalian/lappengembalianbreadcrumbs');
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List Data Buku Dikembalikan
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12" align="left">
                                      <label>Pilih Tanggal Awal</label>   <input type="date" id="tglawal" style="width: 170px;">
                                      <label>Pilih Tanggal Akhir</label>   <input type="date" id="tglakhir" style="width: 170px;">
                                      <a class="btn btn-info" onclick="caridata();" id="caridata">Cari Data</a>
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
                                                        <th style="background-color: #00B9Fa">Kode Kembali</th>
                                                        <th style="background-color: #00BFFF">Nama Siswa</th>
                                                        <th style="width: 150px; background-color: #1E90FF;">Judul Buku</th>
                                                        <th style="width: 150px; background-color: #FFD700">Tgl Pinjam</th>
                                                        <th style="width: 100px; background-color: #E9967A">Tgl Rencana Kembal</th>
                                                        <th style="width: 100px; background-color: #8FBC8F">Tgl Kembali</th>
                                                        <th style="width: 50; background-color: #F08080" >Lama Pinjam</th>
                                                        <th style="background-color: #00BFFF">Terlambat</th>
                                                        <th style="background-color: #02BAFF">Keterangan</th>
                                                        <th style="background-color: #20B2AA">Keterangan Kembali</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="divlappengembalian">
                                                   
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

                    <script type="text/javascript">
                      $('#caridata').on('click',function (e) {
                        var tglawal   = $('#tglawal').val();
                        var tglakhir  = $('#tglakhir').val();
                        if (tglawal>tglakhir){
                          alert("Harap Pilih Tanggal Dengan Benar");
                        }else{
                          if (tglawal!="" && tglakhir!=""){
                            $.ajax({
                                      url : "<?php echo base_url('Lappengembalian/filterdata');?>",
                                      type  : "POST",
                                      data : {
                                                tglawal : tglawal,
                                                tglakhir : tglakhir
                                      },
                                      cache : false,
                                      success : function (dataResult) {
                                        // var dataResult = JSON.parse(dataResult);
                                        $('#divlappengembalian').html(dataResult);
                                      }
                            });

                            $('#cetakpdf').attr("onclick","window.open('<?=base_url()?>Lappengembalian/cetakdatakembali/"+tglawal+"/"+tglakhir+"/"+"','CETAK REPORT PENGEMBALIAN BUKU PERPUSTAKAAN','width=900','height=900')");
                          }else{
                            alert("Harap Isi Tanggal Terlebih Dahulu");
                          }
                        }
                        // alert(tglawal);
                      });

                      // $('#cetakpdf').on('click',function (dataResult) {
                      //   var tglawal   = $('#tglawal').val();
                      //   var tglakhir  = $('#tglakhir').val();
                      //   if (tglawal>tglakhir){
                      //     alert("Harap Pilih Tanggal Dengan Benar");
                      //   }else{
                      //     if (tglawal!="" && tglakhir!=""){
                      //       $.ajax({
                      //                 url : "<?php echo base_url('Lappengembalian/cetakdata');?>",
                      //                 type  : "POST",
                      //                 data : {
                      //                           tglawal : tglawal,
                      //                           tglakhir : tglakhir
                      //                 },
                      //                 cache : false,
                      //                 success : function (dataResult) {
                      //                   // var dataResult = JSON.parse(dataResult);
                      //                   // $('#divlappeminjaman').html(dataResult);
                      //                 }
                      //       });
                      //     }else{
                      //       alert("Harap Isi Tanggal Terlebih Dahulu");
                      //     }
                      //   }
                      //   // alert(tglawal);
                      // })
                    </script>
                <?php $this->load->view('partial/footer');?>