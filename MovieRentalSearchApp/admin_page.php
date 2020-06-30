<?php

/**
 * PHP Version 5
 *
 * @index.php
 * Website index
 * @category  MembershipManagement
 * @package   MembershipManagement
 * @author    JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link      nolink
 */
?>

<?php

function logout()
{
}

$message = '';

// Initialize the session
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  //logged in
} else {
  //not logged in
  header("location: index.php");
}
?>

<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <title><?php echo basename(__FILE__, '.php'); ?></title>
  <link href="main.css" rel="stylesheet" type="text/css">

</head>

<body>
  <div class="container">
    <div class="header">
      <?php
      require_once 'include/inc_logo.php';
      ?>
    </div>
    <div class="content">
      <?php

      echo "<h1> Welcome " . $_SESSION["user"] . "</h1>";

      ?>
      <div class="content">
        <form action="list_users.php">
          <button type="submit" value="Display Users">Display All Subscribed Users</button>
        </form>
        </br>

        <p1>Enter email address of user to delete from records</p1>
        <span><?php echo $message; ?></span>
        <form action="include/delete_user.php" method="post">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <button type="submit" name="delete" value="delete" class="btn btn-default">Delete</button>
        </form>
        </br></br>

        <?php if ($_SESSION['user'] == "admin") {

          echo "<h2>Send a Breaking Alert To Subscribed Users:</h2>";
          require_once 'alert_form.php';
          echo "</br></br></br>";

        }
        ?>
      </div>

    </div>
    <div class="footer">
      <?php require_once 'include/inc_footer.php'; ?>
      <form action="include/logout.php">
        <button type="submit" value="Logout">Logout</button>
      </form>
    </div>
  </div>
</body>

</html>

<?php
