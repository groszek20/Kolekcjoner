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
if (!$acces) {
    echo "Nieprawidłowy login lub hasło<br />";
} else {
    echo "Twój login POST: ".$login."<br />";
    echo "Twoje hasło POST: ".$pass."<br />";
    echo " Acces z bazy USERNAME : ".$acces['username']."<br />";
    
    header('Location: /kolekcjoner/');
}


