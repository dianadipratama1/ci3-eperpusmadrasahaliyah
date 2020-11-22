            <!--/. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <!-- Akses Menu For Superuser -->
                        <?php if($this->session->userdata('level')==='1'):?>
                            <li>
                                <a href="<?php echo base_url("Dashboard");?>" class="active-menu"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            
                            <li>
                                <a href=""><i class="fa fa-desktop"></i> Data Master<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("Kelas");?>"><i class="fa fa-edit"></i> Daftar Kelas</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url("Kategoribuku");?>"><i class="fa fa-sitemap"></i> Kategori Buku</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url("Role");?>"><i class="fa fa-user fa-fw"></i> Role User</a>
                                    </li> 

                                    <li>
                                        <a href="<?php echo base_url("Rakbuku");?>"><i class="fa fa-bar-chart-o"></i> Rak Buku</a>
                                    </li> 
                                </ul>
                            </li>

                            <li>
                                <a href=""><i class="fa fa-desktop"></i> Data Admin<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("Anggota");?>"><i class="fa fa-edit"></i> Anggota</a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url("Buku");?>"><i class="fa fa-bar-chart-o"></i> Buku</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url("User");?>"><i class="fa fa-user fa-fw"></i> User</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url("Bukuinduk");?>"><i class="fa fa-sitemap"></i> Buku Induk</a>
                                    </li>
                                </ul>
                            </li>   

                            <li>
                                <a href=""><i class="fa fa-desktop"></i> Data Transaksi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("Peminjaman");?>"><i class="fa fa-table"></i> Peminjaman Buku</a>
                                    </li>                        
                                    <li>
                                        <a href="<?php echo base_url("Pengembalian");?>"><i class="fa fa-edit"></i> Pengembalian Buku</a>
                                    </li>
                                </ul>
                            </li>       
                                            
                            <li>
                                <a href=""><i class="fa fa-desktop"></i> Laporan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url("Lappeminjaman");?>"><i class="fa fa-fw fa-file"></i> Lap Peminjaman</a>
                                    </li>
                                                                    <li>
                                        <a href="<?php echo base_url("Lappengembalian");?>"><i class="fa fa-fw fa-file"></i> Lap Pengembalian</a>
                                    </li>                       
                                </ul>
                            </li>
                            <!--ACCESS MENUS FOR ADMIN-->
                            <?php elseif($this->session->userdata('level')==='2'):?>
                                <li>
                                    <a href="<?php echo base_url("Dashboard");?>" class="active-menu"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>

                                <li>
                                    <a href=""><i class="fa fa-desktop"></i> Data Admin<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="<?php echo base_url("Anggota");?>"><i class="fa fa-edit"></i> Anggota</a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo base_url("Buku");?>"><i class="fa fa-bar-chart-o"></i> Buku</a>
                                        </li>

                                        <li>
                                            <a href="<?php echo base_url("User");?>"><i class="fa fa-user fa-fw"></i> User</a>
                                        </li>

                                        <li>
                                            <a href="<?php echo base_url("Bukuinduk");?>"><i class="fa fa-sitemap"></i> Buku Induk</a>
                                        </li>
                                    </ul>
                                </li> 

                                <li>
                                    <a href=""><i class="fa fa-desktop"></i> Data Transaksi<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="<?php echo base_url("Peminjaman");?>"><i class="fa fa-table"></i> Peminjaman Buku</a>
                                        </li>                        
                                        <li>
                                            <a href="<?php echo base_url("Pengembalian");?>"><i class="fa fa-edit"></i> Pengembalian Buku</a>
                                        </li>
                                    </ul>
                                </li>       
                                                
                                <li>
                                    <a href=""><i class="fa fa-desktop"></i> Laporan<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="<?php echo base_url("Lappeminjaman");?>"><i class="fa fa-fw fa-file"></i> Lap Peminjaman</a>
                                        </li>
                                                                        <li>
                                            <a href="<?php echo base_url("Lappengembalian");?>"><i class="fa fa-fw fa-file"></i> Lap Pengembalian</a>
                                        </li>                       
                                    </ul>
                                </li>
                                <!--ACCESS MENUS FOR AUTHOR USER-->
                                <?php else:?>
                                
                                <li>
                                    <a href="<?php echo base_url("Dashboard");?>" class="active-menu"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>

                                <li>
                                    <a href=""><i class="fa fa-desktop"></i> Data Transaksi<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="<?php echo base_url("Peminjaman");?>"><i class="fa fa-table"></i> Peminjaman Buku</a>
                                        </li>                        
                                        <li>
                                            <a href="<?php echo base_url("Pengembalian");?>"><i class="fa fa-edit"></i> Pengembalian Buku</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif;?>
                    </ul>
                </div>
            </nav>