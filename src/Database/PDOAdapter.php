<?php

class PDOAdapter
{
    private static $pdo;
    public function __construct($host, $db, $username, $password)
    {
        $dsn = self::generateDsn($host, $db);
        try {
            self::$pdo = new PDO($dsn, $username, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Подключение успешно!" . PHP_EOL;
        } catch (PDOException $e) {
            exit("Ошибка подключения: " . $e->getMessage());
        }
    }

    public static function getPdo()
    {
        return self::$pdo;
    }

    private static function generateDsn($host, $db)
    {
        return 'mysql:host=' . $host . ';dbname=' . $db;
    }
}
