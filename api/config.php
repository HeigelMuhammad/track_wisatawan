<?php
$host     = getenv('gateway01.ap-southeast-1.prod.aws.tidbcloud.com');
$dbname   = getenv('db_track_wisatawan');
$username = getenv('3Y6u44EkUgnN9ok.root');
$password = getenv('KBhvnQ4LJkwJQm0t');
$port     = getenv('4000');

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", 
        $username, 
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
        ]
    );
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>