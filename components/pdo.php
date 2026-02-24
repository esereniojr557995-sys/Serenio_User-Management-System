<?php
// components/pdo.php
// Database configuration — update these values to match your environment

define('DB_NAME', 'usercore');  // ← already set
define('DB_USER', 'root');      // ← XAMPP default
define('DB_PASS', '');          // ← XAMPP default (blank)

function getPDO(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die('<div style="font-family:monospace;color:red;padding:20px;">
                <strong>Database Connection Error:</strong><br>' . 
                htmlspecialchars($e->getMessage()) . '<br><br>
                Please check your database credentials in <code>components/pdo.php</code>
                </div>');
        }
    }
    return $pdo;
}
