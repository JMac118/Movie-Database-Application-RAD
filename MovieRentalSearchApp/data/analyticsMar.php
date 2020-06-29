<?php

    $title = "Most Searched Movies: March";
    $topTen = array(0=>3300, 1=>2800, 2=>3900, 3=>3650);
    $rows = 4; //count($topTen);
    $highestFreqMovie = 5000; //$topTen[0]["count"];
    
    // size and dimensions
    $cols  = $rows;
    $width = 600;
    $height = 500;
    $padding = 10;
    // extra cols added for display
    $colWidth = $width / ($cols + 2);
    // max height adjusted to fit movie names in case abnormal results mess formatting
    $maxHeight = $highestFreqMovie;

    //set colours
    $img = imagecreate($width, $height);
    $gray = imagecolorallocate($img, 0xcc, 0xcc, 0xcc);
    $white = imagecolorallocate($img, 255, 255, 255);
    $black = imagecolorallocate($img, 0, 0, 0);
    $blue = imagecolorallocate($img, 0, 0, 255);
    $green = imagecolorallocate($img, 0, 153, 51);
    $red = imagecolorallocate($img, 255, 0, 0);
    $orange = imagecolorallocate($img, 255, 143, 0);
    $purple = imagecolorallocate($img, 255, 0, 255);
    $pink = imagecolorallocate($img, 252, 113, 166);
    $violet = imagecolorallocate($img, 139, 0, 208);
    $brown = imagecolorallocate($img, 153, 51, 0);
    $gold = imagecolorallocate($img, 252, 186, 3);
    
    // associative array used so loops can easily access colours
    $colourSet = array(0=>$black, 1=>$blue, 2=>$green, 3=>$red, 4=>$orange, 5=>$purple,
                       6=>$pink, 7=>$violet, 8=>$brown, 9=>$gold);

    //bg colour
    imagefilledrectangle($img, 0, 0, $width, $height, $white);
    //vertical line
    imageline($img, ($colWidth), 0, ($colWidth), ($height - 34), $black);
    //horizontal line
    imageline($img, 0, ($height - 34), $width, ($height - 34), $black);
    // labels
    imagestring($img, 31, 0, 0, $maxHeight, $black);
    imagestring($img, 31, ($width / 3), 0, $title, $black);
    //imagestring($img, 31, 0, $height - 20, "movie", $black);
    imagestring($img, 31, 0, $height - 30, "Searches", $black);

    // build graph
    for ($i = 0; $i < $rows; $i++) {
        $colHeight = ($height / 100) * (($topTen[$i] / $maxHeight) * 100);
        // add 1 to $i to get block passed labels
        $x1 = $colWidth * ($i + 1.5);
        $y1 = $height - $colHeight;
        $x2 = $colWidth * ($i + 2.5) - $padding;
        $y2 = $height - 35;
        $colour = $colourSet[$i];

        imagefilledrectangle($img, $x1, $y1, $x2, $y2, $colour);
        imagestring($img, 5, ($x1 + $colWidth/4), $y2 +5, $topTen[$i], $black);
    }

    // write movie names
    for ($int = 0; $int < $rows; $int++) {
        $colour = $colourSet[$int];
        $x = $colWidth + ($colWidth * ($int + 0.65));
        $y = 60 + ($int * 15);

        imagestring($img, 5, $x, $y, "Week " . ($int + 1), $colour);
    }
    
    // set header img name
    header("Content-type: image/png");
  
    imagepng($img);
