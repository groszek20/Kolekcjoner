<html>
    <meta charset="UTF-8">

</html>
<head>
    <link rel="stylesheet" href="css/screen.css" media="screen" type="text/css"  />
    <base href="http://localhost/kolekcjoner/">
    <meta charset="UTF-8">
</head>
<body>
</body>
<?php
session_start();
require_once "C:/WebServ/httpd/kolekcjoner/login/loggingform.php";
require_once "C:/WebServ/httpd/kolekcjoner/register/registryform.php";
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
    <a href="register">Rejestracja</a>
    <a href="login">Logowanie</a>
    <a href="account/myAccount.php?page=1">Moje dane</a>
    <a href="start">Start</a>
    </div>';
    $get = $_GET['page'];

    if ($get === 'login') {
        $logowanie = new Logger();
        $logowanie->logForm();
    } elseif ($get === 'register'){
        $rejestracja = new Registry();
        $rejestracja->registration();
    }
}
?>