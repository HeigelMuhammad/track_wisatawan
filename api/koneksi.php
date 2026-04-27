<?php
// Mengambil data kredensial TiDB dari Vercel Environment Variables
$host     = getenv('gateway01.ap-southeast-1.prod.aws.tidbcloud.com');
$db_name  = getenv('db_track_wisatawan');
$username = getenv('3Y6u44EkUgnN9ok.root');
$password = getenv('KBhvnQ4LJkwJQm0t');
$port     = getenv('4000');

try {
    // Tambahkan port dan settingan SSL yang diwajibkan oleh TiDB Serverless
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$db_name;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
        ]
    );
} catch (PDOException $e) {
    die("<b style='color:red'>Koneksi database gagal:</b> " . $e->getMessage());
}
?>