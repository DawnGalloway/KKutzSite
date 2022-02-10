<?php
  // set up variables  
  // customer info
  $firstName = $_POST["firstName"];
  $lastName  = $_POST["lastName"];
  $phoneNum  = $_POST["phoneNum"];
  $email     = $_POST["email"];
  $address   = $_POST["address"];
  $city      = $_POST["city"];
  $state     = $_POST["state"];
  $zip       = $_POST["zipCode"];

  // payment info
  $type = $_POST["type"];
  $cardName = $_POST["cardName"];
  $cardNum = $_POST["cardNum"];
  $expiration = $_POST["expiration"];
  $cvv = $_POST["cvv"];

  // shopping bag info
  $Watching_Kdrama = $_POST["Watching_Kdrama"];
  $Not_Your_Noona = $_POST["Not_Your_Noona"];
  $Kdrama_One_Just = $_POST["Kdrama_One_Just"];
  $Single_Life = $_POST["Single_Life"];
  $Goblin_Bride = $_POST["Goblin_Bride"];
  $Kdramas_Bandwidth = $_POST["Kdramas Bandwidth"];
  $formTotal = $_POST["formTotal"];
  // slice the bag items into a new array
  $items = array_slice($_POST, 13, 6);

  // footer input
  $feedback = $_POST["feedback"];

  // set up months array
  $months = array( "01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
?>

<!DOCTYPE html>
  <html lang="en-us">
  <head>
    <meta charset="utf-8"/>
    <title>Purchase Review</title>
    <link rel="stylesheet" type="text/css" href="kkutz.css"/>
    <style>
      .review {
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
      #submitButton {
        background-color: rgb(126, 181, 243);
      }
      .order {
        float: right;
        margin: 5px;
      }
    </style>
  </head>
  <body>
    <form action="confirmationPage.php" method="post">
    <input type="hidden" name="firstName" value='<?php echo "$firstName";?>'/>
    <input type="hidden" name="lastName" value='<?php echo "$lastName";?>'/>
    <input type="hidden" name="phoneNum" value='<?php echo "$phoneNum";?>'/>
    <input type="hidden" name="email" value='<?php echo "$email";?>'/>
    <input type="hidden" name="address" value='<?php echo "$address";?>'/>
    <input type="hidden" name="city" value='<?php echo "$city";?>'/>
    <input type="hidden" name="state" value='<?php echo "$state";?>'/>
    <input type="hidden" name="zip" value='<?php echo "$zip";?>'/>
    <div name="kutzDoc" class="document">
      <div id="header">
        <h1>K-kutz</h1>
      </div> <!--header -->
      <ul id="navBarList">
            <li class="navBarItem review">Order Review</li></a>
          </ul>
      <h2>Customer Information</h2>
      <?php
        echo "Name: $firstName $lastName<br></br>";
        echo "Phone: $phoneNum<br></br>";
        echo "Email: $email<br></br>";
        echo "Address: $address<br></br>";
        echo "         $city, $state $zip<br></br>";
      ?>
      <hr>
      <h2>Order Information</h2>
      <table id="order" cellspacing="10">
        <tr>
          <th>Item</th>
          <th>Price</th>
        </tr>
      <!-- pull out the items and prices --> 
      <?php  
        foreach ($items as $item => $price) {
          if ($price != 0) {
            $formattedItem = explode("_", $item);
            echo "<tr><td>";
            print_r (implode(" ", $formattedItem));
            echo "</td><td>\$$price</td></tr>";
            echo "<input type=\"hidden\" name=\"$item\" value=\"$price\"/>";
          }
        }
      ?>
      </table>
      <br>
      <input type="hidden" name="total" value='<?php echo "$formTotal";?>'/>
      <input type="hidden" name="cardName" value='<?php echo "$cardName";?>'/>
      <input type="hidden" name="cardNum" value='<?php echo "$cardNum";?>'/>
      <input type="hidden" name="type" value='<?php echo "$type";?>'/>
      <?php
        echo "\$$formTotal will be charged to your $type, expiring ";
        $formattedExp = explode("/", $expiration);
        foreach ($months as $number => $month) {
          if ($number == $formattedExp[0]){
            echo "$month $formattedExp[1].";
            echo "<input type=\"hidden\" name=\"expMonth\" value=\"$month\"/>";
            echo "<input type=\"hidden\" name=\"expYear\" value=\"$formattedExp[1]\"/>";
          }
        }
      ?>
      <input class="order button" type="submit" name="cancel" value="Cancel" onclick="reset()"/>
      <input class="order button" type="submit" name="submit" value="Confirm"   id="submitButton" />
      <span>&nbsp</span>
      </form>
      <br><br>
      <hr>
      <div id="footer">We'd love to hear from you! kkutz@email.com 206 W CranberryRidge Road, Lehi, Utah 84043</div>
    </div> <!-- document -->
   </form>
 </body>
</html>