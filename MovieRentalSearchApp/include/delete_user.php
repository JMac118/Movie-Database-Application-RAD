<?php

require_once 'inc_initialize.php';
global $db;
if (!empty($_POST)) {
    $sql = "DELETE FROM users WHERE email ='";
    $sql .= $_POST["email"];
    $sql .= "';";

    mysqli_query($db, $sql);

    
    if(mysqli_affected_rows($db) > 0){
    echo "<h1> User deleted from records</h1>";
    }
    else{
    echo "<h1>User not found in records</h1>";
    }
}

header("Refresh: 2; URL =../admin_page.php");
?>