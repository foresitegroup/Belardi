<?php
include("../inc/dbconfig.php");

$startdate = (isset($_POST['startdate'])) ? strtotime($_POST['startdate']) : time();
$enddate = (!empty($_POST['enddate'])) ? strtotime($_POST['enddate']) : $startdate;

switch ($_GET['a']) {
  case "add":
    $mysqli->query("INSERT INTO schedule (
                  round,
                  startdate,
                  enddate,
                  location,
                  track,
                  tracktype,
                  trackimg,
                  details
                  ) VALUES(
                  '" . $mysqli->real_escape_string($_POST['round']) . "',
                  '" . $startdate . "',
                  '" . $enddate . "',
                  '" . $mysqli->real_escape_string($_POST['location']) . "',
                  '" . $mysqli->real_escape_string($_POST['track']) . "',
                  '" . $mysqli->real_escape_string($_POST['tracktype']) . "',
                  '" . $mysqli->real_escape_string($_POST['trackimg']) . "',
                  '" . $mysqli->real_escape_string($_POST['details']) . "'
                  )");
    break;
  case "edit":
    $mysqli->query("UPDATE schedule SET
                  round = '" . $mysqli->real_escape_string($_POST['round']) . "',
                  startdate = '" . $startdate . "',
                  enddate = '" . $enddate . "',
                  location = '" . $mysqli->real_escape_string($_POST['location']) . "',
                  track = '" . $mysqli->real_escape_string($_POST['track']) . "',
                  tracktype = '" . $mysqli->real_escape_string($_POST['tracktype']) . "',
                  trackimg = '" . $mysqli->real_escape_string($_POST['trackimg']) . "',
                  details = '" . $mysqli->real_escape_string($_POST['details']) . "'
                  WHERE id = '" . $_POST['id'] . "'");
    break;
  case "delete":
    $mysqli->query("DELETE FROM schedule WHERE id = '" . $_GET['id'] . "'");
    break;
}

$mysqli->close();

header( "Location: schedule.php" );
?>