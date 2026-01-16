
<?php
$host = "localhost";
$db   = "test_db";
$user = "ci_user";
$pass = "password123"; // or your password

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db",
        $user,
        $pass
    );
    echo "Database connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


