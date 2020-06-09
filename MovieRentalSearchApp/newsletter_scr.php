<?php
// Configure .bat file: C:\xampp\php\php.exe -f C:\xampp\htdocs\img\MovieRental\newsletter_scr.php
// First put the location of your php.exe interpreter, followed by "-f"
// Secondly put the location of the script to run, newsletter_scr.php
require_once 'include/inc_initialize.php';

date_default_timezone_set('Australia/Perth');
$weeklyNewsletter = "";

$results = getUsersWhoReceiveNewsletter();
$date = date('m/d/Y', time());
echo $date . "</br>";


$myfile = fopen("newsletters/Newsletter.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    $weeklyNewsletter .= fgets($myfile) . "<br>";
}
fclose($myfile);

$weeklyNewsletter = str_replace("<br>", "", $weeklyNewsletter);
$title = "Newsletter for " . $date;
//echo $weeklyNewsletter;



while ($row = mysqli_fetch_array($results, MYSQLI_NUM)) {

    sendMail($row[2], $weeklyNewsletter, $title);
}
// echo "<tr>";
// echo "<td>".$row[1]." </td>"; // name, you could add their name to the email
// echo "<td>".$row[2]." </td>"; // email
// echo "<td>".$row[3]." </td>"; // not important
// echo "<td>".$row[4]." </td>"; // likewise
// echo "</tr>";
// echo "</br>";

?>

<h1>Test</h1>