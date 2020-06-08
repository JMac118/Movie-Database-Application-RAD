<?php

require_once 'include/inc_initialize.php';

date_default_timezone_set('Australia/Perth');


$results = getUsersWhoReceiveNewsletter();
$date = date('m/d/Y h:i:s a', time());
$weeklyNewsletter = "Replace this with a function that reads from a text file so you don't have to come here to write it";


function getUsersWhoReceiveNewsletter()
{
    global $db;

    $strQuery = "SELECT * from users WHERE getsNewsletter = 1";
    if ($res = mysqli_query($db, $strQuery)) {
        return $res;
    }
}



while ($row = mysqli_fetch_array($results, MYSQLI_NUM)) {

    sendMail($row[2], $weeklyNewsletter, $date);
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