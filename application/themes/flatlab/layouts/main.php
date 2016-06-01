<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/tasks.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/themes/flatlab/css/jquery-ui.css" rel="stylesheet" />
    <?php foreach ($css as $file): ?>
        <link href="<?php echo $file ?>" rel="stylesheet" />
    <?php endforeach?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/themes/flatlab/js/html5shiv.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/flatlab/js/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div id="loader" style="display: none;">
        <div id="fountainG">
            <div id="fountainG_1" class="fountainG"></div>
            <div id="fountainG_2" class="fountainG"></div>
            <div id="fountainG_3" class="fountainG"></div>
            <div id="fountainG_4" class="fountainG"></div>
            <div id="fountainG_5" class="fountainG"></div>
            <div id="fountainG_6" class="fountainG"></div>
            <div id="fountainG_7" class="fountainG"></div>
            <div id="fountainG_8" class="fountainG"></div>
        </div>
    </div>
    <section id="container" class="">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo" >Flat<span>lab</span></a>
            <!--logo end-->
            <?php echo $this->load->get_section('top_menu'); ?>
            <?php echo $this->load->get_section('top_nav'); ?>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <?php echo $this->load->get_section('sidebar'); ?>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->
                <!-- Page content goes here -->
                <?php echo $output; ?>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2013 &copy; FlatLab by VectorLab.
                <a href="#" class="go-top">
                    <i class="icon-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/respond.min.js" ></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.tagsinput.js" ></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/tinymce/tinymce.min.js" ></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/jquery.loadTemplate-1.5.7.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/ga.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/themes/flatlab/js/common-scripts.js"></script>

    <?php foreach ($js as $file): ?>
        <script src="<?php echo $file ?>" type="text/javascript"></script>
    <?php endforeach?>

    <script>

      $(function() {
          $( ".sortable" ).sortable();
          $( ".sortable" ).disableSelection();
      });

    </script>


</body>
</html>
