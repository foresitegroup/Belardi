<?php
$PageTitle = "";
include "header.php";

require('news/wp-blog-header.php');
$posts = get_posts('posts_per_page=3&order=DESC&orderby=date&meta_key=_thumbnail_id');

$i = 1;

foreach ($posts as $post) :
  setup_postdata($post);
  
  ${"banner" . $i} = wp_get_attachment_url(get_post_thumbnail_id());

  $i++;
endforeach;
?>

<div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="8000" data-cycle-pager-template="<span></span>">
  <p class="cycle-pager"></p>
  <div class="image" style="background-image: url(<?php echo $banner1; ?>);">
    <div class="overlay"></div>
    <div class="text">
      <h1>OUR ROAD TO INDY</h1>
      Follow our progress, races run through September.<br>
      <br>
      <a href="schedule.php">FULL SCHEDULE</a>
    </div>
  </div>
  <div class="image" style="background-image: url(<?php echo $banner2; ?>);">
    <div class="overlay"></div>
    <div class="text">
      <h1>ON THE PODIUM</h1>
      Felix &amp; Zach take the podium!<br>
      <br>
      <a href="drivers.php">OUR DRIVERS</a>
    </div>
  </div>
  <div class="image" style="background-image: url(<?php echo $banner3; ?>);">
    <div class="overlay"></div>
    <div class="text">
      <h1>BEHIND THE SCENES</h1>
      Learn more about the Belardi Racing team<br>
      <br>
      <a href="about.php">READ MORE</a>
    </div>
  </div>
</div> <!-- END cycle-slideshow -->

<div class="content-width main-content">
  <div class="vert-div-wrap">
    <div class="vert-div">
      <div class="left-vert-div">
        <strong>Belardi Auto Racing</strong> is located minutes outside of Indianapolis, the Racing Capital of the World. With a championship win in 2014, the 2015 season brought the team 1 win finishing 4th in the championship. In 2016 the team will campaign two cars in Indy Lights Presented by Cooper Tires series part of the Mazda Road to Indy, a ladder program to the Verizon INDYCAR series.<br>
        <br>
        <a href="drivers.php" class="linkarrow" style="font-weight: bold;">OUR DRIVERS</a>
      </div>

      <div class="right-vert-div nextevent">
        <?php
        include_once "inc/dbconfig.php";

        $now = time();

        $result = $mysqli->query("SELECT * FROM schedule WHERE enddate+86400 >= $now ORDER BY startdate ASC LIMIT 1");

        // If season is over just display the last event
        if (mysqli_num_rows($result) == 0) $result = $mysqli->query("SELECT * FROM schedule ORDER BY enddate DESC LIMIT 1");

        $row = $result->fetch_array(MYSQLI_BOTH);
        if ($row['startdate'] == $row['enddate']) {
          $enddate = "";
        } else {
          // Construct the end date
          $enddate = "-";
          if (date("F", $row['startdate']) != date("F", $row['enddate'])) $enddate .= date("F", $row['enddate']) . " "; // Different month
          $enddate .= date("j", $row['enddate']);
        }
        ?>
        <h1>NEXT EVENT - <?php echo $row['location']; ?></h1><br>

        <div class="left">
          <img src="images/tracks/<?php echo $row['trackimg']; ?>" alt="<?php echo $row['track']; ?>">
        </div>

        <div class="right">
          <strong><?php echo date("F j", $row['startdate']) . $enddate; ?><br>
          <?php echo $row['round']; ?></strong><br>
          <?php echo $row['track']; ?><br>
          <?php echo $row['tracktype']; ?><br>
          <br>
          <a href="<?php echo $row['details']; ?>" class="linkarrow" style="font-weight: bold;">RACE DETAILS</a>
        </div>

        <div style="clear: both;"></div>
        <?php
        mysqli_free_result($result);
        ?>
      </div>
    </div>
  </div>
</div> <!-- END content-width main-content -->

