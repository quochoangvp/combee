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
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="services.html">Service</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Feature <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="button.html">Buttons</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="price.html">Price</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><input type="text" placeholder=" Search" class="form-control search"></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <?php echo $this->load->get_section('slideshow'); ?>

    <!--container start-->
    <div class="container">
        <div class="row">
            <!--feature start-->
            <div class="text-center feature-head">
                <h1>welcome to flatlab</h1>
                <p>Professional html Template Perfect for Admin Dashboard</p>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box">
                        <i class=" icon-desktop"></i>
                        <h2>responsive design</h2>
                    </div>
                    <p class="f-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.</p>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box active">
                        <i class=" icon-code"></i>
                        <h2>friendly code</h2>
                    </div>
                    <p class="f-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.</p>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box">
                        <i class="icon-gears"></i>
                        <h2>fully customizable</h2>
                    </div>
                    <p class="f-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.</p>
                </section>
            </div>
            <!--feature end-->
        </div>
        <div class="row">
            <!--quote start-->
            <div class="quote">
                <div class="col-lg-9 col-sm-9">
                    <div class="quote-info">
                        <h1>developer friendly code</h1>
                        <p>Bundled with awesome features, UI resource unlimited colors, advanced theme options & much more!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <a href="#" class="btn btn-danger purchase-btn">Purchase now</a>
                </div>
            </div>
            <!--quote end-->
        </div>
    </div>


    <!--property start-->
    <div class="property gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 text-center">
                    <img src="<?php echo base_url(); ?>assets/themes/news/img/property-img.png" alt="">
                </div>
                <div class="col-lg-6 col-sm-6">
                    <h1>flat & modern trend design</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.</p>
                    <a href="javascript:;" class="btn btn-purchase">Purchase now</a>
                </div>
            </div>
        </div>
    </div>
    <!--property end-->

     <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <!--tab start-->
                <section class="panel tab">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#news">
                                    News
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#events">
                                    Events
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#notice-board">
                                    Notice board
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="news" class="tab-pane active">
                                <article class="media">
                                    <a class="pull-left thumb p-thumb">
                                        <img src="<?php echo base_url(); ?>assets/themes/news/img/product1.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class=" p-head">News Tittle goes here</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </article>
                                <article class="media">
                                    <a class="pull-left thumb p-thumb">
                                        <img src="<?php echo base_url(); ?>assets/themes/news/img/product2.png" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class=" p-head">News Tittle goes here 2</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. simsut dorlor</p>
                                    </div>
                                </article>
                                <article class="media">
                                    <a class="pull-left thumb p-thumb">
                                        <img src="<?php echo base_url(); ?>assets/themes/news/img/product1.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class=" p-head">News Tittle goes here 3</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sumon ahmed</p>
                                    </div>
                                </article>
                            </div>
                            <div id="events" class="tab-pane">
                                <article class="media">
                                    <a class="pull-left thumb p-thumb">
                                        <!--image goes here-->
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="cmt-head">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                        <p> <i class="icon-time"></i> 1 hours ago</p>
                                    </div>
                                </article>
                                <article class="media">
                                    <a class="pull-left thumb p-thumb">
                                        <!--image goes here-->
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="cmt-head">Nulla vel metus scelerisque ante sollicitudin commodo</a>
                                        <p> <i class="icon-time"></i> 23 mins ago</p>
                                    </div>
                                </article>
                                <article class="media">
                                    <a class="pull-left thumb p-thumb">
                                        <!--image goes here-->
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="cmt-head">Donec lacinia congue felis in faucibus. </a>
                                        <p> <i class="icon-time"></i> 15 mins ago</p>
                                    </div>
                                </article>
                            </div>
                            <div id="notice-board" class="tab-pane ">
                                <p>Notice board goes here Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.</p>
                                <p>Notice board goes here Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!--tab end-->
            </div>
            <div class="col-lg-6">
                <!--testimonial start-->
                <div class="about-testimonial boxed-style about-flexslider ">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides about-flex-slides">
                                <li>
                                    <div class="about-testimonial-image ">
                                        <img alt="" src="<?php echo base_url(); ?>assets/themes/news/img/testimonial-img-1.jpg">
                                    </div>
                                    <a class="about-testimonial-author" href="#">Ericson Reagan</a>
                                    <span class="about-testimonial-company">ABC Realestate LLC</span>
                                    <div class="about-testimonial-content">
                                        <p class="about-testimonial-quote">
                                            Pellentesque et pulvinar enim. Quisque at tempor ligula. Maecenas augue ante, euismod vitae egestas sit amet, accumsan eu nulla. Nullam tempor lectus a ligula lobortis pretium. Donec ut purus sed tortor malesuada venenatis eget eget lorem.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-testimonial-image ">
                                        <img alt="" src="<?php echo base_url(); ?>assets/themes/news/img/avatar2.jpg">
                                    </div>
                                    <a class="about-testimonial-author" href="#">Jonathan Smith</a>
                                    <span class="about-testimonial-company">DEF LLC</span>
                                    <div class="about-testimonial-content">
                                        <p class="about-testimonial-quote">
                                            Pellentesque et pulvinar enim. Quisque at tempor ligula. Maecenas augue ante, euismod vitae egestas sit amet, accumsan eu nulla. Nullam tempor lectus a ligula lobortis pretium. Donec ut purus sed tortor malesuada venenatis eget eget lorem.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <!--testimonial end-->
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