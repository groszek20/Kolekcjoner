<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
</html>
<head>
    <link rel="stylesheet" href="css/screen.css" media="screen" type="text/css"  />
    <meta charset="UTF-8">
</head>
<body>
</body>
<?php 
session_start();
if (isset($_SESSION['username'])) {
    echo "Jesteś zalogowany jako: ".$_SESSION['username']."<br>";
    echo '<div id="navbar">
    <a href="register/registryform.php">Rejestracja</a>
    <a href="login/logoutform.php">Wyloguj</a>
    <a href="account/myAccount.php">Moje dane</a>
</div>';
} else {
    echo "Jesteś zalogowany jako gość<br>";
    echo '<div id="navbar">
    <a href="register/registryform.php">Rejestracja</a>
    <a href="login/loggingform.php">Logowanie</a>
    <a href="account/myAccount.php">Moje dane</a>
</div>';
}

?>