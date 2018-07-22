<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<head>
    <link rel="stylesheet" href="css/screen.css" media="screen" type="text/css"  />
    <meta charset="UTF-8">
</head>
<?php 

class Logger {
    
    public function logForm (){
        echo '<div class="login_form">
        <form method="POST" action="login/logging.php" onsubmit="return formValidation()">
            <span>Login:</span> 
            <span><input id="login" type="text" name="login"></span><br>
            <p id="loginMessage"></p><br>
            <span>Hasło:</span> 
            <span><input id="log_password" type="password" name="log_password"></span><br>
            <p id="passMessage"></p><br>
            <br>
            <span><input class="button" type="submit" value="Loguj" name="logging"></span>
        </form>
    </div>';
    }
}
?>