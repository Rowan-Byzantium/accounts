<?php

require "_db-connect.php";
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
        $query = $dbCo->prepare("INSERT INTO transaction(name, amount, date_transaction, id_category) VALUES (:name, :amount, :date, :category)");
        $isOk = $query->execute([
            'name' => strip_tags($_POST['name']),
            'amount' => intval(strip_tags($_POST['amount'])),
            'date' => date_format(new DateTime(strip_tags($_POST['date'])), 'Y-m-d'),
            'category' => $_POST['category']
        ]);
        header('location: ../pages/index.php?ok=' . ($isOk ? 'transaction added successfully' : 'the transaction wasn\'t added in the database'));
        exit;
}
