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

    function emailValidation(e) {
        const message = document.getElementById('emailMessage');
        const re = /^\S+@\S+\.\S+$/;
        if (e !== '' && !re.test(e)) {
            message.innerText = "Nieprawidłowy email";
            message.style.color = "red";
            return false;
        } else if (e == '') {
            message.style.color = "red";
            message.innerText = 'To pole nie może być puste!'
            return false;
        } else {
            message.style.color = "green";
            message.innerText = 'E-mail poprawny'
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
    <base href="http://localhost/kolekcjoner/">
</head>
<?php

class Registry {

    function registration() {
//        echo '    <div id="login_form">
//        <form method="POST" action="registry.php" onsubmit="return formValidation()">
//            <label for="username">Login:</label> 
//            <input id="login" type="text" name="login" onkeyup="loginValidation(this.value)">
//            <p id="loginMessage"></p><br>
//            <label for="password">Hasło:</label> 
//            <input id="haslo" type="password" name="haslo" onkeyup="passValidation(this.value)">
//            <p id="passMessage"></p><br>
//            <label for="password">e-mail:</label> 
//            <input id="email" type="text" name="email">
//            <input type="submit" value="Utwórz konto" name="rejestruj">
//        </form>
//    </div>';

        echo '<div id="login_form">
            <form method="POST" action="register/registry.php" onsubmit="return formValidation()">
<label id="loginMessage" for="username">Nazwa użytkownika:</label>
<input type="text" id="username" name="username" onkeyup="loginValidation(this.value)">
<label id="passMessage" for="password">Hasło:</label>
<input type="password" id="password" name="password" onkeyup="passValidation(this.value)" >
<label id="emailMessage" for="email">Adres e-mail:</label>
<input type="text" id="email" name="email" onkeyup="emailValidation(this.value)" >
<div id="lower">
<input type="submit" value="Utwórz konto" name="rejestruj">
</div>
</form>
</div>';
    }

}
?>

