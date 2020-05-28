<?php
/**
 * PHP Version 5
 *
 * @search.php
 * The search page
 * @category   MembershipManagement
 * @package    MembershipManagement
 * @author     JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link       nolink
 */

?>

<!doctype html>
<html>
<head>
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<?php require_once 'include/inc_initialize.php' ?>
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
    <h1>Search</h1>
        <form action="search_results.php" method="post">
        Title: <input type="title" name = "title">
        
        <?php List_Select_genre(); ?>
        <button type = "submit">Search</button>
    
    </form>
  </div>
  <div class="footer">
    <?php require_once 'include/inc_footer.php'; ?>
  </div>
</div>
</body>
</html>

<?php 
 /** 
  * Drop down list for genre
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
