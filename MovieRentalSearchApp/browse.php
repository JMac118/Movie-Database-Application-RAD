<?php 
/**
 * PHP Version 5
 *
 * @browse.php
 * Is the public index file that calls display header file
 * @category   MovieRentalSearch
 * @package    MovieRentalSearch
 * @author     JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link       nolink
 */
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<?php require_once 'include/inc_initialize.php' ?>
<body>
<div class="container">
  <div class="header">
    <?php require_once 'include/inc_logo.php'; ?>
  </div>  

  <div class="content">
    <h1>Browse</h1>
    <p>Enter nothing to view all</p>
    <p>You can browse movies by either genre, rating, year or combination.</p>
        <form action="browse_results.php" method="post">
        
        <?php List_Select_genre(); ?>

        <?php List_Select_rating(); ?>

        <?php List_Select_year(); ?>
</br>
        <button type = "submit" class = "button">Search</button>
    
    </form>
  </div>


</br></br></br>
  <div class="footer">
    <?php require_once 'include/inc_footer.php'; ?>
  </div>
</div>
</body>
</html>

<?php 
 /** 
  * Lists genres for the dropdown menu 
  *
  * @return none
  */
function List_Select_genre()
{
    $result = List_genre();

    echo '<select genre = "genre" name = "genre">';
    echo '<option selected="selected">genre</option>';

    if($result->num_rows >0) {
        while($row = $result->fetch_assoc()){
            echo '<option value="' . $row["Genre"] . '">' . $row["Genre"] . '</option>';
        }
    }
    echo "</select>";
}
?>

<?php 
 /** 
  * Lists ratings for the dropdown menu 
  *
  * @return none
  */
function List_Select_rating()
{
    $result = List_rating();

    echo '<select rating = "rating" name = "rating">';
    echo '<option selected="selected">rating</option>';

    if($result->num_rows >0) {
        while($row = $result->fetch_assoc()){
            echo '<option value="' . $row["Rating"] . '">' . $row["Rating"] . '</option>';
        }
    }
    echo "</select>";
}
?>

<?php 
 /** 
  * Lists years for the dropdown menu 
  *
  * @return none
  */
function List_Select_year()
{
    $result = List_year();

    echo '<select year = "year" name = "year">';
    echo '<option selected="selected">year</option>';

    if($result->num_rows >0) {
        while($row = $result->fetch_assoc()){
            echo '<option value="' . $row["Year"] . '">' . $row["Year"] . '</option>';
        }
    }
    echo "</select>";
}
?>
