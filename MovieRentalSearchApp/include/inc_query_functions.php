<?php
/**
 * PHP Version 5
 *
 * @query_functions.php
 * File for defining query functions
 * @category            MembershipManagement
 * @package             MembershipManagement
 * @author              JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license             https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link                nolink
 */
  // ENROLMENT

  /** 
   * Lists all genres in db
   *
   * @return result
   */
function List_genre()
{
    global $db;

    $sql = "SELECT DISTINCT Genre FROM movies ORDER BY Genre ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function list_users()
{
    global $db;

    $sql = "SELECT id, name, email, getsNewsletter, getsAlert FROM users ORDER BY id ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/** 
 * Lists all ratings in db
 *
 * @return result
 */
function List_rating()
{
    global $db;

    $sql = "SELECT DISTINCT Rating FROM movies ORDER BY Rating ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/** 
 * Lists all years in db
 *
 * @return result
 */
function List_year()
{
    global $db;

    $sql = "SELECT DISTINCT Year FROM movies ORDER BY Year DESC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/** 
 * Searches all titles with a paired genre
 *
 * @param $title variable
 * @param $genre variable
 *
 * @return result
 */
function searchTitleGenre($title, $genre)
{
    global $db;


    $sql = "SELECT * FROM movies WHERE Title LIKE '%";
    $sql .= $title;
    $sql .= "%' AND Genre LIKE CASE WHEN ('";
    $sql .= $genre;
    $sql .= "' != 'genre') THEN '";
    $sql .= $genre;
    $sql .= "' ELSE '%' END";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $sql = "UPDATE movies SET TimesSearched = TimesSearched + 1 WHERE Title LIKE '%";
    $sql .= $title;
    $sql .= "%' AND Genre LIKE CASE WHEN ('";
    $sql .= $genre;
    $sql .= "' != 'genre') THEN '";
    $sql .= $genre;
    $sql .= "' ELSE '%' END";

    mysqli_query($db, $sql);

    return $result;
}

/** 
 * Searches all titles in db 
 *
 * @param $title variable
 *
 * @return result
 */
function searchTitle($title)
{
    global $db;

    $sql = "SELECT * FROM movies WHERE title LIKE '%";
    $sql .= $title;
    $sql .= "%';";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/** 
 * Takes in search parameters and returns the list of movies
 *
 * @param $genre  variable
 * @param $rating variable
 * @param $year   variable
 *
 * @return result
 */
function searchBrowse($genre, $rating, $year)
{
    global $db;
    $sql;
    $result;
    
    $sql = "SELECT * FROM movies WHERE Genre LIKE CASE WHEN ('";
    $sql .= $genre;
    $sql .= "' != 'genre') THEN '";
    $sql .= $genre;
    $sql .= "' ELSE '%' END";

    $sql .= " AND ";
    $sql .= "Rating LIKE CASE WHEN ('";
    $sql .= $rating;
    $sql .= "' != 'rating') THEN '";
    $sql .= $rating;
    $sql .= "' ELSE '%' END";

    $sql .= " AND ";
    $sql .= "Year LIKE CASE WHEN ('";
    $sql .= $year;
    $sql .= "' != 'year') THEN '";
    $sql .= $year;
    $sql .= "' ELSE '%' END";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $sql = "UPDATE movies SET TimesSearched = TimesSearched + 1 WHERE Genre LIKE CASE WHEN ('";
    $sql .= $genre;
    $sql .= "' != 'genre') THEN '";
    $sql .= $genre;
    $sql .= "' ELSE '%' END";

    $sql .= " AND ";
    $sql .= "Rating LIKE CASE WHEN ('";
    $sql .= $rating;
    $sql .= "' != 'rating') THEN '";
    $sql .= $rating;
    $sql .= "' ELSE '%' END";

    $sql .= " AND ";
    $sql .= "Year LIKE CASE WHEN ('";
    $sql .= $year;
    $sql .= "' != 'year') THEN '";
    $sql .= $year;
    $sql .= "' ELSE '%' END";

    mysqli_query($db, $sql);

    return $result;
}

/** 
 * Queries for the top 10 titles and number of times searched
 *
 * @return result
 */
function searchTopTen()
{
    global $db;

    $sql = "SELECT Title, TimesSearched FROM movies ORDER BY TimesSearched DESC LIMIT 10;";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    return $result;
}

function searchTopTenRated()
{
    global $db;

    $sql = "SELECT Title, AvgStars FROM movies ORDER BY AvgStars DESC LIMIT 10;";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    return $result;
}

function getUsersWhoReceiveNewsletter()
{
    global $db;

    $strQuery = "SELECT * from users WHERE getsNewsletter = 1";
    if ($res = mysqli_query($db, $strQuery)) {
        return $res;
    }
}

function getUsersWhoReceiveAlert()
{
    global $db;

    $strQuery = "SELECT * from users WHERE getsAlert = 1";
    if ($res = mysqli_query($db, $strQuery)) {
        return $res;
    }
}

function sendMail($email, $bodyText, $title)
{
    $to_email = $email;
    $sender = "MovieRentalSMT@gmail.com";
    $subject = $title;
    $body = $bodyText;
    $headers = "From: " . $sender;

    if (mail($to_email, $subject, $body, $headers)) {        
        return true;
    } 
    
    return false;
}

function updateAverage($resultSet, $rating)
    {
        global $db;
        
        $sqlUpdate = "";

        while ($row = mysqli_fetch_array($resultSet)) {
            
            $inc = $row[12] + 1;
            $total = $row[13] + $rating;
            $avg = $total / $inc;
            
            $sqlUpdate .= sprintf("UPDATE movies SET TimesRated='%d',TotalStars='%d',avgStars='%d'",
                $inc, $total, $avg);
            $sqlUpdate .= " WHERE id='" . $row[0] . "'";
            mysqli_query($db, $sqlUpdate);
            
        }
        
        return $sqlUpdate;
    }
