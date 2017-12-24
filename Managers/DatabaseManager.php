<?php

namespace Managers;

class DatabaseManager
{
    /**
     * @return \mysqli
     * @throws \RuntimeException
     */
    public static function getConnection()
    {
        $connection = new \mysqli(DB_SERVER, DB_USERNAME, DB_PW, DB_DB);

        if (mysqli_connect_errno()) {
            $connectionErrorNo = mysqli_connect_errno();
            $connectionError = mysqli_connect_error();

            $message = "Wystąpił błąd połączenia [$connectionErrorNo] [$connectionError]";
            LogFile::AddLog($message, __LINE__, __FILE__);

            throw new \RuntimeException($message);
        }

        $connection->query("SET NAMES 'utf8'");

        return $connection;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $mail
     * @return bool
     */
    public static function setUsers($username, $password, $mail)
    {
        $password = md5($password);
        $sqlQuery = "
            INSERT INTO `users`
            (`username`, `password`, `mail`)
            VALUES
            ('".$username."', '".$password."', '".$mail."')
        ";

        $connection = self::getConnection();
        $sql = $connection->real_escape_string($sqlQuery);
        $result = $connection->query($sql);

        if (!$result) {
            echo 'Wstawienie nowego elementu nie powiodło się ', __LINE__, ' ', __FILE__;
            return false;
        }

        mysqli_close($connection);
        return true;
    }
}
