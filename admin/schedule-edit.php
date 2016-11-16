<?php
include "login.php";

$PageTitle = "Edit Event";
include "header.php";

$result = $mysqli->query("SELECT * FROM schedule WHERE id = '" . $_GET['id'] . "'");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>

<div class="content-width schedule">
  <form action="schedule-db.php?a=edit" method="POST" style="width: 50%; margin: 0 auto;">
    <div>
      <input type="text" name="round" placeholder="Round"<?php if ($row['round'] != "") echo "value=\"" . $row['round'] . "\""; ?>><br>
      <br>

      <input type="text" name="startdate" class="startdate" placeholder="Start Date" value="<?php echo date("m/d/Y", $row['startdate']); ?>">

      <input type="text" name="enddate" class="enddate" placeholder="End Date (optional)" value="<?php if ($row['enddate'] != $row['startdate']) echo date("m/d/Y", $row['enddate']); ?>">

      <div style="clear: both;"></div><br>

      <input type="text" name="location" placeholder="Location"<?php if ($row['location'] != "") echo "value=\"" . $row['location'] . "\""; ?>><br>
      <br>

      <input type="text" name="track" placeholder="Track"<?php if ($row['track'] != "") echo "value=\"" . $row['track'] . "\""; ?>><br>
      <br>

      <input type="text" name="tracktype" placeholder="Track Type"<?php if ($row['tracktype'] != "") echo "value=\"" . $row['tracktype'] . "\""; ?>><br>
      <br>

      <input type="text" name="trackimg" placeholder="Track Image"<?php if ($row['trackimg'] != "") echo "value=\"" . $row['trackimg'] . "\""; ?>><br>
      <br>

      <input type="text" name="details" placeholder="Details"<?php if ($row['details'] != "") echo "value=\"" . $row['details'] . "\""; ?>><br>
      <br>

      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

      <input type="submit" name="submit" value="UPDATE" style="display: block; margin: 0 auto;">

      <div style="clear: both;"></div>
    </div>
  </form>
</div>

<?php include "footer.php"; ?>