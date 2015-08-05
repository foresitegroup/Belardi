    
    <div class="white">
      <div class="content-width">
        <?php if ($PageTitle == "") { ?>
        <div id="logos" class="vert-center">
          <img src="<?php echo $TopDir; ?>images/logo-cooper-tires.png" alt="Cooper Tires">
          <img src="<?php echo $TopDir; ?>images/logo-indy-lights.png" alt="Indy Lights">
          <img src="<?php echo $TopDir; ?>images/logo-mazda-road-to-indy.png" alt="Mazda Road To Indy">
          <img src="<?php echo $TopDir; ?>images/logo-liberty-engineering.png" alt="Liberty Engineering">
        </div> <!-- END logos -->
        <?php } else { ?>
        <?php include "signup.php"; ?>
        <?php } ?>
      </div> <!-- END content-width -->
    </div> <!-- END white -->

    <footer id="site-footer">
      <div class="content-width">
        <div id="copyright" class="vert-center">
          &copy; <?php echo date("Y"); ?> Belardi Auto Racing. <a href="http://foresitegrp.com">Crafted by Foresite Group.</a>
        </div> <!-- END copyright -->

        <div class="social social-footer vert-center">
          <a href="https://twitter.com/belardiracing"><i class="fa fa-twitter"></i></a>
          <a href="https://www.facebook.com/BelardiAutoRacing"><i class="fa fa-facebook"></i></a>
          <a href="https://instagram.com/belardiracing"><i class="fa fa-instagram"></i></a>
        </div> <!-- END social -->

        <nav class="menu menu-footer">
          <?php include "menu.php"; ?>
        </nav> <!-- END menu -->
      </div> <!-- END content-width -->
    </footer>
    
  </body>
</html>