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
      <h1>Rate a Movie</h1>
      
      <?php
      require_once 'include/rate_form.php';
      ?>
    </div>
    </br></br>
    <div class="footer">
      <?php require_once 'include/inc_footer.php'; ?>
    </div>
  </div>
</body>

</html>