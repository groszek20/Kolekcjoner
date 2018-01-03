<?php

require_once 'LogFile.php';
require_once 'config.php';

class DatabaseManager {

    static public function getConnection() {
        $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PW, DB_DB);
        if (mysqli_connect_errno()) {
            $connectionErrNo = mysqli_connect_errno();
            $connectionError = mysqli_connect_error();
            $message = 'Wystąpił błąd połączenia:'.$connectionErrNo.$connectionError;
            echo $message;
            LogFile::AddLog($message, __LINE__, __FILE__);
            exit();
        } else {
            $connection->query("SET NAMES 'utf8'");
            return $connection;
        }
    }

    static public function setUsers($username, $password, $mail) {
        $message = "Wstawienie nowego elementu nie powiodło się ";
        $password = md5($password);
        $sqlQuery = "
            INSERT INTO `users`
            (`username`, `password`, `mail`)
            VALUES
            ('{$username}','".md5("{$password}")."','{$mail}')
        ";
        $connection = self::getConnection();
        $sql = $connection->real_escape_string($sqlQuery);
        $result = $connection->query($sqlQuery);
        if (!$result) {
            echo $message;
            LogFile::AddLog($message, __LINE__, __FILE__);
            return false;
        }
        mysqli_close($connection);
        return true;
    }

    static public function getUser() {
        $sqlQuery = "SELECT username FROM users WHERE username='Zenek'";
        $conn = self::getConnection();
        $SQL = $conn->real_escape_string($sqlQuery);
        $result = $conn->query($SQL);

        if (!$result) {
            LogFile::AddLog("Wystąpił błąd połączenia [$conn_errno] [ $conn_error]", __LINE__, __FILE__);
            return false;
        } else {
            $resultArray = Array();
            while (($row = $result->fetch_array(MYSQLI_ASSOC)) != NULL) {
                $resultArray[] = $row;
            }
        }

        if (count($resultArray) > 0) {
            return $resultArray;
        } else {
            echo "pusty wynik";
            return false;
        }
        mysqli_close($conn);
    }

}
