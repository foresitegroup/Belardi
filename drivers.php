<?php
$PageTitle = "Drivers";
$Banner = "sub-banner-urrutia.jpg";
$Description = "Meet the Belardi Auto Racing drivers.";
$Keywords = "Belardi, Belardi Auto Racing, Belardi Racing, Meet the Belardi drivers, Belardi Racing drivers, Indy Lights, Cooper Tires, Road To Indy, Cooper Tires Championship, indy car drivers";
include "header.php";
?>

<div class="content-width main-content" style="text-align: center;">
  <strong>Belardi Auto Racing</strong> is a team with cars competing in the Indy Lights Presented by Cooper Tires Championship under the Verizon INDYCAR Series' Mazda Road to Indy development program.<br>
  <br>

  <strong>MEET OUR DRIVERS <i class="fa fa-angle-down"></i></strong>
</div>

<div class="black drivers">
  <div class="content-width">
    <div class="sideline"><h2>Aaron Telitz</h2></div>

    <div class="three-col">
      <img src="images/driver-aaron-telitz.jpg" alt="Aaron Telitz">
    </div>

    <div class="three-col">
      <strong>Nationality:</strong> American<br>
      <strong>Birthdate:</strong> December 13, 1991<br>
      <strong>Hometown:</strong> Birchwood, WI<br>
      <strong>Height/Weight:</strong> 5'7" / 140 lbs.<br>
      <strong>Off the Track:</strong> Racing, Skateboarding, Wakeboarding, Snowboarding, Golf, and video games<br>
      <br>

      As well liked off track as he is fiercely competitive on track, Aaron Telitz is one of the premier talents on the Mazda Road to Indy.<br>
      <br>

      After winning a dramatic 2016 Pro Mazda Championship, Telitz now sits on the doorstep of the Indianapolis 500.  In 2017 Telitz will compete in the prestigious Indy Lights Championship.  For the second time in his career Telitz will step up to the next rung on the Mazda Road to Indy with scholarship support from Mazda North America and Mazdaspeed.  Only the fourth driver in the history of the Road to Indy to win multiple Mazda scholarships, he looks to follow other scholarship winners into the Verizon IndyCar Series.<br>
      <br>

      <a href="http://www.aarontelitz.com/" class="linkarrow"><strong>WWW.AARONTELITZ.COM</strong></a>
    </div>

    <div class="three-col last">
      <h3><a href="https://twitter.com/AaronTelitz">@AARONTELITZ</a></h3>

      <div class="instagram-grid">
        <?php
        // $media = Instagram::getMediaByUserID(36105938, 12);
        // foreach($media as $key=>$value) {
        //   echo '<a href="'.'https://www.instagram.com/p/'.$media[$key]->code.'" style="background-image: url('.$media[$key]->display_src.');"></a>';
        // }
        $json = json_decode(file_get_contents('https://www.instagram.com/belardiracing/?__a=1'));
        foreach ($json->user->media->nodes as $key => $value) {
          echo '<a href="'.'https://www.instagram.com/p/'.$value->code.'" style="background-image: url('.$value->display_src.');"></a>';
        }
        ?>
      </div>

      <div class="soclinks">
        <a href="https://www.facebook.com/Aaron-Telitz-254146281295285/">FACEBOOK</a> | <a href="https://twitter.com/AaronTelitz">TWITTER</a>
      </div>
    </div>

    <div style="clear: both;"></div>

    <br>
    <br>
    <br>

    <hr>

    <br>
    <br>

    <div style="text-align: center;">
      <h3>THE TEAM</h3>
      <a href="team.php">Who are we? Discover who makes the Belardi Team.<br><i class="fa fa-angle-down"></i></a>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>