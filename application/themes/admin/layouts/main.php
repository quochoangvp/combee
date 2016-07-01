  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ComBee</title>

    <!-- Bootstrap -->
    <link href="<?php echo $theme_url ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $theme_url ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $theme_url ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery tagsinput -->
    <link href="<?php echo $theme_url ?>vendors/jquery.tagsinput/src/jquery.tagsinput.css" rel="stylesheet">
    <link href="<?php echo $theme_url ?>assets/css/bootstrap-fileupload.css" rel="stylesheet">
    <link href="<?php echo $theme_url ?>vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo $theme_url ?>vendors/jquery-ui/themes/smoothness/jquery-ui.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $theme_url ?>assets/css/custom.css" rel="stylesheet">
    <?php foreach ($css as $file): ?>
    <link href="<?php echo $file ?>" rel="stylesheet" />
    <?php endforeach?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo $theme_url ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
                <?php echo $sidebar ?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav navbar-static-top">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $theme_url ?>assets/images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $theme_url ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $theme_url ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $theme_url ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $theme_url ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <?php echo $content ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo $theme_url ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo $theme_url ?>vendors/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $theme_url ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $theme_url ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo $theme_url ?>vendors/nprogress/nprogress.js"></script>
    <!-- jQuery tagsinput -->
    <script src="<?php echo $theme_url ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <script src="<?php echo $theme_url ?>vendors/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Tinymce -->
    <script src="<?php echo $theme_url ?>vendors/tinymce/tinymce.min.js"></script>
    <!-- Helper Scripts -->
    <script src="<?php echo $theme_url ?>assets/js/helper.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo $theme_url ?>assets/js/custom.js"></script>
<?php foreach ($js as $file): ?>
    <script src="<?php echo $file ?>" type="text/javascript"></script>
<?php endforeach?>
</body>
</html>