<?php

require "_db-connect.php";

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (
    !array_key_exists('token', $_SESSION) 
) {
    echo 'error CSRF';
} else {
        $query = $dbCo->prepare("SELECT SUM(amount) as total FROM transaction");
        $isOk = $query->execute();
        $total = $query->fetch();
        return $total;
}
