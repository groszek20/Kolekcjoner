<html>
    <meta charset="UTF-8">
</html>

<?php
require_once 'Managers/DatabaseManager.php';
$login = $_POST['login'];

$conection = DatabaseManager::getConnection();
$res = $conection->query("SELECT username FROM users WHERE username='Zenek'");
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    echo " username = " . $row['username'] . "\n";


