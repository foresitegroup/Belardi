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
        $SendTo = "mark@foresitegrp.com";
        $Subject = "Contact From Belardi Website";
        $From = "From: Contact Form <contactform@belardiautoracing.com>\r\n";
        $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
        
        $Message = "Message from " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . " (" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . ")";

        if (!empty($_POST[md5('subject' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= "\n" . $_POST[md5('subject' . $_POST['ip'] . $salt . $_POST['timestamp'])];

        $Message .= "\n\n";
        
        if (!empty($_POST[md5('message' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= $_POST[md5('message' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
        
        $Message = stripslashes($Message);
        
        //mail($SendTo, $Subject, $Message, $From);
        echo "<pre>$Message</pre><br><br>";
        
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

    <div class="content-width" style="text-align: center;">
    <br>
    <br>
    <br>

    <hr>

    <br>
    <br>

    <h3>HEADQUARTERS</h3>
    1187 E. Northfield Drive, Suite G &bull; Brownsburg, IN 46112 &bull; (317) 456-2816<br>
    <i class="fa fa-angle-down"></i>
  </div>

  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  function ViewLargerMap(VLMa, map) {
    var VLMui = document.createElement('a');
    VLMui.style.cursor = 'pointer';
    VLMui.href = 'https://www.google.com/maps/place/Belardi+Auto+Racing/@39.8397468,-86.3686737,15z/data=!3m1!4b1!4m2!3m1!1s0x886cae83038fcc3b:0x4b1941d4a53f701e';
    VLMui.target = 'new';
    VLMui.innerHTML = 'View larger map';
    VLMui.style.marginLeft = '7px';
    VLMa.appendChild(VLMui);
  }

  function initialize() {
    var MyLatLng = new google.maps.LatLng(39.8397468,-86.3686737);
    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
      center: MyLatLng,
      zoom: 15,
      disableDefaultUI: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
        position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(mapCanvas, mapOptions)
    map.set('styles', [
      {"featureType": "administrative", "stylers": [{ "weight": 0.1 }, { "color": "#FFFFFF"}]},
      {"featureType": "landscape.natural", "elementType": "geometry", "stylers": [{ "color": "#141414" }]},
      {"featureType": "landscape.man_made", "stylers": [{ "color": "#1c1c1c" } ] },
      {"featureType": "water", "stylers": [{ "color": "#262626" }]},
      {"featureType": "water", "elementType": "labels.text", "stylers": [{ "color": "#afafaf" }, { "weight": 0.1 }]},
      {"featureType": "road", "elementType": "labels", "stylers": [{ "saturation": -100 }, { "invert_lightness": true }]},
      {"featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#333333" }]},
      {"featureType": "road.highway.controlled_access", "elementType": "geometry", "stylers": [{ "color": "#6f6f6f" }, { "weight": 1.5 }]},
      {"featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [{ "weight": 0.1 }, { "color": "#afafaf" }]},
      {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#000000" }]},
      {"featureType": "road.arterial", "elementType": "labels.text.stroke", "stylers": [{ "weight": 0.1 }]},
      {"featureType": "road.arterial", "elementType": "labels.text", "stylers": [{ "color": "#afafaf" }]},
      {"featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#000000" }]},
      {"featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{ "weight": 0.1 }]},
      {"featureType": "road.local", "elementType": "labels.text", "stylers": [{ "color": "#afafaf" }]},
      {"featureType": "transit", "stylers": [{ "color": "#373737" }]},
      {"featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#242424" }]},
      {"featureType": "poi", "elementType": "labels.text", "stylers": [{ "color": "#afafaf" }, { "weight": 0.1 }]},
      {"featureType": "poi", "elementType": "labels.icon", "stylers": [{ "invert_lightness": true }, { "saturation": -100 }]}
    ]);
    
    var marker = new google.maps.Marker({
      position: MyLatLng,
      map: map,
      icon: 'images/map-pin.png'
    });

    var infowindow = new google.maps.InfoWindow({
      content: '<div id="content"><div id="bodyContent"><strong>Belardi Auto Racing</strong><br>1187 E. Northfield Drive<br>Suite G<br>Brownsburg, IN 46112<br><a href="https://www.google.com/maps/place/Belardi+Auto+Racing/@39.8397468,-86.3686737,15z/data=!3m1!4b1!4m2!3m1!1s0x886cae83038fcc3b:0x4b1941d4a53f701e" target="new">View larger map</a></div></div>'
    });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
    
    var vlmDiv = document.createElement('div');
    var vlm = new ViewLargerMap(vlmDiv, map);
    vlmDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(vlmDiv);
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas"></div>

<?php include "footer.php"; ?>