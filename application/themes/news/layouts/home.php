<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlatLab Frontend | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/themes/news/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/news/css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/themes/news/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/news/css/flexslider.css"/>
    <link href="<?php echo base_url(); ?>assets/themes/news/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/themes/news/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/news/assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/news/assets/revolution_slider/rs-plugin/css/settings.css" media="screen">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/themes/news/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/news/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>assets/themes/news/js/html5shiv.js"></script>
      <script src="<?php echo base_url(); ?>assets/themes/news/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Flat<span>Lab</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <?php echo isset($main_nav) ? $main_nav : ''; ?>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <?php echo isset($body) ? $body : '' ?>

     <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <?php echo isset($position_1)?$position_1:'' ?>
            </div>
            <div class="col-lg-6">
                <?php echo isset($position_2)?$position_2:'' ?>
            </div>
        </div>

        <?php echo isset($position_3)?$position_3:'' ?>

    </div>

     <?php echo isset($position_4)?$position_4:'' ?>

     <!--container end-->

    <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?php echo isset($footer_col_1)?$footer_col_1:'' ?>
                </div>
                <div class="col-lg-5 col-sm-5">
                    <?php echo isset($footer_col_2)?$footer_col_2:'' ?>
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <?php echo isset($footer_col_3)?$footer_col_3:'' ?>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/themes/news/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/news/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/news/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/news/js/hover-dropdown.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/themes/news/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/news/assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/news/js/jquery.parallax-1.1.3.js"></script>

    <script src="<?php echo base_url(); ?>assets/themes/news/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/news/js/link-hover.js"></script>

    <script src="<?php echo base_url(); ?>assets/themes/news/assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/news/assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/news/assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/themes/news/js/common-scripts.js"></script>

    <script src="<?php echo base_url(); ?>assets/themes/news/js/revulation-slide.js"></script>


  <script>

      RevSlide.initRevolutionSlider();

      $(window).load(function() {
          $('[data-zlname = reverse-effect]').mateHover({
              position: 'y-reverse',
              overlayStyle: 'rolling',
              overlayBg: '#fff',
              overlayOpacity: 0.7,
              overlayEasing: 'easeOutCirc',
              rollingPosition: 'top',
              popupEasing: 'easeOutBack',
              popup2Easing: 'easeOutBack'
          });
      });

      $(window).load(function() {
          $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                  $('body').removeClass('loading');
              }
          });
      });

      //    fancybox
      jQuery(".fancybox").fancybox();



  </script>

  </body>
</html>
