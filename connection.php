<?php
$dsn = 'mysql:host=localhost;dbname=logintrail;charset=utf8';
$db_username = 'root'; // your database username
$db_password = ''; // your database password
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $db_username, $db_password, $options);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
