<?php
include "login.php";

$PageTitle = "Schedule";
include "header.php";
?>

<div class="content-width schedule">
  <div class="one-half">
    <h3>Add Event</h3><br>
    <form action="schedule-db.php?a=add" method="POST">
      <div>
        <input type="text" name="round" placeholder="Round"><br>
        <br>

        <input type="text" name="startdate" class="startdate" placeholder="Start Date">

        <input type="text" name="enddate" class="enddate" placeholder="End Date (optional)">

        <div style="clear: both;"></div><br>

        <input type="text" name="location" placeholder="Location"><br>
        <br>

        <input type="text" name="track" placeholder="Track"><br>
        <br>

        <input type="text" name="tracktype" placeholder="Track Type"><br>
        <br>

        <input type="text" name="trackimg" placeholder="Track Image"><br>
        <br>

        <input type="text" name="details" placeholder="Details"><br>
        <br>

        <input type="submit" name="submit" value="SUBMIT" id="submit">

        <div style="clear: both;"></div>
      </div>
    </form>
  </div>
  
  <div class="one-half last">
    <h3>Events</h3><br>

    <?php
    $result = $mysqli->query("SELECT * FROM schedule ORDER BY startdate ASC");

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      echo "<div class=\"controls\">";
        echo "<a href=\"schedule-edit.php?id=" . $row['id'] . "\" title=\"Edit\" class=\"c-edit\"><i class=\"fa fa-pencil\"></i></a><br>";
        echo "<a href=\"schedule-db.php?a=delete&id=" . $row['id'] . "\" onClick=\"return(confirm('Are you sure you want to delete this record?'));\" title=\"Delete\" class=\"c-delete\"><i class=\"fa fa-trash\"></i></a>";
      echo "</div>";

      echo "<strong>" . date("n/j/y", $row['startdate']);
      if ($row['startdate'] != $row['enddate']) {
        echo ($row['enddate'] - $row['startdate'] == 86400) ? " & " : "-";
        echo date("n/j/y", $row['enddate']);
      }
      echo "</strong><br>";

      echo $row['round'] . "<br>";
      echo $row['location'] . "/" . $row['track'] . "<br>";

      echo "<div style=\"clear: both; height: 0.7em\"></div><br>";
    }

    $result->close();
    ?>
  </div>

  <div style="clear: both;"></div>
</div>

<?php include "footer.php"; ?>