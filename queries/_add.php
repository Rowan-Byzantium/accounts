<?php

require "_db-connect.php"; 

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} //don't start a new session if there's already one running

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
        $query = $dbCo->prepare("INSERT INTO transaction(name, amount, date_transaction, id_category) VALUES (:name, :amount, :date, :category)");
        $isOk = $query->execute([
            'name' => strip_tags($_POST['name']), //get the name from the form with striptags in order to prevent the use of HTML
            'amount' => intval(strip_tags($_POST['amount'])), //get the amount from the form with striptags in order to prevent the use of HTML
            'date' => date_format(new DateTime(strip_tags($_POST['date'])), 'Y-m-d'), //get the date and convert it into the right format for the database
            'category' => $_POST['category'] //no striptags or intval because the value already come from a defined list of value 
        ]);
        header('location: ../pages/index.php?ok=' . ($isOk ? 'transaction added successfully' : 'the transaction wasn\'t added in the database'));
        //redirect in the index page with a message if it worked or not 
        exit;
}
