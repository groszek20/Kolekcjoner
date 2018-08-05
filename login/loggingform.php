<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<script>
    function loginValidation(e) {
        const message = document.getElementById('loginMessage');
        const re = /^[a-zA-Z]+$/;
        if (e !== '' && !re.test(e)) {
            message.innerText = "Nieprawidłowe dane";
            message.style.color = "red";
            return false;
        } else if (e == '') {
            message.style.color = "red";
            message.innerText = 'To pole nie może być puste!'
            return false;
        } else {
            message.style.color = "green";
            message.innerText = 'Login poprawny'
            return true;
        }
    }

    function passValidation(e) {
        const message = document.getElementById('passMessage');
        const re = /^[a-zA-Z]+$/;
        if (e !== '' && !re.test(e)) {
            message.innerText = "Nieprawidłowe dane";
            message.style.color = "red";
            return false;
        } else if (e == '') {
            message.style.color = "red";
            message.innerText = 'To pole nie może być puste!'
            return false;
        } else {
            message.style.color = "green";
            message.innerText = 'Haslo poprawne'
            return true;
        }
    }

    function formValidation() {
        var loginValues;
        const re = /^[a-zA-Z]+$/;
        loginValues = document.getElementById("login").value;
        if (loginValues !== '' && !re.test(loginValues) || loginValues == '') {
            alert("Wprowadź poprawne dane!");
            return false;
        } else {
            return true;
        }
    }
</script>
<head>
    <link rel="stylesheet" href="css/screen.css" media="screen" type="text/css"  />
    <meta charset="UTF-8">
</head>
<?php 

class Logger {
    
    public function logForm (){
        echo '<div id="login_form">
        <form method="POST" action="login/logging.php" onsubmit="return formValidation()">
            <label id="loginMessage" for="username">Login:</label> 
            <input id="username" type="text" name="username" onkeyup="loginValidation(this.value)">
            <label id="passMessage" for="password">Hasło:</label> 
            <input id="password" type="password" name="log_password" onkeyup="passValidation(this.value)">
            <div id="lower">
            <input class="button" type="submit" value="Loguj" name="logging">
        </form>
    </div>';
    }
}
?>