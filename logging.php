<html>
    <meta charset="UTF-8">
</html>

<?php
require_once 'Managers/DatabaseManager.php';
$login = $_POST['login'];

echo "Twój login: ".$login."<br />";

//$conection = DatabaseManager::getConnection();
//$res = $conection->query("SELECT username FROM users WHERE username='$login'");
//    $row = $res->fetch_assoc();
//    echo " username = " . $row['username'] . "\n";
$row = DatabaseManager::getUser($login);
if(!$row){
    echo "Wystąpił błąd połączenia<br />";
}
echo " username = ".$row['username']."<br />";

