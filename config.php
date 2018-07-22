<?php

error_reporting(E_ALL);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PW', '');
define('DB_DB', 'supercms');

set_include_path(get_include_path() . PATH_SEPARATOR . 'login');
set_include_path(get_include_path() . PATH_SEPARATOR . 'register');
set_include_path(get_include_path() . PATH_SEPARATOR . 'managers');

function __autoload($name){
    include_once($name."php");
}

?>
