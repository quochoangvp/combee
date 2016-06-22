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

        <!--recent work start-->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="r-work">Recent Work</h2>
                <ul class="bxslider">
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img1.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img1.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img2.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img2.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img3.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img3.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img4.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img4.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img5.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img5.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img6.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img6.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img7.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img7.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="element item view view-tenth" data-zlname="reverse-effect">
                            <img src="<?php echo base_url(); ?>assets/themes/news/img/works/img1.jpg" alt="" />
                            <div class="mask">
                                <a data-zl-popup="link" href="javascript:;">
                                    <i class="icon-link"></i>
                                </a>
                                <a data-zl-popup="link2" class="fancybox" rel="group" href="img/works/img1.jpg">
                                    <i class="icon-search"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--recent work end-->

    </div>

     <!--parallax start-->
     <section class="parallax1">
         <div class="container">
             <div class="row">
                 <h1>“And here i am using my own lungs like a sucker. How is education supposed to make <br>
                     me feel smarter?”</h1>
             </div>
         </div>
     </section>
     <!--parallax end-->

     <div class="container">
         <!--clients start-->
         <div class="clients">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12 text-center">
                         <ul class="list-unstyled">
                             <li><a href="#"><img src="<?php echo base_url(); ?>assets/themes/news/img/clients/logo1.png" alt=""></a></li>
                             <li><a href="#"><img src="<?php echo base_url(); ?>assets/themes/news/img/clients/logo2.png" alt=""></a></li>
                             <li><a href="#"><img src="<?php echo base_url(); ?>assets/themes/news/img/clients/logo3.png" alt=""></a></li>
                             <li><a href="#"><img src="<?php echo base_url(); ?>assets/themes/news/img/clients/logo4.png" alt=""></a></li>
                             <li><a href="#"><img src="<?php echo base_url(); ?>assets/themes/news/img/clients/logo5.png" alt=""></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!--clients end-->
     </div>

     <!--container end-->

    <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <h1>contact info</h1>
                    <address>
                        <p>Address: No.28-63877 street</p>
                        <p>lorem ipsum city, Country</p>

                        <p>Phone : (123) 456-7890</p>
                        <p>Fax : (123) 456-7890</p>
                        <p>Email : <a href="javascript:;">support@vectorlab.com</a></p>
                    </address>
                </div>
                <div class="col-lg-5 col-sm-5">
                    <h1>latest tweet</h1>
                    <div class="tweet-box">
                        <i class="icon-twitter"></i>
                        <em>Please follow <a href="javascript:;">@nettus</a> for all future updates of us! <a href="javascript:;">twitter.com/vectorlab</a></em>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-skype"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                    </ul>
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
