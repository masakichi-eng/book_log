<?php

require __DIR__ . '/../vendor/autoload.php';

function dbConnect()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    $dbHost = $_ENV['DB_HOST'];
    $dbUsername = $_ENV['DB_USERNAME'];
    $dbPassword = $_ENV['DB_PASSWORD'];
    $dbDatabase = $_ENV['DB_DATABASE'];
    
    $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
    if (!$link) {
        echo 'Error: データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}

function dropTable($link)
{
    $dropTableSql = 'DROP TABLE IF EXISTS reviews;';
    $result = mysqli_query($link, $dropTableSql);
    if ($result) {
        echo 'テーブルを削除しました' . PHP_EOL;
    } else {
        echo 'Error: テーブルの削除に失敗しました' . PHP_EOL;
        echo 'Debugging Error: ' . mysqli_error($link) . PHP_EOL;
    }
}

function createTable($link)
{
    $createTableSql = <<<EOT
CREATE TABLE reviews (
    id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(100),
    status VARCHAR(10),
    score INTEGER,
    summary VARCHAR(1000),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;
    $result = mysqli_query($link, $createTableSql);
    if ($result) {
        echo 'テーブルを作成しました' . PHP_EOL;
    } else {
        echo 'Error: テーブルの作成に失敗しました' . PHP_EOL;
        echo 'Debugging Error: ' . mysqli_error($link) . PHP_EOL;
    }
}

$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
