<?php
$PageTitle = "News";
$Banner = "sub-banner-schedule.jpg";
include "header.php";
?>

<div class="content-width main-content">
  <h2>NEWS FEED</h2>
  <br>
  
  <?php
  $rss = simplexml_load_file("http://www.indylights.com/feeds/indy-lights-news");

  foreach($rss->channel->item as $item) {
    if (strpos($item->children('http://www.w3.org/2005/Atom')->content, 'Belardi') !== false) {
      echo "<h3>" . $item->title . "</h3>\n" . $item->children('http://www.w3.org/2005/Atom')->content . "<br><br>\n";
    }
  }
  ?>
</div>

<?php include "footer.php"; ?>