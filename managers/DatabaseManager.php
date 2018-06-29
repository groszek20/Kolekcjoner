<?php

require_once 'LogFile.php';
require_once "C:/WebServ/httpd/kolekcjoner/config.php";

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
    
    static public function setEmail($username, $mail) {
        $message = "Wstawienie nowego elementu nie powiodło się ";
        $sqlQuery = "
            UPDATE `users` SET `mail`='$mail' WHERE username='Witek'
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


    static public function getUser($username) {
        $login = self::filtering($username);
        $sqlQuery = "SELECT username FROM users WHERE username='$login'";
        $conn = self::getConnection();
        $result = @$conn->query($sqlQuery);
        $row = $result->fetch_assoc();
        $result->free_result();
        mysqli_close($conn);
        if ($row == null) {
            LogFile::AddLog("Wystąpił błąd połączenia [$conn_errno] [ $conn_error]", __LINE__, __FILE__);
            return false;
        } else {
            return $row;
        }
    }
    
    static public function getPassword($password) {
        $password = md5($password);
        $sqlQuery = "SELECT password FROM users WHERE password='$password'";
        $conn = self::getConnection();
        $result = @$conn->query($sqlQuery);
        $row = $result->fetch_assoc();
        $result->free_result();
        mysqli_close($conn);
        if ($row == null) {
            LogFile::AddLog("Wystąpił błąd połączenia [$conn_errno] [ $conn_error]", __LINE__, __FILE__);
            return false;
        } else {
            return $row;
        }
    }
    
    static public function getAcces($login, $password) {
        $login = self::filtering($login);
        $password = md5($password);
        $sqlQuery = "SELECT * FROM users WHERE username='$login' AND password='$password'";
        $conn = self::getConnection();
        $result = $conn->query($sqlQuery);
        $row = $result->fetch_assoc();
        $result->free_result();
        mysqli_close($conn);
        if ($row == null) {
            LogFile::AddLog("Wystąpił błąd połączenia [$conn_errno] [ $conn_error]", __LINE__, __FILE__);
            return false;
        } else {
            return $row;
        }
    }

    static private function filtering($variable) {
        if (get_magic_quotes_gpc()) {
            $variable = stripslashes($variable);
        }
        return mysql_real_escape_string(htmlspecialchars(trim($variable)));
    }

}
