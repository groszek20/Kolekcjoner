<html>
    <meta charset="UTF-8">
</html>

<?php
session_start();
require_once "C:/WebServ/httpd/kolekcjoner/managers/DatabaseManager.php";
$login = $_POST['login'];
$pass = $_POST['log_password'];
$row = DatabaseManager::getUser($login);
$haslo = DatabaseManager::getPassword($pass);
$acces = DatabaseManager::getAcces($login, $pass);
$_SESSION['username'] = $acces['username'];
$_SESSION['mail'] = $acces['mail'];

if (!$acces) {
    echo "Nieprawidłowy login lub hasło<br />";
} else {
    header('Location: /kolekcjoner/');
}


