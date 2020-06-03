<?php
/**
 * PHP Version 5
 *
 * @top_ten.php
 * File for defining query functions
 * @category    MembershipManagement
 * @package     MembershipManagement
 * @author      JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link        nolink
 */
?>
<!doctype html>
<html>
<head>
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<?php require_once 'include/inc_initialize.php' ?>
<body>
<div class="container">
  <div class="header">
    <?php require_once 'include/inc_logo.php'; ?>
  </div>
  <div class="sidebar1">
    <?php
    require_once 'include/inc_nav.php';
    require_once 'include/inc_sidebar.php';
    ?>
  </div>
  <div class="content">
    <h1>Top 10</h1>
    <h2>Most Searched</h2>

    <?php 
    echo "here";
    require_once "GenerateChart.php"; ?>
    
    

  </div>
  <div class="footer">
    <?php require_once 'include/inc_footer.php'; ?>
  </div>
</div>
</body>
</html>
