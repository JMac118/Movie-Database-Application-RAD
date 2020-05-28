<?php
/**
 * PHP Version 5
 *
 * @search_function.php
 * File for search funciton
 * @category            MembershipManagement
 * @package             MembershipManagement
 * @author              JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license             https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link                nolink
 */

require_once 'include/inc_initialize.php';

  /** 
   * Searches for title and genre
   *
   * @return str
   */
function search()
{
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $result = SearchTitleGenre($title, $genre);

    $str = "";

    if($result->num_rows >0) {

        $str .= "<h2>Results</h2>";
        $str .= "<font size = '2'>";
        $str .= "<table width =100%>";
        $str .= "<tr>";
        $str .= "<td>Title</td>";
        $str .= "<td>Studio</td>";
        $str .= "<td>Status</td>";
        $str .= "<td>Sound</td>";
        $str .= "<td>Versions</td>";
        $str .= "<td>Return Price</td>";
        $str .= "<td>Rating</td>";
        $str .= "<td>Year</td>";
        $str .= "<td>Genre</td>";
        $str .= "<td>Aspect</td>";
        $str .= "</tr>";

        while($row = $result->fetch_assoc()){
            $str .= "<tr><td> " . $row["Title"] . "</td>";
            $str .= "<td> " . $row["Studio"] . "</td>";
            $str .= "<td> " . $row["Status"] . "</td>";
            $str .= "<td> " . $row["Sound"] . "</td>";
            $str .= "<td> " . $row["Versions"] . "</td>";
            $str .= "<td> " . $row["RecRetPrice"] . "</td>";
            $str .= "<td> " . $row["Rating"] . "</td>";
            $str .= "<td> " . $row["Year"] . "</td>";
            $str .= "<td> " . $row["Genre"] . "</td>";
            $str .= "<td> " . $row["Aspect"] . "</td>";
            $str .= "</tr>";

        }

        $str .= "</table>";
    }
 
    else{
        $str .= "<h2>No results found with the search term: " . $title . " under the genre: " . $genre . ".";
    }

    while($row = $result->fetch_assoc()){
        $str .= '<option value="' . $row["Genre"] . '">' . $row["Genre"] . '</option>';
    }

    return $str;
}
?>
