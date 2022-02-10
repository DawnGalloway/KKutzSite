<!DOCTYPE html>
  <html lang="en-us">
  <head>
    <meta charset="utf-8"/>
    <title>Confirmation Page</title>
    <link rel="stylesheet" type="text/css" href="kkutz.css"/>
    <style>
      .confirm {
        color: rgb(126, 181, 243);
      }
      #order {
        border: collapse;
      }
      th {
        color: gray;
      }
      .button {
        border: none;
        height: 35px;
        border-radius: 3px;
        margin: 0 0 10px 0;
        font-family:"century gothic", sans-serif;
        font-size: 1em;
      }
      h3 {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div id="header">
      <h1>K-kutz</h1>
    </div> <!--header -->
    <ul id="navBarList">
      <li class="navBarItem confirm">Confirmation</li></a>
    </ul>
    <?php
     if (isset($_POST['cancel'])) {
       echo "<h3>Your order has been canceled</h3>";
     } else {
       echo "<h3>Thank you for shopping with us! Your kut files are on their way to your email address.</h3>";
     }
    ?>
    <hr>
    <div id="footer">We'd love to hear from you! kkutz@email.com 206 W CranberryRidge Road, Lehi, Utah 84043</div>
  </body>
</html>
