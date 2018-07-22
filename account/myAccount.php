<?php

require_once "C:/WebServ/httpd/kolekcjoner/managers/DatabaseManager.php";

session_start();
if (isset($_SESSION['username'])) {
    echo "Imie: ".$_SESSION['username']."<br>";
    echo '<header>
    <meta charset="UTF-8">
</header>';
    if (isset($_POST['emailId'])) {
        $_SESSION['mail'] = $_POST['emailId'];
        echo '<form method="POST">
        E-mail:
       <input type="text" name="emailId" id="emailId" value="'.$_SESSION['mail'].'" /></br> 
       <input class="button" type="submit" name="login-submit" id="mail-submit" value="Zapisz zmiany" />
       </form>';
    } else {
        echo '<form method="POST">
        E-mail:
       <input type="text" name="emailId" id="emailId" value="'.$_SESSION['mail'].'" /></br>
       <input class="button" type="submit" name="login-submit" id="mail-submit" value="Zapisz zmiany" />
       </form>';
    }
    if (isset($_POST['emailId']) && isset($_SESSION['username'])) {
        $mail = $_POST['emailId'];
        unset($_POST['emailId']);
        $user = $_SESSION['username'];
        DatabaseManager::setEmail($user, $mail);
    }
} else {
    echo 'zaloguj sie';
}
?>


