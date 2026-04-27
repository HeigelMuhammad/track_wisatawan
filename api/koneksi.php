<?php
// Mengambil data kredensial TiDB dari Vercel Environment Variables

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil data berdasarkan NAMA KUNCI yang ada di Vercel Settings
$host     = getenv('TIDB_HOST');
$port     = getenv('TIDB_PORT');
$db_name  = getenv('TIDB_DATABASE');
$username = getenv('TIDB_USER');
$password = getenv('TIDB_PASSWORD');

try {
    // TiDB mewajibkan port 4000 dan koneksi aman (SSL)
    $dsn = "mysql:host=$host;port=$port;dbname=$db_name;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ]);
} catch (PDOException $e) {
    die("<b style='color:red'>Koneksi database gagal:</b> " . $e->getMessage());
}
?>

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
