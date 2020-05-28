<?php
/**
 * PHP Version 5
 *
 * @initialize.php
 * Sets up basic environment
 * @category       MembershipManagement
 * @package        MembershipManagement
 * @author         JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license        https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link           nolink
 */
  ob_start(); 
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once 'inc_functions.php';
  require_once 'inc_database.php';
  require_once 'inc_query_functions.php';
  require_once 'inc_validation_functions.php';

  $db = db_connect();
  $errors = [];

?>