<div id="social-home">
  <div class="arrow"></div>

  <div class="content-width">
    <div class="three-col">
      <h1>@BELARDIRACING</h1>
      <br>

      <h2>TWITTER FEED</h2>
      <br>

      <script type="text/javascript" src="inc/twitterFetcher.js"></script>
      <script>
        var config1 = {
          "id": '623913908877701120',
          "domId": 'twitter-feed',
          "maxTweets": 10,
          "enableLinks": true,
          "dateFunction": dateFormatter
        };
        function dateFormatter(date) {
          //return date.toString();
          var now = Math.round(new Date().getTime()/1000.0);
          var tweetdate = Math.round(new Date(date).getTime()/1000.0);
          var offset = date.getTimezoneOffset();
          var timestamp = tweetdate - (offset * 60);
          var output = "";

          var month = new Array();
          month[0] = "Jan";
          month[1] = "Feb";
          month[2] = "Mar";
          month[3] = "Apr";
          month[4] = "May";
          month[5] = "Jun";
          month[6] = "Jul";
          month[7] = "Aug";
          month[8] = "Sep";
          month[9] = "Oct";
          month[10] = "Nov";
          month[11] = "Dec";

          if (now - timestamp >= 86400) {
            output = month[date.getMonth()] + ' ' + date.getDate();
          } else {
            if (now - timestamp >= 3600) {
              output = Math.round(((now - timestamp) / 60) / 60) + 'h';
            } else {
              var themin = Math.round((now - timestamp) / 60);
              if (themin < 1) {
                output = 'Now';
              } else {
                output = themin + 'm';
              }
            }
          }

          return output;
        }
        twitterFetcher.fetch(config1);
      </script>
      <div id="twitter-feed"></div>

      <a href="https://twitter.com/belardiracing" class="linkarrow">MORE</a>
    </div>

    <div class="three-col">
      <h1>#BELARDIRACING</h1>
      <br>

      <div class="instagram-grid">
        <?php
        require_once "inc/Instagram.php";
        $media = Instagram::getMediaByUserID(36105938, 12);
        foreach($media as $key=>$value) {
          echo '<a href="'.'https://www.instagram.com/p/'.$media[$key]->code.'" style="background-image: url('.$media[$key]->display_src.');"></a>';
        }
        ?>
      </div>

      <a href="https://instagram.com/belardiracing" class="linkarrow">MORE</a>
    </div>

    <div class="three-col last">
      <h1>SCHEDULE</h1>

      <div id="schedule">
        <table>
          <?php
          $result = $mysqli->query("SELECT * FROM schedule WHERE enddate+86400 >= $now ORDER BY startdate ASC LIMIT 4");

          if (mysqli_num_rows($result) < 4) $result = $mysqli->query("SELECT * FROM (SELECT * FROM schedule ORDER BY enddate DESC LIMIT 4) sub ORDER BY enddate ASC");

          while($row = $result->fetch_array(MYSQLI_BOTH)) {
            if ($row['startdate'] == $row['enddate']) {
              $enddate = "";
            } else {
              // Construct the end date
              $enddate = "-";
              if (date("F", $row['startdate']) != date("F", $row['enddate'])) $enddate .= date("n", $row['enddate']) . "/"; // Different month
              $enddate .= date("j", $row['enddate']);
            }
          ?>
          <tr>
            <td class="col1"><a href="http://maps.google.com?q=<?php echo str_replace(' ', '+', $row['track']) . "+" . str_replace(' ', '+', $row['location']); ?>"><i class="fa fa-map-marker"></i></a></td>
            <td class="col2">
              <strong><?php echo date("n/j", $row['startdate']) . $enddate; ?> &nbsp; <?php echo $row['round']; ?></strong><br>
              <?php echo $row['location']; ?>
            </td>
            <td class="col3"><img src="images/tracks/<?php echo $row['trackimg']; ?>" alt="<?php echo $row['track']; ?>"></td>
          </tr>
          <?php } ?>
        </table>
      </div>

      <a href="schedule.php" class="linkarrow">FULL SCHEDULE</a>
    </div>

    <div style="clear: both;"></div>
  </div>
</div>

<div id="news-home">
  <div class="content-width">
    <h1 class="line">NEWS FEED</h1><br>

    <?php
    require('news/wp-blog-header.php');

    $posts = get_posts('numberposts=3&order=DESC&orderby=date');

    $counter = 1;

    foreach ($posts as $post) :
      setup_postdata( $post );
      ?>
      <div class="three-col<?php if( $counter >= 3 ) echo ' last'; ?>">
        <h2><?php the_title(); ?></h2>
        <div class="date"><?php the_date(); ?></div>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink() ?>" class="linkarrow">READ MORE</a>
      </div>
      <?php
      $counter++;
    endforeach;
    ?>

    <div style="clear: both;"></div>
    <br>

    <br>
    <hr>

    <div class="signup-wrap">
      <?php include "signup.php"; ?>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>