<!DOCTYPE html>
<html>
<meta charset="UTF-8">
</html>
<?php
require_once "C:/WebServ/httpd/kolekcjoner/managers/DatabaseManager.php";;

$login = $_POST['username'];
$haslo = $_POST['password'];
$email = $_POST['email'];

DatabaseManager::setUsers($login, $haslo, $email);

echo "<br />";
echo "Twój login: ".$login."<br />";
echo "Twóje hasło: ".$haslo."<br />";
echo "Twój email: ".$email."<br />";