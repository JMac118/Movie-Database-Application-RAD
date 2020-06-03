<?php
/**
 * PHP Version 5
 *
 * @GenerateChart.php
 * Generates a chart based on most searched movies
 * @category          MovieRentalSearch
 * @package           MovieRentalSearch
 * @author            JoshuaMacaulay <30008704@tafe.wa.edu.au>
 * @license           https://www.gnu.org/licenses/gpl-3.0.en.html GPL
 * @link              nolink
 */


/*
/*
 * Chart data
 */
require_once 'include/inc_initialize.php';

$result = SearchTopTen();

$max_value_found = 10;
$titles = array(10);
$timesSearched = array(10);

if($result->num_rows >0) {
    for($i = 0; $i < 10; $i++){
        $row = $result->fetch_assoc();

        $titles[$i] = $row["Title"];
        $timesSearched[$i] = $row["TimesSearched"];

        if($timesSearched[$i] > $max_value_found) {
            $max_value_found = $timesSearched[$i];
        }

    }

    $data = $timesSearched;


    // Image dimensions
    $imageWidth = 700;
    $imageHeight = 500;


    // Grid dimensions and placement within image
    //$gridTop = 40;
        $gridTop = 5;
    //$gridLeft = 50;
        $gridLeft = 20;
    //$gridBottom = 340;
        $gridBottom = 360;
    $gridRight = 650;
    $gridHeight = $gridBottom - $gridTop;
    $gridWidth = $gridRight - $gridLeft;

    // Bar and line width
    $lineWidth = 1;
    //$barWidth = 20;
    $barWidth = 40;

    // Font settings

    $font = realpath("Vera.ttf");
    $fontSize = 10;

    // Margin between label and axis
    $labelMargin = 8;

    // Max value on y-axis
    //$yMaxValue = 20;
    $yMaxValue = $max_value_found;

    // Distance between grid lines on y-axis
    $yLabelSpan = 5;

    // Init image
    $chart = imagecreate($imageWidth, $imageHeight);

    // Setup colors
    $backgroundColor = imagecolorallocate($chart, 255, 255, 255);
    $axisColor = imagecolorallocate($chart, 85, 85, 85);
    $labelColor = $axisColor;
    $gridColor = imagecolorallocate($chart, 212, 212, 212);
    $barColor = imagecolorallocate($chart, 47, 133, 217);

    imagefill($chart, 0, 0, $backgroundColor);

    imagesetthickness($chart, $lineWidth);

    /*
    * Print grid lines bottom up
    */

    for($i = 0; $i <= $yMaxValue; $i += $yLabelSpan) {
        $y = $gridBottom - $i * $gridHeight / $yMaxValue;

        // draw the line
        imageline($chart, $gridLeft, $y, $gridRight, $y, $gridColor);

        // draw right aligned label
        $labelBox = imagettfbbox($fontSize, 0, $font, strval($i));
        $labelWidth = $labelBox[4] - $labelBox[0];

        //$labelX = $titles[$i];
        $labelX = $gridLeft - $labelWidth - $labelMargin;
        $labelY = $y + $fontSize / 2;

        //imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, $titles[$i]);
        imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, strval($i));
    }

    /*
    * Draw the bars with labels
    */

    $barSpacing = $gridWidth / count($data);
    $itemX = $gridLeft + $barSpacing / 2;

    foreach($data as $key => $value) {
        // Draw the bar
        $x1 = $itemX - $barWidth / 2;
        $y1 = $gridBottom - $value / $yMaxValue * $gridHeight;
        $x2 = $itemX + $barWidth / 2;
        $y2 = $gridBottom - 1;

        imagefilledrectangle($chart, $x1, $y1, $x2, $y2, $barColor);

        // Draw the label
        $labelBox = imagettfbbox($fontSize, 0, $font, $key);
        $labelWidth = $labelBox[4] - $labelBox[0];
        
        //$labelX = $titles[$value];
        //$labelX = $itemX - $labelWidth / 2;
        $labelX = $itemX - $labelWidth - 15;
        $labelY = $gridBottom + $labelMargin + $fontSize;

        //imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, $key);
        imagettftext($chart, $fontSize, -45, $labelX, $labelY, $labelColor, $font, $titles[$key]);

        $itemX += $barSpacing;
    } 

    /*
    * Output image to file
    */

    imagepng($chart, 'chart.png');

    /*
    * Output image to browser
    */

    echo "<img class='graphImg' src = 'chart.png'>";
}
?>
