<?php
// Database connection (Render / local MySQL ke liye update karna hoga)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "fbr_bot";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
?>
