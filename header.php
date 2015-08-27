<?php if (!isset($TopDir)) $TopDir = ""; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Belardi Auto Racing<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TopDir; ?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">

    <meta name="description" content="<?php echo ($Description != "") ? $Description : "This is the home page of Belardi Auto Racing. We're an organization comprised of experienced individuals in the racing industry with an aggressive growth strategy and a strong commitment to finishing up front."; ?>">
    <meta name="keywords" content="<?php echo ($Keywords != "") ? $Keywords : "Belardi, Belardi Auto Racing, Indy Racing, Indy Car Racing, Auto Racing, Liberty Engineering, Indy Lights, Road To Indy, Cooper Tires, Indiana Auto Racing, Brownsburg Indiana, indycar, fia standards, Mazda racing, Mazda car, Advanced Engine Research"; ?>">
    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css">

    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.cycle2.min.js"></script>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.film_roll.min.js"></script>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/bootstrap-collapse.js"></script>
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/jquery.fancybox.css">
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
        $(".fancybox").fancybox();
        $(".team-slideshow").cycle();
        var film_roll = new FilmRoll({ container: '#film-roll', scroll: false, pager: false, interval: 1, height: "364px" });
        $("#video-header").mb_YTPlayer(); // This needs to be last for some reason
      });
    </script>

    <!--[if lt IE 9]><script src="<?php echo $TopDir; ?>inc/modernizr-2.6.2-respond-1.1.0.min.js"></script><![endif]-->
    <!--[if lt IE 7 ]>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/dd_belatedpng.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('img, .png');</script>
    <![endif]-->

    <!-- BEGIN Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-66753009-1', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- END Google Analytics -->
  </head>
  <body>

    <header>
      <div class="header-black">
        <div class="content-width">
          <a href="."><img src="<?php echo $TopDir; ?>images/logo.png" alt="Belardi Auto Racing" id="logo"></a>

          <a id="menu-toggle" data-toggle="collapse" data-target="#menu">MENU<i class="fa fa-angle-down"></i></a>

          <nav id="menu" class="menu collapse">
            <?php include "menu.php"; ?>
          </nav> <!-- END menu -->

          <div class="social social-header">
            <a href="https://twitter.com/belardiracing"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/BelardiAutoRacing"><i class="fa fa-facebook"></i></a>
            <a href="https://instagram.com/belardiracing"><i class="fa fa-instagram"></i></a>
          </div> <!-- END social -->
        </div> <!-- END content-width -->
      </div> <!-- END header-black -->

      <?php if ($PageTitle != "" && $Banner != "none") { ?>
      <?php if ($Video != "") { ?>
      <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.mb.YTPlayer.min.js"></script>
      <div id="video-header" data-property="{videoURL:'<?php echo $Video; ?>', containment:'#video-header', startAt:0, mute:true, autoPlay:true, loop:true, showControls:false, stopMovieOnBlur:false}"></div>
      <?php } else { ?>
      <div id="sub-banner"<?php if ($Banner !="") echo " style=\"background-image: url(" . $TopDir . "images/" . $Banner . ");\""; ?>>
        <div class="content-width">
          <?php echo $PageTitle; ?>
        </div> <!-- END content-width -->
      </div> <!-- END sub-banner -->
      <?php } ?>
      <?php } ?>
    </header>
