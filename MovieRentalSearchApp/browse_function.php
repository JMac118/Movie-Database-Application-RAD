<?php
/**
 * PHP Version 5
 *
 * @browse_function.php
 * Is the public index file that calls display header file
 * @category            MovieRentalSearch
 * @package             MovieRentalSearch
 * @author              JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license             https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link                nolink
 */



require_once 'include/inc_initialize.php';

 /** 
  * Lists 3 drop down menus for genre, rating and year
  *
  * @return str the string value of the HTML with output data
  */
function browse()
{
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $year = $_POST['year'];
    $result = SearchBrowse($genre, $rating, $year);

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
        $str .= "<h2>No results found with these search terms";
    }

    while($row = $result->fetch_assoc()){
        $str .= '<option value="' . $row["Genre"] . '">' . $row["Genre"] . '</option>';
    }

    return $str;
}
?>
