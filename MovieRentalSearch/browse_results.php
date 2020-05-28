<?php 
/**
 * PHP Version 5
 *
 * @browse_results.php
 * Is the public index file that calls display header file
 * @category           MovieRentalSearch
 * @package            MovieRentalSearch
 * @author             JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license            https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link               nolink
 */
?>

<!doctype html>
<html>
<head>
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>


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
        <?php require_once "browse_function.php"; 
        $str = browse();
        print $str;
        ?>

  </div>
  <div class="footer">
    <?php require_once 'include/inc_footer.php'; ?>
  </div>


  
 
</div>
</body>
</html>
