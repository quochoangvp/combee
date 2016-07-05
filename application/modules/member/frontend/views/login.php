<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/themes/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/themes/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/themes/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery tagsinput -->
    <link href="<?php echo base_url() ?>assets/themes/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/themes/admin/assets/css/bootstrap-fileupload.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/themes/admin/vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/themes/admin/vendors/jquery-ui/themes/smoothness/jquery-ui.min.css" rel="stylesheet">

    <!-- Login Theme Style -->
    <link href="<?php echo base_url() ?>assets/themes/admin/assets/css/login.css" rel="stylesheet">
</head>

<body class="login-body">

    <div class="container">

        <form class="form-signin" action="<?php echo site_url('api/member/login') ?>">
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
                <div class="form-message"></div>
                <div class="form-group">
                    <div>
                        <input type="text" name="user_email" class="form-control" placeholder="Email" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <input type="password" name="user_pass" class="form-control" placeholder="Password">
                    </div>
                </div>
                <label class="checkbox">
                <input type="checkbox" name="remember_login" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit" data-text-loading="Signing...">Sign in</button>
            </div>
        </form>
    </div>



    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-success" type="button">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/themes/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $theme_url ?>assets/js/helper.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/admin/assets/js/custom.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/admin/assets/js/pages/login.js"></script>


</body>
</html>
