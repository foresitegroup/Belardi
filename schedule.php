<?php
$PageTitle = "Schedule";
$Banner = "sub-banner-schedule.jpg";
include "header.php";
?>

<div class="content-width main-content">
  <h2>2015 INDY LIGHTS</h2>
  <br>
  
  <table id="schedule-page">
    <tr>
      <th class="col1">ROUND / DATE</th>
      <th class="col2">LOCATION / TRACK</th>
      <th class="col3">MORE INFO</th>
      <th class="col4">TRACK SHAPE</th>
    </tr>
    <?php
    include_once "inc/dbconfig.php";

    $result = $mysqli->query("SELECT * FROM schedule ORDER BY startdate ASC");

    while($row = $result->fetch_array(MYSQLI_BOTH)) {
      if ($row['startdate'] == $row['enddate']) {
        $enddate = "";
      } else {
        // Construct the end date
        $enddate = "-";
        if (date("F", $row['startdate']) != date("F", $row['enddate'])) $enddate .= date("F", $row['enddate']) . " "; // Different month
        $enddate .= date("j", $row['enddate']);
      }
    ?>
    <tr>
      <td class="col1"><?php echo $row['round']; ?><br><span><?php echo date("F j", $row['startdate']) . $enddate; ?></span></td>
      <td class="col2"><?php echo $row['location']; ?> / <?php echo $row['track']; ?></td>
      <td class="col3"><a href="<?php echo $row['details']; ?>" class="linkarrow">DETAILS</a></td>
      <td class="col4"><img src="images/tracks/<?php echo $row['trackimg']; ?>" alt="<?php echo $row['track']; ?>"></td>
    </tr>
    <?php
    }
    mysqli_free_result($result);
    $mysqli->close();
    ?>
  </table>
</div>

<?php include "footer.php"; ?>