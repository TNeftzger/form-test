<div>

   <?php include('vars.php') ?>

	<div id="messaging">
		<?php include('messaging/index.php') ?>
	</div>


  <head>
        <link rel="stylesheet" href="../css/styles.css">
      </head>

  <body>
    <form>

      <h1>Sign Up</h1>

      <fieldset>
        <label for="name">First Name:</label>
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

      <button id="saveChanges" type="submit">Submit</button>
    </form>

  </body>
  </html>
