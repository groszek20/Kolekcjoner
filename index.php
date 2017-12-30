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
<body>
    <div class="login_form">
        <form method="POST" action="Library/registry.php" onsubmit="return formValidation()">
            <span>Login:</span> 
            <span><input id="login" type="text" name="login" onkeyup="loginValidation(this.value)"></span><br>
            <p id="loginMessage"></p><br>
            <span>Hasło:</span> 
            <span><input id="haslo" type="password" name="haslo" onkeyup="passValidation(this.value)"></span><br>
            <p id="passMessage"></p><br>
            <span>e-mail:</span> 
            <span><input id="email" type="text" name="email"></span><br>
            <br>
            <span><input class="button" type="submit" value="Utwórz konto" name="rejestruj"></span>
        </form>
    </div>
</body>

