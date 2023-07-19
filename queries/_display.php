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
        $query = $dbCo->prepare("SELECT name, amount, date_transaction AS date, YEAR(date_transaction), MONTH(date_transaction), icon_class AS icon FROM transaction
        JOIN category USING (id_category)
        WHERE YEAR(date_transaction) = :currentyear AND MONTH(date_transaction) = :currentmonth
        ORDER BY date_transaction DESC");
        $isOk = $query->execute([
            'currentyear' => date_format(new DateTime(), 'Y'),
            'currentmonth' => date_format(new DateTime(), 'm')
        ]);
        $transactions = $query->fetchAll();
        return $transactions;
}

