<?php
$PageTitle = "Media";
$Banner = "";
$Video = "AMxgEBi27L4";
include "header.php";
?>

<div class="black">
  <div class="content-width media">
    <h1>MEDIA GALLERY</h1>
    Images and Video courtesy of IndyLights.com<br>
    <br>
    <br>
    <br>

    <?php
    require('news/wp-blog-header.php');
    $posts = get_posts('posts_per_page=14&order=DESC&orderby=date&meta_key=_thumbnail_id');

    $i = 1;

    foreach ($posts as $post) :
      setup_postdata($post);

      if ($i == 1 || $i == 7 || $i == 13)
      echo "<a href=\"" . wp_get_attachment_url(get_post_thumbnail_id()) . "\" rel=\"m\" class=\"fancybox two-col\" style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ");\"></a>\n";

      if ($i == 2 || $i == 8 || $i == 14)
      echo "<a href=\"" . wp_get_attachment_url(get_post_thumbnail_id()) . "\" rel=\"m\" class=\"fancybox two-col last\" style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ");\"></a>\n<div style=\"clear: both;\"></div>\n";

      if ($i == 3 || $i == 9)
      echo "<a href=\"" . wp_get_attachment_url(get_post_thumbnail_id()) . "\" rel=\"m\" class=\"fancybox one-col\" style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ");\"></a>\n";

      if ($i == 4 || $i == 5 || $i == 10 || $i == 11)
      echo "<a href=\"" . wp_get_attachment_url(get_post_thumbnail_id()) . "\" rel=\"m\" class=\"fancybox three-col\" style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ");\"></a>\n";

      if ($i == 6 || $i == 12)
      echo "<a href=\"" . wp_get_attachment_url(get_post_thumbnail_id()) . "\" rel=\"m\" class=\"fancybox three-col last\" style=\"background-image: url(" . wp_get_attachment_url(get_post_thumbnail_id()) . ");\"></a>\n<div style=\"clear: both;\"></div>\n";

      $i++;
    endforeach;
    ?>

    <br>

    <hr>

    <br>
    <br>

    <div style="text-align: center;">
      <h3>WANT MORE?</h3>
      Visit <a href="http://indylights.com">IndyLights.com</a> presented by Cooper Tires.<br>
      <i class="fa fa-angle-down"></i>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>