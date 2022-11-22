<?php
session_start();
$user = 'root';
$password = 'root';
$db = 'jena';
$host = 'localhost';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db";
try {
    $connect = new PDO($dsn, "root", "root", $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

//   try {
//   $connect = new PDO("mysql:host=$host;dbname=$db", $user, $password);
//   // echo "Подключение к $dbname успешное!";
// } catch (PDOException $pe) {
//   die("Could not connect to the database $db :" . $pe->getMessage());
// }

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
 ?>
