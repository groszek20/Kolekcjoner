<!DOCTYPE html>
<html>
<meta charset="UTF-8">
</html>
<?php
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$email = $_POST['email'];

echo "Twój login: ".$login.". <br />";
echo "Twóje hasło: ".$haslo.". <br />";
echo "Twój email: ".$email.". <br />";