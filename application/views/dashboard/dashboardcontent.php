<?php 
    $this->load->view('partial/header');
        $this->load->view('dashboard/dashboardsidebar');
            $this->load->view('dashboard/dashboardbreadcrumbs');
?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Dashboard
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    Informasi Anggota
                                                </div>
                                                <!-- <div class="well well-sm"> -->
                                                <div class="panel-body">
                                                    <!-- <h4>Informasi Anggota</h4> -->
                                                    <!-- <a href="<?php echo base_url("Anggota");?>"> -->
                                                        <img src="<?php echo site_url("asset/image/iconanggota.jpg");?>">
                                                    <!-- </a> -->
                                                </div>
                                                    
                                                <!-- </div> -->
                                                <div class="panel-footer">
                                                    Jumlah Anggota : <?php echo $totalanggota;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="panel panel-warning">
                                                <div class="panel-heading">
                                                    Informasi Buku  
                                                </div>
                                                <div class="panel-body">
                                                    <!-- <h4>Informasi Buku</h4> -->
                                                    <!-- <a href="<?php echo base_url("Buku");?>"> -->
                                                        <img src="<?php echo site_url("asset/image/iconbuku.jpg");?>">
                                                    <!-- </a> -->
                                                </div>
                                                <div class="panel-footer">
                                                    Jumlah Buku : <?php echo $totalbuku;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Informasi User
                                                </div>
                                                <div class="panel-body">
                                                    <!-- <h4>Informasi User</h4> -->
                                                    <!-- <a href="<?php echo base_url("User");?>"> -->
                                                        <img src="<?php echo site_url("asset/image/iconuser.jpg");?>">
                                                    <!-- </a> -->
                                                </div>
                                                <div class="panel-footer">
                                                    Jumlah User : <?php echo $totaluser;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    Informasi Peminjaman 
                                                </div>
                                                <div class="panel-body">
                                                    <!-- <h4>Informasi User</h4> -->
                                                    <!-- <a href="<?php echo base_url("Peminjaman");?>"> -->
                                                        <img src="<?php echo site_url("asset/image/iconrentbook.jpg");?>">
                                                    <!-- </a> -->
                                                </div>
                                                <div class="panel-footer">
                                                    Jumlah Peminjaman Hari Ini : <?php echo $totalpeminjaman;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">
                                                    Informasi Pengembalian
                                                </div>
                                                <div class="panel-body">
                                                    <!-- <h4>Informasi User</h4> -->
                                                    <!-- <a href="<?php echo base_url("Pengembalian");?>"> -->
                                                        <img src="<?php echo site_url("asset/image/iconreturnedbook.jpg");?>">
                                                    <!-- </a> -->
                                                </div>
                                                <div class="panel-footer">
                                                    Jumlah Pengembalian Hari Ini : <!--<?php //secho $totalkelas;?>--> <?php echo $totalpengembalian;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Informasi Rak Buku
                                                </div>
                                                <div class="panel-body">
                                                    <!-- <h4>Informasi User</h4> -->
                                                    <!-- <a href="<?php echo base_url("Rakbuku");?>"> -->
                                                        <img src="<?php echo site_url("asset/image/iconrakbuku.jpg");?>">
                                                    <!-- </a> -->
                                                </div>
                                                <div class="panel-footer">
                                                    Jumlah Rak Buku : <?php echo $totalrak;?>
                                                </div>
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
                <?php $this->load->view('partial/footer');?>