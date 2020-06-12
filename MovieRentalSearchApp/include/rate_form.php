<?php
require_once 'include/inc_initialize.php';

if (isset($_POST["submitRating"])) {
    
    $targetMovie = searchTitle($_POST["title"]);
    $score = intval($_POST["rating"]);
    
    if (mysqli_num_rows($targetMovie) === 1) {

        updateAverage($targetMovie, $score);
        
    } else {
        // do not edit
    }
}

?>

<form action="" method="POST">
    Movie Title: <input type="text" name="title", required>

    <select name="rating">    
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>

    <button type="submit" name="submitRating">Search</button>
</form>