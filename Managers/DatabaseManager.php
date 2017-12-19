<?php

class DatabaseManager {
    private function getConnection(){
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
    
    public function setUsers($username, $password, $mail){
        
    }
    
    
}
