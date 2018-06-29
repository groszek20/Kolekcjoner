<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<head>
    <link rel="stylesheet" href="css/screen.css" media="screen" type="text/css"  />
    <meta charset="UTF-8">
</head>
<div id="navbar">
    <a href="#rejsestracja">Rejestracja</a>
    <a href="#logowanie">Logowanie</a>
    <a href="#mojedane">Moje dane</a>
</div>
<body>
    Strona startowa<br>
    <a href="register/registryform.php">Zarejestruj się</a><br>
</body>
<?php 
session_start();
if (isset($_SESSION['username'])) {
    echo "Jesteś zalogowany jako: ".$_SESSION['username']."<br>";
    echo '<a href="login/logoutform.php">Wyloguj</a><br>';
    echo '<a href="account/myAccount.php">Moje dane</a><br>';
} else {
    echo "Jesteś zalogowany jako gość<br>";
    echo '<a href="login/loggingform.php">Logowanie</a><br>';
    echo '<a href="account/myAccount.php">Moje dane</a><br>';
}

?>