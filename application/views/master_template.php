<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title> NETSKATE </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Page Title -->

		<!-- Meta Description -->

		<link rel="icon" href="img/icon.png" type="image/png">

		<!-- Mobile Specific Meta -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/icon.png') ?>">
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/vendor/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <style>

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
          }
          .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            font: 14px arial;
          }
        </style>
    </head>
    <body>

       <div class="preloader">
        <div class="loading">
          <img src="<?= base_url('assets/Wedges-3s-200px.gif')?>" width="80">
          <p>Please wait ...</p>
        </div>
      </div>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top-fixed">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar page-sidebar-fixed scroll">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="#"><img src="<?= base_url() ?>assets/logo/logo.png" alt="Brandi" class="navbar-logo" width="180px" height="30px"></a>
                        <!-- <a href="#" class="x-navigation-control">Let You Roll Again</a> -->
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <!-- <img src="<?php echo base_url() ?>assets/vendor/assets/images/users/avatar.jpg" alt="John Doe"/> -->
                             <?php  if($_SESSION['logo']=='' || empty($_SESSION['logo'])){?>
                                    <img src="<?= base_url('assets/image/user.png')?>" >
                                <?php }else{  ?>
                                    <img src="<?= base_url($_SESSION['logo'])?>">
                                <?php }  ?>
                              <!-- </div> -->
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <?php  if($_SESSION['logo']=='' || empty($_SESSION['logo'])){?>
                                    <img src="<?= base_url('assets/image/user.png')?>" style="height: 100px;width: 100px" >
                                <?php }else{  ?>
                                    <img src="<?= base_url($_SESSION['logo'])?>" style="height: 100px;width: 100px" >
                                <?php }  ?>
                              </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $_SESSION['name_start']?></div>
                                <?php if($_SESSION['type'] == 1){
                                        $type =  "EVENT ORGANIZER";
                                        }elseif($_SESSION['type'] == 2){
                                        $type = "CLUB";
                                        }elseif($_SESSION['type'] == 3){
                                        $type = "ATHLETE";
                                        }else{
                                        $type = "ADMIN";
                                        }
                                ?>
                                 <div class="profile-data-title"></div>

                            </div>
                            <div class="profile-controls">
                            </div>
                        </div>
                    </li>

                    <!-- active menu -->
                    <li class="xn-title"><strong>MENU</strong></li>
                    <li>
                        <?php if($_SESSION['type'] == 1){ ?> <!-- EO -->
                            <li <?php  if($this->uri->segment(2) == null ){ echo 'class="treeview active"';} ?>><a href="<?= base_url('eo')?>"><span class="fa fa-desktop"></span> <span class="xn-text">DASHBOARD</span></a></li>
                            <li <?php  if($this->uri->segment(2) == 'profil' ){ echo 'class="treeview active"';} ?> ><a href="<?= base_url('eo/profil')?>"><span class="fa fa-user"></span> <span class="xn-text">PROFILE</span></a></li>
                            <li><li class="xn-title"><strong>EVENT</strong></li>
                            <li <?php  if($this->uri->segment(2) == 'event' || $this->uri->segment(2) == 'design'){ echo 'class="treeview active"';} ?>><a href="<?= base_url('eo/event')?>"><span class="glyphicon glyphicon-bullhorn"></span> <span class="xn-text">MY EVENT</span></a></li>

                            <li <?php  if($this->uri->segment(2) == 'template' || $this->uri->segment(2) =='form_template'|| $this->uri->segment(2) =='view_template'){ echo 'class="treeview active"';} ?>>
                            <a href="<?= base_url('event/template')?>"><span class="fa fa-briefcase"></span> <span class="xn-text">TEMPLATE</span></a></li>
                            <li <?php  if($this->uri->segment(2) == 'class' || $this->uri->segment(2) == 'create_class' || $this->uri->segment(2) == 'class_update' || $this->uri->segment(2) == 'race' || $this->uri->segment(2) == 'race_create' || $this->uri->segment(2) == 'race_update'|| $this->uri->segment(2) == 'mku' || $this->uri->segment(2) == 'create_mku' || $this->uri->segment(2) == 'mku_update'){ echo 'class="treeview active"';} ?>><a href="#"><span class="fa fa-book"></span> <span class="xn-text">MASTER DATA</span></a>
                            <ul class="treeview-menu menu-open">
                            <!-- <li <?php  if($this->uri->segment(2) == 'class' || $this->uri->segment(2) == 'create_class' || $this->uri->segment(2) == 'class_update' ){ echo 'class=" active"';} ?>><a href="<?= base_url('event/class')?>"> <span class="xn-text">Master Class</span></a></li> -->
                            <li <?php  if($this->uri->segment(2) == 'race' || $this->uri->segment(2) == 'race_create' || $this->uri->segment(2) == 'race_update'){ echo 'class=" active"';} ?>><a href="<?= base_url('event/race')?>"> <span class="xn-text">Master Race</span></a></li>
                            <li <?php  if($this->uri->segment(2) == 'mku' || $this->uri->segment(2) == 'create_mku'|| $this->uri->segment(2) == 'mku_update'){ echo 'class=" active"';} ?>><a href="<?= base_url('event/mku')?>"> <span class="xn-text">Master KU</span></a></li>
                            </ul>
                            </li>

                            <!-- <li><a href="<?= base_url('eo/create_event')?>"><span class="fa fa-desktop"></span> <span class="xn-text">DESIGN</span></a></li> -->
                            <!-- <li><a href="<?= base_url('eo/event')?>"><span class="fa fa-desktop"></span> <span class="xn-text"></span></a></li>
                             -->
                        <!-- <a href="<?= base_url('eo/price')?>"><span class="fa fa-money"></span> <span class="xn-text">Price</span></a> -->
                        <!-- <a href="<?= base_url('eo/events/'.$_SESSION['id'])?>"><span class="fa fa-desktop"></span> <span class="xn-text">Events</span></a> -->
                        <!-- <a href="<?= base_url('eo/invoice')?>"><span class="fa fa-desktop"></span> <span class="xn-text">Invoice</span></a> -->
                        <?php }elseif($_SESSION['type'] == 2){?> <!-- CLUB -->
                        <li><a href="<?= base_url('club')?>"><span class="fa fa-desktop"></span> <span class="xn-text">DASHBOARD</span></a></li>
                        <li><a href="<?= base_url('club/profil')?>"><span class="glyphicon glyphicon-bullhorn"></span> <span class="xn-text">PROFILE</span></a></li>
                        <li><a href="<?= base_url('club/athlete')?>"><span class="fa fa-group"></span> <span class="xn-text">ATHLETE</span></a></li>
                        <li><a href="#" title="Next Version"><span class="fa fa-briefcase"></span> <span class="xn-text">TRAINING PROGRAMS</span></a></li>
                        <li><a href="#" title="Next Version"><span class="fa fa-book"></span> <span class="xn-text">FINANCE</span></a></li>
                        <li><a href="#" title="Next Version"><span class="fa fa-shopping-cart"></span> <span class="xn-text">SHOP</span></a></li>
                        <li><a href="<?= base_url('club/event')?>"><span class="fa fa-calendar"></span> <span class="xn-text">EVENT</span></a></li>
                        <li><a href="<?= base_url('invoice')?>"><span class="glyphicon glyphicon-usd"></span> <span class="xn-text">INVOICE</span></a></li>
                        <?php }elseif($_SESSION['type'] == 3){?> <!-- Athlete -->
                       <!-- <li><a href="<?= base_url('athlete')?>"><span class="fa fa-desktop"></span> <span class="xn-text">DASHBOARD</span></a></li> -->
                       <li><a href="<?= base_url('athlete/profil')?>"><span class="fa fa-user"></span> <span class="xn-text">PROFIL</span></a></li>
                       <li><a href="<?= base_url('athlete/event')?>"><span class="fa fa-bullhorn"></span> <span class="xn-text">EVENT</span></a></li>
                       <li><a href="<?= base_url('invoice')?>"><span class="glyphicon glyphicon-usd"></span> <span class="xn-text">INVOICE</span></a></li>

                        <?php }else{?> <!-- ADMIN -->
                        <li><a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">DASHBOARD</span></a></li>
                        <li><a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">EVENT ORGANIZER</span></a></li>
                        <li><a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">CLUB</span></a></li>
                        <li><a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">ATHLETE</span></a></li>


                        <?php }?>

                    <!-- </li>                     -->




                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <!-- <li class="xn-icon-button pull-right">
                     sd
                    </li>  -->
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->

                    <li class="xn-icon-button pull-right">

                        <a href="#" class="mb-control" data-box="#mb-signout" title="Logout"><span class="fa fa-sign-out"></span></a>
                    </li>

                    <li class="xn-icon-button pull-right ">

                        <a href="#" title="Reset Password"><span class="fa fa-asterisk"></span></a>
                        <!-- <div class="informer informer-danger">4</div> -->
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging ui-draggable">
                            <div class="panel-heading ui-draggable-handle">
                                <h3 class="panel-title"><span class="fa fa-asterisk"></span> Reset Password</h3>
                                <div class="pull-right">
                                    <!-- <span class="label label-danger">4 new</span> -->
                                </div>
                            </div>
                        <form class="form-horizontal" action="<?= base_url('login/update_password')?>" method="POST" enctype="multipart/form-data">
                            <div class="block">
                          <div class="form-group">
                                        <label class="col-md-5 control-label">New Password</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control " name="new_pass" value="">
                                        </div>
                                    </div>
                                    </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success btn-block" type="submit">Update</button>

                            </div>
                            </form>
                        </div>
                    </li>
                   <!-- <li class="xn-icon-button " > -->

                         <label id="clock" style="padding-top: -100px;margin-top: 15px;color: white;"></label>

                    <!-- </li>   -->
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                   <!-- <li><a href="#">Home</a></li>
                    <li><a href="#">Layouts</a></li>
                    <li class="active">Top Navigation Fixed</li>-->
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->

              <?php  $this->load->view($page);?>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out ?</p>
                        <p>Press "No" if you want to continue, Press "Yes" to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?= base_url('login/logout')?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url() ?>assets/vendor/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url() ?>assets/vendor/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
        <script type="text/javascript" src="<?= base_url('assets/vendor/js/plugins/bootstrap/bootstrap-datepicker.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/vendor/js/plugins/bootstrap/bootstrap-timepicker.min.js')?>"></script>
        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END PAGE PLUGINS -->
         <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/actions.js"></script>

        <?php  if($this->uri->segment(2) == '') { ?>

            <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>  -->

        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/highcharts.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/exporting.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/export-data.js"></script>
			<!--<script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>-->
        <?php } ?>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->

      <?php isset($js) ? $this->load->view($js) : "" ?>

   <script>
  $( function() {
  $(".preloader").fadeOut();
  } );
  </script>


<script type="text/javascript">
function showTime() {
    var a_p = "";
    var today = new Date();
    var curr_hour = today.getHours();
    var curr_minute = today.getMinutes();
    var curr_second = today.getSeconds();
    if (curr_hour < 12) {
        a_p = "AM";
    } else {
        a_p = "PM";
    }
    if (curr_hour == 0) {
        curr_hour = 12;
    }
    if (curr_hour > 12) {
        curr_hour = curr_hour - 12;
    }
    curr_hour = checkTime(curr_hour);
    curr_minute = checkTime(curr_minute);
    curr_second = checkTime(curr_second);
    document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(showTime, 500);

</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
    </body>
</html>
