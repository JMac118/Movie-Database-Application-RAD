<?php
/**
 * PHP Version 5
 *
 * @functions.php
 * File for defining basic functions
 * @category      MembershipManagement
 * @package       MembershipManagement
 * @author        JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license       https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link          nolink
 */


 /** 
  * Disconnects to the database 
  *
  * @param $script_path variable
  *
  * @return rootpath
  */
function Url_for($script_path)
{
    // add the leading '/' if not present
    if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

/** 
 * Redirects 
 *
 * @param $location variable
 *
 * @return nothing
 */
function Redirect_to($location)
{
    header("Location: " . $location);
    exit;
}
/** 
 * Checks if its a post 
 *
 * @return ifpost
 */
function Is_Post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
/** 
 * Checks if its a GET
 *
 * @return ifget
 */
function Is_Get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/** 
 * Encodes to url
 *
 * @param $string is a string to encode
 *
 * @return encoded
 */
function u($string="")
{
    return urlencode($string);
}
/** 
 * Raw url
 *
 * @param $string is string to make raw
 *
 * @return rawurl
 */
function Raw_u($string="")
{
    return rawurlencode($string);
}
/** 
 * Html special chars
 *
 * @param $string variable
 *
 * @return htmlspecial
 */
function h($string="")
{
    return htmlspecialchars($string);
}
/** 
 * Pops an error message
 *
 * @return nothing
 */
function Error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}
/** 
 * Pops an error message
 *
 * @return nothing
 */
function Error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

/** 
 * Displays errors
 *
 * @param $errors array variable
 *
 * @return output
 */
function Display_errors($errors=array())
{
    $output = '';
    $test = "string: ";
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        $test += $test . $errors;
        foreach($errors as $error) {
            $output .= "<li>" . $error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    echo $test;
    return $output;
}
?>
