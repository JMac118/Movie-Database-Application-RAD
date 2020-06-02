<?php
/**
 * PHP Version 5
 *
 * @search_results.php
 * wrapper for search
 * @category           MembershipManagement
 * @package            MembershipManagement
 * @author             JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license            https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link               nolink
 */
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>


<body>
<div class="container">
  <div class="header">
    <?php require_once 'include/inc_logo.php'; ?>
  </div>

  <div class="content">
        <?php require_once "search_function.php"; 
        $str = search();
        print $str;
        ?>

  </div>
  <div class="footer">
    <?php require_once 'include/inc_footer.php'; ?>
  </div>


  
 
</div>
</body>
</html>
