<?php

require_once 'include/inc_initialize.php';

 /** 
  * Lists all the users that signed up for the newsletter in the database
  *
  * @return str the string value of the HTML with output data
  */
function get_users()
{
    $result = list_users();

    $str = "";

    if($result->num_rows >0) {

        $str .= "<h2>User Data</h2>";
        $str .= "<font size = '2'>";
        $str .= "<table width =100%>";
        $str .= "<tr>";
        $str .= "<td>ID</td>";
        $str .= "<td>Name</td>";
        $str .= "<td>Email</td>";
        $str .= "<td>Gets Newsletter</td>";
        $str .= "<td>Gets Alerts</td>";
        $str .= "</tr>";
    
        while($row = $result->fetch_assoc()){
            $str .= "<tr><td> " . $row["id"] . "</td>";
            $str .= "<td> " . $row["name"] . "</td>";
            $str .= "<td> " . $row["email"] . "</td>";
            $str .= "<td> " . $row["getsNewsletter"] . "</td>";
            $str .= "<td> " . $row["getsAlert"] . "</td>";
            $str .= "</tr>";

        }

        $str .= "</table>";
    }
        else{
            $str .= "<h2>No users found in the database";
        }
    
        return $str;
}
?>