<?php
require_once 'include/inc_initialize.php';

$alertSuccessful = false;
// require post submission from form

if (isset($_POST["SubmitButton"])) {

    $alertSubject = $_POST["subject"];
    $alertBody = $_POST["alertText"];

    //echo $alertBody;
    // sendmail works, echo success msg
    if ($results = getUsersWhoReceiveAlert()) {
        while ($row = mysqli_fetch_array($results, MYSQLI_NUM)) {            
            sendMail($row[2], $alertBody, $alertSubject);
        }
        $alertSuccessful = true;
    }
}

?>

<form action="" method="POST" id="alertForm">
    <label for="subject">Subject:</label>
    </br>
    <input type="text" name="subject" required>
    </br>
    <!-- Disable resizing of textarea -->
    <label for="alertText">Alert Message:</label>
    </br>
    <textarea name="alertText" id="alertForm" cols="30" rows="10" required></textarea>
    </br>
    <input type="submit" name="SubmitButton" />
</form>
</br>
<p style="color:red;font-weight:bold">
    <?php if ($alertSuccessful) {
        echo "Alert sent out";
    } ?>
</p>
</br></br>
