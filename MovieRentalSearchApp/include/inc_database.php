<?php
/**
 * PHP Version 5
 *
 * @inc_database.php
 * File for establishing db connection and setting up global variables
 * @category         MovieRentalSearch
 * @package          MovieRentalSearch
 * @author           JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license          https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link             nolink
 */
  require_once 'inc_db_credentials.php';
  /** 
   * Connects to the database 
   *
   * @return connection variable
   */
function Db_connect()
{
    $connection = Mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    Confirm_db_connect();
    return $connection;
}
 /** 
  * Disconnects to the database 
  *
  * @param $connection variable
  *
  * @return nothing
  */
function Db_disconnect($connection)
{
    if(isset($connection)) {
        Mysqli_close($connection);
    }
}
/** 
 * Escape string from the connection 
 *
 * @param $connection variable
 * @param $string     variable
 *
 * @return nothing
 */
function Db_escape($connection, $string)
{
    return Mysqli_real_escape_string($connection, $string);
}
/** 
 * Confirms the db connect
 *
 * @return nothing
 */
function Confirm_Db_connect()
{
    if(Mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= Mysqli_connect_error();
        $msg .= " (" . Mysqli_connect_errno() . ")";
        exit($msg);
    }
}
/** 
 * Confirms the database query was successful
 * 
 * @param $result_set results from database
 * 
 * @return nothing
 */
function Confirm_Result_set($result_set)
{
    if (!$result_set) {
        exit("Database query failed.");
    }
}
?>
