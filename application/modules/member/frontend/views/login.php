<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/themes/flatlab/js/html5shiv.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/flatlab/js/respond.min.js"></script>
<![endif]-->
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
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/common-scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/pages/login.js"></script>


</body>
</html>