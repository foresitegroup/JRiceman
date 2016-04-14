<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>J/R Ice & Refrigeration</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700|Oswald:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="inc/main.css">

    <script type="text/javascript" src="inc/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
      });
    </script>
  </head>
  <body>

    <div class="header site-width">
      <a href="."><img src="images/logo.png" alt="J/R Ice & Refigeration" id="logo"></a>

      <ul id="menu">
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#contact-form">CONTACT</a></li>
        <li>SCHEDULE SERVICE: <span>414-688-9416</span></li>
      </ul>
    </div>

    <div class="banner">
      <div class="site-width">
        <h2>J/R ICE &amp; REFRIGERATION SPECIALIZES IN</h2>
        New Installations, Repairs, Rentals &amp; Cleanings<br>
        <a href="#services">FULL SERVICE LIST</a>
        <a href="#contact-form">SCHEDULE SERVICE</a>
      </div>
    </div>

    <div class="content site-width" id="services">
      J/R Ice &amp; Refrigeration specializes in: <strong>New Ice Machine &amp; Refrigeration Installations</strong>, <strong>Refrigeration &amp; Ice Machine Repair</strong>, <strong>Ice Machine Rentals &amp; Rent to Own Ice Machines</strong>.<br>
      J/R Ice &amp; Refrigeration can set you up for <strong>Regular Cleanings</strong> to prevent ice machine breakdown, mold, mildew and other problems that can cause business losses.
    </div>

    <hr>

    <div class="specialist site-width">
      <div class="col1">
        ICE MACHINE &amp; REFRIGERATION SPECIALIST
      </div>

      <div class="col2">
        Compressor Replacements<br>
        <br>

        Commercial Ice machine cleaning (minimum size 100lb capacity)<br>
        <br>

        Commercial Ice Machine &amp; Refrigeration Equipment Updating<br>
        <br>

        Ice Machine rental programs (1 year min)<br>
        <br>

        Used Equipment &amp; Ice Bins FOR SALE
      </div>
    </div>

    <div class="machines">
      <img src="images/machine1.png" alt="">
      <img src="images/machine2.png" alt="">
      <img src="images/machine3.png" alt="">
      <img src="images/machine4.png" alt="">
      <img src="images/machine5.png" alt="">
      <img src="images/machine6.png" alt="">
    </div>

    <div class="logos site-width">
      <img src="images/logo-manitowoc.png" alt="Manitowoc">
      <img src="images/logo-hoshizaki.png" alt="Hoshizaki America, Inc">
      <img src="images/logo-iceomatic.png" alt="Ice-O-Matic">
      <img src="images/logo-scotsman.png" alt="Scotsman">
    </div>

    <div class="call">
      CALL ME BEFORE THE HEALTH DEPARTMENT CALLS YOU! SCHEDULE REGULAR CLEANINGS!
    </div>

    <div class="footer-contact">
    <div class="site-width">
      <div class="col1">
        <h1>CONTACT US</h1>
        Call or fill out the form to schedule an appointment.

        <hr>

        <h2>414-688-9416</h2>

        <hr>

        <h3>J/R ICE &amp; REFRIGERATION LLC</h3>
        <ul>
          <li>Randy Lee Anderson, Owner</li>
          <li>All work includes Written Warranty</li>
          <li>35 Years Experience</li>
          <li>Certified, Licensed &amp; Insured</li>
        </ul>
      </div>

      <div class="col2">
        <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.mask.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $.jMaskGlobals.watchDataMask = true;

            $("#name").blur(function() { $('#name').removeClass("notfilled").attr("placeholder", "* First & Last Name"); });
            $("#message").blur(function() { $('#message').removeClass("notfilled").attr("placeholder", "* I am interested in..."); });

            var form = $('#contact-form');
            var formMessages = $('#contact-form-messages');
            $(form).submit(function(event) {
              event.preventDefault();

              function formValidation() {
                if ($('#name').val() === '') { $('#name').addClass("notfilled").attr("placeholder", "NAME REQUIRED").focus(); return false; }
                if ($('#message').val() === '') { $('#message').addClass("notfilled").attr("placeholder", "MESSAGE REQUIRED").focus(); return false; }
                return true;
              }

              if (formValidation()) {
                var formData = $(form).serialize();
                formData += '&src=ajax';

                $.ajax({
                  type: 'POST',
                  url: $(form).attr('action'),
                  data: formData
                })
                .done(function(response) {
                  $(formMessages).html(response);

                  $(form).find('input:text, textarea').val('');
                  $('#email').val(''); // Grrr!
                })
                .fail(function(data) {
                  if (data.responseText !== '') {
                    $(formMessages).html(data.responseText);
                  } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                  }
                });
              }
            });
          });
        </script>

        <?php
        // Settings for randomizing form field names
        $ip = $_SERVER['REMOTE_ADDR'];
        $timestamp = time();
        $salt = "ForesiteGroupJRIceAndRefrigeration";
        ?>
        <noscript>
        <?php
        $feedback = (!empty($_SESSION['feedback'])) ? $_SESSION['feedback'] : "";
        unset($_SESSION['feedback']);
        ?>
        </noscript>

        <div class="required">* Required</div>
        <form action="<?php echo $TopDir; ?>form-contact.php" method="POST" id="contact-form">
          <div>
            <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="* First &amp; Last Name">

            <div class="one-half">
              <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" id="phone" placeholder="Phone Number" data-mask="000-000-0000">
            </div>

            <div class="one-half last">
              <input type="email" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="Email Address">
            </div>

            <div style="clear: both;"></div>

            <textarea name="<?php echo md5("message" . $ip . $salt . $timestamp); ?>" id="message" placeholder="* I am interested in..."></textarea>

            <input type="hidden" name="referrer" value="index.php">

            <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>

            <input type="hidden" name="ip" value="<?php echo $ip; ?>">
            <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

            <input type="submit" name="submit" value="SEND MESSAGE">

            <div id="contact-form-messages"><?php echo $feedback; ?></div>
          </div>
        </form>
      </div>
    </div>
  </div>

    <div class="credit">
      ACCEPTS: CASH, CHECKS, VISA, MASTERCARD &amp; DISCOVER (NO OVERTIME CHARGES)<br>
      <img src="images/credit-visa.png" alt="Visa">
      <img src="images/credit-mastercard.png" alt="MasterCard">
      <img src="images/credit-discover.png" alt="Discover">
    </div>

    <div class="copyright">
      &copy; <?php echo date("Y"); ?> J/R Ice &amp; Refrigeration LLC &bull; Randy Lee Anderson, Owner &bull; 11038 W. Heritage Dr, Milwaukee, WI 53224

    </div>

  </body>
</html>