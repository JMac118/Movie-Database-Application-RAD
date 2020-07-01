<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title><?php echo basename(__FILE__, '.php'); ?></title>
  <link href="main.css" rel="stylesheet" type="text/css">
</head>
<?php require_once 'include/inc_initialize.php' ?>

<body>
  <div class="container">
    <div class="header">
      <?php require_once 'include/inc_logo.php'; ?>
    </div>

    <div class="content">
      <h1>Sign Up</h1>
      <form action="signup_scr.php" method="post">
        <div class="form-group">
          <label for="fullname">Full Name:</label>
          <input type="text" class="form-control" id="fullname" name="fullname" pattern="[A-Z a-z '-]*" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" FILTER_VALIDATE_EMAIL class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="newsletter">Newsletter:</label>
          <input type="checkbox" name="newsletter" value="Yes" />
        </div>
        <div class="form-group">
          <label for="newsletter">Newsflash:</label>
          <input type="checkbox" name="newsflash" value="Yes" />
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    <div class="footer">
      <?php require_once 'include/inc_footer.php'; ?>
    </div>
  </div>
  </br></br></br>
</body>

</html>