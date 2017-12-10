<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<?php
echo '
<script>
function formValidation(){
var loginValues, text;
loginValues = document.getElementById("login").value;
if(loginValues < 1 || loginValues > 10) {
text = "Nieprawidłowe dane";
document.getElementById("loginMessage").innerHTML = text;
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
<span>Login:</span> <input id="login" type="text" name="login" required><br><br>
<p id="loginMessage"></p>
<input class="button" type="submit" value="Utwórz konto" name="rejestruj">
</form>
</div>
</body>

';



