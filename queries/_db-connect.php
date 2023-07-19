<?php
// require __DIR__ . '/../vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();

try {
    $dbCo = new PDO(
        'mysql:host=localhost;dbname=accounts;charset=utf8',
        'phpuser',
        '123456'
    );

    $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Can't connect to database." . $e->getMessage());
}