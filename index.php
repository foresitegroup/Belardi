<?php
$PageTitle = "";
include "header.php";
?>

<div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="8000" data-cycle-pager-template="<span></span>">
  <p class="cycle-pager"></p>
  <div style="background: url(images/banner1.jpg) center center no-repeat;">
    <div>
      <h1>OUR ROAD TO INDY</h1>
      Follow our progress, races run through September.<br>
      <br>
      <a href="schedule.php">FULL SCHEDULE</a>
    </div>
  </div>
  <div style="background: url(images/banner3.jpg) center center no-repeat;">
    <div>
      <h1>ON THE PODIUM</h1>
      Felix &amp; Juan take the podium!<br>
      <br>
      <a href="drivers.php">OUR DRIVERS</a>
    </div>
  </div>
  <div style="background: url(images/banner4.jpg) center center no-repeat;">
    <div>
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
        <strong>Belardi Auto Racing</strong> team is a team with cars competing in the Cooper Tires USF2000 Championship Presented by Mazda, as well as Firestone Indy Lights Championship under the IZOD IndyCar Series' Mazda Road to Indy development program.<br>
        <br>
        For the 2014 racing season, Belardi Auto Racing has 2 Indy Lights Drivers and 3 USF2000 drivers.<br>
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
      <script type="text/javascript" src="inc/instafeed.min.js"></script>
      <script type="text/javascript">
        var userFeed = new Instafeed({
          get: 'user',
          userId: 36105938,
          accessToken: '36105938.467ede5.271adab5a0bc423aade7dfc6f6f791f1',
          limit: 12,
          template: '<a href="{{link}}" target="new"><img src="{{image}}" /></a>'
        });
        userFeed.run();
      </script>
      <div id="instafeed" class="instafeed"></div>

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