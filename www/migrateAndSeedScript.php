<?php
require_once 'classes/Connection.php';

$connection = new Connection();
$conn = $connection->getConnection();

// Comandos SQL
$commands = [
    "CREATE TABLE IF NOT EXISTS colors (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL UNIQUE
    )",
    "CREATE TABLE IF NOT EXISTS user_colors (
        id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INTEGER NOT NULL,
        color_id INTEGER NOT NULL,
        FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
        FOREIGN KEY(color_id) REFERENCES colors(id) ON UPDATE CASCADE ON DELETE CASCADE
    )",
    "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE
    )",
    "INSERT INTO colors(name) VALUES ('Blue'), ('Red'), ('Yellow'), ('Green')",
    "INSERT INTO users(name, email) VALUES ('Foo Bar', 'foo@bar.com.br'), ('Bar Baz', 'bar@baz.com.br'), ('Baz Foo', 'baz@foo.com.br')"
];

// Executar comandos SQL
foreach ($commands as $command) {
    try {
        $conn->exec($command);
        echo "Comando executado com sucesso: $command\n";
    } catch (PDOException $e) {
        echo "Erro ao executar comando: " . $e->getMessage() . "\n";
    }
}
