<?php
class DatabaseManager {
    
    static public function getConnection(){
        $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PW, DB_DB);
        if (mysqli_connect_errno()) {
            $connection_errno = mysqli_connect_errno();
            $connection_error = mysqli_connect_error();
            LogFile::AddLog("Wystąpił błąd połączenia [$$connection_errno] [ $connection_error]", __LINE__, __FILE__);
            exit();
        } else {
            $connection->query("SET NAMES 'utf8'");
            return $connection;
        }
    }
    
    static public function setUsers($username, $password, $mail){
        $password = md5($password);
        $SQLQuery = "INSERT INTO `users` (`username`, `password`, `mail`) VALUES ('".$username."', '".$password."', '".$mail."')";
        $connection = self::getConnection();
        $SQL = $connection->real_escape_string($SQLQuery);
        $result = $connection->query($SQL);
        if(!$result) {
            echo "Wstawienie nowego elementu nie powiodło się ", __LINE__, " ", __FILE__;
        } else {
            return true;
        }
        mysqli_close($connection);
    }
    
    
}
