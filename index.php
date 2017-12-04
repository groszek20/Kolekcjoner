<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<?php
echo '
<script type="text/javascript">
function clean(e){        
var textField = document.getElementById(e);
var regex = /[^a-z 0-9?!.,]/gi;
if (textField.value.search(regex) > - 1){
document.getElementById('status').innerHTML = "nieprawidłowy login";
}else {
document.getElementById('status').innerHTML = "ok";
}
textField.value = textField.value.replace(regex,"");
}
</script>

<head>
<link rel="stylesheet" href="css/screen.css" media="screen" type="text/css"  />
<meta charset="UTF-8">
</head>
<body>
<div class="login_form">
<form method="POST" action="rejestracja.php">
<span>Login:</span> <input type="text" id="ta" onekeyup="clean('ta')" onekeydown="clean('ta')" name="login"><br><br>
<div id="status"></div>
<span>Hasło:</span> <input type="password" name="haslo"><br><br>
<span>Email:</span> <input type="text" name="email"><br><br>
<input class="button" type="submit" value="Utwórz konto" name="rejestruj">
</form>
</div>
</body>

';



