<?php

/* Emma API Keys */
require 'api/e2ma-keys.php';
?>


<!DOCTYPE html>

  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Basic Sign Up Form</title>
        <link rel="stylesheet" href="css/styles.css">
      </head>

  <body>
    <form action="index.html" method="post">

      <h1>Sign Up</h1>

      <fieldset>
        <label for="name">Name:</label>
        <input type="text" id="name" name="user_name" value="Name">

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="user_email" value="Email">

        <label for="date">Birthday:</label>
        <input type="date" id="date" name="user_bday" value="Birthday">

        <label>Subsribe me to:</label>
        <input type="checkbox" id="development" value="interest_development" name="user_interest"><label class="soft" for="development">Coupons</label><br>

        <input type="checkbox" id="design" value="interest_design" name="user_interest"><label class="soft" for="design">Weekly Newsletter</label><br>

        <input type="checkbox" id="business" value="interest_business" name="user_interest"><label class="soft" for="business">Daily Updates</label>
      </fieldset>

      <button type="submit">Sign Up</button>
    </form>

  </body>
</html>
