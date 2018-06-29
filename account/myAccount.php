<?php

require_once "C:/WebServ/httpd/kolekcjoner/managers/DatabaseManager.php";
;
session_start();
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
$mail = $_POST['emailId'];
DatabaseManager::setEmail("Witek", $mail);
?>


