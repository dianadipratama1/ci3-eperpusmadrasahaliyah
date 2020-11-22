<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>E-Library School</title>
        <link rel="shortcut icon" href="<?php echo base_url('asset/image/logoalmuawanah.png');?>"/>
        <!-- Bootstrap Styles-->
        <!-- <link href="<?php //echo base_url("asset/css/bootstrap.css");?>" rel="stylesheet"/>
      
        <link href="<?php //echo base_url("asset/css/font-awesome.css");?>" rel="stylesheet" />
      
        <link href="<?php //echo base_url("asset/css/custom-styles.css");?>" rel="stylesheet" />
        
        <link href='<?php //echo base_url("asset/css/fontopensans.css");?>' rel='stylesheet' type='text/css' /> -->
        <link href='<?php echo base_url("asset/css/stylelogin.css");?>' rel='stylesheet' type='text/css' />

                <!-- JS Scripts-->
        <!-- jQuery Js -->
        <script src="<?php echo base_url("asset/js/jquery-1.10.2.js");?>"></script>
          <!-- Bootstrap Js -->
        <script src="<?php echo base_url("asset/js/bootstrap.min.js");?>"></script>
        <!-- Metis Menu Js -->
        <script src="<?php echo base_url("asset/js/jquery.metisMenu.js")?>"></script>
          <!-- Custom Js -->
        <script src="<?php echo base_url("asset/js/custom-scripts.js")?>"></script>
        
    </head>

    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->
                <h2 class="active underlineHover"> Sign In </h2>
                <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->
                <!-- Icon -->
                <div class="fadeIn first">
                    <h6 class="text-center">
                        <?php echo $this->session->flashdata('msg');?>
                    </h6>
                    <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
                </div>
                <!-- Login Form -->
                <form class="form-signin" method="POST" action="<?php echo base_url('Login/auth');?>">
                    <input type="text" id="username" class="fadeIn second" name="username" placeholder="User" autocomplete="off">
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" autocomplete="off">
                    <!-- <input type="checkbox" name="" class="fadeIn third"> -->
                    <input type="submit" id="login" name="login" class="fadeIn fourth" value="Sign In">
                </form>
                <!-- Remind Passowrd -->
                <div id="formFooter">
                    E-Perpus Sistem By © <a href="https://dianmediadev.my.id">DianMediaDev</a>
                    <!-- Powered by © TIK 2020 -->
                    <!-- <a class="underlineHover" href="#">Forgot Password?</a> -->
                </div>
            </div>
        </div>
    </body>
</html>