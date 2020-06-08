<?php
function LoginAttempt(){
    global $db;


        $sql = "SELECT DISTINCT username, password FROM admins WHERE username ='";
        $sql .= $_POST["username"];
        $sql .= "' AND password ='";
        $sql .= $_POST["password"];
        $sql .= "';";

        
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);

        return $result;
}
    // Initialize the session
    session_start();

        // Initialize the database connection
        require_once 'include/inc_initialize.php';
    // Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin_page.php");
    exit;
}

$message = '';

if(empty($_POST["username"]) == FALSE){
    if(empty($_POST["password"]) == FALSE){
        
        $result = LoginAttempt();
        if($result->num_rows >0) {
            while($row = $result->fetch_assoc()){
            
            session_start();

            // Store sesson data in variable
            $_SESSION['user'] = $_POST["username"];
            $_SESSION['loggedin'] = true;
            //setcookie("user", $_POST["username"], time()+600);
            //setcookie("loggedin", $_POST["true"], time()+600);


            // Redirect user to welcome page
            header("location: admin_page.php");
        }
    }
    else
    {
     $message = '<div class="alert alert-danger">Incorrect Credentials</div>';
    }
}
{
    $message = '<div class="alert alert-danger">Incorrect Credentials</div>';
   }
}


?>
    <div class="content">
        <h1>Login</h1>
        <span><?php echo $message; ?></span>
        <form action="?" method="post">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" pattern="[A-Z a-z '-]*" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" FILTER_VALIDATE_PASSWORD class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="login" value="login" class="btn btn-default">Login</button>
        </form>
    </div>
