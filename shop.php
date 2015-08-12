<?php
$PageTitle = "Shop";
$Banner = "sub-banner-shop.jpg";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupBelardiShop";
?>

<div class="content-width main-content" style="text-align: center;">
  <strong>Interested in Belardi Auto Racing apparel?</strong> Due to an influx of requests regarding apparel, below are products we offer. If you are interested in the following please follow the instructions &amp; fill out the form below.<br>
  <br>

  <strong>AVAILABLE PRODUCTS <i class="fa fa-angle-down"></i></strong>
</div>

<div class="black">
  <div class="content-width team">
    <?php
    if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
      if (
            $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
            $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
            $_POST[md5('product' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
          ) {
        // All required fields have been filled, so construct the message
        $SendTo = "jill@belardiautoracing.com";
        $Subject = "Product Request From Belardi Website";
        $From = "From: Belardi Shop <shop@belardiautoracing.com>\r\n";
        $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
        
        $Message = "Product request from " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . " (" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . ")";

        if (!empty($_POST[md5('product' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= "\n" . $_POST[md5('product' . $_POST['ip'] . $salt . $_POST['timestamp'])];

        $Message .= "\n\n";
        
        if (!empty($_POST[md5('comments' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= $_POST[md5('comments' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
        
        $Message = stripslashes($Message);
        
        mail($SendTo, $Subject, $Message, $From);
        //echo "<pre>$Message</pre><br><br>";
        
        echo "<h3>Your order has been sent!</h3><br>\n<br>\nBelardi will be in contact once the order request has been received.<br><br>Thank you.";
      } else {
        echo "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
      }
    } else {
    ?>
    <div class="three-col">
      <img src="images/shop-polo-black.jpg" alt=""><br>
      <strong>POLO SHIRT - BLACK</strong><br>
      Sizes Vary
    </div>

    <div class="three-col">
      <img src="images/shop-polo-red.jpg" alt=""><br>
      <strong>POLO SHIRT - RED</strong><br>
      Sizes Vary
    </div>

    <div class="three-col last">
      <img src="images/shop-polo-white.jpg" alt=""><br>
      <strong>POLO SHIRT - WHITE</strong><br>
      Sizes Vary
    </div>

    <div style="clear: both;"></div>

    <div class="three-col">
      <img src="images/shop-tee-red.jpg" alt=""><br>
      <strong>GRAPHIC TEE S/S - RED</strong><br>
      Sizes Vary
    </div>

    <div class="three-col">
      <img src="images/shop-hat-black.jpg" alt=""><br>
      <strong>HAT - BLACK</strong><br>
      One Size
    </div>

    <div class="three-col last">
      <img src="images/shop-hat-red.jpg" alt=""><br>
      <strong>HAT - RED</strong><br>
      One Size
    </div>

    <div style="clear: both;"></div>

    <div class="three-col">
      <img src="images/shop-hat-pink.jpg" alt=""><br>
      <strong>HAT - PINK</strong><br>
      One Size
    </div>

    <div style="clear: both;"></div>
  </div>

  <div class="content-width" style="text-align: center;">
    <hr>

    <br>
    <br>

    <h3>PRODUCT REQUEST</h3>
    Fill out the required fields below. Include Product Name, Size &amp; Quantity.<br>
    Belardi will be in contact once the order request has been received.<br>
    <br>

    <script type="text/javascript">
      function checkform (form) {
        if (document.getElementById('name').value == "") { alert('Name required.'); document.getElementById('name').focus(); return false ; }
        if (document.getElementById('email').value == "") { alert('Email required.'); document.getElementById('email').focus(); return false ; }
        if (document.getElementById('product').value == "") { alert('Product required.'); document.getElementById('product').focus(); return false ; }
        return true ;
      }
    </script>
    
    <form action="shop.php" method="POST" onSubmit="return checkform(this)" id="contact">
      <div>
        <div style="font-size: 80%; color: #898989; padding-bottom: 0.3em; text-align: left;">* Required Field</div>

        <label for="name">Name</label>
        <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="* Name"><br>
        <br>

        <label for="email">Email</label>
        <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="* Email Address"><br>
        <br>

        <label for="product">Product</label>
        <input type="text" name="<?php echo md5("product" . $ip . $salt . $timestamp); ?>" id="product" placeholder="* Product Name, Size, Quantity (Ex: Polo Shirt Red, L, 1)"><br>
        <br>

        <label for="comments">Comments</label>
        <textarea name="<?php echo md5("comments" . $ip . $salt . $timestamp); ?>" id="comments" placeholder="Comments"></textarea><br>
        <br>

        <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
          
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

        <input type="submit" name="submit" value="SUBMIT ORDER">
      </div>
    </form>
    <?php } ?>
  </div>
</div>

<?php include "footer.php"; ?>