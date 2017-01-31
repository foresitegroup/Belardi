<?php
$PageTitle = "Contact";
$Banner = "";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupBelardi";
?>

<div class="content-width main-content" style="text-align: center;">
  Naturally, we spend most of our time on the road, but are available. For questions, comments, concerns, sponsorship, info and/or general inquiries, please fill out the form below and we will get back to you after the race.<br>
  <br>

  <strong>GET IN TOUCH <i class="fa fa-angle-down"></i></strong>
</div>

<div class="black">
  <div class="content-width">
    <?php
    if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
      if (
            $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
            $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
            $_POST[md5('message' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
          ) {
        // All required fields have been filled, so construct the message
        $SendTo = "jill@belardiautoracing.com";
        $Subject = "Contact From Belardi Website";
        $From = "From: Contact Form <contactform@belardiautoracing.com>\r\n";
        $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
        
        $Message = "Message from " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . " (" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . ")";

        if (!empty($_POST[md5('subject' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= "\n" . $_POST[md5('subject' . $_POST['ip'] . $salt . $_POST['timestamp'])];

        $Message .= "\n\n";
        
        if (!empty($_POST[md5('message' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= $_POST[md5('message' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
        
        $Message = stripslashes($Message);
        
        mail($SendTo, $Subject, $Message, $From);
        //echo "<pre>$Message</pre><br><br>";
        
        echo "<strong>Your message has been sent!</strong><br>\n<br>\nThank you for your interest in Belardi Auto Racing.  You will be contacted shortly.";
      } else {
        echo "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
      }
    } else {
    ?>
    <script type="text/javascript">
      function checkform (form) {
        if (document.getElementById('name').value == "") { alert('Name required.'); document.getElementById('name').focus(); return false ; }
        if (document.getElementById('email').value == "") { alert('Email required.'); document.getElementById('email').focus(); return false ; }
        if (document.getElementById('message').value == "") { alert('Message required.'); document.getElementById('message').focus(); return false ; }
        return true ;
      }
    </script>
    
    <form action="contact.php" method="POST" onSubmit="return checkform(this)" id="contact">
      <div>
        <div style="font-size: 80%; color: #898989; padding-bottom: 0.3em;">* Required Field</div>

        <label for="name">Name</label>
        <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="* Name"><br>
        <br>

        <label for="email">Email</label>
        <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="* Email Address"><br>
        <br>

        <label for="subject">Subject</label>
        <input type="text" name="<?php echo md5("subject" . $ip . $salt . $timestamp); ?>" id="subject" placeholder="Subject"><br>
        <br>

        <label for="message">Message</label>
        <textarea name="<?php echo md5("message" . $ip . $salt . $timestamp); ?>" id="message" placeholder="* Message"></textarea><br>
        <br>

        <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
          
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

        <input type="submit" name="submit" value="SEND">
      </div>
    </form>
    <?php } ?>

  </div>
</div>

<?php include "footer.php"; ?>