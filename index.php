<?php

require_once __DIR__ . '/src/Database/PDOAdapter.php';
require_once __DIR__ . '/src/Parser/Parser.php';

// Данные для подключения к базе (введите свои)
$host = 'localhost';
$db = 'xml_parser';
$username = 'root';
$password = '';

// Введите название файла для считывания
$filename = 'desadv_1111.xml';

$pdo = new PDOAdapter($host, $db, $username, $password);

$parser = new Parser($pdo::getPdo());
$parser->parse($filename);
