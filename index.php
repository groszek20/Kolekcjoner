<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<script>
    function fieldValidation(e) {
        const message = document.getElementById('message');
        const re = /^[a-zA-Z]+$/;
        if (e !== '' && !re.test(e)) {
            message.innerText = "Nieprawidłowe dane";
            return false;
        } else {
            message.innerText = ''
            return true;
        }
    }

    function formValidation() {
        var loginValues;
        const re = /^[a-zA-Z]+$/;
        loginValues = document.getElementById("login").value;
        if (loginValues !== '' && !re.test(loginValues) || loginValues == '') {
            document.getElementById("loginMessage").innerHTML = "Wprowadź poprawne dane!";
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
        <form method="POST" action="rejestracja.php" onsubmit="return formValidation()">
            <span>Login:</span> <input id="login" type="text" name="login" onkeyup="fieldValidation(this.value)"><br><br>
            <p id="loginMessage"></p>
            <input class="button" type="submit" value="Utwórz konto" name="rejestruj"><br><br>
            <p id="message"></p>
        </form>
    </div>
</body>

