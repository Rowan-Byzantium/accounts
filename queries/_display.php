<?php

require "_db-connect.php";

$query = $dbCo->prepare("SELECT name, amount, date_transaction AS date, icon_class AS icon, id_transaction AS id FROM transaction
        LEFT JOIN category USING (id_category)
        WHERE YEAR(date_transaction) = :currentyear AND MONTH(date_transaction) = :currentmonth
        ORDER BY date_transaction DESC");
$isOk = $query->execute([
    'currentyear' => date_format(new DateTime(), 'Y'),
    'currentmonth' => date_format(new DateTime(), 'm')
]);
$transactions = $query->fetchAll();
return $transactions;
