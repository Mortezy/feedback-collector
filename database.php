<?php

$host = 'localhost';
$db   = 'feedback_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
