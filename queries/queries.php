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
        $query = $dbCo->prepare("SELECT name, amount, date_transaction, id_category FROM transaction
        ORDER BY date_transaction DESC");
        $isOk = $query->execute();
        $transactions = $query->fetchAll();
        var_dump($transactions);
}

