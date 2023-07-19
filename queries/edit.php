<?php

// if ($_SERVER['HTTP_REFERER'] == 'http://localhost/accounts/pages/index.php'){
//     echo "it's ok";
// } else {
//     echo 'nope';
// };

// require "_db-connect.php";
// if (session_status() !== PHP_SESSION_ACTIVE) {
//     session_start();
// }

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
    $query = $dbCo->prepare("UPDATE transaction SET :name, :amount, :date_transaction, :id_category WHERE id_task = :id");
    $isOk = $query->execute([
        'name' => strip_tags($_POST['name']),
        'amount' => intval(strip_tags($_POST['amount'])),
        'date' => date_format(new DateTime(strip_tags($_POST['date'])), 'Y-m-d'),
        'id' => intval(strip_tags($_POST['id_task']))
    ]);
    header('location: ../pages/index.php?ok=' . ($isOk ? 'transaction edited succesfully' : 'transaction edit'));
    exit;

    exit;
}
