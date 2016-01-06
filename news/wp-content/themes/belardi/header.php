<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$TopDir = ($_SERVER['DOCUMENT_ROOT'] != dirname(__FILE__)) ? "http://" . $_SERVER['HTTP_HOST'] . "/" : "";
if ($_SERVER['SERVER_NAME'] == "localhost") { $parts = explode("/", $_SERVER['REQUEST_URI']); $TopDir .= $parts[1] . "/"; }

$PageTitle = "News"; // This won't display, but it's needed for formatting

include "../header.php";
?>

<!-- <div class="content-width main-content news"> -->
<div class="news">
  <?php if ( !is_single() ) : ?>
  <div class="black">
    <div class="content-width" style="text-align: center;">
      Stay up to date on the latest Belardi Auto Racing team news as we continue on Road to Indy presented by Cooper Tires.<br>
      <br>

      <strong style="color: #D5B576;">LATEST POSTS <i class="fa fa-angle-down"></i></strong>
    </div>
  </div>

  <div class="content-width main-content">
  <?php endif; ?>