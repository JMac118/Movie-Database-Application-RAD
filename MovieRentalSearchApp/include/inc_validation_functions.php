<?php
/**
 * PHP Version 5
 *
 * @validation_functions.php
 * Functions for validation
 * @category                 MembershipManagement
 * @package                  MembershipManagement
 * @author                   JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license                  https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link                     nolink
 */

     // is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  // * better than empty() which considers "0" to be empty
 /** 
  * Checks if black
  *
  * @param $value to check
  *
  * @return isblank
  */
function Is_blank($value)
{
    return !isset($value) || trim($value) === '';
}
  // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  /** 
   * Has presence
   *
   * @param $value variable
   *
   * @return none
   */
function Has_presence($value)
{
    return !is_blank($value);
}
  // has_length_greater_than('abcd', 3)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  /** 
   * Checks length
   *
   * @param $value to check
   * @param $min   length to check agaisnt
   *
   * @return haslength
   */
function Has_Length_Greater_than($value, $min)
{
    $length = strlen($value);
    return $length > $min;
}
  // has_length_less_than('abcd', 5)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
    /** 
     * Checks length
     *
     * @param $value to check
     * @param $max   length to check agaisnt
     *
     * @return haslength
     */
function Has_Length_Less_than($value, $max)
{
    $length = strlen($value);
    return $length < $max;
}
  // has_length_exactly('abcd', 4)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
/** 
 * Checks length
 *
 * @param $value to check
 * @param $exact length to check agaisnt
 *
 * @return haslength
 */
function Has_Length_exactly($value, $exact)
{
    $length = strlen($value);
    return $length == $exact;
}
  // has_length('abcd', ['min' => 3, 'max' => 5])
  // * validate string length
  // * combines functions_greater_than, _less_than, _exactly
  // * spaces count towards length
  // * use trim() if spaces should not count

  /** 
   * Checks length
   *
   * @param $value   to check
   * @param $options length to check agaisnt
   *
   * @return haslength
   */
function Has_length($value, $options)
{
    if (isset($options['min'])  
        && !has_length_greater_than($value, $options['min'] - 1)
    ) {
        return false;
    } elseif (isset($options['max'])  
        && !has_length_less_than($value, $options['max'] + 1)
    ) {
        return false;
    } elseif (isset($options['exact'])  
        && !has_length_exactly($value, $options['exact'])
    ) {
        return false;
    } else {
        return true;
    }
}
  // has_inclusion_of( 5, [1,3,5,7,9] )
  // * validate inclusion in a set
    /** 
     * Checks has set
     *
     * @param $value to check
     * @param $set   set to check for
     *
     * @return hasset
     */
function Has_Inclusion_of($value, $set)
{
    return in_array($value, $set);
}
  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * validate exclusion from a set
      /** 
       * Checks does not hves set
       *
       * @param $value to check
       * @param $set   set to check for
       *
       * @return hasset
       */
function Has_Exclusion_of($value, $set)
{
    return !in_array($value, $set);
}
  // has_string('nobody@nowhere.com', '.com')
  // * validate inclusion of character(s)
  // * strpos returns string start position or false
  // * uses !== to prevent position 0 from being considered false
  // * strpos is faster than preg_match()
      /** 
       * Checks has string
       *
       * @param $value           to check
       * @param $required_string string to check for
       *
       * @return hasstring
       */
function Has_string($value, $required_string)
{
    return strpos($value, $required_string) !== false;
}
  // has_valid_email_format('nobody@nowhere.com')
  // * validate correct format for email addresses
  // * format: [chars]@[chars].[2+ letters]
  // * preg_match is helpful, uses a regular expression
  //    returns 1 for a match, 0 for no match
  //    http://php.net/manual/en/function.preg-match.php
      /** 
       * Checks has format
       *
       * @param $value to check
       *
       * @return hasformat
       */
function Has_Valid_Email_format($value)
{
    //$email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.com$|\.net$|\.com.au$\Z/i';
    //$email_regex = "(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])";
    //echo preg_match($email_regex, $value);
    return preg_match($email_regex, $value);
}

  // has_unique_page_menu_name('History')
  // * Validates uniqueness of pages.category
  // * For new records, provide only the category.
  // * For existing records, provide current ID as second arugment
  //   has_unique_page_menu_name('History', 4)
      /** 
       * Checks has unique page category
       *
       * @param $category   to check
       * @param $current_id id to check for
       *
       * @return hasuniquepagecategory
       */
function Has_Unique_Page_category($category, $current_id="0")
{
    global $db;
    $sql = "SELECT * FROM payslips ";
    $sql .= "WHERE category='" . db_escape($db, $category) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";
    $payslip_set = mysqli_query($db, $sql);
    $payslip_count = mysqli_num_rows($payslip_set);
    mysqli_free_result($payslip_set);
    return $payslip_count === 0;
}
  // has_unique_username('johnqpublic')
  // * Validates uniqueness of admins.username
  // * For new records, provide only the username.
  // * For existing records, provide current ID as second argument
  //   has_unique_username('johnqpublic', 4)
      /** 
       * Checks has unique username
       *
       * @param $username   to check
       * @param $current_id id to check for
       *
       * @return hasunique
       */
function Has_Unique_username($username, $current_id="0")
{
    global $db;
    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";
    $result = mysqli_query($db, $sql);
    $admin_count = mysqli_num_rows($result);
    mysqli_free_result($result);
    return $admin_count === 0;
}

    /** 
     * Checks has name format
     *
     * @param $name to check
     *
     * @return hasname
     */
function Has_Name_format($name)
{
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
        return $nameErr;
    }
    else {
        return true;
    }
}

  
