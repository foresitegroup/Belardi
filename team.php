<?php
$PageTitle = "Team";
$Banner = "sub-banner-about.jpg";
include "header.php";
?>

<div class="content-width main-content" style="text-align: center;">
  <strong>Belardi Auto Racing</strong> The team that backs Brian Belardi have years of experience and talent. They are all focused on molding and guiding the Mazda Road to Indy drivers to a bright future in the IZOD IndyCar series and beyond.<br>
  <br>

  <strong>MEET THE TEAM <i class="fa fa-angle-down"></i></strong>
</div>

<div class="black">
  <div class="content-width">
    <div class="two-col">
      <img src="images/brian-belardi.jpg" alt="Brian Belardi"><br>
      <strong>BRIAN BELARDI</strong><br>
      Team Owner
    </div>

    <div class="two-col last">
      <img src="images/joe-brunner.jpg" alt="Joe Brunner"><br>
      <strong>JOE BRUNNER</strong><br>
      Team Owner
    </div>

    <div style="clear: both;"></div><br>
    <br>
    <br>

    <div class="sideline"><h2>Indy Lights Series</h2></div>

    <div class="three-col">
      <img src="images/kent-boyer.jpg" alt="Kent Boyer"><br>
      <strong>KENT BOYER</strong><br>
      Engineer
    </div>

    <div class="three-col">
      <img src="images/mike-meyer.jpg" alt="Mike Meyer"><br>
      <strong>MIKE MEYER</strong><br>
      Mechanic
    </div>

    <div class="three-col last">
      <img src="images/tom-vasi.jpg" alt="Tom Vasi"><br>
      <strong>TOM VASI</strong><br>
      Mechanic
    </div>

    <div style="clear: both;"></div>

    <div class="three-col">
      <img src="images/brian-hornick.jpg" alt="Brian Hornick"><br>
      <strong>BRIAN HORNICK</strong><br>
      Mechanic
    </div>

    <div class="three-col last">
      <img src="images/elliot-nunn.jpg" alt="Elliot Nunn"><br>
      <strong>ELLIOT NUNN</strong><br>
      Mechanic
    </div>

    <div style="clear: both;"></div><br>
    <br>
    <br>
  </div>

  <div id="port">
    <!-- List must be spaceless becuse <li>s are display: inline, and any spaces between them show in IE -->
    <ul class="parallax-layer">
      <li><img src="images/gallery/team1.jpg"></li><li><img src="images/gallery/team2.jpg"></li><li><img src="images/gallery/team3.jpg"></li>
    </ul>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
  <script src="inc/jquery.parallax.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('.parallax-layer').parallax({ mouseport: jQuery("#port"), yparallax: false });
    });
  </script>

  <div class="content-width" style="text-align: center;">
    <br>
    <br>
    <br>

    <hr>

    <br>
    <br>

    <h3>DRIVERS</h3>
    <a href="drivers.php">Discover the talent behind the wheel.<br><i class="fa fa-angle-down"></i></a>
  </div>
</div>

<?php include "footer.php"; ?>