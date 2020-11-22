<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>E-Library School</title>
        <link rel="shortcut icon" href="<?php echo base_url('asset/image/logoalmuawanah.png');?>"/>
        <!-- Bootstrap Styles-->
        <link href="<?php echo base_url("asset/css/bootstrap.css");?>" rel="stylesheet"/>
        <!-- FontAwesome Styles-->
        <link href="<?php echo base_url("asset/css/font-awesome.css");?>" rel="stylesheet" />
        <!-- Custom Styles-->
        <link href="<?php echo base_url("asset/css/custom-styles.css");?>" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='<?php echo base_url("asset/css/fontopensans.css");?>' rel='stylesheet' type='text/css' />

        <link href="<?php echo base_url("asset/js/dataTables/dataTables.bootstrap.css");?>" rel="stylesheet" type='text/css'/>

                <!-- JS Scripts-->
        <!-- jQuery Js -->
        <script src="<?php echo base_url("asset/js/jquery-1.10.2.js");?>"></script>
        <script src="<?php echo base_url("asset/js/jquery-ui.js")?>"></script>
          <!-- Bootstrap Js -->
        <script src="<?php echo base_url("asset/js/bootstrap.min.js");?>"></script>
        <!-- Metis Menu Js -->
        <script src="<?php echo base_url("asset/js/jquery.metisMenu.js")?>"></script>
          <!-- Custom Js -->
        <script src="<?php echo base_url("asset/js/custom-scripts.js")?>"></script>
        <script src="<?php echo base_url("asset/js/dataTables/jquery.dataTables.js");?>"></script>
        <script src="<?php echo base_url("asset/js/dataTables/dataTables.bootstrap.js");?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("asset/css/jquery-ui.css");?>">
        <!-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->

        <!-- autosuggest -->
<!--         <script src="<?php echo base_url(); ?>asset/js/jquery.ausu-autosuggest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/style-autocompletex.css"/>

        <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
        <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
        <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> -->
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><strong>E-Library School</strong></a>
                    <!-- <img src="<?php //echo base_url('asset/image/iconeperpusmaalmuawanah.jpg');?>"> -->
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> 
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user fa-fw"></i>
                                    Welcome <?php echo $this->session->userdata('username');?>
                                </a>
                            </li>
                            <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> -->
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo site_url('login/logout');?>"><i class="fa fa-sign-out fa-fw"></i>Sign Out</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </nav>