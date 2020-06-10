<?php

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

<form action= "admin_page.php">
<button type="submit" value = "Return">Return</button>
</form>


<?php include_once("list_all_users.php"); 
$str = get_users();
print $str;?>



</br></br></br></br></br>
</div>
    <div class="footer">
      <?php require_once 'include/inc_footer.php'; ?>
      <form action= "include/logout.php">
      <button type="submit" value = "Logout">Logout</button>
      </form>
    </div>
  </div>
</body>

</html>