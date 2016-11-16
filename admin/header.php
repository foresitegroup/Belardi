<?php include_once "../inc/dbconfig.php"; $TopDir = "../"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Belardi Auto Racing<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TopDir; ?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">

    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css">
    <link rel="stylesheet" href="inc/admin.css">
    <link rel="stylesheet" href="inc/jquery-ui.css" type="text/css">

    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="inc/jquery-ui.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');

        $(".startdate, .enddate").datepicker();
      });
    </script>

    <!--[if lt IE 9]><script src="<?php echo $TopDir; ?>inc/modernizr-2.6.2-respond-1.1.0.min.js"></script><![endif]-->
    <!--[if lt IE 7 ]>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/dd_belatedpng.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('img, .png');</script>
    <![endif]-->
  </head>
  <body>

    <header>
      <div class="header-black">
        <div class="content-width">
          <a href="."><img src="<?php echo $TopDir; ?>images/logo.png" alt="Belardi Auto Racing" id="logo"></a>
        </div> <!-- END content-width -->
      </div> <!-- END header-black -->

      <div id="sub-banner">
        <div class="content-width">
          <?php echo $PageTitle; ?>
        </div> <!-- END content-width -->
      </div> <!-- END sub-banner -->
    </header>
